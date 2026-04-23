<?php
$host     = "localhost";
$user     = "root";
$password = "";
$database = "inventory_db";

$conn = mysqli_connect($host, $user, $password, $database);

if (!$conn) {
    die("<p style='color:red;'>Connection failed: " . mysqli_connect_error() . "</p>");
}


mysqli_query($conn, "CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(100) NOT NULL
)");

mysqli_query($conn, "CREATE TABLE IF NOT EXISTS persons (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    age INT NOT NULL,
    address VARCHAR(255) NOT NULL
)");


$check = mysqli_query($conn, "SELECT * FROM users WHERE username = 'admin'");
if (mysqli_num_rows($check) == 0) {
    mysqli_query($conn, "INSERT INTO users (username, password) VALUES ('admin', 'admin123')");
}
?>
