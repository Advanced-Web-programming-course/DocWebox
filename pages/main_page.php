<!DOCTYPE html>
<html>

<head>
    <title>Page Title</title>
    <link rel="stylesheet" href="../css/all_apointments.css">
    <link rel="stylesheet" href="../css/search_bar.css">
    <link rel="stylesheet" href="../css/upcoming_apointments.css">
    <script src="https://kit.fontawesome.com/d2c306d566.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="con">
        <?php
        include "../components/search_bar.php";
        include "../components/upcoming_apointments.php";
        include "../components/all_apointments.php";
    ?>
    </div>
</body>

</html>