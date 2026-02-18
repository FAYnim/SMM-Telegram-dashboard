-- =====================================================
-- Table: smm_admin_sessions
-- Description: Menyimpan data token akses untuk autentikasi admin
-- Token berlaku 7 hari setelah dibuat
-- =====================================================

CREATE TABLE IF NOT EXISTS smm_admin_sessions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    token VARCHAR(64) NOT NULL UNIQUE COMMENT 'Token akses (32 karakter hex)',
    username VARCHAR(100) NOT NULL COMMENT 'Username admin dari smm_admins',
    is_active TINYINT(1) DEFAULT 1 COMMENT 'Status token: 1=aktif, 0=tidak aktif',
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP COMMENT 'Waktu token dibuat',
    expired_at DATETIME NOT NULL COMMENT 'Waktu token kedaluwarsa (7 hari dari created_at)',
    
    INDEX idx_token (token),
    INDEX idx_username (username),
    INDEX idx_expired_at (expired_at),
    INDEX idx_is_active (is_active)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Session token untuk autentikasi admin dashboard';

-- =====================================================
-- Contoh query untuk menyimpan token saat login:
-- =====================================================

-- INSERT INTO smm_admin_sessions (token, username, expired_at)
-- VALUES ('abc123...', 'admin', DATE_ADD(NOW(), INTERVAL 7 DAY));

-- =====================================================
-- Contoh query untuk memvalidasi token:
-- =====================================================

-- SELECT * FROM smm_admin_sessions 
-- WHERE token = 'abc123...' 
-- AND is_active = 1 
-- AND expired_at > NOW();

-- =====================================================
-- Contoh query untuk menonaktifkan token (logout):
-- =====================================================

-- UPDATE smm_admin_sessions 
-- SET is_active = 0 
-- WHERE token = 'abc123...';

-- =====================================================
-- Contoh query untuk membersihkan token expired:
-- =====================================================

-- DELETE FROM smm_admin_sessions 
-- WHERE expired_at < NOW();
