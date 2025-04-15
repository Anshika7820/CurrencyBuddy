<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Start session
session_start();

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

// Check if database exists
$checkDb = "SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = '$dbName'";
$result = $conn->query($checkDb);

if ($result->num_rows == 0) {
    $response = [
        'success' => false,
        'message' => 'Database does not exist. Please run db_setup.php first.'
    ];
    echo json_encode($response);
    exit();
}

// Select the database
$conn->select_db($dbName);

// Process login form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $conn->real_escape_string($_POST['email']);
    $password = $_POST['password'];
    
    // Remember me checkbox
    $remember = isset($_POST['remember']) ? true : false;
    
    // Validate input
    if (empty($email) || empty($password)) {
        $response = [
            'success' => false,
            'message' => 'Please fill in all fields'
        ];
        echo json_encode($response);
        exit();
    }
    
    // Check if email exists
    $sql = "SELECT id, fullname, email, password FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();
        
        // Verify password
        if (password_verify($password, $user['password'])) {
            // Set session variables
            $_SESSION['loggedin'] = true;
            $_SESSION['id'] = $user['id'];
            $_SESSION['fullname'] = $user['fullname'];
            $_SESSION['email'] = $user['email'];
            
            // Set cookie if "remember me" is checked
            if ($remember) {
                $token = bin2hex(random_bytes(16));
                $hashedToken = password_hash($token, PASSWORD_DEFAULT);
                
                // Store token in database
                $sql = "UPDATE users SET remember_token = ? WHERE id = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("si", $hashedToken, $user['id']);
                $stmt->execute();
                
                // Set cookie to expire in 30 days
                setcookie('remember_token', $token, time() + (86400 * 30), "/");
                setcookie('user_id', $user['id'], time() + (86400 * 30), "/");
            }
            
            $response = [
                'success' => true,
                'message' => 'Login successful',
                'redirect' => 'homepage.php'
            ];
        } else {
            $response = [
                'success' => false,
                'message' => 'Invalid email or password'
            ];
        }
    } else {
        $response = [
            'success' => false,
            'message' => 'Invalid email or password'
        ];
    }
    
    echo json_encode($response);
    exit();
}

// If not a POST request but accessed directly
header("Location: login.html");
exit();
?>