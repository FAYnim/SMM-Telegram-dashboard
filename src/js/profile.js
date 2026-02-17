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
