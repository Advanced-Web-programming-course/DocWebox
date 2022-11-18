<?php
// Initialize the session
session_start();

// Check if the user is already logged in, if yes then redirect him to welcome page
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    header("location: ../pages/main_page.php");
    exit;
}

include "../controllers/register_controller.php";
?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="../css/login_register/form.css">
    <link rel="stylesheet" href="../css/login_register/upbtns.css">
    <link rel="stylesheet" href="../css/login_register/downbtns.css">
</head>

<body>
    <?php include "../components/header.php"; ?>
    <div class='container'>

        <div class='upbtns'>
            <button class='sign-in2'>Σύνδεση</button>
            <button class='register2'>Εγγραφή</button>
        </div>

        <div class='title'>
            <h1>Καλωσήρθατε</h1>
            <p>Συνδεθείτε για να δείτε τα ραντεβού σας</p>
        </div>

        <?php include "../components/register_form.php"; ?>
        <!-- όταν εγγαρφη ως γιατρός doctor_register_form.php -->
    </div>
</body>

</html>