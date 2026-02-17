<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Audit Log - SMM Bot Admin</title>
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
        <a href="settings.php" class="nav-link"><i class="fas fa-cog"></i> Settings</a>
        <a href="audit-log.php" class="nav-link active"><i class="fas fa-clipboard-list"></i> Audit Log</a>
        <div class="sidebar-divider"></div>
        <a href="profile.php" class="nav-link"><i class="fas fa-user-circle"></i> Profil</a>
        <a href="logout.php" class="nav-link"><i class="fas fa-sign-out-alt"></i> Logout</a>
    </div>
</nav>

<div class="main-content" id="mainContent">
    <div class="page-header">
        <h1><i class="fas fa-clipboard-list me-2"></i>Audit Log</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="home.php">Dashboard</a></li>
                <li class="breadcrumb-item active">Audit Log</li>
            </ol>
        </nav>
    </div>

    <div class="filter-bar">
        <div class="row g-2 align-items-end">
            <div class="col-md-3">
                <label class="form-label small fw-semibold">Cari</label>
                <input type="text" class="form-control" placeholder="Deskripsi...">
            </div>
            <div class="col-md-2">
                <label class="form-label small fw-semibold">Admin</label>
                <select class="form-select">
                    <option value="">Semua Admin</option>
                    <option value="1">@superadmin</option>
                    <option value="2">@admin_task</option>
                    <option value="3">@admin_deposit</option>
                </select>
            </div>
            <div class="col-md-2">
                <label class="form-label small fw-semibold">Tabel</label>
                <select class="form-select">
                    <option value="">Semua Tabel</option>
                    <option value="smm_deposits">smm_deposits</option>
                    <option value="smm_withdrawals">smm_withdrawals</option>
                    <option value="smm_tasks">smm_tasks</option>
                    <option value="smm_campaigns">smm_campaigns</option>
                    <option value="smm_settings">smm_settings</option>
                    <option value="smm_users">smm_users</option>
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

    <div class="card">
        <div class="card-header">
            <i class="fas fa-table me-2"></i>Log Aktivitas Admin
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-dashboard table-hover mb-0">
                    <thead>
                        <tr>
                            <th style="width:30px"></th>
                            <th>ID</th>
                            <th>Admin</th>
                            <th>Action</th>
                            <th>Tabel</th>
                            <th>Record ID</th>
                            <th>Deskripsi</th>
                            <th>Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="expandable-row" data-target="detail-1">
                            <td><i class="fas fa-chevron-right expand-icon"></i></td>
                            <td>250</td>
                            <td><strong>@superadmin</strong></td>
                            <td><span class="badge bg-success">approve</span></td>
                            <td><code>smm_deposits</code></td>
                            <td>42</td>
                            <td>Deposit #42 approved - Rp 200.000 untuk @charlie_x</td>
                            <td class="text-muted small">2026-02-15 12:50</td>
                        </tr>
                        <tr class="detail-row" id="detail-1">
                            <td colspan="8">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <h6 class="fw-bold small text-muted mb-2">OLD DATA</h6>
                                        <div class="json-viewer">{
    "id": 42,
    "user_id": 5,
    "amount": 200000,
    "status": "pending",
    "admin_id": null,
    "processed_at": null
}</div>
                                    </div>
                                    <div class="col-md-6">
                                        <h6 class="fw-bold small text-muted mb-2">NEW DATA</h6>
                                        <div class="json-viewer">{
    "id": 42,
    "user_id": 5,
    "amount": 200000,
    "status": "approved",
    "admin_id": 1,
    "processed_at": "2026-02-15 12:50:00"
}</div>
                                    </div>
                                </div>
                            </td>
                        </tr>

                        <tr class="expandable-row" data-target="detail-2">
                            <td><i class="fas fa-chevron-right expand-icon"></i></td>
                            <td>249</td>
                            <td><strong>@superadmin</strong></td>
                            <td><span class="badge bg-danger">reject</span></td>
                            <td><code>smm_deposits</code></td>
                            <td>41</td>
                            <td>Deposit #41 rejected - Bukti tidak valid (@fiona_m)</td>
                            <td class="text-muted small">2026-02-15 11:20</td>
                        </tr>
                        <tr class="detail-row" id="detail-2">
                            <td colspan="8">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <h6 class="fw-bold small text-muted mb-2">OLD DATA</h6>
                                        <div class="json-viewer">{
    "id": 41,
    "user_id": 8,
    "amount": 50000,
    "status": "pending",
    "admin_notes": null
}</div>
                                    </div>
                                    <div class="col-md-6">
                                        <h6 class="fw-bold small text-muted mb-2">NEW DATA</h6>
                                        <div class="json-viewer">{
    "id": 41,
    "user_id": 8,
    "amount": 50000,
    "status": "rejected",
    "admin_notes": "Bukti tidak valid"
}</div>
                                    </div>
                                </div>
                            </td>
                        </tr>

                        <tr class="expandable-row" data-target="detail-3">
                            <td><i class="fas fa-chevron-right expand-icon"></i></td>
                            <td>248</td>
                            <td><strong>@superadmin</strong></td>
                            <td><span class="badge bg-success">approve</span></td>
                            <td><code>smm_withdrawals</code></td>
                            <td>25</td>
                            <td>Withdrawal #25 approved - Rp 75.000 untuk @evan_k</td>
                            <td class="text-muted small">2026-02-15 11:55</td>
                        </tr>
                        <tr class="detail-row" id="detail-3">
                            <td colspan="8">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <h6 class="fw-bold small text-muted mb-2">OLD DATA</h6>
                                        <div class="json-viewer">{
    "id": 25,
    "user_id": 7,
    "amount": 75000,
    "fee": 3750,
    "status": "pending"
}</div>
                                    </div>
                                    <div class="col-md-6">
                                        <h6 class="fw-bold small text-muted mb-2">NEW DATA</h6>
                                        <div class="json-viewer">{
    "id": 25,
    "user_id": 7,
    "amount": 75000,
    "fee": 3750,
    "status": "approved",
    "admin_id": 1,
    "processed_at": "2026-02-15 11:55:00"
}</div>
                                    </div>
                                </div>
                            </td>
                        </tr>

                        <tr class="expandable-row" data-target="detail-4">
                            <td><i class="fas fa-chevron-right expand-icon"></i></td>
                            <td>247</td>
                            <td><strong>@admin_task</strong></td>
                            <td><span class="badge bg-success">approve</span></td>
                            <td><code>smm_tasks</code></td>
                            <td>150</td>
                            <td>Task #150 approved - Like IG Post @brand oleh @john_doe</td>
                            <td class="text-muted small">2026-02-14 18:00</td>
                        </tr>
                        <tr class="detail-row" id="detail-4">
                            <td colspan="8">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <h6 class="fw-bold small text-muted mb-2">OLD DATA</h6>
                                        <div class="json-viewer">{
    "id": 150,
    "campaign_id": 9,
    "worker_id": 1,
    "status": "pending_review"
}</div>
                                    </div>
                                    <div class="col-md-6">
                                        <h6 class="fw-bold small text-muted mb-2">NEW DATA</h6>
                                        <div class="json-viewer">{
    "id": 150,
    "campaign_id": 9,
    "worker_id": 1,
    "status": "approved",
    "reviewed_at": "2026-02-14 18:00:00"
}</div>
                                    </div>
                                </div>
                            </td>
                        </tr>

                        <tr class="expandable-row" data-target="detail-5">
                            <td><i class="fas fa-chevron-right expand-icon"></i></td>
                            <td>246</td>
                            <td><strong>@superadmin</strong></td>
                            <td><span class="badge bg-info">update</span></td>
                            <td><code>smm_settings</code></td>
                            <td>3</td>
                            <td>Setting min_withdraw diubah dari 15000 ke 20000</td>
                            <td class="text-muted small">2026-02-14 16:00</td>
                        </tr>
                        <tr class="detail-row" id="detail-5">
                            <td colspan="8">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <h6 class="fw-bold small text-muted mb-2">OLD DATA</h6>
                                        <div class="json-viewer">{
    "key": "min_withdraw",
    "value": "15000",
    "category": "withdraw"
}</div>
                                    </div>
                                    <div class="col-md-6">
                                        <h6 class="fw-bold small text-muted mb-2">NEW DATA</h6>
                                        <div class="json-viewer">{
    "key": "min_withdraw",
    "value": "20000",
    "category": "withdraw"
}</div>
                                    </div>
                                </div>
                            </td>
                        </tr>

                        <tr class="expandable-row" data-target="detail-6">
                            <td><i class="fas fa-chevron-right expand-icon"></i></td>
                            <td>245</td>
                            <td><strong>@superadmin</strong></td>
                            <td><span class="badge bg-warning text-dark">suspend</span></td>
                            <td><code>smm_users</code></td>
                            <td>3</td>
                            <td>User @bob_smith di-suspend - Pelanggaran ToS</td>
                            <td class="text-muted small">2026-02-14 14:00</td>
                        </tr>
                        <tr class="detail-row" id="detail-6">
                            <td colspan="8">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <h6 class="fw-bold small text-muted mb-2">OLD DATA</h6>
                                        <div class="json-viewer">{
    "id": 3,
    "username": "bob_smith",
    "status": "active"
}</div>
                                    </div>
                                    <div class="col-md-6">
                                        <h6 class="fw-bold small text-muted mb-2">NEW DATA</h6>
                                        <div class="json-viewer">{
    "id": 3,
    "username": "bob_smith",
    "status": "suspended"
}</div>
                                    </div>
                                </div>
                            </td>
                        </tr>

                        <tr class="expandable-row" data-target="detail-7">
                            <td><i class="fas fa-chevron-right expand-icon"></i></td>
                            <td>244</td>
                            <td><strong>@admin_deposit</strong></td>
                            <td><span class="badge bg-success">approve</span></td>
                            <td><code>smm_deposits</code></td>
                            <td>37</td>
                            <td>Deposit #37 approved - Rp 500.000 untuk @maria_g</td>
                            <td class="text-muted small">2026-02-14 16:30</td>
                        </tr>
                        <tr class="detail-row" id="detail-7">
                            <td colspan="8">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <h6 class="fw-bold small text-muted mb-2">OLD DATA</h6>
                                        <div class="json-viewer">{
    "id": 37,
    "user_id": 4,
    "amount": 500000,
    "status": "pending"
}</div>
                                    </div>
                                    <div class="col-md-6">
                                        <h6 class="fw-bold small text-muted mb-2">NEW DATA</h6>
                                        <div class="json-viewer">{
    "id": 37,
    "user_id": 4,
    "amount": 500000,
    "status": "approved",
    "admin_id": 3
}</div>
                                    </div>
                                </div>
                            </td>
                        </tr>

                        <tr class="expandable-row" data-target="detail-8">
                            <td><i class="fas fa-chevron-right expand-icon"></i></td>
                            <td>243</td>
                            <td><strong>@superadmin</strong></td>
                            <td><span class="badge bg-danger">reject</span></td>
                            <td><code>smm_withdrawals</code></td>
                            <td>23</td>
                            <td>Withdrawal #23 rejected - Saldo tidak cukup (@maria_g)</td>
                            <td class="text-muted small">2026-02-14 16:00</td>
                        </tr>
                        <tr class="detail-row" id="detail-8">
                            <td colspan="8">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <h6 class="fw-bold small text-muted mb-2">OLD DATA</h6>
                                        <div class="json-viewer">{
    "status": "pending"
}</div>
                                    </div>
                                    <div class="col-md-6">
                                        <h6 class="fw-bold small text-muted mb-2">NEW DATA</h6>
                                        <div class="json-viewer">{
    "status": "rejected",
    "admin_notes": "Saldo tidak cukup"
}</div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer bg-white">
            <div class="d-flex justify-content-between align-items-center">
                <small class="text-muted">Menampilkan 1-8 dari 250 log</small>
                <nav>
                    <ul class="pagination pagination-sm mb-0">
                        <li class="page-item disabled"><a class="page-link" href="#">&laquo;</a></li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">...</a></li>
                        <li class="page-item"><a class="page-link" href="#">32</a></li>
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
<script src="src/js/audit-log.js"></script>
</script>
</body>
</html>
