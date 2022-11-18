<!DOCTYPE html>
<html>

<head>
    <title>Page Title</title>
    <link rel="stylesheet" href="../css/member_profile_page.css">
    <link rel="stylesheet" href="../css/profile_section.css">
    <link rel="stylesheet" href="../css/edit_profile_section.css">
    <script src="https://kit.fontawesome.com/d2c306d566.js" crossorigin="anonymous"></script>
</head>

<body>
    <?php
    include "../components/header.php";
    display_default_header("");
    echo " <div id='member-profile-page-content'>";
    include "../components/profile_section.php";
    include "../components/edit_profile_section.php";
    echo "</div>";
    ?>
</body>

</html>