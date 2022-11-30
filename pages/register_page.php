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

        <div>
            <div class='title'>Καλωσήρθατε</div>
            <div class='subtitle'>Δημιουργήστε τον λογαριασμό σας με ένα κλικ</div>
        </div>

        <?php
        if ($type == "d") {
            include "../components/doctor_register_form.php";
        } else if ($type == "p") {
            include "../components/register_form.php";
        }
        ?>
        <!-- όταν εγγαρφη ως γιατρός doctor_register_form.php -->
    </div>
</body>

</html>