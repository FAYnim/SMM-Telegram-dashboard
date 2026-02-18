<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Campaigns - SMM Bot Admin</title>
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
        <a href="campaigns.php" class="nav-link active"><i class="fas fa-bullhorn"></i> Campaigns</a>
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
        <h1><i class="fas fa-bullhorn me-2"></i>Campaign Management</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="home.php">Dashboard</a></li>
                <li class="breadcrumb-item active">Campaigns</li>
            </ol>
        </nav>
    </div>

    <div class="filter-bar">
        <div class="row g-2 align-items-end">
            <div class="col-md-3">
                <label class="form-label small fw-semibold">Cari</label>
                <input type="text" class="form-control" placeholder="Judul atau username...">
            </div>
            <div class="col-md-2">
                <label class="form-label small fw-semibold">Status</label>
                <select class="form-select">
                    <option value="">Semua Status</option>
                    <option value="draft">Draft</option>
                    <option value="active">Active</option>
                    <option value="paused">Paused</option>
                    <option value="completed">Completed</option>
                    <option value="deleted">Deleted</option>
                </select>
            </div>
            <div class="col-md-2">
                <label class="form-label small fw-semibold">Tipe</label>
                <select class="form-select">
                    <option value="">Semua Tipe</option>
                    <option value="view">View</option>
                    <option value="like">Like</option>
                    <option value="comment">Comment</option>
                    <option value="share">Share</option>
                    <option value="follow">Follow</option>
                </select>
            </div>
            <div class="col-md-2">
                <label class="form-label small fw-semibold">Platform</label>
                <select class="form-select">
                    <option value="">Semua Platform</option>
                    <option value="instagram">Instagram</option>
                    <option value="tiktok">TikTok</option>
                    <option value="youtube">YouTube</option>
                    <option value="twitter">Twitter</option>
                    <option value="facebook">Facebook</option>
                </select>
            </div>
            <div class="col-md-3">
                <button class="btn btn-primary w-100"><i class="fas fa-search me-1"></i> Filter</button>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <span><i class="fas fa-table me-2"></i>Daftar Campaign</span>
            <span class="badge bg-info">3 Draft</span>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-dashboard table-hover mb-0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Judul</th>
                            <th>Client</th>
                            <th>Platform</th>
                            <th>Tipe</th>
                            <th>Harga/Task</th>
                            <th>Progress</th>
                            <th>Balance</th>
                            <th>Budget</th>
                            <th>Status</th>
                            <th>Created</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>15</td>
                            <td><strong>Follow IG @store</strong></td>
                            <td>@maria_g</td>
                            <td><i class="fab fa-instagram text-danger me-1"></i>Instagram</td>
                            <td><span class="badge bg-primary">Follow</span></td>
                            <td>Rp 1.500</td>
                            <td><strong>0/100</strong></td>
                            <td>Rp 0</td>
                            <td>Rp 150.000</td>
                            <td><span class="badge bg-info">Draft</span></td>
                            <td class="text-muted small">2026-02-15 13:20</td>
                            <td>
                                <button class="btn btn-sm btn-success btn-action me-1" data-bs-toggle="modal" data-bs-target="#approveCampaignModal" title="Approve"><i class="fas fa-check"></i></button>
                                <button class="btn btn-sm btn-danger btn-action" data-bs-toggle="modal" data-bs-target="#rejectCampaignModal" title="Reject"><i class="fas fa-times"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td>14</td>
                            <td><strong>Like Video TikTok</strong></td>
                            <td>@john_doe</td>
                            <td><i class="fab fa-tiktok me-1"></i>TikTok</td>
                            <td><span class="badge bg-info">Like</span></td>
                            <td>Rp 500</td>
                            <td><strong>12/50</strong></td>
                            <td>Rp 19.000</td>
                            <td>Rp 25.000</td>
                            <td><span class="badge bg-success">Active</span></td>
                            <td class="text-muted small">2026-02-14 10:00</td>
                            <td>
                                <button class="btn btn-sm btn-warning btn-action me-1" title="Pause"><i class="fas fa-pause"></i></button>
                                <a href="#" class="btn btn-sm btn-outline-primary btn-action" title="Detail"><i class="fas fa-eye"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>13</td>
                            <td><strong>Comment YouTube Review</strong></td>
                            <td>@alice_w</td>
                            <td><i class="fab fa-youtube text-danger me-1"></i>YouTube</td>
                            <td><span class="badge bg-warning text-dark">Comment</span></td>
                            <td>Rp 2.000</td>
                            <td><strong>28/30</strong></td>
                            <td>Rp 4.000</td>
                            <td>Rp 60.000</td>
                            <td><span class="badge bg-success">Active</span></td>
                            <td class="text-muted small">2026-02-12 08:00</td>
                            <td>
                                <button class="btn btn-sm btn-warning btn-action me-1" title="Pause"><i class="fas fa-pause"></i></button>
                                <a href="#" class="btn btn-sm btn-outline-primary btn-action" title="Detail"><i class="fas fa-eye"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>12</td>
                            <td><strong>Follow IG @mystore</strong></td>
                            <td>@john_doe</td>
                            <td><i class="fab fa-instagram text-danger me-1"></i>Instagram</td>
                            <td><span class="badge bg-primary">Follow</span></td>
                            <td>Rp 1.500</td>
                            <td><strong>35/100</strong></td>
                            <td>Rp 97.500</td>
                            <td>Rp 150.000</td>
                            <td><span class="badge bg-success">Active</span></td>
                            <td class="text-muted small">2026-02-10 14:00</td>
                            <td>
                                <button class="btn btn-sm btn-warning btn-action me-1" title="Pause"><i class="fas fa-pause"></i></button>
                                <a href="#" class="btn btn-sm btn-outline-primary btn-action" title="Detail"><i class="fas fa-eye"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>11</td>
                            <td><strong>View TikTok Promo</strong></td>
                            <td>@diana_r</td>
                            <td><i class="fab fa-tiktok me-1"></i>TikTok</td>
                            <td><span class="badge bg-secondary">View</span></td>
                            <td>Rp 200</td>
                            <td><strong>80/200</strong></td>
                            <td>Rp 24.000</td>
                            <td>Rp 40.000</td>
                            <td><span class="badge bg-warning text-dark">Paused</span></td>
                            <td class="text-muted small">2026-02-08 09:00</td>
                            <td>
                                <button class="btn btn-sm btn-success btn-action me-1" title="Resume"><i class="fas fa-play"></i></button>
                                <a href="#" class="btn btn-sm btn-outline-primary btn-action" title="Detail"><i class="fas fa-eye"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>10</td>
                            <td><strong>Share FB Post</strong></td>
                            <td>@bob_smith</td>
                            <td><i class="fab fa-facebook text-primary me-1"></i>Facebook</td>
                            <td><span class="badge bg-dark">Share</span></td>
                            <td>Rp 1.000</td>
                            <td><strong>0/75</strong></td>
                            <td>Rp 0</td>
                            <td>Rp 75.000</td>
                            <td><span class="badge bg-info">Draft</span></td>
                            <td class="text-muted small">2026-02-07 16:00</td>
                            <td>
                                <button class="btn btn-sm btn-success btn-action me-1" data-bs-toggle="modal" data-bs-target="#approveCampaignModal" title="Approve"><i class="fas fa-check"></i></button>
                                <button class="btn btn-sm btn-danger btn-action" data-bs-toggle="modal" data-bs-target="#rejectCampaignModal" title="Reject"><i class="fas fa-times"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td>9</td>
                            <td><strong>Like IG Post @brand</strong></td>
                            <td>@charlie_x</td>
                            <td><i class="fab fa-instagram text-danger me-1"></i>Instagram</td>
                            <td><span class="badge bg-info">Like</span></td>
                            <td>Rp 500</td>
                            <td><strong>50/50</strong></td>
                            <td>Rp 0</td>
                            <td>Rp 25.000</td>
                            <td><span class="badge bg-success">Completed</span></td>
                            <td class="text-muted small">2026-02-05 11:00</td>
                            <td>
                                <a href="#" class="btn btn-sm btn-outline-primary btn-action" title="Detail"><i class="fas fa-eye"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>8</td>
                            <td><strong>Like TikTok Video</strong></td>
                            <td>@george_l</td>
                            <td><i class="fab fa-tiktok me-1"></i>TikTok</td>
                            <td><span class="badge bg-info">Like</span></td>
                            <td>Rp 500</td>
                            <td><strong>50/50</strong></td>
                            <td>Rp 0</td>
                            <td>Rp 25.000</td>
                            <td><span class="badge bg-success">Completed</span></td>
                            <td class="text-muted small">2026-02-03 14:00</td>
                            <td>
                                <a href="#" class="btn btn-sm btn-outline-primary btn-action" title="Detail"><i class="fas fa-eye"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>7</td>
                            <td><strong>Subscribe YT Channel</strong></td>
                            <td>@fiona_m</td>
                            <td><i class="fab fa-youtube text-danger me-1"></i>YouTube</td>
                            <td><span class="badge bg-primary">Follow</span></td>
                            <td>Rp 3.000</td>
                            <td><strong>0/25</strong></td>
                            <td>Rp 0</td>
                            <td>Rp 75.000</td>
                            <td><span class="badge bg-info">Draft</span></td>
                            <td class="text-muted small">2026-02-15 09:00</td>
                            <td>
                                <button class="btn btn-sm btn-success btn-action me-1" data-bs-toggle="modal" data-bs-target="#approveCampaignModal" title="Approve"><i class="fas fa-check"></i></button>
                                <button class="btn btn-sm btn-danger btn-action" data-bs-toggle="modal" data-bs-target="#rejectCampaignModal" title="Reject"><i class="fas fa-times"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td>6</td>
                            <td><strong>Retweet @news</strong></td>
                            <td>@evan_k</td>
                            <td><i class="fab fa-twitter text-info me-1"></i>Twitter</td>
                            <td><span class="badge bg-dark">Share</span></td>
                            <td>Rp 800</td>
                            <td><strong>40/40</strong></td>
                            <td>Rp 0</td>
                            <td>Rp 32.000</td>
                            <td><span class="badge bg-success">Completed</span></td>
                            <td class="text-muted small">2026-01-28 13:00</td>
                            <td>
                                <a href="#" class="btn btn-sm btn-outline-primary btn-action" title="Detail"><i class="fas fa-eye"></i></a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer bg-white">
            <div class="d-flex justify-content-between align-items-center">
                <small class="text-muted">Menampilkan 1-10 dari 15 campaign</small>
                <nav>
                    <ul class="pagination pagination-sm mb-0">
                        <li class="page-item disabled"><a class="page-link" href="#">&laquo;</a></li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>

    <div class="dashboard-footer">&copy; 2026 SMM Bot Admin Dashboard. All rights reserved.</div>
</div>

<div class="modal fade" id="approveCampaignModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title"><i class="fas fa-check-circle me-2"></i>Approve Campaign</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="alert alert-info">
                    <strong>Campaign:</strong> Follow IG @store<br>
                    <strong>Client:</strong> @maria_g<br>
                    <strong>Tipe:</strong> Follow<br>
                    <strong>Budget:</strong> Rp 150.000<br>
                    <strong>Target:</strong> 100 tasks
                </div>
                <p>Campaign ini akan di-approve dan berstatus <span class="badge bg-warning text-dark">Paused</span> sampai client melakukan funding.</p>
                <div class="mb-3">
                    <label for="campaignApproveNotes" class="form-label fw-semibold">Catatan (opsional)</label>
                    <textarea class="form-control" id="campaignApproveNotes" rows="2" placeholder="Catatan..."></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-success" data-bs-dismiss="modal"><i class="fas fa-check me-1"></i> Approve Campaign</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="rejectCampaignModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title"><i class="fas fa-times-circle me-2"></i>Reject Campaign</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="alert alert-info">
                    <strong>Campaign:</strong> Follow IG @store<br>
                    <strong>Client:</strong> @maria_g
                </div>
                <div class="mb-3">
                    <label for="campaignRejectReason" class="form-label fw-semibold">Alasan Penolakan <span class="text-danger">*</span></label>
                    <textarea class="form-control" id="campaignRejectReason" rows="3" placeholder="Masukkan alasan penolakan..." required></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fas fa-times me-1"></i> Reject Campaign</button>
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script type="module" src="src/js/campaigns.js"></script>
</body>
</html>
