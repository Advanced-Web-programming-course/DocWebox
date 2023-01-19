<?php
include "config.php";

$conn = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Create database
$sql = "CREATE DATABASE IF NOT EXISTS " . DB_DATABASE_NAME . " CHARACTER SET utf8 COLLATE utf8_general_ci;";
if (mysqli_query($conn, $sql)) {
  echo "Database " . DB_DATABASE_NAME . " created successfully";
} else {
  echo "Error creating database: " . mysqli_error($conn);
}

$conn = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DATABASE_NAME);



//------------- Create Tables

// Create Table Patient
$sql = "CREATE TABLE IF NOT EXISTS patient (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    full_name VARCHAR(150) NOT NULL,
    phone VARCHAR(50) NOT NULL,
    email VARCHAR(150) UNIQUE NOT NULL,
    password VARCHAR(150) UNIQUE NOT NULL,
    img_url TEXT NOT NULL
    )";
if (mysqli_query($conn, $sql)) {
  echo "Table patient created successfully";
} else {
  echo "Error creating table patient: " . mysqli_error($conn);
}
echo "<br>";

// Create Table doctor
$sql = "CREATE TABLE IF NOT EXISTS doctor (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    full_name VARCHAR(150) NOT NULL,
    phone VARCHAR(50) NOT NULL,
    email VARCHAR(150) UNIQUE NOT NULL,
    password VARCHAR(150) UNIQUE NOT NULL,
    address VARCHAR(150) UNIQUE NOT NULL,
    region VARCHAR(150) NOT NULL,
    specialization VARCHAR(150) NOT NULL,
    description VARCHAR(150) NOT NULL,
    img_url TEXT NOT NULL
    )";
if (mysqli_query($conn, $sql)) {
  echo "Table doctor created successfully";
} else {
  echo "Error creating table doctor: " . mysqli_error($conn);
}
echo "<br>";

$sql = "CREATE TABLE IF NOT EXISTS `docwebox`.`availability` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `doctor_id` INT NOT NULL,
  `day` INT NOT NULL,
  `month` INT NOT NULL,
  `year` INT NOT NULL,
  `hour` INT NOT NULL,
   PRIMARY KEY (`id`)) ENGINE = InnoDB;";

if (mysqli_query($conn, $sql)) {
  echo "Table doctor created successfully";
} else {
  echo "Error creating table availability: " . mysqli_error($conn);
}
echo "<br>";


// Create Table appointment
$sql = "CREATE TABLE IF NOT EXISTS appointment (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    patient_id INT NOT NULL,
    doctor_id INT NOT NULL,
    appointment_date DATETIME NOT NULL ,
    service_id INT NOT NULL
    )";
if (mysqli_query($conn, $sql)) {
  echo "Table appointment created successfully";
} else {
  echo "Error creating table appointment: " . mysqli_error($conn);
}
echo "<br>";

// Create Table service
$sql = "CREATE TABLE IF NOT EXISTS service (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(150) NOT NULL,
    price FLOAT NOT NULL,
    specialization VARCHAR(150) NOT NULL
    )";
if (mysqli_query($conn, $sql)) {
  echo "Table service created successfully";
} else {
  echo "Error creating table service: " . mysqli_error($conn);
}
echo "<br>";

// Create Table review
$sql = "CREATE TABLE IF NOT EXISTS review (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  patient_id INT NOT NULL,
  doctor_id INT NOT NULL,
  rating INT NOT NULL,
  comment VARCHAR(150) NOT NULL
  )";

if (mysqli_query($conn, $sql)) {
  echo "Table review created successfully";
} else {
  echo "Error creating table review: " . mysqli_error($conn);
}
echo "<br>";

// Create Table admin
$sql = "CREATE TABLE IF NOT EXISTS admin (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  full_name VARCHAR(150) NOT NULL,
  email VARCHAR(150) UNIQUE NOT NULL,
  password VARCHAR(150) UNIQUE NOT NULL
  )";

if (mysqli_query($conn, $sql)) {
  echo "Table admin created successfully";
} else {
  echo "Error admin table review: " . mysqli_error($conn);
}
echo "<br>";



// insert dummy data
require_once "insert_initial_data.php";

mysqli_close($conn);
