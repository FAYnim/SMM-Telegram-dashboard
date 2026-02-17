<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Detail - SMM Bot Admin</title>
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
        <a href="tasks.php" class="nav-link active"><i class="fas fa-tasks"></i> Tasks</a>
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
        <h1><i class="fas fa-clipboard-check me-2"></i>Task Detail #156</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="home.php">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="tasks.php">Tasks</a></li>
                <li class="breadcrumb-item active">Task #156</li>
            </ol>
        </nav>
    </div>

    <div class="row g-4">
        <div class="col-lg-5">
            <div class="card mb-3">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <span><i class="fas fa-info-circle me-2"></i>Status Task</span>
                    <span class="badge bg-warning fs-6">Pending Review</span>
                </div>
                <div class="card-body">
                    <table class="table table-borderless mb-0">
                        <tr>
                            <td class="text-muted fw-semibold" style="width:40%">Task ID</td>
                            <td>#156</td>
                        </tr>
                        <tr>
                            <td class="text-muted fw-semibold">Reward</td>
                            <td><span class="text-success fw-bold">Rp 500</span></td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="card mb-3">
                <div class="card-header"><i class="fas fa-bullhorn me-2"></i>Informasi Campaign</div>
                <div class="card-body">
                    <table class="table table-borderless mb-0">
                        <tr>
                            <td class="text-muted fw-semibold" style="width:40%">Campaign</td>
                            <td>Like IG Post @brand</td>
                        </tr>
                        <tr>
                            <td class="text-muted fw-semibold">Tipe</td>
                            <td><span class="badge bg-info">Like</span></td>
                        </tr>
                        <tr>
                            <td class="text-muted fw-semibold">Platform</td>
                            <td><i class="fab fa-instagram text-danger me-1"></i>Instagram</td>
                        </tr>
                        <tr>
                            <td class="text-muted fw-semibold">Link Target</td>
                            <td><a href="#" class="text-decoration-none" target="_blank">https://instagram.com/p/ABC123 <i class="fas fa-external-link-alt ms-1 small"></i></a></td>
                        </tr>
                        <tr>
                            <td class="text-muted fw-semibold">Client</td>
                            <td><a href="user-detail.php?id=5">@charlie_x</a></td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="card mb-3">
                <div class="card-header"><i class="fas fa-user me-2"></i>Informasi Worker</div>
                <div class="card-body">
                    <div class="d-flex align-items-center mb-3">
                        <img src="https://ui-avatars.com/api/?name=Alice+W&background=6f42c1&color=fff&size=48&rounded=true" class="me-3" alt="Worker" style="width:48px;height:48px;border-radius:50%;">
                        <div>
                            <h6 class="mb-0 fw-bold">Alice Wonderland</h6>
                            <span class="text-muted small">@alice_w - Chat ID: 234567890</span>
                        </div>
                    </div>
                    <table class="table table-borderless mb-0">
                        <tr>
                            <td class="text-muted fw-semibold" style="width:40%">Social Account</td>
                            <td>@alicew_ig (Instagram)</td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="card mb-3">
                <div class="card-header"><i class="fas fa-clock me-2"></i>Timeline</div>
                <div class="card-body">
                    <div class="timeline">
                        <div class="timeline-item completed">
                            <h6 class="fw-bold mb-1">Task Diambil</h6>
                            <small class="text-muted">15 Feb 2026, 13:00</small>
                            <p class="mb-0 small text-muted">Worker @alice_w mengambil task ini</p>
                        </div>
                        <div class="timeline-item completed">
                            <h6 class="fw-bold mb-1">Proof Dikirim</h6>
                            <small class="text-muted">15 Feb 2026, 14:15</small>
                            <p class="mb-0 small text-muted">Worker mengirim bukti screenshot</p>
                        </div>
                        <div class="timeline-item pending">
                            <h6 class="fw-bold mb-1">Menunggu Review</h6>
                            <small class="text-muted">Saat ini</small>
                            <p class="mb-0 small text-muted">Menunggu admin mereview bukti task</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="d-flex gap-2">
                <button class="btn btn-success flex-fill" data-bs-toggle="modal" data-bs-target="#approveTaskDetailModal">
                    <i class="fas fa-check me-1"></i> Approve Task
                </button>
                <button class="btn btn-danger flex-fill" data-bs-toggle="modal" data-bs-target="#rejectTaskDetailModal">
                    <i class="fas fa-times me-1"></i> Reject Task
                </button>
            </div>
        </div>

        <div class="col-lg-7">
            <div class="card">
                <div class="card-header"><i class="fas fa-image me-2"></i>Bukti Task (Proof)</div>
                <div class="card-body text-center">
                    <img src="https://placehold.co/500x700/e9ecef/495057?text=Screenshot+Bukti+Task%0ALike+IG+Post+%40brand%0A%0A(Full+Size+Image)" class="img-fluid rounded" alt="Task Proof" style="max-height: 600px; cursor: zoom-in;" data-bs-toggle="modal" data-bs-target="#fullProofModal">
                    <p class="text-muted small mt-2"><i class="fas fa-info-circle me-1"></i>Klik gambar untuk memperbesar</p>
                </div>
            </div>
        </div>
    </div>

    <div class="dashboard-footer">&copy; 2026 SMM Bot Admin Dashboard. All rights reserved.</div>
</div>

<div class="modal fade" id="fullProofModal" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fas fa-search-plus me-2"></i>Proof Image - Task #156</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body text-center p-2">
                <img src="https://placehold.co/800x1100/e9ecef/495057?text=Full+Size+Screenshot%0ABukti+Task%0ALike+IG+Post+%40brand" class="img-fluid rounded" alt="Full Proof">
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="approveTaskDetailModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title"><i class="fas fa-check-circle me-2"></i>Approve Task #156</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="alert alert-info">
                    <strong>Campaign:</strong> Like IG Post @brand<br>
                    <strong>Worker:</strong> @alice_w<br>
                    <strong>Reward:</strong> Rp 500
                </div>
                <p>Dengan meng-approve task ini:</p>
                <ul class="small">
                    <li>Reward <strong>Rp 500</strong> akan ditambahkan ke profit @alice_w</li>
                    <li>Campaign completed count akan bertambah 1</li>
                    <li>Notifikasi akan dikirim ke worker via Telegram</li>
                </ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-success" data-bs-dismiss="modal"><i class="fas fa-check me-1"></i> Approve Task</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="rejectTaskDetailModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title"><i class="fas fa-times-circle me-2"></i>Reject Task #156</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="alert alert-info">
                    <strong>Campaign:</strong> Like IG Post @brand<br>
                    <strong>Worker:</strong> @alice_w
                </div>
                <div class="mb-3">
                    <label for="rejectTaskReason" class="form-label fw-semibold">Alasan Penolakan <span class="text-danger">*</span></label>
                    <textarea class="form-control" id="rejectTaskReason" rows="3" placeholder="Masukkan alasan penolakan..." required></textarea>
                    <div class="form-text">Alasan ini akan dikirim ke worker via Telegram.</div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fas fa-times me-1"></i> Reject Task</button>
            </div>
        </div>
    </div>
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
