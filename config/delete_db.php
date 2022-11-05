<?php
include "config.php";


// Create connection
$conn = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Delete database
$sql = "DROP DATABASE ".DB_DATABASE_NAME." ;";
if (mysqli_query($conn, $sql)) {
  echo "Database ".DB_DATABASE_NAME." deleted successfully";
} else {
  echo "Error deleting database: " . mysqli_error($conn);
}

mysqli_close($conn);
?>