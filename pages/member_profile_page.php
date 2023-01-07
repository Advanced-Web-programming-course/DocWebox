<?php
include "../controllers/auth_controller.php";
ensure_auth();

include "../config/db_connection.php";
include "../db_services/patient_service.php";

$logged_user = get_loggedin_user($conn, $_SESSION['type'], $_SESSION['id']);
$profil_user = null;

if (isset($_GET['patient_id']) && !empty($_GET['patient_id']) && is_numeric($_GET['patient_id'])) {
    if ($logged_user['id'] == $_GET['patient_id']) {
        $profil_user = $logged_user;
    } else {
        $profil_user = select_patient_by_id($conn, $_GET['patient_id']);
    }
} else {
    echo "<h1>Error 404 page</h1>";
    return;
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-
EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/d2c306d566.js" crossorigin="anonymous"></script>
</head>

<body>
    <?php
    include "../components/header.php";
    display_default_header($logged_user['full_name']);
    echo " <div class='container-fluid row' id='profile-page-content'>";
    include "../components/sidebar.php";
    button_sidebar($logged_user['full_name']);
    echo " <div class='col'>";
    include "../components/profile_section.php";
    display_profile_section($profil_user['full_name'], $profil_user['email'], $profil_user['phone']);
    include "../components/edit_profile_section.php";
    display_edit_profile_section($profil_user['full_name'],$profil_user['email'],$profil_user['phone']);
    echo "</div>";
    echo "</div>";
    include "../components/footer.php";

    ?>
    <script>
    document.getElementById('edit-button').addEventListener('click', function(e) {
        openEditForm();
    });

    function openEditForm() {
        let profileForm = document.getElementById('edit-profile-section');
        if (profileForm.style.visibility == 'visible') {

            profileForm.style.visibility = 'hidden';
        } else profileForm.style.visibility = 'visible';
    }
    </script>
</body>

</html>