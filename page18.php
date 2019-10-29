<?php
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = mysqli_connect($servername, $username, $password);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Create database
$sql1 = "CREATE DATABASE myDB";

// Delete database
$sql2 = "DROP DATABASE myDB";

if (mysqli_query($conn, $sql1)) {
    echo "Database myDB created successfully";
} else {
    echo "Error creating database: " . mysqli_error($conn);
}

mysqli_close($conn);
?>