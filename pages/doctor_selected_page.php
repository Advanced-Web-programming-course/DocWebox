<?php
include "../controllers/auth_controller.php";
ensure_auth();

include "../config/db_connection.php";
$logged_user = get_loggedin_user($conn, $_SESSION['type'], $_SESSION['id']);


?>

<!DOCTYPE html>
<html>

<head>
    <title>Doctor Selected</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/doctor_selected/doctor_selected.css">
    <link rel="stylesheet" href="../css/doctor_selected/all_services.css">

</head>

<body>
    <?php
    include "../components/header.php";
    display_default_header($logged_user['full_name']);
    include "../components/doctor_selected.php";
    display_doctor_selected_section("Μαρία Παπαδοπούλου", "Παθολόγος", "Λαζαράκη 33", "Γλυφάδα", "Lorem ipsum dolor sit, amet consectetur adipisicing elit. Iste reiciendis nemo rerum asperiores quam ipsa ab ea nesciunt obcaecati doloremque tempore, quisquam sequi eligendi ipsam sapiente non omnis tenetur itaque?");
    include "../components/all_services.php";
    ?>
</body>

</html>