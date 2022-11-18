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
    <link rel="stylesheet" href="../css/login_register.css">
</head>

<body>
    <?php
    include "../components/header.php";
    include "../components/register_form.php";
    ?>
</body>

</html>