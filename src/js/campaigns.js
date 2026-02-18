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

    const getCampaigns = () => {
        $.ajax({
            url: 'src/api/get-campaigns.php',
            type: 'GET',
            dataType: 'json',
            success: (response) => {
                if(response.returncode == 200) {
                    const total_campaign = response.total_campaign;
                    const total_draft = response.total_draft;
                    $('#total-campaign').text(total_campaign);
                    $('#total-draft').text(total_draft);

                    const tbody = $('#campaignTableBody');
                    tbody.empty();
                    
                    // Update footer display
                    const total = response.result.length;
                    $('#total-display').text(total);
                    $('#display-end').text(total > 0 ? total : 0);
                    
                    response.result.forEach((campaign, index) => {
                        // Format amounts as Indonesian Rupiah
                        const pricePerTask = new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR', minimumFractionDigits: 0 }).format(campaign.price_per_task);
                        const balance = new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR', minimumFractionDigits: 0 }).format(campaign.campaign_balance);
                        const budget = new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR', minimumFractionDigits: 0 }).format(campaign.campaign_budget);
                        
                        // Format progress
                        const progress = `<strong>${campaign.completed_count}/${campaign.target_total}</strong>`;
                        
                        // Format type badge
                        let typeBadge = '';
                        if (campaign.type === 'view') {
                            typeBadge = '<span class="badge bg-secondary">View</span>';
                        } else if (campaign.type === 'like') {
                            typeBadge = '<span class="badge bg-info">Like</span>';
                        } else if (campaign.type === 'comment') {
                            typeBadge = '<span class="badge bg-warning text-dark">Comment</span>';
                        } else if (campaign.type === 'share') {
                            typeBadge = '<span class="badge bg-dark">Share</span>';
                        } else if (campaign.type === 'follow') {
                            typeBadge = '<span class="badge bg-primary">Follow</span>';
                        }
                        
                        // Format status badge and action buttons
                        let statusBadge = '';
                        let actionButtons = '';
                        
                        if (campaign.status === 'draft' || campaign.status === 'creating') {
                            statusBadge = '<span class="badge bg-info">Draft</span>';
                            actionButtons = `<button class="btn btn-sm btn-success btn-action me-1 btn-approve" data-id="${campaign.id}" data-title="${campaign.campaign_title}" data-client="${campaign.client_username}" data-type="${campaign.type}" data-budget="${campaign.campaign_budget}" data-target="${campaign.target_total}" data-bs-toggle="modal" data-bs-target="#approveCampaignModal" title="Approve"><i class="fas fa-check"></i></button>
                                <button class="btn btn-sm btn-danger btn-action btn-reject" data-id="${campaign.id}" data-title="${campaign.campaign_title}" data-client="${campaign.client_username}" data-bs-toggle="modal" data-bs-target="#rejectCampaignModal" title="Reject"><i class="fas fa-times"></i></button>`;
                        } else if (campaign.status === 'active') {
                            statusBadge = '<span class="badge bg-success">Active</span>';
                            actionButtons = `<button class="btn btn-sm btn-warning btn-action btn-pause" data-id="${campaign.id}" title="Pause"><i class="fas fa-pause"></i></button>
                                <button class="btn btn-sm btn-outline-primary btn-action btn-detail" data-id="${campaign.id}" title="Detail"><i class="fas fa-eye"></i></button>`;
                        } else if (campaign.status === 'paused') {
                            statusBadge = '<span class="badge bg-warning text-dark">Paused</span>';
                            actionButtons = `<button class="btn btn-sm btn-success btn-action btn-resume" data-id="${campaign.id}" title="Resume"><i class="fas fa-play"></i></button>
                                <button class="btn btn-sm btn-outline-primary btn-action btn-detail" data-id="${campaign.id}" title="Detail"><i class="fas fa-eye"></i></button>`;
                        } else if (campaign.status === 'completed') {
                            statusBadge = '<span class="badge bg-success">Completed</span>';
                            actionButtons = `<button class="btn btn-sm btn-outline-primary btn-action btn-detail" data-id="${campaign.id}" title="Detail"><i class="fas fa-eye"></i></button>`;
                        } else if (campaign.status === 'deleted') {
                            statusBadge = '<span class="badge bg-danger">Deleted</span>';
                            actionButtons = '<button class="btn btn-sm btn-outline-secondary btn-action" disabled><i class="fas fa-trash"></i></button>';
                        }
                        
                        // Format created date
                        const createdDate = campaign.created_at ? new Date(campaign.created_at).toLocaleString('id-ID') : '-';
                        
                        const row = `<tr>
                            <td>${campaign.id}</td>
                            <td><strong>${campaign.campaign_title}</strong></td>
                            <td>${campaign.client_username ? '@' + campaign.client_username : '-'}</td>
                            <td>${typeBadge}</td>
                            <td>${pricePerTask}</td>
                            <td>${progress}</td>
                            <td>${balance}</td>
                            <td>${budget}</td>
                            <td>${statusBadge}</td>
                            <td class="text-muted small">${createdDate}</td>
                            <td>${actionButtons}</td>
                        </tr>`;
                        tbody.append(row);
                    });
                } else if(response.returncode == 204) {
                    const tbody = $('#campaignTableBody');
                    tbody.html('<tr><td colspan="12" class="text-center py-4">No campaigns found</td></tr>');
                    $('#total-display').text(0);
                    $('#display-end').text(0);
                } else {
                    console.log("Failed to fetch campaigns: ", response.returncode);
                }
            },
            error: (xhr, status, error) => {
                console.log("Status: ", status);
                console.log("Error fetching campaigns: ", xhr.responseText);
                console.log("Error: ", error);
            }
        });
    };
    getCampaigns();

    // Event delegation for approve/reject buttons
    $(document).on('click', '.btn-approve', function() {
        const id = $(this).data('id');
        const title = $(this).data('title');
        const client = $(this).data('client');
        const type = $(this).data('type');
        const budget = $(this).data('budget');
        const target = $(this).data('target');
        
        $('#campaignId').val(id);
        $('#modalCampaignTitle').text(title);
        $('#modalClient').text(client);
        $('#modalType').text(type.charAt(0).toUpperCase() + type.slice(1));
        $('#modalBudget').text(new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR', minimumFractionDigits: 0 }).format(budget));
        $('#modalTarget').text(target + ' tasks');
    });

    $(document).on('click', '.btn-reject', function() {
        const id = $(this).data('id');
        const title = $(this).data('title');
        const client = $(this).data('client');
        
        $('#rejectCampaignId').val(id);
        $('#rejectCampaignTitle').text(title);
        $('#rejectClient').text(client);
    });
});
