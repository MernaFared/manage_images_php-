<?php
include "./dbconnection.php";  

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $is_active = 0; // Default value for is_active

    // You should also perform validation, sanitation, and hashing of the password for security.

    $query = "INSERT INTO users (full_name, username, email, password, active) VALUES ('$fullname', '$username', '$email', '$password', $is_active)";

    if (mysqli_query($mysqli, $query)) {
        // Registration successful
        header("Location: /index.php"); 
        exit();
    } else {
        // Registration failed
        echo "Registration failed: " . mysqli_error($mysqli);
    }
}
?>
