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

    const getWithdrawals = () => {
        $.ajax({
            url: 'src/api/get-withdrawals.php',
            type: 'GET',
            dataType: 'json',
            success: (response) => {
                if(response.returncode == 200) {
                    const total_withdrawal = response.total_withdrawal;
                    const total_pending = response.total_pending;
                    $('#total-withdrawal').text(total_withdrawal);
                    $('#total-pending').text(total_pending);

                    const tbody = $('#withdrawalTableBody');
                    tbody.empty();
                    
                    // Update footer display
                    const total = response.result.length;
                    $('#total-display').text(total);
                    $('#display-end').text(total > 0 ? total : 0);
                    
                    response.result.forEach((withdrawal, index) => {
                        // Format amount as Indonesian Rupiah
                        const amount = new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR', minimumFractionDigits: 0 }).format(withdrawal.amount);
                        const fee = new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR', minimumFractionDigits: 0 }).format(withdrawal.fee);
                        const netAmount = withdrawal.amount - withdrawal.fee;
                        const netAmountFormatted = new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR', minimumFractionDigits: 0 }).format(netAmount);
                        
                        // Format status badge
                        let statusBadge = '';
                        let actionButtons = '';
                        let adminDisplay = '-';
                        let notesDisplay = '-';
                        let processedDisplay = '-';
                        
                        if (withdrawal.status === 'pending') {
                            statusBadge = '<span class="badge bg-warning">Pending</span>';
                            actionButtons = `<button class="btn btn-sm btn-success btn-action me-1 btn-approve" data-id="${withdrawal.id}" data-user_id="${withdrawal.user_id}" data-amount="${withdrawal.amount}" data-fee="${withdrawal.fee}" data-net_amount="${netAmount}" data-destination="${withdrawal.destination_account}" data-bs-toggle="modal" data-bs-target="#approveWdModal" title="Approve"><i class="fas fa-check"></i></button>
                                <button class="btn btn-sm btn-danger btn-action btn-reject" data-id="${withdrawal.id}" data-user_id="${withdrawal.user_id}" data-amount="${withdrawal.amount}" data-fee="${withdrawal.fee}" data-net_amount="${netAmount}" data-destination="${withdrawal.destination_account}" data-bs-toggle="modal" data-bs-target="#rejectWdModal" title="Reject"><i class="fas fa-times"></i></button>`;
                        } else if (withdrawal.status === 'approved') {
                            statusBadge = '<span class="badge bg-success">Approved</span>';
                            adminDisplay = withdrawal.admin_id || '-';
                            notesDisplay = withdrawal.admin_notes || 'OK';
                            processedDisplay = withdrawal.processed_at ? new Date(withdrawal.processed_at).toLocaleString('id-ID') : '-';
                            actionButtons = '<button class="btn btn-sm btn-outline-secondary btn-action" disabled><i class="fas fa-check-double"></i></button>';
                        } else if (withdrawal.status === 'rejected') {
                            statusBadge = '<span class="badge bg-danger">Rejected</span>';
                            adminDisplay = withdrawal.admin_id || '-';
                            notesDisplay = withdrawal.admin_notes || '-';
                            processedDisplay = withdrawal.processed_at ? new Date(withdrawal.processed_at).toLocaleString('id-ID') : '-';
                            actionButtons = '<button class="btn btn-sm btn-outline-secondary btn-action" disabled><i class="fas fa-ban"></i></button>';
                        } else if (withdrawal.status === 'canceled') {
                            statusBadge = '<span class="badge bg-secondary">Canceled</span>';
                            notesDisplay = withdrawal.admin_notes || '-';
                            actionButtons = '<button class="btn btn-sm btn-outline-secondary btn-action" disabled><i class="fas fa-minus"></i></button>';
                        }
                        
                        // Format destination account
                        const destination = withdrawal.destination_account ? `<small>${withdrawal.destination_account}</small>` : '-';
                        
                        // Format created date
                        const createdDate = withdrawal.created_at ? new Date(withdrawal.created_at).toLocaleString('id-ID') : '-';
                        
                        const row = `<tr>
                            <td>${withdrawal.id}</td>
                            <td><strong>${withdrawal.user_id}</strong></td>
                            <td class="fw-bold">${amount}</td>
                            <td class="text-muted">${fee}</td>
                            <td class="fw-bold text-success">${netAmountFormatted}</td>
                            <td>${destination}</td>
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
                    const tbody = $('#withdrawalTableBody');
                    tbody.html('<tr><td colspan="12" class="text-center py-4">No withdrawals found</td></tr>');
                    $('#total-display').text(0);
                    $('#display-end').text(0);
                } else {
                    console.log("Failed to fetch withdrawals: ", response.returncode);
                }
            },
            error: (xhr, status, error) => {
                console.log("Status: ", status);
                console.log("Error fetching withdrawals: ", xhr.responseText);
                console.log("Error: ", error);
            }
        });
    };
    getWithdrawals();

    // Event delegation for approve/reject buttons
    $(document).on('click', '.btn-approve', function() {
        const id = $(this).data('id');
        const userId = $(this).data('user_id');
        const amount = $(this).data('amount');
        const fee = $(this).data('fee');
        const netAmount = $(this).data('net_amount');
        const destination = $(this).data('destination');
        
        $('#withdrawalId').val(id);
        $('#modalUserId').text(userId);
        $('#modalAmount').text(new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR', minimumFractionDigits: 0 }).format(amount));
        $('#modalFee').text(new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR', minimumFractionDigits: 0 }).format(fee));
        $('#modalNetAmount').text(new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR', minimumFractionDigits: 0 }).format(netAmount));
        $('#modalNetAmountAlert').text(new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR', minimumFractionDigits: 0 }).format(netAmount));
        $('#modalDestination').text(destination);
    });

    $(document).on('click', '.btn-reject', function() {
        const id = $(this).data('id');
        const userId = $(this).data('user_id');
        const amount = $(this).data('amount');
        
        $('#rejectWithdrawalId').val(id);
        $('#rejectUserId').text(userId);
        $('#rejectAmount').text(new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR', minimumFractionDigits: 0 }).format(amount));
    });
});
