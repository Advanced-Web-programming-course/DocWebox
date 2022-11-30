<?php
include "../controllers/auth_controller.php";
ensure_auth();
include "../config/db_connection.php";
require_once "../db_services/doctor_service.php";

$logged_user = get_loggedin_user($conn, $_SESSION['type'], $_SESSION['id']);
$doctor = null;

if (isset($_GET['doctor_id']) && !empty($_GET['doctor_id']) && is_numeric($_GET['doctor_id'])) {
    $doctor = select_doctor_by_id($conn, $_GET['doctor_id']);
} else {
    echo "<h1>Error 404 page</h1>";
    return;
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Page Title</title>
    <link rel="stylesheet" href="../css/profile_page.css">
    <link rel="stylesheet" href="../css/profile_section.css">
    <link rel="stylesheet" href="../css/edit_doctor_profile_section.css">
    <script src="https://kit.fontawesome.com/d2c306d566.js" crossorigin="anonymous"></script>
</head>

<body>
    <?php
    include "../components/header.php";
    display_default_header($logged_user['full_name']);
    echo " <div id='profile-page-content'>";
    include "../components/profile_section.php";
    display_doctor_profile_section($doctor['full_name'], $doctor['specialization'], $doctor['region'], $doctor['address']);
    include "../components/edit_doctor_profile_section.php";
    echo "</div>";

    ?>
    <script>
        document.getElementById('edit-button').addEventListener('click', function(e) {
            openEditForm();
        });

        function openEditForm() {
            let profileForm = document.getElementById('edit-doctor-profile-section');
            if (profileForm.style.visibility == 'visible') {

                profileForm.style.visibility = 'hidden';
            } else profileForm.style.visibility = 'visible';
        }
    </script>
</body>

</html>