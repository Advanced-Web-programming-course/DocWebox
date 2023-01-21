<?php
require_once "../config/db_connection.php";
require_once "../db_services/availability_service.php";

$doctor_id = $_GET["doctor_id"];
$day = $_GET["day"];
$month = $_GET["month"];
$year = $_GET["year"];

echo  json_encode(get_non_available_hours($conn, $doctor_id, $day, $month, $year));
