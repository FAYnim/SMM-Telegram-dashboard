<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deposits - SMM Bot Admin</title>
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
        <a href="deposits.php" class="nav-link active"><i class="fas fa-money-bill-wave"></i> Deposits</a>
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
        <h1><i class="fas fa-money-bill-wave me-2"></i>Deposit Management</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="home.php">Dashboard</a></li>
                <li class="breadcrumb-item active">Deposits</li>
            </ol>
        </nav>
    </div>

    <div class="filter-bar">
        <div class="row g-2 align-items-end">
            <div class="col-md-3">
                <label class="form-label small fw-semibold">Cari</label>
                <input type="text" class="form-control" placeholder="Username..." id="searchDeposit">
            </div>
            <div class="col-md-2">
                <label class="form-label small fw-semibold">Status</label>
                <select class="form-select" id="filterStatus">
                    <option value="">Semua Status</option>
                    <option value="pending" selected>Pending</option>
                    <option value="approved">Approved</option>
                    <option value="rejected">Rejected</option>
                    <option value="canceled">Canceled</option>
                </select>
            </div>
            <div class="col-md-2">
                <label class="form-label small fw-semibold">Dari Tanggal</label>
                <input type="date" class="form-control" id="dateFrom">
            </div>
            <div class="col-md-2">
                <label class="form-label small fw-semibold">Sampai Tanggal</label>
                <input type="date" class="form-control" id="dateTo">
            </div>
            <div class="col-md-3">
                <button class="btn btn-primary w-100"><i class="fas fa-search me-1"></i> Filter</button>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <span><i class="fas fa-table me-2"></i>Daftar Deposit</span>
            <span class="badge bg-warning">8 Pending</span>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-dashboard table-hover mb-0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>User</th>
                            <th>Amount</th>
                            <th>Bukti</th>
                            <th>Status</th>
                            <th>Admin</th>
                            <th>Notes</th>
                            <th>Created</th>
                            <th>Processed</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>45</td>
                            <td><strong>@john_doe</strong></td>
                            <td class="fw-bold">Rp 100.000</td>
                            <td><img src="https://placehold.co/50x50/e9ecef/495057?text=Bukti" class="proof-thumbnail" data-bs-toggle="modal" data-bs-target="#proofModal" alt="Proof"></td>
                            <td><span class="badge bg-warning">Pending</span></td>
                            <td>-</td>
                            <td>-</td>
                            <td class="text-muted small">2026-02-15 14:30</td>
                            <td>-</td>
                            <td>
                                <button class="btn btn-sm btn-success btn-action me-1" data-bs-toggle="modal" data-bs-target="#approveModal" title="Approve"><i class="fas fa-check"></i></button>
                                <button class="btn btn-sm btn-danger btn-action" data-bs-toggle="modal" data-bs-target="#rejectModal" title="Reject"><i class="fas fa-times"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td>44</td>
                            <td><strong>@alice_w</strong></td>
                            <td class="fw-bold">Rp 50.000</td>
                            <td><img src="https://placehold.co/50x50/e9ecef/495057?text=Bukti" class="proof-thumbnail" data-bs-toggle="modal" data-bs-target="#proofModal" alt="Proof"></td>
                            <td><span class="badge bg-warning">Pending</span></td>
                            <td>-</td>
                            <td>-</td>
                            <td class="text-muted small">2026-02-15 13:50</td>
                            <td>-</td>
                            <td>
                                <button class="btn btn-sm btn-success btn-action me-1" data-bs-toggle="modal" data-bs-target="#approveModal" title="Approve"><i class="fas fa-check"></i></button>
                                <button class="btn btn-sm btn-danger btn-action" data-bs-toggle="modal" data-bs-target="#rejectModal" title="Reject"><i class="fas fa-times"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td>43</td>
                            <td><strong>@diana_r</strong></td>
                            <td class="fw-bold">Rp 200.000</td>
                            <td><img src="https://placehold.co/50x50/e9ecef/495057?text=Bukti" class="proof-thumbnail" data-bs-toggle="modal" data-bs-target="#proofModal" alt="Proof"></td>
                            <td><span class="badge bg-warning">Pending</span></td>
                            <td>-</td>
                            <td>-</td>
                            <td class="text-muted small">2026-02-15 12:15</td>
                            <td>-</td>
                            <td>
                                <button class="btn btn-sm btn-success btn-action me-1" data-bs-toggle="modal" data-bs-target="#approveModal" title="Approve"><i class="fas fa-check"></i></button>
                                <button class="btn btn-sm btn-danger btn-action" data-bs-toggle="modal" data-bs-target="#rejectModal" title="Reject"><i class="fas fa-times"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td>42</td>
                            <td><strong>@charlie_x</strong></td>
                            <td class="fw-bold">Rp 200.000</td>
                            <td><img src="https://placehold.co/50x50/d4edda/155724?text=OK" class="proof-thumbnail" data-bs-toggle="modal" data-bs-target="#proofModal" alt="Proof"></td>
                            <td><span class="badge bg-success">Approved</span></td>
                            <td>@superadmin</td>
                            <td>Sesuai bukti</td>
                            <td class="text-muted small">2026-02-15 11:00</td>
                            <td class="text-muted small">2026-02-15 12:50</td>
                            <td>
                                <button class="btn btn-sm btn-outline-secondary btn-action" disabled><i class="fas fa-check-double"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td>41</td>
                            <td><strong>@fiona_m</strong></td>
                            <td class="fw-bold">Rp 50.000</td>
                            <td><img src="https://placehold.co/50x50/f8d7da/842029?text=X" class="proof-thumbnail" data-bs-toggle="modal" data-bs-target="#proofModal" alt="Proof"></td>
                            <td><span class="badge bg-danger">Rejected</span></td>
                            <td>@superadmin</td>
                            <td>Bukti tidak valid</td>
                            <td class="text-muted small">2026-02-15 09:30</td>
                            <td class="text-muted small">2026-02-15 11:20</td>
                            <td>
                                <button class="btn btn-sm btn-outline-secondary btn-action" disabled><i class="fas fa-ban"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td>40</td>
                            <td><strong>@evan_k</strong></td>
                            <td class="fw-bold">Rp 75.000</td>
                            <td><img src="https://placehold.co/50x50/e9ecef/495057?text=Bukti" class="proof-thumbnail" data-bs-toggle="modal" data-bs-target="#proofModal" alt="Proof"></td>
                            <td><span class="badge bg-warning">Pending</span></td>
                            <td>-</td>
                            <td>-</td>
                            <td class="text-muted small">2026-02-14 22:10</td>
                            <td>-</td>
                            <td>
                                <button class="btn btn-sm btn-success btn-action me-1" data-bs-toggle="modal" data-bs-target="#approveModal" title="Approve"><i class="fas fa-check"></i></button>
                                <button class="btn btn-sm btn-danger btn-action" data-bs-toggle="modal" data-bs-target="#rejectModal" title="Reject"><i class="fas fa-times"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td>39</td>
                            <td><strong>@hannah_p</strong></td>
                            <td class="fw-bold">Rp 150.000</td>
                            <td><img src="https://placehold.co/50x50/e9ecef/495057?text=Bukti" class="proof-thumbnail" data-bs-toggle="modal" data-bs-target="#proofModal" alt="Proof"></td>
                            <td><span class="badge bg-warning">Pending</span></td>
                            <td>-</td>
                            <td>-</td>
                            <td class="text-muted small">2026-02-14 20:45</td>
                            <td>-</td>
                            <td>
                                <button class="btn btn-sm btn-success btn-action me-1" data-bs-toggle="modal" data-bs-target="#approveModal" title="Approve"><i class="fas fa-check"></i></button>
                                <button class="btn btn-sm btn-danger btn-action" data-bs-toggle="modal" data-bs-target="#rejectModal" title="Reject"><i class="fas fa-times"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td>38</td>
                            <td><strong>@bob_smith</strong></td>
                            <td class="fw-bold">Rp 300.000</td>
                            <td><img src="https://placehold.co/50x50/e9ecef/495057?text=Bukti" class="proof-thumbnail" data-bs-toggle="modal" data-bs-target="#proofModal" alt="Proof"></td>
                            <td><span class="badge bg-warning">Pending</span></td>
                            <td>-</td>
                            <td>-</td>
                            <td class="text-muted small">2026-02-14 18:20</td>
                            <td>-</td>
                            <td>
                                <button class="btn btn-sm btn-success btn-action me-1" data-bs-toggle="modal" data-bs-target="#approveModal" title="Approve"><i class="fas fa-check"></i></button>
                                <button class="btn btn-sm btn-danger btn-action" data-bs-toggle="modal" data-bs-target="#rejectModal" title="Reject"><i class="fas fa-times"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td>37</td>
                            <td><strong>@maria_g</strong></td>
                            <td class="fw-bold">Rp 500.000</td>
                            <td><img src="https://placehold.co/50x50/d4edda/155724?text=OK" class="proof-thumbnail" data-bs-toggle="modal" data-bs-target="#proofModal" alt="Proof"></td>
                            <td><span class="badge bg-success">Approved</span></td>
                            <td>@superadmin</td>
                            <td>OK</td>
                            <td class="text-muted small">2026-02-14 15:00</td>
                            <td class="text-muted small">2026-02-14 16:30</td>
                            <td>
                                <button class="btn btn-sm btn-outline-secondary btn-action" disabled><i class="fas fa-check-double"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td>36</td>
                            <td><strong>@george_l</strong></td>
                            <td class="fw-bold">Rp 100.000</td>
                            <td><img src="https://placehold.co/50x50/e2e3e5/41464b?text=-" class="proof-thumbnail" data-bs-toggle="modal" data-bs-target="#proofModal" alt="Proof"></td>
                            <td><span class="badge bg-secondary">Canceled</span></td>
                            <td>-</td>
                            <td>Dibatalkan user</td>
                            <td class="text-muted small">2026-02-14 12:00</td>
                            <td>-</td>
                            <td>
                                <button class="btn btn-sm btn-outline-secondary btn-action" disabled><i class="fas fa-minus"></i></button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer bg-white">
            <div class="d-flex justify-content-between align-items-center">
                <small class="text-muted">Menampilkan 1-10 dari 45 deposit</small>
                <nav>
                    <ul class="pagination pagination-sm mb-0">
                        <li class="page-item disabled"><a class="page-link" href="#">&laquo;</a></li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">4</a></li>
                        <li class="page-item"><a class="page-link" href="#">5</a></li>
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
                <h5 class="modal-title"><i class="fas fa-image me-2"></i>Bukti Transfer</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body text-center">
                <img src="https://placehold.co/400x600/e9ecef/495057?text=Bukti+Transfer" class="img-fluid rounded" alt="Proof Image" style="max-height:500px;">
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="approveModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title"><i class="fas fa-check-circle me-2"></i>Approve Deposit</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="alert alert-info">
                    <strong>User:</strong> @john_doe<br>
                    <strong>Amount Diminta:</strong> Rp 100.000
                </div>
                <div class="mb-3">
                    <label for="approveAmount" class="form-label fw-semibold">Jumlah yang Di-approve (Rp)</label>
                    <input type="number" class="form-control" id="approveAmount" value="100000" placeholder="Masukkan jumlah yang sesuai bukti">
                    <div class="form-text">Masukkan jumlah sesuai bukti transfer yang dikirim user.</div>
                </div>
                <div class="mb-3">
                    <label for="approveNotes" class="form-label fw-semibold">Catatan (opsional)</label>
                    <textarea class="form-control" id="approveNotes" rows="2" placeholder="Catatan tambahan..."></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-success" data-bs-dismiss="modal"><i class="fas fa-check me-1"></i> Approve Deposit</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="rejectModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title"><i class="fas fa-times-circle me-2"></i>Reject Deposit</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="alert alert-info">
                    <strong>User:</strong> @john_doe<br>
                    <strong>Amount:</strong> Rp 100.000
                </div>
                <div class="mb-3">
                    <label for="rejectReason" class="form-label fw-semibold">Alasan Penolakan <span class="text-danger">*</span></label>
                    <textarea class="form-control" id="rejectReason" rows="3" placeholder="Masukkan alasan penolakan..." required></textarea>
                    <div class="form-text">Alasan ini akan dikirim ke user via Telegram.</div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fas fa-times me-1"></i> Reject Deposit</button>
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script type="module" src="src/js/deposits.js"></script>
</body>
</html>
