import { CookieManager } from "./auth-middleware.js";

$(document).ready(function () {

    const auth_token = CookieManager.get("auth_token");
    if (!auth_token) {
        window.location.href = "login.php";
    } else {
        $.ajax({
            url: 'src/api/auth-middleware.php',
            type: 'POST',
            dataType: 'json',
            data: { 'auth_token': auth_token },
            success: (response) => {
                if (response.returncode == 200) {
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

    $('#sidebarToggle').on('click', function () {
        $('#sidebar').toggleClass('collapsed show');
        $('#mainContent').toggleClass('expanded');
        $('#sidebarOverlay').toggleClass('show');
    });
    $('#sidebarOverlay').on('click', function () {
        $('#sidebar').removeClass('show').addClass('collapsed');
        $('#mainContent').addClass('expanded');
        $(this).removeClass('show');
    });

    const getTransactions = () => {
        $.ajax({
            url: 'src/api/get-transactions.php',
            type: 'GET',
            dataType: 'json',
            success: (response) => {
                if (response.returncode == 200) {
                    const total_transactions = response.total_transactions;
                    $('#total-transactions').text(total_transactions);

                    const tbody = $('#transactionTableBody');
                    tbody.empty();

                    // Update footer display
                    const total = response.result.length;
                    $('#total-display').text(total);
                    $('#display-end').text(total > 0 ? total : 0);

                    response.result.forEach((trx) => {
                        let typeBadgeClass = 'bg-secondary';
                        let typeText = trx.type.replace('_', ' ').replace(/\b\w/g, l => l.toUpperCase());
                        if (trx.type === 'deposit') typeBadgeClass = 'bg-success';
                        else if (trx.type === 'task_reward') typeBadgeClass = 'bg-primary';
                        else if (trx.type === 'withdraw') typeBadgeClass = 'bg-danger';
                        else if (trx.type === 'adjustment') typeBadgeClass = 'bg-secondary';

                        let statusBadgeClass = 'bg-secondary';
                        if (trx.status === 'approved') statusBadgeClass = 'bg-success';
                        else if (trx.status === 'pending') statusBadgeClass = 'bg-warning';
                        else if (trx.status === 'rejected') statusBadgeClass = 'bg-danger';

                        const amountValue = parseFloat(trx.amount);
                        const amountStr = amountValue > 0 ? `+Rp ${amountValue.toLocaleString('id-ID')}` : `-Rp ${Math.abs(amountValue).toLocaleString('id-ID')}`;
                        const amountColor = amountValue > 0 ? 'text-success fw-bold' : 'text-danger fw-bold';

                        const row = `<tr>
                            <td>${trx.id}</td>
                            <td><strong>${trx.wallet_id}</strong></td>
                            <td><span class="badge ${typeBadgeClass}">${typeText}</span></td>
                            <td class="${amountColor}">${amountStr}</td>
                            <td>Rp ${parseFloat(trx.balance_before).toLocaleString('id-ID')}</td>
                            <td>Rp ${parseFloat(trx.balance_after).toLocaleString('id-ID')}</td>
                            <td class="small">${trx.description || '-'}</td>
                            <td><span class="badge ${statusBadgeClass}">${trx.status.charAt(0).toUpperCase() + trx.status.slice(1)}</span></td>
                            <td class="text-muted small">${trx.created_at}</td>
                        </tr>`;
                        tbody.append(row);
                    });
                } else if (response.returncode == 204) {
                    const tbody = $('#transactionTableBody');
                    tbody.html('<tr><td colspan="9" class="text-center py-4">No transactions found</td></tr>');
                    $('#total-transactions').text(0);
                    $('#total-display').text(0);
                    $('#display-end').text(0);
                } else {
                    console.log("Failed to fetch transactions: ", response.returncode);
                }
            },
            error: (xhr, status, error) => {
                console.log("Status: ", status);
                console.log("Error fetching transactions: ", xhr.responseText);
                console.log("Error: ", error);
            }
        });
    };
    getTransactions();
});
