<?php
// Initialize the session
session_start();

// Check if the user is already logged in, if yes then redirect him to welcome page
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    header("location: ../pages/main_page.php");
    exit;
}

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
    <link rel="stylesheet" href="../css/login_register/form.css">
    <link rel="stylesheet" href="../css/login_register/upbtns.css">
    <link rel="stylesheet" href="../css/login_register/downbtns.css">

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

        <div class='title'>
            <h1>Καλωσήρθατε</h1>
            <p>Συνδεθείτε για να δείτε τα ραντεβού σας</p>
        </div>

        <?php
        include "../components/login_form.php";
        if ($type == "d") {
            echo "<div class='sign-as'><a href='login_page.php?type=p'>Είσοδος ως Μέλος</a></div>";
        } else if ($type == "p") {
            echo "<div class='sign-as'><a href='login_page.php?type=d'>Είσοδος ως γιατρός</a></div>";
        }
        ?>
        <!-- <div class='sign-as'><a href="#">Είσοδος ως γιατρός</a></div> -->
    </div>



</body>

</html>