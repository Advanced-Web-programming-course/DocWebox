<?php
// Initialize the session
session_start();

// Check if the user is already logged in, if yes then redirect him to welcome page
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    header("location: ../pages/main_page.php");
    exit;
}

include "../controllers/login_controller.php";
?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="../css/login_register/form.css">
    <link rel="stylesheet" href="../css/login_register/upbtns.css">
    <link rel="stylesheet" href="../css/login_register/downbtns.css">

</head>

<body>

    <?php
    include "../components/header.php";
    display_header("login", "p");
    ?>

    <div class='container'>

        <div class='upbtns'>
            <button class='sign-in'>Σύνδεση</button>
            <button class='register'>Εγγραφή</button>
        </div>

        <div class='title'>
            <h1>Καλωσήρθατε</h1>
            <p>Συνδεθείτε για να δείτε τα ραντεβού σας</p>
        </div>

        <?php include "../components/login_form.php"; ?>

        <div class='sign-as'><a href="#">Είσοδος ως γιατρός</a></div>
    </div>



</body>

</html>