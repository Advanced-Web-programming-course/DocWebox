<?php
include "config.php";


// Create connection
$conn = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Create database
$sql = "CREATE DATABASE ".DB_DATABASE_NAME." CHARACTER SET utf8 COLLATE utf8_general_ci;";
if (mysqli_query($conn, $sql)) {
  echo "Database ".DB_DATABASE_NAME." created successfully";
} else {
  echo "Error creating database: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
