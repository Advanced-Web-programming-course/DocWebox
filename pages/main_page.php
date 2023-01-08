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

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Bootstrap Datepicker -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

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
    include "../components/upcoming_apointments.php";
    include "../components/all_apointments.php";
    echo "</div>";
    echo "</div>";
    include "../components/footer.php";
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

</body>

</html>