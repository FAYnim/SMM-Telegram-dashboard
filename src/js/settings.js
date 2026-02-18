import { CookieManager } from "./auth-middleware.js";

$(document).ready(function() {

    const auth_token = CookieManager.get("auth_token");
    if(!auth_token) {
        window.location.href = "login.php";
    } else {
        $.ajax({
            url: 'src/api/auth-middleware.php',
            type: 'POST',
            dataType: 'json',
            data: {'auth_token': auth_token},
            success: (response) => {
                if(response.returncode == 200) {
                    console.log("User Logged In");
                } else {
                    window.location.href = "login.php";
                }
            },
            error: (xhr, status, error) => {
                console.log("Status: ", status);
                console.log("Login failed: ", xhr.responseText);
                console.log("Error: ", error);
            }
        });
    }

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

    $('input[name="feeType"]').on('change', function() {
        if ($(this).val() === 'flat') {
            $('#feeTypeLabel').text('Rp (Flat)');
        } else {
            $('#feeTypeLabel').text('% (Persen)');
        }
    });

    $('#referralMandatory').on('change', function() {
        if ($(this).is(':checked')) {
            $('#referralLabel').html('<span class="badge bg-success">Aktif</span> - User wajib memasukkan kode referral saat registrasi');
        } else {
            $('#referralLabel').html('<span class="badge bg-secondary">Nonaktif</span> - User dapat skip kode referral');
        }
    });

    $('.btn-save-settings').on('click', function() {
        const btn = $(this);
        const originalText = btn.html();
        btn.html('<i class="fas fa-spinner fa-spin me-1"></i> Menyimpan...').prop('disabled', true);
        
        setTimeout(function() {
            btn.html('<i class="fas fa-check me-1"></i> Tersimpan!').removeClass('btn-primary').addClass('btn-success');
            $('#settingsSaved').removeClass('d-none');
            
            setTimeout(function() {
                btn.html(originalText).removeClass('btn-success').addClass('btn-primary').prop('disabled', false);
                $('#settingsSaved').addClass('d-none');
            }, 2000);
        }, 800);
    });
});
