<?php

include "../controllers/auth_controller.php";
if_auth_redirect_to_main();

include "../shared/utils.php";
$type = "p";
if (isset($_GET["type"])) {
    $type = validate_type($_GET["type"]);
}
include "../controllers/login_controller.php";
?>

<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/login_register/form.css">
    <link rel="stylesheet" href="../css/login_register/upbtns.css">
    <link rel="stylesheet" href="../css/login_register/downbtns.css">
    <script src="https://kit.fontawesome.com/d2c306d566.js" crossorigin="anonymous"></script>
</head>

<body>

    <?php
    include "../components/header.php";
    display_login_register_header("login", $type);
    ?>

    <div class='container'>
        <div class='upbtns'>
            <button class='sign-in'>Σύνδεση</button>
            <button onclick='window.location.href = "register_page.php<?php echo "?type=$type"; ?>"' class='register'>Εγγραφή</button>
        </div>

        <div>
            <div class='title'>Καλωσήρθατε</div>
            <div class='subtitle'>Συνδεθείτε για να δείτε τα ραντεβού σας</div>
        </div>

        <?php
        include "../components/login_form.php";
        if ($type == "d") {
            echo "<div class='sign-as'><a href='login_page.php?type=p'>Είσοδος ως μέλος</a></div>";
        } else if ($type == "p") {
            echo "<div class='sign-as'><a href='login_page.php?type=d'>Είσοδος ως γιατρός</a></div>";
        }
        ?>
    </div>

</body>
<script  src="../js/password.js"></script>
</html>