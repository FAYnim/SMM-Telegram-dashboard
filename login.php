<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - SMM Bot Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
    <link href="src/css/style.css" rel="stylesheet">
</head>
<body>

<div class="login-wrapper">
    <div class="card login-card">
        <div class="card-body text-center">
            <div class="login-logo">
                <i class="fas fa-robot"></i>
            </div>
            <h4 class="login-title mb-1">SMM Bot Dashboard</h4>
            <p class="login-subtitle mb-4">Masuk ke panel admin</p>

            <div id="loginAlert" class="alert alert-danger d-none" role="alert">
                <i class="fas fa-exclamation-circle me-1"></i>
                <span id="loginAlertText">Username atau password salah.</span>
            </div>

            <form id="loginForm" method="POST" action="home.php">
                <div class="mb-3 text-start">
                    <label for="username" class="form-label fw-semibold">
                        <i class="fas fa-user me-1 text-muted"></i> Username
                    </label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan username" required autofocus>
                </div>
                <div class="mb-3 text-start">
                    <label for="password" class="form-label fw-semibold">
                        <i class="fas fa-lock me-1 text-muted"></i> Password
                    </label>
                    <div class="input-group">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan password" required>
                        <button class="btn btn-outline-secondary" type="button" id="togglePassword">
                            <i class="fas fa-eye"></i>
                        </button>
                    </div>
                </div>
                <div class="mb-4 d-flex justify-content-between align-items-center">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="rememberMe" name="remember">
                        <label class="form-check-label small" for="rememberMe">Ingat saya</label>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-login w-100">
                    <i class="fas fa-sign-in-alt me-1"></i> Masuk
                </button>
            </form>

            <div class="mt-4 text-muted small">
                &copy; 2026 SMM Bot Dashboard. All rights reserved.
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
$(document).ready(function() {
    $('#togglePassword').on('click', function() {
        const input = $('#password');
        const icon = $(this).find('i');
        if (input.attr('type') === 'password') {
            input.attr('type', 'text');
            icon.removeClass('fa-eye').addClass('fa-eye-slash');
        } else {
            input.attr('type', 'password');
            icon.removeClass('fa-eye-slash').addClass('fa-eye');
        }
    });
});
</script>
</body>
</html>
