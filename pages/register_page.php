<?php

include "../controllers/auth_controller.php";
if_auth_redirect_to_main();

include "../shared/utils.php";
$type = "p";
if (isset($_GET["type"])) {
    $type = validate_type($_GET["type"]);
}
include "../controllers/register_controller.php";
?>
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/login_register/form.css">
    <link rel="stylesheet" href="../css/login_register/upbtns.css">
    <link rel="stylesheet" href="../css/login_register/downbtns.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/d2c306d566.js" crossorigin="anonymous"></script>
</head>

<body>
    <?php
    include "../components/header.php";
    display_login_register_header("register", $type);
    ?>
    <div class='container'>

        <div class='upbtns'>
            <button onclick='window.location.href = "login_page.php<?php echo "?type=$type"; ?>"' class='sign-in2'>Σύνδεση</button>
            <button class='register2'>Εγγραφή</button>
        </div>

        <?php
        if ($type == "d") {
            include "../components/doctor_register_form.php";
        } else if ($type == "p") {
            include "../components/register_form.php";
        }
        ?>
    </div>
</body>
<script src="../js/toggle_password.js"></script>

</html>