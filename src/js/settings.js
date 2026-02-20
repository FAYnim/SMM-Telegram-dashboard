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

    const disableFormInputs = () => {
        $('#paymentForm input[type="text"]').val('loading...').prop('disabled', true);
        
        $('#withdrawForm input[type="number"]').val(0).prop('disabled', true);
        $('#campaignForm input[type="number"]').val(0).prop('disabled', true);
        $('#referralForm input[type="number"]').val(0).prop('disabled', true);
        
        $('#withdrawForm input[type="radio"]').prop('checked', false).prop('disabled', true);
        
        $('#referralForm input[type="checkbox"]').prop('checked', false).prop('disabled', true);
        
        $('#paymentForm select').prop('disabled', true);
        $('#withdrawForm select').prop('disabled', true);
        $('#campaignForm select').prop('disabled', true);
        $('#referralForm select').prop('disabled', true);
        
        $('form textarea').val('loading...').prop('disabled', true);
    };

    const getSettings = () => {
        disableFormInputs();
        
        $.ajax({
            url: 'src/api/get-settings.php',
            type: 'GET',
            dataType: 'json',
            success: function(response) {
                if (response.returncode === 200) {
                    const settings = response.result;
                    settings.forEach(setting => {
                        if(setting.setting_key === 'admin_fee_type') {
                            $('input[name="feeType"][value="' + setting.setting_value + '"]').prop('checked', true).trigger('change');
                        } else if(setting.setting_key === 'referral_mandatory') {
                            if(setting.setting_value === '1') {
                                $('#referralMandatory').prop('checked', true);
                            } else {
                                $('#referralMandatory').prop('checked', false);
                            }
                        } else {
                            $("#" + setting.setting_key).val(setting.setting_value);
                        }
                    });
                } else {
                    console.error('Failed to load settings: ' + response.message);
                }
            },
            error: function(xhr, status, error) {
                console.error('Error loading settings: ' + error);
            }
        });
    };
    getSettings();


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
