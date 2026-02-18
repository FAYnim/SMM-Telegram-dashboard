import { CookieManager } from "./auth-middleware.js";

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

    $("#btn-login").on('click', (e) => {
        e.preventDefault();
        handleLogin();
    });

    const handleLogin = function () {
        const username = $('#username').val();
        const password = $('#password').val();

        const isUsername = username !== "" ? true : false;
        const isPassword = password !== "" ? true : false;

        if(isUsername && isPassword) {
            $.ajax({
                url: 'src/api/login.php',
                type: 'POST',
                dataType: 'json',
                data: {'username': username, 'password': password},
                success: (response) => {
                    if(response.returncode == 200) {
                        console.log("Login Success");
                    } else {
                        console.log("Login Wrong");
                    }
                },
                error: (xhr) => {
                    console.log("Login failed:", xhr.responseText)
                }
            });
        } else {
            alert("Fill all the inputs!");
        }
    }
});
