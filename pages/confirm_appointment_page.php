<?php
include "../controllers/auth_controller.php";
ensure_auth();
?>

<!DOCTYPE html>
<html>

<head>
    <title>Confirm Appointment</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/doctor_selected/doctor_selected.css">
    <link rel="stylesheet" href="../css/booking_info.css">
    <script src="https://kit.fontawesome.com/d2c306d566.js" crossorigin="anonymous"></script>


</head>

<body>
    <?php
    echo "<div class='con'>";
    include "../components/header.php";
    display_default_header("");
    include "../components/doctor_selected.php";
    display_simple_doctor_selected_section("Μαρία Παπαδοπούλου", "Παθολόγος", "Λαζαράκη 33", "Γλυφάδα");
    include "../components/booking_info.php";
    display_booking_info_section("Πέμπτη 10 Νοεμβρίου", "15:00", "Απλή Επίσκεψη", "€30");
    display_member_info_section("Αναστασία Καμανά", "ankamana@gmail.com", "+30 6923758021");
    echo "</div>";

    // // When submits form it shows the 
    // include "../components/booking_info.php";
    // display_booking_confrimation();
    ?>
</body>

</html>