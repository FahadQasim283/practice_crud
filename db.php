<?php
$serverName = "localhost"; // Replace with your server name or IP
$username = "root";        // Replace with your MySQL username
$password = "";            // Replace with your MySQL password
$database = "employee";     // Replace with your database name 

$dbConnection = mysqli_connect($serverName, $username, $password, $database);
if (!$dbConnection) {
    die("Connection failed: " . mysqli_connect_error());
}

