import { CookieManager } from "./auth-middleware";

$(document).ready(function() {
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

    const regLabels = [];
    const regData = [];
    for (let i = 29; i >= 0; i--) {
        const d = new Date();
        d.setDate(d.getDate() - i);
        regLabels.push(d.getDate() + '/' + (d.getMonth() + 1));
        regData.push(Math.floor(Math.random() * 15) + 2);
    }
    new Chart(document.getElementById('registrationChart'), {
        type: 'line',
        data: {
            labels: regLabels,
            datasets: [{
                label: 'User Baru',
                data: regData,
                borderColor: '#0d6efd',
                backgroundColor: 'rgba(13, 110, 253, 0.1)',
                borderWidth: 2,
                fill: true,
                tension: 0.4,
                pointRadius: 2,
                pointHoverRadius: 5,
                pointBackgroundColor: '#0d6efd'
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: { display: false }
            },
            scales: {
                x: {
                    grid: { display: false },
                    ticks: { font: { size: 10 }, maxTicksLimit: 10 }
                },
                y: {
                    beginAtZero: true,
                    ticks: { font: { size: 11 }, stepSize: 5 }
                }
            }
        }
    });

    const txLabels = [];
    for (let i = 6; i >= 0; i--) {
        const d = new Date();
        d.setDate(d.getDate() - i);
        const days = ['Min', 'Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab'];
        txLabels.push(days[d.getDay()] + ' ' + d.getDate() + '/' + (d.getMonth() + 1));
    }
    new Chart(document.getElementById('transactionChart'), {
        type: 'bar',
        data: {
            labels: txLabels,
            datasets: [
                {
                    label: 'Deposit',
                    data: [12, 19, 8, 15, 22, 10, 14],
                    backgroundColor: 'rgba(25, 135, 84, 0.7)',
                    borderRadius: 4
                },
                {
                    label: 'Task Reward',
                    data: [25, 32, 18, 28, 35, 22, 30],
                    backgroundColor: 'rgba(13, 110, 253, 0.7)',
                    borderRadius: 4
                },
                {
                    label: 'Withdraw',
                    data: [8, 11, 5, 9, 14, 7, 10],
                    backgroundColor: 'rgba(220, 53, 69, 0.7)',
                    borderRadius: 4
                }
            ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'bottom',
                    labels: { font: { size: 11 }, padding: 15, usePointStyle: true }
                }
            },
            scales: {
                x: {
                    grid: { display: false },
                    ticks: { font: { size: 10 } }
                },
                y: {
                    beginAtZero: true,
                    ticks: { font: { size: 11 } }
                }
            }
        }
    });
});
