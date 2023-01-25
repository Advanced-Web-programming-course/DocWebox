<?php
include "../controllers/auth_controller.php";
ensure_auth();

include "../config/db_connection.php";
$logged_user = get_loggedin_user($conn, $_SESSION['type'], $_SESSION['id']);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['continue'])) {
        if ($_SESSION['type'] == "d") {
            echo "alert('Doctor cannot book an appointment');";
        }

        $create_or_update = "confirm";
        $appointment_id = "";

        if (isset($_POST['appointment_id'])) {
            $appointment_id = $_POST['appointment_id'];
            $create_or_update = "edit";
        }

        require_once "../db_services/doctor_service.php";
        $doctor_id = $_POST["doctor_id"];
        $doctor = select_doctor_by_id($conn, $doctor_id);

        $service_id = $_POST["service_id"];
        $service = select_doctor_service_by_id($conn, $service_id);

        $patient_id = $_POST['patient_id'];

        require_once "../db_services/patient_service.php";

        $patient = select_patient_by_id($conn, $patient_id);
        $date = $_POST["date"];

        $time = $_POST["time"];

        // add_appointment_to_availability($conn, $doctor_id, $day, $month, $year, $hour);

        // $complete_date = $date . " " . $hour . ":00:00.0";
        // $new_date = date('Y-m-d H', strtotime($complete_date));
        // create_appointment($conn, $patient_id, $doctor_id, $new_date, $serviceId);
        // header("location: main_page.php");
    }

    if (isset($_POST["confirm"]) || isset($_POST["edit"])) {

        $isEdit = false;
        $appointment_id = "";
        if (isset($_POST["edit"])) {
            $isEdit = true;
            $appointment_id = $_POST["appointment_id"];
        }

        if ($_SESSION['type'] == "d") {
            echo "alert('Doctor cannot book an appointment');";
        }

        require_once "../db_services/doctor_service.php";
        $doctor_id = $_POST["doctor_id"];
        $doctor = select_doctor_by_id($conn, $doctor_id);

        $service_id = $_POST["service_id"];
        $service = select_doctor_service_by_id($conn, $service_id);

        $patient_id = $_POST['patient_id'];
        $date = $_POST["date"];

        $dateArray = explode("/", $date);
        $month = $dateArray[0];
        $day = $dateArray[1];
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

        require_once "../db_services/availability_service.php";
        require_once "../db_services/appointment_service.php";


        $complete_date = $date . " " . $hour . ":00:00.0";
        $new_date = date('Y-m-d H', strtotime($complete_date));
        if ($isEdit) {
            $appointment_id = $_POST["appointment_id"];
            update_appointment_to_availability($conn, $doctor_id, $day, $month, $year, $hour, $appointment_id);
            edit_appointment($conn, $appointment_id, $patient_id, $doctor_id, $new_date, $service_id);
        } else {
            $app_id = create_appointment($conn, $patient_id, $doctor_id, $new_date, $service_id);
            add_appointment_to_availability($conn, $doctor_id, $patient_id, $app_id, $day, $month, $year, $hour);
        }
        header("location: main_page.php");
    }
} else {
    header(("location: main_page.php"));
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Confirm Appointment</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Import css -->
    <link rel="stylesheet" href="../css/doctor_selected/doctor_selected.css">
    <link rel="stylesheet" href="../css/booking_info.css">

    <script src="https://kit.fontawesome.com/d2c306d566.js" crossorigin="anonymous"></script>

    <!-- Bootstrap, Ajax -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Bootstrap icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">

    <!-- Import Modals css -->
    <link rel="stylesheet" href="../css/modals.css">

</head>

<body>
    <?php
        include "../components/header.php";
        display_default_header($logged_user['full_name']);
        
        echo "<div class='confirm-con'>";
            include "../components/doctor_selected.php";
            display_simple_doctor_selected_section($doctor["full_name"], $doctor["specialization"], $doctor["address"], $doctor["region"], $doctor["img_url"]);
            include "../components/booking_info.php";
            display_booking_info_section($date, $time, $service["title"], "€" . $service["price"]);
            display_member_info_section($patient["full_name"], $patient["email"], $patient["phone"], $doctor_id, $service_id, $date, $time, $create_or_update, $appointment_id, $patient_id);
        echo "</div>";
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="../js/confirm_appointment.js"></script>
</body>

</html>