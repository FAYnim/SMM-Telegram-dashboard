import { CookieManager } from "./auth-middleware.js";

$(document).ready(function() {

    const auth_token = CookieManager.get("auth_token");
    if(!auth_token) {
        window.location.href = "login.php";
    } else {
        $.ajax({
            url: 'src/api/auth-middleware.php',
            type: 'POST',
            dataType: 'json',
            data: {'auth_token': auth_token},
            success: (response) => {
                if(response.returncode == 200) {
                    console.log("User Logged In");
                } else {
                    window.location.href = "login.php";
                }
            },
            error: (xhr, status, error) => {
                console.log("Status: ", status);
                console.log("Login failed: ", xhr.responseText);
                console.log("Error: ", error);
            }
        });
    }

    $('#sidebarToggle').on('click', function() {
        $('#sidebar').toggleClass('collapsed show');
        $('#mainContent').toggleClass('expanded');
        $('#sidebarOverlay').toggleClass('show');
    });
    $('#sidebarOverlay').on('click', function() {
        $('#sidebar').removeClass('show').addClass('collapsed');
        $('#mainContent').addClass('expanded');
        $(this).removeClass('show');
    });

    const getDeposits = () => {
        $.ajax({
            url: 'src/api/get-deposits.php',
            type: 'GET',
            dataType: 'json',
            success: (response) => {
                if(response.returncode == 200) {
                    const total_deposit = response.total_deposit;
                    const total_pending = response.total_pending;
                    $('#total-deposit').text(total_deposit);
                    $('#total-pending').text(total_pending);

                    const tbody = $('#depositTableBody');
                    tbody.empty();
                    
                    // Update footer display
                    const total = response.result.length;
                    $('#total-display').text(total);
                    $('#display-end').text(total > 0 ? total : 0);
                    
                    response.result.forEach((deposit, index) => {
                        // Format amount as Indonesian Rupiah
                        const amount = new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR', minimumFractionDigits: 0 }).format(deposit.amount);
                        
                        // Format status badge
                        let statusBadge = '';
                        let actionButtons = '';
                        let adminDisplay = '-';
                        let notesDisplay = '-';
                        let processedDisplay = '-';
                        
                        if (deposit.status === 'pending') {
                            statusBadge = '<span class="badge bg-warning">Pending</span>';
                            actionButtons = `<button class="btn btn-sm btn-success btn-action me-1 btn-approve" data-id="${deposit.id}" data-user_id="${deposit.user_id}" data-amount="${deposit.amount}" data-bs-toggle="modal" data-bs-target="#approveModal" title="Approve"><i class="fas fa-check"></i></button>
                                <button class="btn btn-sm btn-danger btn-action btn-reject" data-id="${deposit.id}" data-user_id="${deposit.user_id}" data-amount="${deposit.amount}" data-bs-toggle="modal" data-bs-target="#rejectModal" title="Reject"><i class="fas fa-times"></i></button>`;
                        } else if (deposit.status === 'approved') {
                            statusBadge = '<span class="badge bg-success">Approved</span>';
                            adminDisplay = deposit.admin_id || '-';
                            notesDisplay = deposit.admin_notes || 'OK';
                            processedDisplay = deposit.processed_at ? new Date(deposit.processed_at).toLocaleString('id-ID') : '-';
                            actionButtons = '<button class="btn btn-sm btn-outline-secondary btn-action" disabled><i class="fas fa-check-double"></i></button>';
                        } else if (deposit.status === 'rejected') {
                            statusBadge = '<span class="badge bg-danger">Rejected</span>';
                            adminDisplay = deposit.admin_id || '-';
                            notesDisplay = deposit.admin_notes || '-';
                            processedDisplay = deposit.processed_at ? new Date(deposit.processed_at).toLocaleString('id-ID') : '-';
                            actionButtons = '<button class="btn btn-sm btn-outline-secondary btn-action" disabled><i class="fas fa-ban"></i></button>';
                        } else if (deposit.status === 'canceled') {
                            statusBadge = '<span class="badge bg-secondary">Canceled</span>';
                            notesDisplay = deposit.admin_notes || '-';
                            actionButtons = '<button class="btn btn-sm btn-outline-secondary btn-action" disabled><i class="fas fa-minus"></i></button>';
                        }
                        
                        // Format proof image
                        const proofImage = deposit.proof_image_id ? '<img src="https://placehold.co/50x50/e9ecef/495057?text=Bukti" class="proof-thumbnail" data-bs-toggle="modal" data-bs-target="#proofModal" alt="Proof">' : '<img src="https://placehold.co/50x50/e2e3e5/41464b?text=-" class="proof-thumbnail" alt="No Proof">';
                        
                        // Format created date
                        const createdDate = deposit.created_at ? new Date(deposit.created_at).toLocaleString('id-ID') : '-';
                        
                        const row = `<tr>
                            <td>${deposit.id}</td>
                            <td><strong>${deposit.user_id}</strong></td>
                            <td class="fw-bold">${amount}</td>
                            <td>${proofImage}</td>
                            <td>${statusBadge}</td>
                            <td>${adminDisplay}</td>
                            <td>${notesDisplay}</td>
                            <td class="text-muted small">${createdDate}</td>
                            <td>${processedDisplay}</td>
                            <td>${actionButtons}</td>
                        </tr>`;
                        tbody.append(row);
                    });
                } else if(response.returncode == 204) {
                    const tbody = $('#depositTableBody');
                    tbody.html('<tr><td colspan="10" class="text-center py-4">No deposits found</td></tr>');
                    $('#total-display').text(0);
                    $('#display-end').text(0);
                } else {
                    console.log("Failed to fetch deposits: ", response.returncode);
                }
            },
            error: (xhr, status, error) => {
                console.log("Status: ", status);
                console.log("Error fetching deposits: ", xhr.responseText);
                console.log("Error: ", error);
            }
        });
    };
    getDeposits();

    // Event delegation for approve/reject buttons
    $(document).on('click', '.btn-approve', function() {
        const id = $(this).data('id');
        const userId = $(this).data('user_id');
        const amount = $(this).data('amount');
        
        $('#depositId').val(id);
        $('#modalUserId').text(userId);
        $('#modalAmount').text(new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR', minimumFractionDigits: 0 }).format(amount));
        $('#approveAmount').val(amount);
    });

    $(document).on('click', '.btn-reject', function() {
        const id = $(this).data('id');
        const userId = $(this).data('user_id');
        const amount = $(this).data('amount');
        
        $('#rejectDepositId').val(id);
        $('#rejectUserId').text(userId);
        $('#rejectAmount').text(new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR', minimumFractionDigits: 0 }).format(amount));
    });
});
