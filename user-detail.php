<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Detail - SMM Bot Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
    <link href="src/css/style.css" rel="stylesheet">
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
        <a href="users.php" class="nav-link active"><i class="fas fa-users"></i> Users</a>
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
    <div class="page-header">
        <h1><i class="fas fa-user me-2"></i>User Detail</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="home.php">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="users.php">Users</a></li>
                <li class="breadcrumb-item active">@john_doe</li>
            </ol>
        </nav>
    </div>

    <div class="row g-4">
        <!-- Profile Card -->
        <div class="col-lg-4">
            <div class="card text-center">
                <div class="card-body py-4">
                    <img src="https://ui-avatars.com/api/?name=John+Doe&background=0d6efd&color=fff&size=120&rounded=true&bold=true" class="profile-avatar mb-3" alt="User Avatar">
                    <h5 class="fw-bold mb-1">John Doe</h5>
                    <p class="text-muted mb-2">@john_doe</p>
                    <span class="badge bg-success mb-3">Active</span>
                    <div class="text-muted small">
                        <p class="mb-1"><i class="fas fa-hashtag me-1"></i> Chat ID: <code>123456789</code></p>
                        <p class="mb-1"><i class="fas fa-user-tag me-1"></i> Role: User</p>
                        <p class="mb-0"><i class="fas fa-calendar me-1"></i> Bergabung: 15 Jan 2026</p>
                    </div>
                    <hr>
                    <div class="d-grid gap-2">
                        <button class="btn btn-outline-danger btn-sm"><i class="fas fa-ban me-1"></i> Suspend User</button>
                    </div>
                </div>
            </div>

            <!-- Referral Info -->
            <div class="card mt-3">
                <div class="card-header"><i class="fas fa-share-alt me-2"></i>Referral Info</div>
                <div class="card-body">
                    <p class="mb-2"><strong>Kode Referral:</strong> <code>JDOE2026</code></p>
                    <p class="mb-2"><strong>Total Referred:</strong> 5 user</p>
                    <p class="mb-0"><strong>Total Rewards:</strong> <span class="text-success fw-bold">Rp 25.000</span></p>
                </div>
            </div>
        </div>

        <!-- Right Column -->
        <div class="col-lg-8">
            <!-- Wallet Info -->
            <div class="row g-3 mb-3">
                <div class="col-sm-6 col-xl-3">
                    <div class="card wallet-card border-primary">
                        <div class="card-body summary-card">
                            <div class="summary-label">Balance</div>
                            <div class="summary-value text-primary">Rp 150.000</div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <div class="card wallet-card border-success">
                        <div class="card-body summary-card">
                            <div class="summary-label">Profit</div>
                            <div class="summary-value text-success">Rp 45.000</div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <div class="card wallet-card border-info">
                        <div class="card-body summary-card">
                            <div class="summary-label">Total Deposit</div>
                            <div class="summary-value text-info">Rp 350.000</div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xl-3">
                    <div class="card wallet-card border-warning">
                        <div class="card-body summary-card">
                            <div class="summary-label">Total Withdraw</div>
                            <div class="summary-value text-warning">Rp 120.000</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Social Accounts -->
            <div class="card mb-3">
                <div class="card-header"><i class="fas fa-share-nodes me-2"></i>Social Accounts</div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-dashboard table-hover mb-0">
                            <thead>
                                <tr>
                                    <th>Platform</th>
                                    <th>Username</th>
                                    <th>Status</th>
                                    <th>Ditambahkan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><i class="fab fa-instagram text-danger me-1"></i> Instagram</td>
                                    <td>@johndoe_ig</td>
                                    <td><span class="badge bg-success">Active</span></td>
                                    <td>16 Jan 2026</td>
                                </tr>
                                <tr>
                                    <td><i class="fab fa-tiktok me-1"></i> TikTok</td>
                                    <td>@johndoe_tt</td>
                                    <td><span class="badge bg-success">Active</span></td>
                                    <td>18 Jan 2026</td>
                                </tr>
                                <tr>
                                    <td><i class="fab fa-youtube text-danger me-1"></i> YouTube</td>
                                    <td>John Doe Official</td>
                                    <td><span class="badge bg-secondary">Inactive</span></td>
                                    <td>20 Jan 2026</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Campaigns -->
            <div class="card mb-3">
                <div class="card-header"><i class="fas fa-bullhorn me-2"></i>Campaigns</div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-dashboard table-hover mb-0">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Judul</th>
                                    <th>Tipe</th>
                                    <th>Progress</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>12</td>
                                    <td>Follow IG @mystore</td>
                                    <td><span class="badge bg-primary">Follow</span></td>
                                    <td>35/100</td>
                                    <td><span class="badge bg-success">Active</span></td>
                                </tr>
                                <tr>
                                    <td>8</td>
                                    <td>Like TikTok Video</td>
                                    <td><span class="badge bg-info">Like</span></td>
                                    <td>50/50</td>
                                    <td><span class="badge bg-success">Completed</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Tasks Completed -->
            <div class="card mb-3">
                <div class="card-header"><i class="fas fa-tasks me-2"></i>Tasks Dikerjakan</div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-dashboard table-hover mb-0">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Campaign</th>
                                    <th>Tipe</th>
                                    <th>Reward</th>
                                    <th>Status</th>
                                    <th>Tanggal</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>101</td>
                                    <td>Like IG Post @brand</td>
                                    <td><span class="badge bg-info">Like</span></td>
                                    <td class="text-success">Rp 500</td>
                                    <td><span class="badge bg-success">Approved</span></td>
                                    <td>10 Feb 2026</td>
                                </tr>
                                <tr>
                                    <td>98</td>
                                    <td>Comment YT Video</td>
                                    <td><span class="badge bg-warning text-dark">Comment</span></td>
                                    <td class="text-success">Rp 1.000</td>
                                    <td><span class="badge bg-success">Approved</span></td>
                                    <td>08 Feb 2026</td>
                                </tr>
                                <tr>
                                    <td>85</td>
                                    <td>View TikTok Video</td>
                                    <td><span class="badge bg-secondary">View</span></td>
                                    <td class="text-success">Rp 200</td>
                                    <td><span class="badge bg-danger">Rejected</span></td>
                                    <td>05 Feb 2026</td>
                                </tr>
                                <tr>
                                    <td>72</td>
                                    <td>Follow Twitter @tech</td>
                                    <td><span class="badge bg-primary">Follow</span></td>
                                    <td class="text-success">Rp 1.500</td>
                                    <td><span class="badge bg-success">Approved</span></td>
                                    <td>01 Feb 2026</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Transaction History -->
            <div class="card">
                <div class="card-header"><i class="fas fa-exchange-alt me-2"></i>Transaction History</div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-dashboard table-hover mb-0">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Tipe</th>
                                    <th>Amount</th>
                                    <th>Saldo Sebelum</th>
                                    <th>Saldo Sesudah</th>
                                    <th>Tanggal</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>501</td>
                                    <td><span class="badge bg-success">Deposit</span></td>
                                    <td class="text-success fw-bold">+Rp 100.000</td>
                                    <td>Rp 50.000</td>
                                    <td>Rp 150.000</td>
                                    <td>14 Feb 2026</td>
                                </tr>
                                <tr>
                                    <td>489</td>
                                    <td><span class="badge bg-primary">Task Reward</span></td>
                                    <td class="text-success fw-bold">+Rp 500</td>
                                    <td>Rp 44.500</td>
                                    <td>Rp 45.000</td>
                                    <td>10 Feb 2026</td>
                                </tr>
                                <tr>
                                    <td>472</td>
                                    <td><span class="badge bg-danger">Withdraw</span></td>
                                    <td class="text-danger fw-bold">-Rp 50.000</td>
                                    <td>Rp 94.500</td>
                                    <td>Rp 44.500</td>
                                    <td>08 Feb 2026</td>
                                </tr>
                                <tr>
                                    <td>455</td>
                                    <td><span class="badge bg-primary">Task Reward</span></td>
                                    <td class="text-success fw-bold">+Rp 1.000</td>
                                    <td>Rp 93.500</td>
                                    <td>Rp 94.500</td>
                                    <td>05 Feb 2026</td>
                                </tr>
                                <tr>
                                    <td>430</td>
                                    <td><span class="badge bg-success">Deposit</span></td>
                                    <td class="text-success fw-bold">+Rp 200.000</td>
                                    <td>Rp 0</td>
                                    <td>Rp 200.000</td>
                                    <td>20 Jan 2026</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="dashboard-footer">&copy; 2026 SMM Bot Admin Dashboard. All rights reserved.</div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
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
