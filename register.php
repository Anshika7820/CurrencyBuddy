<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database connection
$host = "localhost";
$dbUsername = "root"; // Change as needed
$dbPassword = ""; // Change as needed
$dbName = "currencybuddy";

// Create connection
$conn = new mysqli($host, $dbUsername, $dbPassword);

// Check connection
if ($conn->connect_error) {
    $response = [
        'success' => false,
        'message' => 'Database connection failed: ' . $conn->connect_error
    ];
    echo json_encode($response);
    exit();
}

// Check if database exists, if not create it
$checkDb = "SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = '$dbName'";
$result = $conn->query($checkDb);

if ($result->num_rows == 0) {
    // Database doesn't exist, create it
    $sql = "CREATE DATABASE IF NOT EXISTS $dbName";
    if ($conn->query($sql) === TRUE) {
        // Database created successfully
    } else {
        $response = [
            'success' => false,
            'message' => 'Error creating database: ' . $conn->error
        ];
        echo json_encode($response);
        exit();
    }
}

// Select the database
$conn->select_db($dbName);

// Create users table if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS users (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    fullname VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    remember_token VARCHAR(255) DEFAULT NULL,
    created_at DATETIME DEFAULT NULL,
    updated_at DATETIME DEFAULT NULL
)";

if (!$conn->query($sql) === TRUE) {
    $response = [
        'success' => false,
        'message' => 'Error creating users table: ' . $conn->error
    ];
    echo json_encode($response);
    exit();
}

// Process registration form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = $conn->real_escape_string($_POST['fullname']);
    $email = $conn->real_escape_string($_POST['email']);
    $password = $_POST['password'];
    $confirmPassword = isset($_POST['confirm-password']) ? $_POST['confirm-password'] : '';
    $terms = isset($_POST['terms']) ? true : false;
    
    // Validate input
    if (empty($fullname) || empty($email) || empty($password) || empty($confirmPassword)) {
        $response = [
            'success' => false,
            'message' => 'Please fill in all fields'
        ];
        echo json_encode($response);
        exit();
    }
    
    // Password validation
    if (strlen($password) < 8) {
        $response = [
            'success' => false,
            'message' => 'Password must be at least 8 characters long'
        ];
        echo json_encode($response);
        exit();
    }
    
    if ($password !== $confirmPassword) {
        $response = [
            'success' => false,
            'message' => 'Passwords do not match'
        ];
        echo json_encode($response);
        exit();
    }
    
    if (!$terms) {
        $response = [
            'success' => false,
            'message' => 'You must agree to the Terms of Service and Privacy Policy'
        ];
        echo json_encode($response);
        exit();
    }
    
    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $response = [
            'success' => false,
            'message' => 'Please enter a valid email address'
        ];
        echo json_encode($response);
        exit();
    }
    
    // Check if email already exists
    $sql = "SELECT id FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $response = [
            'success' => false,
            'message' => 'Email already exists. Please use a different email or login.'
        ];
        echo json_encode($response);
        exit();
    }
    
    // Hash password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    
    // Insert new user
    $sql = "INSERT INTO users (fullname, email, password, created_at) VALUES (?, ?, ?, NOW())";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $fullname, $email, $hashedPassword);
    
    if ($stmt->execute()) {
        $response = [
            'success' => true,
            'message' => 'Registration successful!',
            'redirect' => 'login.html?registered=true'
        ];
    } else {
        // Get specific database error
        $error = $stmt->error;
        $response = [
            'success' => false,
            'message' => 'Registration failed: ' . $error
        ];
    }
    
    echo json_encode($response);
    exit();
}

// If not a POST request but accessed directly
header("Location: register.html");
exit();
?>