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
    $('#selectAll').on('change', function() {
        $('.row-check').prop('checked', $(this).prop('checked'));
    });

    const getUsers = () => {
        $.ajax({
            url: 'src/api/get-users.php',
            type: 'GET',
            dataType: 'json',
            headers: {
                'Authorization': `Bearer ${auth_token}`
            },
            success: (response) => {
                if(response.returncode == 200) {
                    const total_user = response.total_user;
                    $('#total-user').text(total_user);

                    const tbody = $('#userTableBody');
                    tbody.empty();
                    
                    // Update footer display
                    const total = response.result.length;
                    $('#total-display').text(total);
                    $('#display-end').text(total > 0 ? total : 0);
                    
                    response.result.forEach((user, index) => {
                        const row = `<tr>
                            <td><input type="checkbox" class="form-check-input row-check"></td>
                            <td>${index + 1}</td>
                            <td>${user.username}</td>
                            <td>${user.full_name}</td>
                            <td>${user.chatid}</td>
                            <td>${user.status}</td>
                            <td>${user.msg_id}</td>
                            <td>${user.menu}</td>
                            <td>${user.submenu ?? '-'}</td>
                            <td>
                                <a href="user-detail.php?id=${user.id}" class="btn btn-sm btn-outline-primary btn-action me-1" title="Detail"><i class="fas fa-eye"></i></a>
                                <button class="btn btn-sm btn-outline-danger btn-action" title="Suspend"><i class="fas fa-ban"></i></button>
                            </td>
                        </tr>`;
                        tbody.append(row);
                    });
                } else if(response.returncode == 204) {
                    const tbody = $('#userTableBody');
                    tbody.html('<tr><td colspan="10" class="text-center py-4">No users found</td></tr>');
                    $('#total-display').text(0);
                    $('#display-end').text(0);
                } else {
                    console.log("Failed to fetch users: ", response.returncode);
                }
            },
            error: (xhr, status, error) => {
                console.log("Status: ", status);
                console.log("Error fetching users: ", xhr.responseText);
                console.log("Error: ", error);
            }
        });
    };
    getUsers();
});
