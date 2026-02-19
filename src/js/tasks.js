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

    const getTasks = () => {
        const search = $('#searchTask').val();
        const status = $('#filterStatus').val();
        const dateFrom = $('#dateFrom').val();
        const dateTo = $('#dateTo').val();
        
        let url = 'src/api/get-tasks.php?';
        const params = [];
        
        if (search) params.push('search=' + encodeURIComponent(search));
        if (status) params.push('status=' + encodeURIComponent(status));
        if (dateFrom) params.push('date_from=' + encodeURIComponent(dateFrom));
        if (dateTo) params.push('date_to=' + encodeURIComponent(dateTo));
        
        url += params.join('&');
        
        $.ajax({
            url: url,
            type: 'GET',
            dataType: 'json',
            success: (response) => {
                if(response.returncode == 200) {
                    const total_task = response.total_task;
                    const total_pending = response.total_pending;
                    $('#total-task').text(total_task);
                    $('#total-pending').text(total_pending);

                    const tbody = $('#taskTableBody');
                    tbody.empty();
                    
                    // Update footer display
                    const total = response.result.length;
                    $('#total-display').text(total);
                    $('#display-end').text(total > 0 ? total : 0);
                    
                    response.result.forEach((task, index) => {
                        // Format status badge
                        let statusBadge = '';
                        let actionButtons = '';
                        
                        if (task.status === 'available') {
                            statusBadge = '<span class="badge bg-secondary">Available</span>';
                            actionButtons = '<button class="btn btn-sm btn-outline-secondary btn-action" disabled><i class="fas fa-clock"></i></button>';
                        } else if (task.status === 'taken') {
                            statusBadge = '<span class="badge bg-warning text-dark">Taken</span>';
                            actionButtons = '<button class="btn btn-sm btn-outline-secondary btn-action" disabled><i class="fas fa-clock"></i></button>';
                        } else if (task.status === 'pending_review') {
                            statusBadge = '<span class="badge bg-warning">Pending Review</span>';
                            actionButtons = `<button class="btn btn-sm btn-success btn-action me-1 btn-approve" data-id="${task.id}" data-campaign_id="${task.campaign_id}" data-worker_id="${task.worker_id || ''}" data-bs-toggle="modal" data-bs-target="#approveTaskModal" title="Approve"><i class="fas fa-check"></i></button>
                                <button class="btn btn-sm btn-danger btn-action btn-reject" data-id="${task.id}" data-campaign_id="${task.campaign_id}" data-worker_id="${task.worker_id || ''}" data-bs-toggle="modal" data-bs-target="#rejectTaskModal" title="Reject"><i class="fas fa-times"></i></button>`;
                        } else if (task.status === 'approved') {
                            statusBadge = '<span class="badge bg-success">Approved</span>';
                            actionButtons = '<button class="btn btn-sm btn-outline-secondary btn-action" disabled><i class="fas fa-check-double"></i></button>';
                        } else if (task.status === 'rejected') {
                            statusBadge = '<span class="badge bg-danger">Rejected</span>';
                            actionButtons = '<button class="btn btn-sm btn-outline-secondary btn-action" disabled><i class="fas fa-ban"></i></button>';
                        }
                        
                        // Format proof image
                        const proofImage = task.proof_image_path ? '<img src="https://placehold.co/50x50/e9ecef/495057?text=SS" class="proof-thumbnail" data-bs-toggle="modal" data-bs-target="#proofModal" alt="Proof">' : '<span class="text-muted small">-</span>';
                        
                        // Format dates
                        const takenAt = task.taken_at ? new Date(task.taken_at).toLocaleString('id-ID') : '-';
                        const completedAt = task.completed_at ? new Date(task.completed_at).toLocaleString('id-ID') : '-';
                        const reviewedAt = task.reviewed_at ? new Date(task.reviewed_at).toLocaleString('id-ID') : '-';
                        
                        const row = `<tr>
                            <td>${task.id}</td>
                            <td><strong>Campaign #${task.campaign_id}</strong></td>
                            <td><strong>${task.worker_id || '-'}</strong></td>
                            <td>${statusBadge}</td>
                            <td>${proofImage}</td>
                            <td class="text-muted small">${takenAt}</td>
                            <td class="text-muted small">${completedAt}</td>
                            <td class="text-muted small">${reviewedAt}</td>
                            <td>${actionButtons}</td>
                        </tr>`;
                        tbody.append(row);
                    });
                } else if(response.returncode == 204) {
                    const tbody = $('#taskTableBody');
                    tbody.html('<tr><td colspan="9" class="text-center py-4">No tasks found</td></tr>');
                    $('#total-display').text(0);
                    $('#display-end').text(0);
                } else {
                    console.log("Failed to fetch tasks: ", response.returncode);
                }
            },
            error: (xhr, status, error) => {
                console.log("Status: ", status);
                console.log("Error fetching tasks: ", xhr.responseText);
                console.log("Error: ", error);
            }
        });
    };
    getTasks();

    // Filter button click
    $('#filterBtn').on('click', function() {
        getTasks();
    });

    // Event delegation for approve/reject buttons
    $(document).on('click', '.btn-approve', function() {
        const id = $(this).data('id');
        const campaignId = $(this).data('campaign_id');
        const workerId = $(this).data('worker_id');
        
        $('#taskId').val(id);
        $('#modalTaskId').text(id);
        $('#modalCampaignId').text(campaignId);
        $('#modalWorkerId').text(workerId || '-');
    });

    $(document).on('click', '.btn-reject', function() {
        const id = $(this).data('id');
        const campaignId = $(this).data('campaign_id');
        const workerId = $(this).data('worker_id');
        
        $('#rejectTaskId').val(id);
        $('#rejectModalTaskId').text(id);
        $('#rejectModalCampaignId').text(campaignId);
        $('#rejectModalWorkerId').text(workerId || '-');
    });
});
