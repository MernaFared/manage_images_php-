<?php
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'un_project';
$mysqli = new mysqli($host, $username, $password, $database);

// Check for errors in the connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}
?>
