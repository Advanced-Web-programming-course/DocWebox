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
    if ($logged_user['id'] == $_GET['patient_id']) {
        $profil_user = $logged_user;
    } else {
        // $profil_user = select_patient_by_id($conn, $_GET['patient_id']);
        echo "<h1>Error 404 page</h1>";
        return;
    }
} else {
    echo "<h1>Error 404 page</h1>";
    return;
}

if (isset($_POST['submit'])) {
    $filename = $_FILES["profile-pic"]["name"];
    $from = $_FILES["profile-pic"]["tmp_name"];
    move_uploaded_file($from, "../images/" . $filename);
    edit_patient_data($conn, $_SESSION['id'], $_POST['name'], $_POST['tel'], $_POST['email'], "../images/" . $filename);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['account_id'])) {

        $id = $_POST['account_id'];
        if ($logged_user["id"] != $id) {
            // error
            echo "kati phge lathosssss";
        } else {
            // ecw diagrafoume
            $ok = delete_patient_by_id($conn, $id);
            echo "ok bro? " . $ok;
            if ($ok) {
                // Initialize the session
                session_start();

                // Unset all of the session variables
                $_SESSION = array();

                // Destroy the session.
                session_destroy();

                header("location: login_page.php");
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

    <!-- Bootstrap, Ajax -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>


    <script src="https://kit.fontawesome.com/d2c306d566.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/modals.css">
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
    include("../components/modals/delete_account_modal.php");
    delete_account_modal($profil_user['id']);

    display_profile_section($profil_user['full_name'], $profil_user['email'], $profil_user['phone'], $profil_user["img_url"], $profil_user['id']);

    include "../components/edit_profile_section.php";
    display_edit_profile_section($profil_user['full_name'], $profil_user['email'], $profil_user['phone']);
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