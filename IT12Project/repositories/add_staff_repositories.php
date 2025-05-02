<?php
session_start();

// Check authentication
if (!isset($_SESSION['user_id'])) {
    header("Location:login.php");
    exit;
}

// Database connection
require_once('connection.php');

// Initialize error/success messages
$_SESSION['error'] = '';
$_SESSION['success'] = '';

try {
    // Validate required fields
    $required = ['first_name', 'last_name', 'email', 'phone', 'dob', 'hire_date', 'job_title', 'status', 'address'];
    foreach ($required as $field) {
        if (empty($_POST[$field])) {
            throw new Exception("All fields are required!");
        }
    }


    $first_name = mysqli_real_escape_string($conn, trim($_POST['first_name']));
    $last_name = mysqli_real_escape_string($conn, trim($_POST['last_name']));
    $email = mysqli_real_escape_string($conn, trim($_POST['email']));
    $phone = mysqli_real_escape_string($conn, trim($_POST['phone']));
    $dob = mysqli_real_escape_string($conn, $_POST['dob']);
    $hire_date = mysqli_real_escape_string($conn, $_POST['hire_date']);
    $job_title = mysqli_real_escape_string($conn, $_POST['job_title']);
    $status = mysqli_real_escape_string($conn, $_POST['status']);
    $address = mysqli_real_escape_string($conn, trim($_POST['address']));

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        throw new Exception("Invalid email format!");
    }

    // Validate phone number
    if (!preg_match('/^[0-9]{11}$/', $phone)) {
        throw new Exception("Phone number must be 11 digits!");
    }

    // Check if email already exists
    $check_email = "SELECT staff_id FROM staff WHERE email = '$email'";
    $result = mysqli_query($conn, $check_email);
    if (mysqli_num_rows($result) > 0) {
        throw new Exception("Email already exists!");
    }

    // Insert into database
    $query = "INSERT INTO staff (
        first_name, 
        last_name, 
        email, 
        phone_number, 
        date_of_birth, 
        hire_date, 
        job_title, 
        status, 
        address, 
        created_at
    ) VALUES (
        '$first_name',
        '$last_name',
        '$email',
        '$phone',
        '$dob',
        '$hire_date',
        '$job_title',
        '$status',
        '$address',
        NOW()
    )";

    if (mysqli_query($conn, $query)) {
        $_SESSION['success'] = "Staff member added successfully!";
    } else {
        throw new Exception("Database error: " . mysqli_error($conn));
    }

} catch (Exception $e) {
    $_SESSION['error'] = $e->getMessage();
} finally {
    mysqli_close($conn);
    header("Location: ../pages/staff.php");
    exit;
}