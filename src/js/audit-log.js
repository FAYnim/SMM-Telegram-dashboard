import { CookieManager } from "./auth-middleware.js";

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

    $('.expandable-row').on('click', function() {
        const targetId = $(this).data('target');
        const detailRow = $('#' + targetId);
        const icon = $(this).find('.expand-icon');
        
        detailRow.toggleClass('show');
        icon.toggleClass('rotated');
    });
});
