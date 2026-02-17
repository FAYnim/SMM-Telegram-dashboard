<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaksi - SMM Bot Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-dark bg-dark fixed-top px-3">
    <div class="d-flex align-items-center">
        <button class="btn btn-sidebar-toggle me-2" id="sidebarToggle"><i class="fas fa-bars"></i></button>
        <a class="navbar-brand mb-0" href="home.php"><i class="fas fa-robot me-1"></i> SMM Bot</a>
    </div>
    <div class="d-flex align-items-center gap-3">
        <div class="dropdown">
            <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" data-bs-toggle="dropdown">
                <img src="https://ui-avatars.com/api/?name=Admin&background=0d6efd&color=fff&size=32" alt="Admin" style="width:32px;height:32px;border-radius:50%;" class="me-2">
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

<div class="sidebar-overlay" id="sidebarOverlay"></div>

<!-- Sidebar -->
<nav class="sidebar" id="sidebar">
    <div class="pt-3">
        <div class="sidebar-heading">Menu Utama</div>
        <a href="home.php" class="nav-link"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
        <a href="users.php" class="nav-link"><i class="fas fa-users"></i> Users</a>
        <div class="sidebar-divider"></div>
        <div class="sidebar-heading">Verifikasi</div>
        <a href="deposits.php" class="nav-link"><i class="fas fa-money-bill-wave"></i> Deposits</a>
        <a href="withdrawals.php" class="nav-link"><i class="fas fa-wallet"></i> Withdrawals</a>
        <a href="campaigns.php" class="nav-link"><i class="fas fa-bullhorn"></i> Campaigns</a>
        <a href="tasks.php" class="nav-link"><i class="fas fa-tasks"></i> Tasks</a>
        <div class="sidebar-divider"></div>
        <div class="sidebar-heading">Data</div>
        <a href="transactions.php" class="nav-link active"><i class="fas fa-exchange-alt"></i> Transaksi</a>
        <a href="settings.php" class="nav-link"><i class="fas fa-cog"></i> Settings</a>
        <a href="audit-log.php" class="nav-link"><i class="fas fa-clipboard-list"></i> Audit Log</a>
        <div class="sidebar-divider"></div>
        <a href="profile.php" class="nav-link"><i class="fas fa-user-circle"></i> Profil</a>
        <a href="logout.php" class="nav-link"><i class="fas fa-sign-out-alt"></i> Logout</a>
    </div>
</nav>

<!-- Main Content -->
<div class="main-content" id="mainContent">
    <div class="page-header">
        <h1><i class="fas fa-exchange-alt me-2"></i>Wallet Transactions</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="home.php">Dashboard</a></li>
                <li class="breadcrumb-item active">Transaksi</li>
            </ol>
        </nav>
    </div>

    <!-- Summary Cards -->
    <div class="row g-3 mb-4">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body summary-card">
                    <div class="summary-label">Total Deposits</div>
                    <div class="summary-value text-success"><i class="fas fa-arrow-down me-1"></i>Rp 5.200.000</div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body summary-card">
                    <div class="summary-label">Total Rewards</div>
                    <div class="summary-value text-primary"><i class="fas fa-gift me-1"></i>Rp 2.450.000</div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body summary-card">
                    <div class="summary-label">Total Withdrawals</div>
                    <div class="summary-value text-danger"><i class="fas fa-arrow-up me-1"></i>Rp 3.100.000</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Filter Bar -->
    <div class="filter-bar">
        <div class="row g-2 align-items-end">
            <div class="col-md-3">
                <label class="form-label small fw-semibold">Cari User</label>
                <input type="text" class="form-control" placeholder="Username...">
            </div>
            <div class="col-md-2">
                <label class="form-label small fw-semibold">Tipe</label>
                <select class="form-select">
                    <option value="">Semua Tipe</option>
                    <option value="deposit">Deposit</option>
                    <option value="task_reward">Task Reward</option>
                    <option value="withdraw">Withdraw</option>
                    <option value="adjustment">Adjustment</option>
                </select>
            </div>
            <div class="col-md-2">
                <label class="form-label small fw-semibold">Status</label>
                <select class="form-select">
                    <option value="">Semua Status</option>
                    <option value="approved">Approved</option>
                    <option value="pending">Pending</option>
                    <option value="rejected">Rejected</option>
                </select>
            </div>
            <div class="col-md-2">
                <label class="form-label small fw-semibold">Dari Tanggal</label>
                <input type="date" class="form-control">
            </div>
            <div class="col-md-3">
                <button class="btn btn-primary w-100"><i class="fas fa-search me-1"></i> Filter</button>
            </div>
        </div>
    </div>

    <!-- Transactions Table -->
    <div class="card">
        <div class="card-header">
            <i class="fas fa-table me-2"></i>Riwayat Transaksi
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-dashboard table-hover mb-0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>User</th>
                            <th>Tipe</th>
                            <th>Amount</th>
                            <th>Saldo Sebelum</th>
                            <th>Saldo Sesudah</th>
                            <th>Deskripsi</th>
                            <th>Status</th>
                            <th>Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>520</td>
                            <td><strong>@john_doe</strong></td>
                            <td><span class="badge bg-success">Deposit</span></td>
                            <td class="text-success fw-bold">+Rp 100.000</td>
                            <td>Rp 50.000</td>
                            <td>Rp 150.000</td>
                            <td class="small">Deposit via DANA</td>
                            <td><span class="badge bg-success">Approved</span></td>
                            <td class="text-muted small">2026-02-15 14:30</td>
                        </tr>
                        <tr>
                            <td>519</td>
                            <td><strong>@alice_w</strong></td>
                            <td><span class="badge bg-primary">Task Reward</span></td>
                            <td class="text-success fw-bold">+Rp 500</td>
                            <td>Rp 119.500</td>
                            <td>Rp 120.000</td>
                            <td class="small">Reward: Like IG Post @brand (Task #150)</td>
                            <td><span class="badge bg-success">Approved</span></td>
                            <td class="text-muted small">2026-02-15 13:00</td>
                        </tr>
                        <tr>
                            <td>518</td>
                            <td><strong>@bob_smith</strong></td>
                            <td><span class="badge bg-danger">Withdraw</span></td>
                            <td class="text-danger fw-bold">-Rp 50.000</td>
                            <td>Rp 125.000</td>
                            <td>Rp 75.000</td>
                            <td class="small">Withdrawal ke DANA 0812****5678</td>
                            <td><span class="badge bg-warning">Pending</span></td>
                            <td class="text-muted small">2026-02-15 12:00</td>
                        </tr>
                        <tr>
                            <td>517</td>
                            <td><strong>@diana_r</strong></td>
                            <td><span class="badge bg-primary">Task Reward</span></td>
                            <td class="text-success fw-bold">+Rp 2.000</td>
                            <td>Rp 33.000</td>
                            <td>Rp 35.000</td>
                            <td class="small">Reward: Comment YT Review (Task #149)</td>
                            <td><span class="badge bg-success">Approved</span></td>
                            <td class="text-muted small">2026-02-15 11:00</td>
                        </tr>
                        <tr>
                            <td>516</td>
                            <td><strong>@charlie_x</strong></td>
                            <td><span class="badge bg-success">Deposit</span></td>
                            <td class="text-success fw-bold">+Rp 200.000</td>
                            <td>Rp 0</td>
                            <td>Rp 200.000</td>
                            <td class="small">Deposit via ShopeePay</td>
                            <td><span class="badge bg-success">Approved</span></td>
                            <td class="text-muted small">2026-02-15 10:00</td>
                        </tr>
                        <tr>
                            <td>515</td>
                            <td><strong>@evan_k</strong></td>
                            <td><span class="badge bg-danger">Withdraw</span></td>
                            <td class="text-danger fw-bold">-Rp 75.000</td>
                            <td>Rp 170.000</td>
                            <td>Rp 95.000</td>
                            <td class="small">Withdrawal ke ShopeePay 0878****3456</td>
                            <td><span class="badge bg-success">Approved</span></td>
                            <td class="text-muted small">2026-02-15 09:00</td>
                        </tr>
                        <tr>
                            <td>514</td>
                            <td><strong>@maria_g</strong></td>
                            <td><span class="badge bg-success">Deposit</span></td>
                            <td class="text-success fw-bold">+Rp 500.000</td>
                            <td>Rp 0</td>
                            <td>Rp 500.000</td>
                            <td class="small">Deposit via DANA</td>
                            <td><span class="badge bg-success">Approved</span></td>
                            <td class="text-muted small">2026-02-14 16:30</td>
                        </tr>
                        <tr>
                            <td>513</td>
                            <td><strong>@fiona_m</strong></td>
                            <td><span class="badge bg-primary">Task Reward</span></td>
                            <td class="text-success fw-bold">+Rp 200</td>
                            <td>Rp 59.800</td>
                            <td>Rp 60.000</td>
                            <td class="small">Reward: View TikTok Promo (Task #145)</td>
                            <td><span class="badge bg-success">Approved</span></td>
                            <td class="text-muted small">2026-02-14 15:00</td>
                        </tr>
                        <tr>
                            <td>512</td>
                            <td><strong>@george_l</strong></td>
                            <td><span class="badge bg-secondary">Adjustment</span></td>
                            <td class="text-success fw-bold">+Rp 10.000</td>
                            <td>Rp 170.000</td>
                            <td>Rp 180.000</td>
                            <td class="small">Kompensasi error sistem</td>
                            <td><span class="badge bg-success">Approved</span></td>
                            <td class="text-muted small">2026-02-14 12:00</td>
                        </tr>
                        <tr>
                            <td>511</td>
                            <td><strong>@hannah_p</strong></td>
                            <td><span class="badge bg-primary">Task Reward</span></td>
                            <td class="text-success fw-bold">+Rp 1.500</td>
                            <td>Rp 308.500</td>
                            <td>Rp 310.000</td>
                            <td class="small">Reward: Follow IG @mystore (Task #142)</td>
                            <td><span class="badge bg-success">Approved</span></td>
                            <td class="text-muted small">2026-02-14 10:00</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer bg-white">
            <div class="d-flex justify-content-between align-items-center">
                <small class="text-muted">Menampilkan 1-10 dari 520 transaksi</small>
                <nav>
                    <ul class="pagination pagination-sm mb-0">
                        <li class="page-item disabled"><a class="page-link" href="#">&laquo;</a></li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">...</a></li>
                        <li class="page-item"><a class="page-link" href="#">52</a></li>
                        <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>

    <div class="dashboard-footer">&copy; 2026 SMM Bot Admin Dashboard. All rights reserved.</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script>
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
});
</script>
</body>
</html>
