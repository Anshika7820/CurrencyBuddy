<?php
// Start session
session_start();

// Clear all session variables
$_SESSION = array();

// Destroy the session
session_destroy();

// Clear remember me cookies
setcookie('remember_token', '', time() - 3600, "/");
setcookie('user_id', '', time() - 3600, "/");

// Redirect to login page
header("Location: login.html");
exit;
?>