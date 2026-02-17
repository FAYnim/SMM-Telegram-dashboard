<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - SMM Bot Admin</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.1/dist/chart.umd.min.js"></script>
    <!-- Custom CSS -->
    <link href="src/css/style.css" rel="stylesheet">
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-dark bg-dark fixed-top px-3">
    <div class="d-flex align-items-center">
        <button class="btn btn-sidebar-toggle me-2" id="sidebarToggle">
            <i class="fas fa-bars"></i>
        </button>
        <a class="navbar-brand mb-0" href="home.php">
            <i class="fas fa-robot me-1"></i> SMM Bot
        </a>
    </div>
    <div class="d-flex align-items-center gap-3">
        <div class="dropdown">
            <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" data-bs-toggle="dropdown">
                <img src="https://ui-avatars.com/api/?name=Admin&background=0d6efd&color=fff&size=32" class="nav-profile me-2" alt="Admin" style="width:32px;height:32px;border-radius:50%;">
                <span class="d-none d-md-inline small">Super Admin</span>
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
                <li><a class="dropdown-item" href="profile.php"><i class="fas fa-user me-2"></i>Profil</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item text-danger" href="logout.php"><i class="fas fa-sign-out-alt me-2"></i>Logout</a></li>
            </ul>
        </div>
    </div>
</nav>

<!-- Sidebar Overlay -->
<div class="sidebar-overlay" id="sidebarOverlay"></div>

<!-- Sidebar -->
<nav class="sidebar" id="sidebar">
    <div class="pt-3">
        <div class="sidebar-heading">Menu Utama</div>
        <a href="home.php" class="nav-link active"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
        <a href="users.php" class="nav-link"><i class="fas fa-users"></i> Users</a>

        <div class="sidebar-divider"></div>
        <div class="sidebar-heading">Verifikasi</div>
        <a href="deposits.php" class="nav-link"><i class="fas fa-money-bill-wave"></i> Deposits</a>
        <a href="withdrawals.php" class="nav-link"><i class="fas fa-wallet"></i> Withdrawals</a>
        <a href="campaigns.php" class="nav-link"><i class="fas fa-bullhorn"></i> Campaigns</a>
        <a href="tasks.php" class="nav-link"><i class="fas fa-tasks"></i> Tasks</a>

        <div class="sidebar-divider"></div>
        <div class="sidebar-heading">Data</div>
        <a href="transactions.php" class="nav-link"><i class="fas fa-exchange-alt"></i> Transaksi</a>
        <a href="settings.php" class="nav-link"><i class="fas fa-cog"></i> Settings</a>
        <a href="audit-log.php" class="nav-link"><i class="fas fa-clipboard-list"></i> Audit Log</a>

        <div class="sidebar-divider"></div>
        <a href="profile.php" class="nav-link"><i class="fas fa-user-circle"></i> Profil</a>
        <a href="logout.php" class="nav-link"><i class="fas fa-sign-out-alt"></i> Logout</a>
    </div>
</nav>

<!-- Main Content -->
<div class="main-content" id="mainContent">
    <!-- Page Header -->
    <div class="page-header">
        <h1><i class="fas fa-tachometer-alt me-2"></i>Dashboard Overview</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </nav>
    </div>

    <!-- KPI Cards Row 1 -->
    <div class="row g-3 mb-4">
        <div class="col-xl-3 col-md-6">
            <div class="card kpi-card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <div class="kpi-label">Total Users</div>
                            <div class="kpi-value">1,247</div>
                            <div class="kpi-change text-success"><i class="fas fa-arrow-up me-1"></i>+12.5%</div>
                        </div>
                        <div class="kpi-icon bg-primary bg-opacity-10 text-primary">
                            <i class="fas fa-users"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card kpi-card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <div class="kpi-label">Active Campaigns</div>
                            <div class="kpi-value">34</div>
                            <div class="kpi-change text-success"><i class="fas fa-arrow-up me-1"></i>+5.3%</div>
                        </div>
                        <div class="kpi-icon bg-success bg-opacity-10 text-success">
                            <i class="fas fa-bullhorn"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card kpi-card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <div class="kpi-label">Total Rewards</div>
                            <div class="kpi-value">Rp 8.450.000</div>
                            <div class="kpi-change text-success"><i class="fas fa-arrow-up me-1"></i>+18.2%</div>
                        </div>
                        <div class="kpi-icon bg-info bg-opacity-10 text-info">
                            <i class="fas fa-coins"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card kpi-card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <div class="kpi-label">Pending Actions</div>
                            <div class="kpi-value">23</div>
                            <div class="kpi-change text-danger"><i class="fas fa-arrow-up me-1"></i>+3</div>
                        </div>
                        <div class="kpi-icon bg-warning bg-opacity-10 text-warning">
                            <i class="fas fa-clock"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- KPI Cards Row 2 -->
    <div class="row g-3 mb-4">
        <div class="col-xl-3 col-md-6">
            <div class="card kpi-card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <div class="kpi-label">Total Balance Sistem</div>
                            <div class="kpi-value">Rp 24.500.000</div>
                        </div>
                        <div class="kpi-icon bg-secondary bg-opacity-10 text-secondary">
                            <i class="fas fa-vault"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card kpi-card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <div class="kpi-label">Deposit Bulan Ini</div>
                            <div class="kpi-value">Rp 5.200.000</div>
                        </div>
                        <div class="kpi-icon bg-success bg-opacity-10 text-success">
                            <i class="fas fa-arrow-down"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card kpi-card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <div class="kpi-label">Withdrawal Bulan Ini</div>
                            <div class="kpi-value">Rp 3.100.000</div>
                        </div>
                        <div class="kpi-icon bg-danger bg-opacity-10 text-danger">
                            <i class="fas fa-arrow-up"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card kpi-card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <div class="kpi-label">Revenue (Admin Fee)</div>
                            <div class="kpi-value">Rp 620.000</div>
                        </div>
                        <div class="kpi-icon bg-primary bg-opacity-10 text-primary">
                            <i class="fas fa-chart-line"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Charts Row -->
    <div class="row g-3 mb-4">
        <div class="col-lg-7">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span><i class="fas fa-chart-line me-2"></i>Tren Registrasi User (30 Hari)</span>
                    <span class="badge bg-primary">+127 user</span>
                </div>
                <div class="card-body">
                    <div class="chart-container">
                        <canvas id="registrationChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-5">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span><i class="fas fa-chart-bar me-2"></i>Volume Transaksi (7 Hari)</span>
                    <span class="badge bg-info">342 transaksi</span>
                </div>
                <div class="card-body">
                    <div class="chart-container">
                        <canvas id="transactionChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Activity -->
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <span><i class="fas fa-history me-2"></i>Aktivitas Terbaru</span>
            <a href="transactions.php" class="btn btn-sm btn-outline-primary">Lihat Semua</a>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-dashboard table-hover mb-0">
                    <thead>
                        <tr>
                            <th>Waktu</th>
                            <th>Tipe</th>
                            <th>User</th>
                            <th>Detail</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-muted small">2026-02-15 14:30</td>
                            <td><span class="badge bg-warning">Deposit</span></td>
                            <td>@john_doe</td>
                            <td>Deposit Rp 100.000 via DANA</td>
                            <td><span class="badge bg-warning">Pending</span></td>
                            <td><a href="deposits.php" class="btn btn-sm btn-outline-primary btn-action">Detail</a></td>
                        </tr>
                        <tr>
                            <td class="text-muted small">2026-02-15 14:15</td>
                            <td><span class="badge bg-info">Task</span></td>
                            <td>@alice_w</td>
                            <td>Task Like IG - Campaign #12</td>
                            <td><span class="badge bg-warning">Pending Review</span></td>
                            <td><a href="tasks.php" class="btn btn-sm btn-outline-primary btn-action">Detail</a></td>
                        </tr>
                        <tr>
                            <td class="text-muted small">2026-02-15 13:45</td>
                            <td><span class="badge bg-danger">Withdrawal</span></td>
                            <td>@bob_smith</td>
                            <td>Withdrawal Rp 50.000 ke DANA</td>
                            <td><span class="badge bg-warning">Pending</span></td>
                            <td><a href="withdrawals.php" class="btn btn-sm btn-outline-primary btn-action">Detail</a></td>
                        </tr>
                        <tr>
                            <td class="text-muted small">2026-02-15 13:20</td>
                            <td><span class="badge bg-primary">Campaign</span></td>
                            <td>@maria_g</td>
                            <td>Campaign "Follow IG @store" dibuat</td>
                            <td><span class="badge bg-info">Draft</span></td>
                            <td><a href="campaigns.php" class="btn btn-sm btn-outline-primary btn-action">Detail</a></td>
                        </tr>
                        <tr>
                            <td class="text-muted small">2026-02-15 12:50</td>
                            <td><span class="badge bg-success">Deposit</span></td>
                            <td>@charlie_x</td>
                            <td>Deposit Rp 200.000 via ShopeePay</td>
                            <td><span class="badge bg-success">Approved</span></td>
                            <td><a href="deposits.php" class="btn btn-sm btn-outline-primary btn-action">Detail</a></td>
                        </tr>
                        <tr>
                            <td class="text-muted small">2026-02-15 12:30</td>
                            <td><span class="badge bg-info">Task</span></td>
                            <td>@diana_r</td>
                            <td>Task Comment YT - Campaign #8</td>
                            <td><span class="badge bg-success">Approved</span></td>
                            <td><a href="tasks.php" class="btn btn-sm btn-outline-primary btn-action">Detail</a></td>
                        </tr>
                        <tr>
                            <td class="text-muted small">2026-02-15 11:55</td>
                            <td><span class="badge bg-danger">Withdrawal</span></td>
                            <td>@evan_k</td>
                            <td>Withdrawal Rp 75.000 ke ShopeePay</td>
                            <td><span class="badge bg-success">Approved</span></td>
                            <td><a href="withdrawals.php" class="btn btn-sm btn-outline-primary btn-action">Detail</a></td>
                        </tr>
                        <tr>
                            <td class="text-muted small">2026-02-15 11:20</td>
                            <td><span class="badge bg-warning">Deposit</span></td>
                            <td>@fiona_m</td>
                            <td>Deposit Rp 50.000 via DANA</td>
                            <td><span class="badge bg-danger">Rejected</span></td>
                            <td><a href="deposits.php" class="btn btn-sm btn-outline-primary btn-action">Detail</a></td>
                        </tr>
                        <tr>
                            <td class="text-muted small">2026-02-15 10:45</td>
                            <td><span class="badge bg-primary">Campaign</span></td>
                            <td>@george_l</td>
                            <td>Campaign "Like TikTok" selesai</td>
                            <td><span class="badge bg-success">Completed</span></td>
                            <td><a href="campaigns.php" class="btn btn-sm btn-outline-primary btn-action">Detail</a></td>
                        </tr>
                        <tr>
                            <td class="text-muted small">2026-02-15 10:10</td>
                            <td><span class="badge bg-info">Task</span></td>
                            <td>@hannah_p</td>
                            <td>Task View YT - Campaign #5</td>
                            <td><span class="badge bg-danger">Rejected</span></td>
                            <td><a href="tasks.php" class="btn btn-sm btn-outline-primary btn-action">Detail</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <div class="dashboard-footer">
        &copy; 2026 SMM Bot Admin Dashboard. All rights reserved.
    </div>
</div>

<!-- Bootstrap 5 JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
<!-- jQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
$(document).ready(function() {
    // Sidebar toggle
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

    // Registration Trend Chart (30 days)
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

    // Transaction Volume Chart (7 days)
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
</script>
</body>
</html>
