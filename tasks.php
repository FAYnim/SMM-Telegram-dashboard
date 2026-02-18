<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tasks - SMM Bot Admin</title>
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
        <h1><i class="fas fa-tasks me-2"></i>Task Management</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="home.php">Dashboard</a></li>
                <li class="breadcrumb-item active">Tasks</li>
            </ol>
        </nav>
    </div>

    <div class="filter-bar">
        <div class="row g-2 align-items-end">
            <div class="col-md-3">
                <label class="form-label small fw-semibold">Cari</label>
                <input type="text" class="form-control" placeholder="Campaign atau worker...">
            </div>
            <div class="col-md-2">
                <label class="form-label small fw-semibold">Status</label>
                <select class="form-select">
                    <option value="">Semua Status</option>
                    <option value="pending_review" selected>Pending Review</option>
                    <option value="approved">Approved</option>
                    <option value="rejected">Rejected</option>
                    <option value="taken">Taken</option>
                    <option value="available">Available</option>
                </select>
            </div>
            <div class="col-md-2">
                <label class="form-label small fw-semibold">Dari Tanggal</label>
                <input type="date" class="form-control">
            </div>
            <div class="col-md-2">
                <label class="form-label small fw-semibold">Sampai Tanggal</label>
                <input type="date" class="form-control">
            </div>
            <div class="col-md-3">
                <button class="btn btn-primary w-100"><i class="fas fa-search me-1"></i> Filter</button>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <span><i class="fas fa-table me-2"></i>Daftar Task</span>
            <span class="badge bg-warning">6 Pending Review</span>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-dashboard table-hover mb-0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Campaign</th>
                            <th>Worker</th>
                            <th>Status</th>
                            <th>Proof</th>
                            <th>Taken At</th>
                            <th>Completed At</th>
                            <th>Reviewed At</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>156</td>
                            <td>Like IG Post @brand</td>
                            <td><strong>@alice_w</strong></td>
                            <td><span class="badge bg-warning">Pending Review</span></td>
                            <td><img src="https://placehold.co/50x50/e9ecef/495057?text=SS" class="proof-thumbnail" data-bs-toggle="modal" data-bs-target="#proofModal" alt="Proof"></td>
                            <td class="text-muted small">2026-02-15 13:00</td>
                            <td class="text-muted small">2026-02-15 14:15</td>
                            <td>-</td>
                            <td>
                                <a href="task-detail.php?id=156" class="btn btn-sm btn-outline-primary btn-action me-1" title="Detail"><i class="fas fa-eye"></i></a>
                                <button class="btn btn-sm btn-success btn-action me-1" data-bs-toggle="modal" data-bs-target="#approveTaskModal" title="Approve"><i class="fas fa-check"></i></button>
                                <button class="btn btn-sm btn-danger btn-action" data-bs-toggle="modal" data-bs-target="#rejectTaskModal" title="Reject"><i class="fas fa-times"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td>155</td>
                            <td>Follow IG @mystore</td>
                            <td><strong>@diana_r</strong></td>
                            <td><span class="badge bg-warning">Pending Review</span></td>
                            <td><img src="https://placehold.co/50x50/e9ecef/495057?text=SS" class="proof-thumbnail" data-bs-toggle="modal" data-bs-target="#proofModal" alt="Proof"></td>
                            <td class="text-muted small">2026-02-15 12:00</td>
                            <td class="text-muted small">2026-02-15 13:30</td>
                            <td>-</td>
                            <td>
                                <a href="task-detail.php?id=155" class="btn btn-sm btn-outline-primary btn-action me-1" title="Detail"><i class="fas fa-eye"></i></a>
                                <button class="btn btn-sm btn-success btn-action me-1" data-bs-toggle="modal" data-bs-target="#approveTaskModal" title="Approve"><i class="fas fa-check"></i></button>
                                <button class="btn btn-sm btn-danger btn-action" data-bs-toggle="modal" data-bs-target="#rejectTaskModal" title="Reject"><i class="fas fa-times"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td>154</td>
                            <td>Comment YouTube Review</td>
                            <td><strong>@evan_k</strong></td>
                            <td><span class="badge bg-warning">Pending Review</span></td>
                            <td><img src="https://placehold.co/50x50/e9ecef/495057?text=SS" class="proof-thumbnail" data-bs-toggle="modal" data-bs-target="#proofModal" alt="Proof"></td>
                            <td class="text-muted small">2026-02-15 11:00</td>
                            <td class="text-muted small">2026-02-15 12:20</td>
                            <td>-</td>
                            <td>
                                <a href="task-detail.php?id=154" class="btn btn-sm btn-outline-primary btn-action me-1" title="Detail"><i class="fas fa-eye"></i></a>
                                <button class="btn btn-sm btn-success btn-action me-1" data-bs-toggle="modal" data-bs-target="#approveTaskModal" title="Approve"><i class="fas fa-check"></i></button>
                                <button class="btn btn-sm btn-danger btn-action" data-bs-toggle="modal" data-bs-target="#rejectTaskModal" title="Reject"><i class="fas fa-times"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td>153</td>
                            <td>Like Video TikTok</td>
                            <td><strong>@hannah_p</strong></td>
                            <td><span class="badge bg-warning">Pending Review</span></td>
                            <td><img src="https://placehold.co/50x50/e9ecef/495057?text=SS" class="proof-thumbnail" data-bs-toggle="modal" data-bs-target="#proofModal" alt="Proof"></td>
                            <td class="text-muted small">2026-02-15 10:30</td>
                            <td class="text-muted small">2026-02-15 11:45</td>
                            <td>-</td>
                            <td>
                                <a href="task-detail.php?id=153" class="btn btn-sm btn-outline-primary btn-action me-1" title="Detail"><i class="fas fa-eye"></i></a>
                                <button class="btn btn-sm btn-success btn-action me-1" data-bs-toggle="modal" data-bs-target="#approveTaskModal" title="Approve"><i class="fas fa-check"></i></button>
                                <button class="btn btn-sm btn-danger btn-action" data-bs-toggle="modal" data-bs-target="#rejectTaskModal" title="Reject"><i class="fas fa-times"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td>152</td>
                            <td>View TikTok Promo</td>
                            <td><strong>@fiona_m</strong></td>
                            <td><span class="badge bg-warning">Pending Review</span></td>
                            <td><img src="https://placehold.co/50x50/e9ecef/495057?text=SS" class="proof-thumbnail" data-bs-toggle="modal" data-bs-target="#proofModal" alt="Proof"></td>
                            <td class="text-muted small">2026-02-15 09:00</td>
                            <td class="text-muted small">2026-02-15 10:10</td>
                            <td>-</td>
                            <td>
                                <a href="task-detail.php?id=152" class="btn btn-sm btn-outline-primary btn-action me-1" title="Detail"><i class="fas fa-eye"></i></a>
                                <button class="btn btn-sm btn-success btn-action me-1" data-bs-toggle="modal" data-bs-target="#approveTaskModal" title="Approve"><i class="fas fa-check"></i></button>
                                <button class="btn btn-sm btn-danger btn-action" data-bs-toggle="modal" data-bs-target="#rejectTaskModal" title="Reject"><i class="fas fa-times"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td>151</td>
                            <td>Follow IG @mystore</td>
                            <td><strong>@george_l</strong></td>
                            <td><span class="badge bg-warning">Pending Review</span></td>
                            <td><img src="https://placehold.co/50x50/e9ecef/495057?text=SS" class="proof-thumbnail" data-bs-toggle="modal" data-bs-target="#proofModal" alt="Proof"></td>
                            <td class="text-muted small">2026-02-14 22:00</td>
                            <td class="text-muted small">2026-02-14 23:15</td>
                            <td>-</td>
                            <td>
                                <a href="task-detail.php?id=151" class="btn btn-sm btn-outline-primary btn-action me-1" title="Detail"><i class="fas fa-eye"></i></a>
                                <button class="btn btn-sm btn-success btn-action me-1" data-bs-toggle="modal" data-bs-target="#approveTaskModal" title="Approve"><i class="fas fa-check"></i></button>
                                <button class="btn btn-sm btn-danger btn-action" data-bs-toggle="modal" data-bs-target="#rejectTaskModal" title="Reject"><i class="fas fa-times"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td>150</td>
                            <td>Like IG Post @brand</td>
                            <td><strong>@john_doe</strong></td>
                            <td><span class="badge bg-success">Approved</span></td>
                            <td><img src="https://placehold.co/50x50/d4edda/155724?text=OK" class="proof-thumbnail" data-bs-toggle="modal" data-bs-target="#proofModal" alt="Proof"></td>
                            <td class="text-muted small">2026-02-14 14:00</td>
                            <td class="text-muted small">2026-02-14 15:30</td>
                            <td class="text-muted small">2026-02-14 18:00</td>
                            <td>
                                <a href="task-detail.php?id=150" class="btn btn-sm btn-outline-primary btn-action" title="Detail"><i class="fas fa-eye"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>149</td>
                            <td>Comment YouTube Review</td>
                            <td><strong>@diana_r</strong></td>
                            <td><span class="badge bg-success">Approved</span></td>
                            <td><img src="https://placehold.co/50x50/d4edda/155724?text=OK" class="proof-thumbnail" data-bs-toggle="modal" data-bs-target="#proofModal" alt="Proof"></td>
                            <td class="text-muted small">2026-02-14 12:00</td>
                            <td class="text-muted small">2026-02-14 13:00</td>
                            <td class="text-muted small">2026-02-15 12:30</td>
                            <td>
                                <a href="task-detail.php?id=149" class="btn btn-sm btn-outline-primary btn-action" title="Detail"><i class="fas fa-eye"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>148</td>
                            <td>View TikTok Promo</td>
                            <td><strong>@hannah_p</strong></td>
                            <td><span class="badge bg-danger">Rejected</span></td>
                            <td><img src="https://placehold.co/50x50/f8d7da/842029?text=X" class="proof-thumbnail" data-bs-toggle="modal" data-bs-target="#proofModal" alt="Proof"></td>
                            <td class="text-muted small">2026-02-14 08:00</td>
                            <td class="text-muted small">2026-02-14 09:00</td>
                            <td class="text-muted small">2026-02-15 10:10</td>
                            <td>
                                <a href="task-detail.php?id=148" class="btn btn-sm btn-outline-primary btn-action" title="Detail"><i class="fas fa-eye"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>147</td>
                            <td>Like Video TikTok</td>
                            <td><strong>@bob_smith</strong></td>
                            <td><span class="badge bg-warning text-dark">Taken</span></td>
                            <td><span class="text-muted small">-</span></td>
                            <td class="text-muted small">2026-02-15 14:00</td>
                            <td>-</td>
                            <td>-</td>
                            <td>
                                <a href="task-detail.php?id=147" class="btn btn-sm btn-outline-primary btn-action" title="Detail"><i class="fas fa-eye"></i></a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer bg-white">
            <div class="d-flex justify-content-between align-items-center">
                <small class="text-muted">Menampilkan 1-10 dari 156 task</small>
                <nav>
                    <ul class="pagination pagination-sm mb-0">
                        <li class="page-item disabled"><a class="page-link" href="#">&laquo;</a></li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">...</a></li>
                        <li class="page-item"><a class="page-link" href="#">16</a></li>
                        <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>

    <div class="dashboard-footer">&copy; 2026 SMM Bot Admin Dashboard. All rights reserved.</div>
</div>

<div class="modal fade" id="proofModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fas fa-image me-2"></i>Bukti Task</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body text-center">
                <img src="https://placehold.co/400x600/e9ecef/495057?text=Screenshot+Proof" class="img-fluid rounded" alt="Proof" style="max-height:500px;">
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="approveTaskModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title"><i class="fas fa-check-circle me-2"></i>Approve Task</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="alert alert-info">
                    <strong>Task #156</strong><br>
                    <strong>Campaign:</strong> Like IG Post @brand<br>
                    <strong>Worker:</strong> @alice_w<br>
                    <strong>Reward:</strong> Rp 500
                </div>
                <p>Task ini akan di-approve dan reward <strong>Rp 500</strong> akan ditambahkan ke profit worker.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-success" data-bs-dismiss="modal"><i class="fas fa-check me-1"></i> Approve Task</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="rejectTaskModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title"><i class="fas fa-times-circle me-2"></i>Reject Task</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="alert alert-info">
                    <strong>Task #156</strong><br>
                    <strong>Campaign:</strong> Like IG Post @brand<br>
                    <strong>Worker:</strong> @alice_w
                </div>
                <div class="mb-3">
                    <label for="taskRejectReason" class="form-label fw-semibold">Alasan Penolakan <span class="text-danger">*</span></label>
                    <textarea class="form-control" id="taskRejectReason" rows="3" placeholder="Masukkan alasan penolakan..." required></textarea>
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
<script type="module" src="src/js/tasks.js"></script>
</body>
</html>
