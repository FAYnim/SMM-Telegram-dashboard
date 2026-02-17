<?php
/**
 * SMM Bot Admin Dashboard - Entry Point
 * Redirects to login page or dashboard home
 */
session_start();

// If admin is logged in, redirect to dashboard
if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true) {
    header('Location: home.php');
    exit;
}

// Otherwise, redirect to login
header('Location: login.php');
exit;
