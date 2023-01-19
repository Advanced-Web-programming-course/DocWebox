<?php
include "../controllers/auth_controller.php";
include "../db_services/doctor_service.php";
ensure_auth();

include "../config/db_connection.php";
$logged_user = get_loggedin_user($conn, $_SESSION['type'], $_SESSION['id']);


//get doctor's id from seraching_for_doctors.php
$doctor_id = $_GET['doctor_id'];
$doctor = select_doctor_by_id($conn, $doctor_id);


if ($_SERVER['REQUEST_METHOD'] === "POST") {

    if ($_SESSION['type'] == "d") {
        echo "alert('Doctor cannot book an appointment');";
    }

    $patient_id = $logged_user['id'];
    $serviceId = $_POST["service-id"];
    $date = $_POST["date"];

    $dateArray = explode("/", $date);
    $day = $dateArray[0];
    $month = $dateArray[1];
    $year = $dateArray[2];

    $time = $_POST["time"];
    $temp = explode(" ", $time);
    $hour = (int)explode(":", $temp[0])[0];

    if ($temp[1] === "PM") {
        if ($hour === 1) {
            $hour = 13;
        } else if ($hour === 2) {
            $hour = 14;
        } else if ($hour === 3) {
            $hour = 15;
        } else if ($hour === 4) {
            $hour = 16;
        } else if ($hour === 5) {
            $hour = 17;
        }
    }
}



?>

<!DOCTYPE html>
<html>

<head>
    <title>Doctor Selected</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/doctor_selected/doctor_selected.css">
    <link rel="stylesheet" href="../css/doctor_selected/all_services.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

    <!-- Bootstrap, Ajax -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Bootstrap Datepicker -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

    <!-- expiriement time picker -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/timepicker@1.14.0/jquery.timepicker.min.css">
    <script src="https://cdn.jsdelivr.net/npm/timepicker@1.14.0/jquery.timepicker.min.js"></script>


    <script src="https://kit.fontawesome.com/d2c306d566.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/modals.css">
</head>

<body>
    <?php
    include "../components/header.php";
    display_default_header($logged_user['full_name']);
    echo "<div class='con'>";
    include "../components/doctor_selected.php";
    display_doctor_selected_section($doctor['full_name'], $doctor['specialization'], $doctor['address'], $doctor['region'], $doctor['description'], $doctor['img_url']);
    include "../components/all_services.php";
    $services = select_services_by_specialization($conn, $doctor["specialization"]);
    display_all_services($services);
    echo "</div>";
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>