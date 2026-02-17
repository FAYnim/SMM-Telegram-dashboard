<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Admin - SMM Bot Admin</title>
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
        <a href="profile.php" class="nav-link active"><i class="fas fa-user-circle"></i> Profil</a>
        <a href="logout.php" class="nav-link"><i class="fas fa-sign-out-alt"></i> Logout</a>
    </div>
</nav>

<!-- Main Content -->
<div class="main-content" id="mainContent">
    <div class="page-header">
        <h1><i class="fas fa-user-circle me-2"></i>Profil Admin</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="home.php">Dashboard</a></li>
                <li class="breadcrumb-item active">Profil</li>
            </ol>
        </nav>
    </div>

    <div class="row g-4">
        <!-- Admin Info Card -->
        <div class="col-lg-5">
            <div class="card">
                <div class="card-header">
                    <i class="fas fa-id-card me-2"></i>Informasi Admin
                </div>
                <div class="card-body text-center">
                    <img src="https://ui-avatars.com/api/?name=Super+Admin&background=0d6efd&color=fff&size=120&font-size=0.4" alt="Avatar" class="rounded-circle mb-3" style="width:120px;height:120px;">
                    <h4 class="fw-bold mb-1">Super Admin</h4>
                    <p class="text-muted mb-3">@superadmin</p>
                    <span class="badge bg-primary fs-6 mb-3"><i class="fas fa-crown me-1"></i>Super Admin</span>
                    <hr>
                    <div class="row g-2 text-start">
                        <div class="col-5 text-muted small">Username</div>
                        <div class="col-7 fw-semibold">superadmin</div>
                        <div class="col-5 text-muted small">Role</div>
                        <div class="col-7 fw-semibold">Super Admin</div>
                        <div class="col-5 text-muted small">Chat ID</div>
                        <div class="col-7 fw-semibold">908712345</div>
                        <div class="col-5 text-muted small">Bergabung</div>
                        <div class="col-7 fw-semibold">2025-01-15</div>
                        <div class="col-5 text-muted small">Login Terakhir</div>
                        <div class="col-7 fw-semibold">2026-02-15 12:50</div>
                    </div>
                </div>
            </div>

            <!-- Permissions Card -->
            <div class="card mt-4">
                <div class="card-header">
                    <i class="fas fa-shield-alt me-2"></i>Permissions
                </div>
                <div class="card-body">
                    <div class="d-flex flex-wrap gap-2">
                        <span class="badge bg-light text-dark border"><i class="fas fa-check-circle text-success me-1"></i>Manage Users</span>
                        <span class="badge bg-light text-dark border"><i class="fas fa-check-circle text-success me-1"></i>Verify Deposits</span>
                        <span class="badge bg-light text-dark border"><i class="fas fa-check-circle text-success me-1"></i>Verify Withdrawals</span>
                        <span class="badge bg-light text-dark border"><i class="fas fa-check-circle text-success me-1"></i>Manage Campaigns</span>
                        <span class="badge bg-light text-dark border"><i class="fas fa-check-circle text-success me-1"></i>Review Tasks</span>
                        <span class="badge bg-light text-dark border"><i class="fas fa-check-circle text-success me-1"></i>View Transactions</span>
                        <span class="badge bg-light text-dark border"><i class="fas fa-check-circle text-success me-1"></i>Manage Settings</span>
                        <span class="badge bg-light text-dark border"><i class="fas fa-check-circle text-success me-1"></i>View Audit Log</span>
                    </div>
                </div>
            </div>

            <!-- Activity Summary -->
            <div class="card mt-4">
                <div class="card-header">
                    <i class="fas fa-chart-bar me-2"></i>Ringkasan Aktivitas
                </div>
                <div class="card-body">
                    <div class="row g-3 text-center">
                        <div class="col-4">
                            <div class="text-primary fw-bold fs-4">45</div>
                            <small class="text-muted">Deposit<br>Diverifikasi</small>
                        </div>
                        <div class="col-4">
                            <div class="text-success fw-bold fs-4">32</div>
                            <small class="text-muted">Withdrawal<br>Diverifikasi</small>
                        </div>
                        <div class="col-4">
                            <div class="text-warning fw-bold fs-4">128</div>
                            <small class="text-muted">Task<br>Direview</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Change Password Card -->
        <div class="col-lg-7">
            <div class="card">
                <div class="card-header">
                    <i class="fas fa-key me-2"></i>Ubah Password
                </div>
                <div class="card-body">
                    <div class="alert alert-info d-flex align-items-center" role="alert">
                        <i class="fas fa-info-circle me-2"></i>
                        <small>Gunakan password yang kuat: minimal 8 karakter, kombinasi huruf besar, huruf kecil, angka, dan simbol.</small>
                    </div>

                    <form id="changePasswordForm">
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Password Saat Ini</label>
                            <div class="input-group">
                                <input type="password" class="form-control" id="currentPassword" placeholder="Masukkan password saat ini" required>
                                <button class="btn btn-outline-secondary toggle-password" type="button" data-target="currentPassword">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                        </div>

                        <hr class="my-4">

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Password Baru</label>
                            <div class="input-group">
                                <input type="password" class="form-control" id="newPassword" placeholder="Masukkan password baru" required>
                                <button class="btn btn-outline-secondary toggle-password" type="button" data-target="newPassword">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                            <div class="form-text">Minimal 8 karakter</div>
                            <!-- Password Strength Indicator -->
                            <div class="mt-2">
                                <div class="progress" style="height: 6px;">
                                    <div class="progress-bar" id="passwordStrength" role="progressbar" style="width: 0%"></div>
                                </div>
                                <small class="text-muted" id="strengthText"></small>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-semibold">Konfirmasi Password Baru</label>
                            <div class="input-group">
                                <input type="password" class="form-control" id="confirmPassword" placeholder="Ulangi password baru" required>
                                <button class="btn btn-outline-secondary toggle-password" type="button" data-target="confirmPassword">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </div>
                            <div class="invalid-feedback" id="matchFeedback">Password tidak cocok</div>
                        </div>

                        <button type="submit" class="btn btn-primary" id="btnChangePass">
                            <i class="fas fa-save me-1"></i> Simpan Password
                        </button>
                    </form>
                </div>
            </div>

            <!-- Recent Login Activity -->
            <div class="card mt-4">
                <div class="card-header">
                    <i class="fas fa-history me-2"></i>Riwayat Login Terakhir
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-dashboard mb-0">
                            <thead>
                                <tr>
                                    <th>Waktu</th>
                                    <th>IP Address</th>
                                    <th>Device</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="small">2026-02-15 12:50</td>
                                    <td><code>192.168.1.10</code></td>
                                    <td class="small">Chrome / Windows 10</td>
                                    <td><span class="badge bg-success">Berhasil</span></td>
                                </tr>
                                <tr>
                                    <td class="small">2026-02-14 09:20</td>
                                    <td><code>192.168.1.10</code></td>
                                    <td class="small">Chrome / Windows 10</td>
                                    <td><span class="badge bg-success">Berhasil</span></td>
                                </tr>
                                <tr>
                                    <td class="small">2026-02-13 08:15</td>
                                    <td><code>192.168.1.15</code></td>
                                    <td class="small">Firefox / macOS</td>
                                    <td><span class="badge bg-success">Berhasil</span></td>
                                </tr>
                                <tr>
                                    <td class="small">2026-02-12 22:40</td>
                                    <td><code>103.56.120.45</code></td>
                                    <td class="small">Unknown</td>
                                    <td><span class="badge bg-danger">Gagal</span></td>
                                </tr>
                                <tr>
                                    <td class="small">2026-02-12 14:30</td>
                                    <td><code>192.168.1.10</code></td>
                                    <td class="small">Chrome / Windows 10</td>
                                    <td><span class="badge bg-success">Berhasil</span></td>
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

    // Toggle password visibility
    $('.toggle-password').on('click', function() {
        const targetId = $(this).data('target');
        const input = $('#' + targetId);
        const icon = $(this).find('i');
        if (input.attr('type') === 'password') {
            input.attr('type', 'text');
            icon.removeClass('fa-eye').addClass('fa-eye-slash');
        } else {
            input.attr('type', 'password');
            icon.removeClass('fa-eye-slash').addClass('fa-eye');
        }
    });

    // Password strength indicator
    $('#newPassword').on('input', function() {
        const val = $(this).val();
        let strength = 0;
        let text = '';
        let color = '';

        if (val.length >= 8) strength++;
        if (val.length >= 12) strength++;
        if (/[A-Z]/.test(val)) strength++;
        if (/[0-9]/.test(val)) strength++;
        if (/[^A-Za-z0-9]/.test(val)) strength++;

        switch (strength) {
            case 0: case 1: text = 'Lemah'; color = 'bg-danger'; break;
            case 2: text = 'Cukup'; color = 'bg-warning'; break;
            case 3: text = 'Sedang'; color = 'bg-info'; break;
            case 4: text = 'Kuat'; color = 'bg-primary'; break;
            case 5: text = 'Sangat Kuat'; color = 'bg-success'; break;
        }

        const pct = val.length === 0 ? 0 : (strength / 5) * 100;
        $('#passwordStrength').css('width', pct + '%').attr('class', 'progress-bar ' + color);
        $('#strengthText').text(val.length > 0 ? text : '');
    });

    // Confirm password match
    $('#confirmPassword').on('input', function() {
        const newPass = $('#newPassword').val();
        const confirmPass = $(this).val();
        if (confirmPass.length > 0 && newPass !== confirmPass) {
            $(this).addClass('is-invalid');
            $('#matchFeedback').show();
        } else {
            $(this).removeClass('is-invalid');
            $('#matchFeedback').hide();
        }
    });

    // Submit form
    $('#changePasswordForm').on('submit', function(e) {
        e.preventDefault();
        const newPass = $('#newPassword').val();
        const confirmPass = $('#confirmPassword').val();

        if (newPass.length < 8) {
            alert('Password baru minimal 8 karakter!');
            return;
        }
        if (newPass !== confirmPass) {
            alert('Password baru dan konfirmasi tidak cocok!');
            return;
        }

        const btn = $('#btnChangePass');
        btn.prop('disabled', true).html('<span class="spinner-border spinner-border-sm me-1"></span> Menyimpan...');
        setTimeout(function() {
            btn.html('<i class="fas fa-check me-1"></i> Tersimpan!').removeClass('btn-primary').addClass('btn-success');
            setTimeout(function() {
                btn.html('<i class="fas fa-save me-1"></i> Simpan Password').removeClass('btn-success').addClass('btn-primary').prop('disabled', false);
                $('#changePasswordForm')[0].reset();
                $('#passwordStrength').css('width', '0%');
                $('#strengthText').text('');
            }, 2000);
        }, 1500);
    });
});
</script>
</body>
</html>
