<?php
// Database configuration
$host = 'localhost';
$dbname = 'ecom';
$username = 'root';
$password = 'admin';

// Create connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// echo"connect";
?>