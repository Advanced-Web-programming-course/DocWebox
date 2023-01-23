<?php
include "../controllers/auth_controller.php";
ensure_auth();
include "../config/db_connection.php";
require_once "../db_services/doctor_service.php";

if ($_SESSION['type'] == 'p') {
    header("location: main_page.php");
}


$logged_user = get_loggedin_user($conn, $_SESSION['type'], $_SESSION['id']);
$doctor = null;

if (isset($_GET['doctor_id']) && !empty($_GET['doctor_id']) && is_numeric($_GET['doctor_id'])) {
    $doctor = select_doctor_by_id($conn, $_GET['doctor_id']);
} else {
    echo "<h1>Error 404 page</h1>";
    return;
}

if (isset($_POST['submit'])) {
    $filename = $_FILES["profile-pic"]["name"];
    $from = $_FILES["profile-pic"]["tmp_name"];
    $upload = move_uploaded_file($from, "../images/" . $filename);
    edit_doctor_data($conn, $_SESSION['id'], $_POST['name'], $_POST['tel'], $_POST['email'], $_POST['address'], $_POST['region'], $_POST['specialization'], "../images/" . $filename);
}

$doctor_specialities = array();
$doctor_specialities_json = json_decode(file_get_contents("../data/doctor_types.json"), true);

foreach ($doctor_specialities_json as $speciality) {
    array_push($doctor_specialities, $speciality);
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/profile_page.css">
    <link rel="stylesheet" href="../css/profile_section.css">
    <link rel="stylesheet" href="../css/edit_doctor_profile_section.css">

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
    display_doctor_profile_section($doctor['full_name'], $doctor['specialization'], $doctor['region'], $doctor['address'], $doctor['img_url'], $doctor['description']);
    include "../components/edit_doctor_profile_section.php";
    display_doctor_edit_profile_section($doctor['full_name'], $doctor['email'], $doctor['phone'], $doctor['specialization'], $doctor['region'], $doctor['address'], $doctor['id'], $doctor_specialities);
    echo "</div>";
    echo "</div>";
    include "../components/footer.php";
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

</body>

</html>

<script>
    $(document).ready(function() {

        // update doctor's description onclick "Save" in modal
        $(document).on('click', '#saveBtn', function() {

            var id = $('#docId').val();
            var desc = $('textarea#desc-text').val();
            $.ajax({
                url: "../controllers/update.php",
                method: "POST",
                catch: false,
                data: {
                    update: 1,
                    id: id,
                    description: desc
                },
                success: function(dataResult) {
                    var dataResult = JSON.parse(dataResult);

                    if (dataResult.statusCode == 1) {
                        $('#editDescriptionModal').modal().hide();
                        location.reload();
                        // swal("Data Updated!", {
                        //     icon: "success",
                        // }).then((result) => {

                        // });    
                    }
                }
            });
        });
    });
</script>