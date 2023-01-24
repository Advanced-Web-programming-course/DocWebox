<?php
include "../controllers/auth_controller.php";
ensure_auth();
include "../config/db_connection.php";
include "../db_services/appointment_service.php";

$logged_user = get_loggedin_user($conn, $_SESSION['type'], $_SESSION['id']);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['appointmentId'])) {
        require_once "../db_services/availability_service.php";
        $id = $_POST['appointmentId'];
        delete_appointment_availability($conn, $id);
        delete_appointment($conn, $id);
    }
}


$doctor_specialities = array("");
$doctor_towns = array("");

$doctor_specialities_json = json_decode(file_get_contents("../data/doctor_types.json"), true);

foreach ($doctor_specialities_json as $speciality) {
    array_push($doctor_specialities, $speciality);
}

$doctor_towns_json = json_decode(file_get_contents("../data/towns.json"), true);

foreach ($doctor_towns_json as $town) {
    array_push($doctor_towns, $town);
}


?>

<!DOCTYPE html>
<html>

<head>
    <title>DocWebox</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Import css -->
    <link rel="stylesheet" href="../css/main_page.css">
    <link rel="stylesheet" href="../css/all_apointments.css">
    <link rel="stylesheet" href="../css/search_bar.css">
    <link rel="stylesheet" href="../css/upcoming_apointments.css">

    <link rel="stylesheet" href="../css/searching_for_doctors.css">
    <link rel="stylesheet" href="../css/global.css">



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

    <!-- Bootstrap, Ajax -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>


    <!-- Bootstrap Datepicker -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js">
    </script>


    <!-- expiriement time picker -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/timepicker@1.14.0/jquery.timepicker.min.css">
    <script src="https://cdn.jsdelivr.net/npm/timepicker@1.14.0/jquery.timepicker.min.js"></script>


    <script src="https://kit.fontawesome.com/d2c306d566.js" crossorigin="anonymous"></script>

    <!-- Import Modals css -->
    <link rel="stylesheet" href="../css/modals.css">
</head>

<body>
    <?php
    include "../components/header.php";
    display_default_header($logged_user['full_name']);

    echo "<div class='container-fluid row' id='content'>";

    if ($_SESSION['type'] != 'a') {
        include "../components/sidebar.php";
        button_sidebar($logged_user['full_name']);
    }

    echo " <div id='main-page-content' class='col'>";

    if ($_SESSION['type'] == 'a') {

        echo "<div class='custom-container' style='display: flex; justify-content: space-evenly; align-items: start;'>
        <div class='doctors-column'>";
        require_once "../db_services/doctor_service.php";
        require_once "../components/doctor_row_display.php";
        require_once "../db_services/patient_service.php";
        require_once "../components/member_row_display.php";

        $doctors = select_doctors($conn);
        $patients = select_patients($conn);
        echo "<div style = 'font-size: 2rem; line-height: 150%; color: #00BFB4;'>Επεξεργασία Ιατρών</div>";
        foreach ($doctors as $doctor) {
            echo doctor_row_display($doctor, "Επεξεργασία");
        }
        echo "</div>
            <div class='patients-column'>";
        echo "<div style = 'font-size: 2rem; line-height: 150%; color: #00BFB4;'>Επεξεργασία Χρηστών</div>";
        foreach ($patients as $patient) {
            echo patient_row_display($patient, "Επεξεργασία");
        }
        echo "</div>
        </div>";
    } else {
        if ($_SESSION['type'] == "p") {
            include "../components/search_bar.php";
            show_search_bar($doctor_towns, $doctor_specialities);
        }
        include "../components/upcoming_apointments.php";

        echo "<div class='upcoming-apointments' id='upcoming_apointments'>
        <p>Επερχόμενα Ραντεβού</p>
        <div class='upcoming-box'>";

        if ($_SESSION['type'] == "p") {
            patient_upcoming_apointments($conn, $logged_user["id"]);
        } else if ($_SESSION['type'] == "d") {
            doctor_upcoming_apointments($conn, $logged_user["id"]);
        }

        echo "</div> </div>";


        include "../components/all_apointments.php";
        echo "</div>";
        echo "</div>";
        include "../components/footer.php";
    }

    ?>

    <?php
    if ($_SESSION['type'] == 'p') {
        echo '<script src="../js/searching_for_doctor.js"></script>';
    }
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

</body>

</html>