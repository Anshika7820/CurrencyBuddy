<?php
// Start session
session_start();

// Check if user is logged in
function isLoggedIn() {
    // Check session first
    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
        return true;
    }
    
    // Check for remember me cookie
    if (isset($_COOKIE['remember_token']) && isset($_COOKIE['user_id'])) {
        // Database connection
        $host = "localhost";
        $dbUsername = "root"; // Change as needed
        $dbPassword = ""; // Change as needed
        $dbName = "currencybuddy";
        
        $conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);
        
        if ($conn->connect_error) {
            return false;
        }
        
        $userId = $conn->real_escape_string($_COOKIE['user_id']);
        
        // Get the user
        $sql = "SELECT id, fullname, email, remember_token FROM users WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $userId);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows == 1) {
            $user = $result->fetch_assoc();
            
            // Verify token
            if ($user['remember_token'] && password_verify($_COOKIE['remember_token'], $user['remember_token'])) {
                // Set session variables
                $_SESSION['loggedin'] = true;
                $_SESSION['id'] = $user['id'];
                $_SESSION['fullname'] = $user['fullname'];
                $_SESSION['email'] = $user['email'];
                
                return true;
            }
        }
        
        // If we get here, the cookies are invalid
        setcookie('remember_token', '', time() - 3600, "/");
        setcookie('user_id', '', time() - 3600, "/");
    }
    
    return false;
}

// Function to redirect if not logged in
function requireLogin() {
    if (!isLoggedIn()) {
        header("Location: login.html");
        exit;
    }
}

// Function to redirect if already logged in
function redirectIfLoggedIn() {
    if (isLoggedIn()) {
        header("Location: Homepage.html");
        exit;
    }
}
?>