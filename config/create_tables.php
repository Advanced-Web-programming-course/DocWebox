<?php
include "config.php";
include "connect_to_db.php";

//------------- Create Tables

// Create Table Patient
$sql = "CREATE TABLE IF NOT EXISTS patient (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    fullname VARCHAR(150) NOT NULL,
    phone_num VARCHAR(50) NOT NULL,
    email VARCHAR(150) UNIQUE NOT NULL,
    pword VARCHAR(150) UNIQUE NOT NULL,
    img_url TEXT NOT NULL
    )";
if (mysqli_query($conn, $sql)) {
  echo "Table patient created successfully";
} else {
  echo "Error creating table patient: " . mysqli_error($conn);
}
echo"<br>";

// Create Table doctor
$sql = "CREATE TABLE IF NOT EXISTS doctor (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    fullname VARCHAR(150) NOT NULL,
    phone_num VARCHAR(50) NOT NULL,
    email VARCHAR(150) UNIQUE NOT NULL,
    pword VARCHAR(150) UNIQUE NOT NULL,
    address VARCHAR(150) UNIQUE NOT NULL,
    rigion INT NOT NULL,
    specialisation_id INT NOT NULL,
    doctor_description VARCHAR(150) NOT NULL,
    img_url TEXT NOT NULL
    )";
if (mysqli_query($conn, $sql)) {
  echo "Table doctor created successfully";
} else {
  echo "Error creating table doctor: " . mysqli_error($conn);
}
echo"<br>";

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
echo"<br>";

// Create Table service
$sql = "CREATE TABLE IF NOT EXISTS doctor_service (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(150) NOT NULL,
    price FLOAT NOT NULL,
    specialisation_id VARCHAR(150) NOT NULL
    )";
if (mysqli_query($conn, $sql)) {
  echo "Table service created successfully";
} else {
  echo "Error creating table service: " . mysqli_error($conn);
}
echo"<br>";

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
echo"<br>";

// Create Table admin
$sql = "CREATE TABLE IF NOT EXISTS admin (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  email VARCHAR(150) UNIQUE NOT NULL,
  pword VARCHAR(150) UNIQUE NOT NULL
  )";
if (mysqli_query($conn, $sql)) {
echo "Table admin created successfully";
} else {
echo "Error admin table review: " . mysqli_error($conn);
}
echo"<br>";

mysqli_close($conn);
?>