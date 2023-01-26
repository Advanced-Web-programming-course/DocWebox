<?php
include "../controllers/auth_controller.php";
ensure_auth();

include "../config/db_connection.php";
include "../db_services/patient_service.php";

if ($_SESSION['type'] == 'd') {
    header("location: main_page.php");
}


$logged_user = get_loggedin_user($conn, $_SESSION['type'], $_SESSION['id']);
$profil_user = null;

if (isset($_GET['patient_id']) && !empty($_GET['patient_id']) && is_numeric($_GET['patient_id'])) {
    if ($logged_user['id'] == $_GET['patient_id'] && $_SESSION['type'] != 'a') {
        $profil_user = $logged_user;
    } else if ($_SESSION["type"] == 'a') {
        $profil_user = select_patient_by_id($conn, $_GET['patient_id']);
    } else {
        // $profil_user = select_patient_by_id($conn, $_GET['patient_id']);
        echo "<h1>Error 404 page</h1>";
        return;
    }
} else {
    echo "<h1>Error 404 page</h1>";
    return;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['appointmentId'])) {
        require_once "../db_services/availability_service.php";
        require_once "../db_services/appointment_service.php";
        $id = $_POST['appointmentId'];
        delete_appointment_availability($conn, $id);
        delete_appointment($conn, $id);
    }
}


if (isset($_POST['submit'])) {
    $filename = $_FILES["profile-pic"]["name"];
    $from = $_FILES["profile-pic"]["tmp_name"];
    move_uploaded_file($from, "../images/" . $filename);
    edit_patient_data($conn, $profil_user['id'], $_POST['name'], $_POST['tel'], $_POST['email'], "../images/" . $filename);
    $profil_user = select_patient_by_id($conn, $profil_user["id"]);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['account_id'])) {

        $id = $_POST['account_id'];
        if ($logged_user["id"] != $id && $_SESSION["type"] != 'a') {
            // error
            echo "Error";
        } else {
            // ecw diagrafoume
            require_once "../db_services/availability_service.php";
            require_once "../db_services/appointment_service.php";
            delete_appointment_availabilitys_by_patient_id($conn, $id);
            delete_appointments_by_patient_id($conn, $id);
            $ok = delete_patient_by_id($conn, $id);
            if ($ok) {
                if ($_SESSION['type'] != 'a') {
                    // Initialize the session
                    session_start();

                    // Unset all of the session variables
                    $_SESSION = array();

                    // Destroy the session.
                    session_destroy();

                    header("location: login_page.php");
                } else {
                    header("location: main_page.php");
                }
            }
        }
    }
}


?>

<!DOCTYPE html>
<html>

<head>
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/profile_page.css">
    <link rel="stylesheet" href="../css/profile_section.css">
    <link rel="stylesheet" href="../css/edit_profile_section.css">

    <link rel="stylesheet" href="../css/main_page.css">
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


    <link rel="stylesheet" href="../css/modals.css">
</head>

<body>
    <?php
    include "../components/header.php";
    display_default_header($logged_user['full_name']);

    $padding = "";

    if ($_SESSION["type"] == 'a') {
        $padding = "p-5";
        ?>
        <link rel="stylesheet" href="../css/admin.css">
    <?php

    }


    echo " <div class='container-fluid row $padding g-0 ' id='profile-page-content'>";

    if ($_SESSION["type"] != 'a') {
        include "../components/sidebar.php";
        button_sidebar($profil_user['full_name']);
    }
    echo " <div class='col g-0 prof-section'>";

    include "../components/profile_section.php";
    include("../components/modals/delete_account_modal.php");
    delete_account_modal($profil_user['id']);

    display_profile_section($profil_user['full_name'], $profil_user['email'], $profil_user['phone'], $profil_user["img_url"], $profil_user['id']);

    if ($_SESSION['type'] == "a") {
        include "../components/upcoming_apointments.php";

        echo "<div class='upcoming-apointments' id='upcoming_apointments'>
        <p>Επερχόμενα Ραντεβού</p>
        <div class='upcoming-box'>";

        patient_upcoming_apointments($conn, $profil_user["id"]);

        echo "</div> </div>";
    }

    include "../components/edit_profile_section.php";
    display_edit_profile_section($profil_user['full_name'], $profil_user['email'], $profil_user['phone']);
    echo "</div>";
    echo "</div>";
    include "../components/footer.php";

    ?>
    <script>
        document.getElementById('edit-button').addEventListener('click', function (e) {
            openEditForm();
        });

        function openEditForm() {
            let profileForm = document.getElementById('edit-profile-section');
            if (profileForm.style.visibility == 'visible') {

                profileForm.style.visibility = 'hidden';
            } else profileForm.style.visibility = 'visible';
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        </script>
</body>

</html>