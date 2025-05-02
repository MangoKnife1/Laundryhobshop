<?php
session_start();
include 'connection.php';

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if (empty($username) || empty($password)) {
        showError("Username and password are required.");
    }

    // Look up user in DB
    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if user exists
    if ($result && $result->num_rows === 1) {
        $user = $result->fetch_assoc();

        // Simple password comparison (since passwords are not hashed)
        if ($password === $user['password']) {
            // Password is correct, set session variables
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            
            // Set a success flag to show SweetAlert on dashboard
            $_SESSION['login_success'] = true;
            
            // Redirect to dashboard (adjust path as needed)
            header("Location: ../pages/dashboard.php");
            exit;
        } else {
            // Password mismatch
            showError("Invalid username or password.");
        }
    } else {
        // User does not exist
        showError("Invalid username or password.");
    }
}

// SweetAlert error handler
function showError($message) {
    $_SESSION['login_error'] = $message;
    header("Location: ../index.php");
    exit;
}
?>
