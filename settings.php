<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings - SMM Bot Admin</title>
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
        <a href="settings.php" class="nav-link active"><i class="fas fa-cog"></i> Settings</a>
        <a href="audit-log.php" class="nav-link"><i class="fas fa-clipboard-list"></i> Audit Log</a>
        <div class="sidebar-divider"></div>
        <a href="profile.php" class="nav-link"><i class="fas fa-user-circle"></i> Profil</a>
        <a href="logout.php" class="nav-link"><i class="fas fa-sign-out-alt"></i> Logout</a>
    </div>
</nav>

<div class="main-content" id="mainContent">
    <div class="page-header">
        <h1><i class="fas fa-cog me-2"></i>Platform Settings</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="home.php">Dashboard</a></li>
                <li class="breadcrumb-item active">Settings</li>
            </ol>
        </nav>
    </div>

    <div class="alert alert-success d-none" id="settingsSaved" role="alert">
        <i class="fas fa-check-circle me-1"></i> Pengaturan berhasil disimpan!
    </div>

    <div class="card settings-card">
        <div class="card-header">
            <i class="fas fa-credit-card me-2"></i>Payment Methods
        </div>
        <div class="card-body">
            <form id="paymentForm">
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Nomor DANA</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-phone"></i></span>
                            <input type="text" class="form-control" value="081234567890" placeholder="Nomor DANA">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Nama Akun DANA</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                            <input type="text" class="form-control" value="Admin SMM Bot" placeholder="Nama pemilik akun DANA">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Nomor ShopeePay</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-phone"></i></span>
                            <input type="text" class="form-control" value="089876543210" placeholder="Nomor ShopeePay">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Nama Akun ShopeePay</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                            <input type="text" class="form-control" value="Admin SMM Bot" placeholder="Nama pemilik akun ShopeePay">
                        </div>
                    </div>
                </div>
                <div class="mt-3 text-end">
                    <button type="button" class="btn btn-primary btn-save-settings"><i class="fas fa-save me-1"></i> Simpan Payment Settings</button>
                </div>
            </form>
        </div>
    </div>

    <div class="card settings-card">
        <div class="card-header">
            <i class="fas fa-wallet me-2"></i>Withdrawal Settings
        </div>
        <div class="card-body">
            <form id="withdrawForm">
                <div class="row g-3">
                    <div class="col-md-4">
                        <label class="form-label fw-semibold">Minimum Withdrawal (Rp)</label>
                        <div class="input-group">
                            <span class="input-group-text">Rp</span>
                            <input type="number" class="form-control" value="20000" min="0">
                        </div>
                        <div class="form-text">Jumlah minimum yang bisa ditarik user</div>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label fw-semibold">Admin Fee</label>
                        <div class="input-group">
                            <input type="number" class="form-control" value="2500" min="0">
                            <span class="input-group-text" id="feeTypeLabel">Rp (Flat)</span>
                        </div>
                        <div class="form-text">Biaya admin per penarikan</div>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label fw-semibold">Tipe Fee</label>
                        <div class="mt-2">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="feeType" id="feeFlat" value="flat" checked>
                                <label class="form-check-label" for="feeFlat">Flat (Rp)</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="feeType" id="feePercent" value="percentage">
                                <label class="form-check-label" for="feePercent">Percentage (%)</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-3 text-end">
                    <button type="button" class="btn btn-primary btn-save-settings"><i class="fas fa-save me-1"></i> Simpan Withdrawal Settings</button>
                </div>
            </form>
        </div>
    </div>

    <div class="card settings-card">
        <div class="card-header">
            <i class="fas fa-bullhorn me-2"></i>Campaign Settings
        </div>
        <div class="card-body">
            <form id="campaignForm">
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Minimum Harga Per Task (Rp)</label>
                        <div class="input-group">
                            <span class="input-group-text">Rp</span>
                            <input type="number" class="form-control" value="100" min="0">
                        </div>
                        <div class="form-text">Harga minimum yang bisa ditetapkan per task dalam campaign</div>
                    </div>
                </div>
                <div class="mt-3 text-end">
                    <button type="button" class="btn btn-primary btn-save-settings"><i class="fas fa-save me-1"></i> Simpan Campaign Settings</button>
                </div>
            </form>
        </div>
    </div>

    <div class="card settings-card">
        <div class="card-header">
            <i class="fas fa-share-alt me-2"></i>Referral Settings
        </div>
        <div class="card-body">
            <form id="referralForm">
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Referral Wajib</label>
                        <div class="mt-2">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="referralMandatory" checked style="width:3em;height:1.5em;">
                                <label class="form-check-label ms-2" for="referralMandatory" id="referralLabel">
                                    <span class="badge bg-success">Aktif</span> - User wajib memasukkan kode referral saat registrasi
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Reward Referral (Rp)</label>
                        <div class="input-group">
                            <span class="input-group-text">Rp</span>
                            <input type="number" class="form-control" value="5000" min="0">
                        </div>
                        <div class="form-text">Reward yang diterima referrer ketika referred user aktif</div>
                    </div>
                </div>
                <div class="mt-3 text-end">
                    <button type="button" class="btn btn-primary btn-save-settings"><i class="fas fa-save me-1"></i> Simpan Referral Settings</button>
                </div>
            </form>
        </div>
    </div>

    <div class="dashboard-footer">&copy; 2026 SMM Bot Admin Dashboard. All rights reserved.</div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script type="module" src="src/js/settings.js"></script>
</body>
</html>
