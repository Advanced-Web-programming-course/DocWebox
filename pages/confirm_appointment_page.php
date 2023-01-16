<?php
include "../controllers/auth_controller.php";
ensure_auth();

include "../config/db_connection.php";
$logged_user = get_loggedin_user($conn, $_SESSION['type'], $_SESSION['id']);

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
    echo "<div class='con'>";
    include "../components/doctor_selected.php";
    display_simple_doctor_selected_section("Μαρία Παπαδοπούλου", "Παθολόγος", "Λαζαράκη 33", "Γλυφάδα", "https://img.freepik.com/free-vector/doctor-character-background_1270-84.jpg?w=2000");
    include "../components/booking_info.php";
    display_booking_info_section("Πέμπτη 10 Νοεμβρίου", "15:00", "Απλή Επίσκεψη", "€30");
    display_member_info_section("Αναστασία Καμανά", "ankamana@gmail.com", "+30 6923758021");
    echo "</div>";

    // // When submits form it shows the 
    // include "../components/booking_info.php";
    // display_booking_confrimation();
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>