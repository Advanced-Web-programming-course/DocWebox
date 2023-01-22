<?php
include "../controllers/auth_controller.php";
ensure_auth();
include "../config/db_connection.php";
include "../db_services/appointment_service.php";

$logged_user = get_loggedin_user($conn, $_SESSION['type'], $_SESSION['id']);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['appointmentId'])) {

        $id = $_POST['appointmentId'];
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


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

    <!-- Bootstrap, Ajax -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>


    <!-- Bootstrap Datepicker -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
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
    include "../components/sidebar.php";
    button_sidebar($logged_user['full_name']);
    echo " <div id='main-page-content' class='col'>";
    include "../components/search_bar.php";
    show_search_bar($doctor_towns, $doctor_specialities);

    include "../components/upcoming_apointments.php";
    include "../components/all_apointments.php";
    echo "</div>";
    echo "</div>";
    include "../components/footer.php";
    ?>

    <!-- onclick search_button redirect to searching_for_doctors page -->
    <script>
    document.getElementById("search_button").onclick = search_for_doctor;

    function search_for_doctor() {
        window.location.href = "searching_for_doctors.php?location=" + document.getElementById("location").value +
            "&speciality=" + document.getElementById("doctor").value;
    }
    if (window.location.href.includes("location")) {
        let params = (new URL(window.location.href)).searchParams;
        document.getElementById("doctor").value = params.get('speciality');
        document.getElementById("location").value = params.get('location');
    }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

</body>

</html>