<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users - SMM Bot Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
    <link href="src/css/style.css" rel="stylesheet">
</head>
<body>

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

<div class="main-content" id="mainContent">
    <div class="page-header">
        <h1><i class="fas fa-users me-2"></i>User Management</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="home.php">Dashboard</a></li>
                <li class="breadcrumb-item active">Users</li>
            </ol>
        </nav>
    </div>

    <div class="filter-bar">
        <div class="row g-2 align-items-end">
            <div class="col-md-4">
                <label class="form-label small fw-semibold">Cari User</label>
                <input type="text" class="form-control" placeholder="Username, nama, atau Chat ID..." id="searchUser">
            </div>
            <div class="col-md-3">
                <label class="form-label small fw-semibold">Status</label>
                <select class="form-select" id="filterStatus">
                    <option value="">Semua Status</option>
                    <option value="active">Active</option>
                    <option value="suspended">Suspended</option>
                    <option value="unregistered">Unregistered</option>
                </select>
            </div>
            <div class="col-md-3">
                <label class="form-label small fw-semibold">Urutkan</label>
                <select class="form-select" id="sortBy">
                    <option value="newest">Terbaru</option>
                    <option value="oldest">Terlama</option>
                    <option value="balance">Balance Tertinggi</option>
                    <option value="profit">Profit Tertinggi</option>
                </select>
            </div>
            <div class="col-md-2">
                <button class="btn btn-primary w-100"><i class="fas fa-search me-1"></i> Filter</button>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <span><i class="fas fa-table me-2"></i>Daftar User (1,247 total)</span>
            <div>
                <button class="btn btn-sm btn-outline-success me-1" title="Activate Selected"><i class="fas fa-check me-1"></i>Activate</button>
                <button class="btn btn-sm btn-outline-danger" title="Suspend Selected"><i class="fas fa-ban me-1"></i>Suspend</button>
            </div>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-dashboard table-hover mb-0">
                    <thead>
                        <tr>
                            <th><input type="checkbox" class="form-check-input" id="selectAll"></th>
                            <th>ID</th>
                            <th>Username</th>
                            <th>Nama</th>
                            <th>Chat ID</th>
                            <th>Status</th>
                            <th>Balance</th>
                            <th>Profit</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><input type="checkbox" class="form-check-input row-check"></td>
                            <td>1</td>
                            <td><strong>@john_doe</strong></td>
                            <td>John Doe</td>
                            <td><code>123456789</code></td>
                            <td><span class="badge bg-success">Active</span></td>
                            <td>Rp 150.000</td>
                            <td>Rp 45.000</td>
                            <td>
                                <a href="user-detail.php?id=1" class="btn btn-sm btn-outline-primary btn-action me-1" title="Detail"><i class="fas fa-eye"></i></a>
                                <button class="btn btn-sm btn-outline-danger btn-action" title="Suspend"><i class="fas fa-ban"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" class="form-check-input row-check"></td>
                            <td>2</td>
                            <td><strong>@alice_w</strong></td>
                            <td>Alice Wonderland</td>
                            <td><code>234567890</code></td>
                            <td><span class="badge bg-success">Active</span></td>
                            <td>Rp 320.000</td>
                            <td>Rp 120.000</td>
                            <td>
                                <a href="user-detail.php?id=2" class="btn btn-sm btn-outline-primary btn-action me-1" title="Detail"><i class="fas fa-eye"></i></a>
                                <button class="btn btn-sm btn-outline-danger btn-action" title="Suspend"><i class="fas fa-ban"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" class="form-check-input row-check"></td>
                            <td>3</td>
                            <td><strong>@bob_smith</strong></td>
                            <td>Bob Smith</td>
                            <td><code>345678901</code></td>
                            <td><span class="badge bg-danger">Suspended</span></td>
                            <td>Rp 0</td>
                            <td>Rp 75.000</td>
                            <td>
                                <a href="user-detail.php?id=3" class="btn btn-sm btn-outline-primary btn-action me-1" title="Detail"><i class="fas fa-eye"></i></a>
                                <button class="btn btn-sm btn-outline-success btn-action" title="Activate"><i class="fas fa-check"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" class="form-check-input row-check"></td>
                            <td>4</td>
                            <td><strong>@maria_g</strong></td>
                            <td>Maria Garcia</td>
                            <td><code>456789012</code></td>
                            <td><span class="badge bg-success">Active</span></td>
                            <td>Rp 500.000</td>
                            <td>Rp 200.000</td>
                            <td>
                                <a href="user-detail.php?id=4" class="btn btn-sm btn-outline-primary btn-action me-1" title="Detail"><i class="fas fa-eye"></i></a>
                                <button class="btn btn-sm btn-outline-danger btn-action" title="Suspend"><i class="fas fa-ban"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" class="form-check-input row-check"></td>
                            <td>5</td>
                            <td><strong>@charlie_x</strong></td>
                            <td>Charlie Xavier</td>
                            <td><code>567890123</code></td>
                            <td><span class="badge bg-warning text-dark">Unregistered</span></td>
                            <td>Rp 0</td>
                            <td>Rp 0</td>
                            <td>
                                <a href="user-detail.php?id=5" class="btn btn-sm btn-outline-primary btn-action me-1" title="Detail"><i class="fas fa-eye"></i></a>
                                <button class="btn btn-sm btn-outline-danger btn-action" title="Suspend"><i class="fas fa-ban"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" class="form-check-input row-check"></td>
                            <td>6</td>
                            <td><strong>@diana_r</strong></td>
                            <td>Diana Ross</td>
                            <td><code>678901234</code></td>
                            <td><span class="badge bg-success">Active</span></td>
                            <td>Rp 80.000</td>
                            <td>Rp 35.000</td>
                            <td>
                                <a href="user-detail.php?id=6" class="btn btn-sm btn-outline-primary btn-action me-1" title="Detail"><i class="fas fa-eye"></i></a>
                                <button class="btn btn-sm btn-outline-danger btn-action" title="Suspend"><i class="fas fa-ban"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" class="form-check-input row-check"></td>
                            <td>7</td>
                            <td><strong>@evan_k</strong></td>
                            <td>Evan Knight</td>
                            <td><code>789012345</code></td>
                            <td><span class="badge bg-success">Active</span></td>
                            <td>Rp 250.000</td>
                            <td>Rp 95.000</td>
                            <td>
                                <a href="user-detail.php?id=7" class="btn btn-sm btn-outline-primary btn-action me-1" title="Detail"><i class="fas fa-eye"></i></a>
                                <button class="btn btn-sm btn-outline-danger btn-action" title="Suspend"><i class="fas fa-ban"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" class="form-check-input row-check"></td>
                            <td>8</td>
                            <td><strong>@fiona_m</strong></td>
                            <td>Fiona Martinez</td>
                            <td><code>890123456</code></td>
                            <td><span class="badge bg-success">Active</span></td>
                            <td>Rp 175.000</td>
                            <td>Rp 60.000</td>
                            <td>
                                <a href="user-detail.php?id=8" class="btn btn-sm btn-outline-primary btn-action me-1" title="Detail"><i class="fas fa-eye"></i></a>
                                <button class="btn btn-sm btn-outline-danger btn-action" title="Suspend"><i class="fas fa-ban"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" class="form-check-input row-check"></td>
                            <td>9</td>
                            <td><strong>@george_l</strong></td>
                            <td>George Lee</td>
                            <td><code>901234567</code></td>
                            <td><span class="badge bg-danger">Suspended</span></td>
                            <td>Rp 0</td>
                            <td>Rp 180.000</td>
                            <td>
                                <a href="user-detail.php?id=9" class="btn btn-sm btn-outline-primary btn-action me-1" title="Detail"><i class="fas fa-eye"></i></a>
                                <button class="btn btn-sm btn-outline-success btn-action" title="Activate"><i class="fas fa-check"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" class="form-check-input row-check"></td>
                            <td>10</td>
                            <td><strong>@hannah_p</strong></td>
                            <td>Hannah Park</td>
                            <td><code>012345678</code></td>
                            <td><span class="badge bg-success">Active</span></td>
                            <td>Rp 420.000</td>
                            <td>Rp 310.000</td>
                            <td>
                                <a href="user-detail.php?id=10" class="btn btn-sm btn-outline-primary btn-action me-1" title="Detail"><i class="fas fa-eye"></i></a>
                                <button class="btn btn-sm btn-outline-danger btn-action" title="Suspend"><i class="fas fa-ban"></i></button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer bg-white">
            <div class="d-flex justify-content-between align-items-center">
                <small class="text-muted">Menampilkan 1-10 dari 1,247 user</small>
                <nav>
                    <ul class="pagination pagination-sm mb-0">
                        <li class="page-item disabled"><a class="page-link" href="#">&laquo;</a></li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">...</a></li>
                        <li class="page-item"><a class="page-link" href="#">125</a></li>
                        <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>

    <div class="dashboard-footer">&copy; 2026 SMM Bot Admin Dashboard. All rights reserved.</div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script type="module" src="src/js/users.js"></script>
</script>
</body>
</html>
