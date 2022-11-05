<?php
include "search_doc_functions.php";
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="search_doctor_doc_element.css">
    <link rel="stylesheet" href="../search_bar.css">
</head>
<title>doctor</title>
<script src="https://kit.fontawesome.com/d2c306d566.js" crossorigin="anonymous"></script>
<body>

<div style = "margin-bottom: 25px;">
        <?php include "C:\\xampp\\htdocs\\DocWebox\\php_nektatios\\mainPage\\searchBar.php";?>
</div>
<?php
echo add_doctor("Μαρια Παπαδοπούλου","Παθολόγος","Λαζαράκη 33,Γλυφάδα","50",0);
echo add_doctor("Άννα Παπαδοπούλου","Ουρολόγος","Καποδίστρια 9, Ωραιόκαστο","100",3);?>



</body>
</html>