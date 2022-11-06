<?php
include "../db_services/db_functions.php";
$doctors = get_doctors("");
function add_doctor($name, $speciality,$address,$price,$num_of_stars,$img_url){
    $doc_element ="
    <div class='doctor grey_font_color gray_borderline'>
        <div id='section_1'>
            <div style='display: flex;'>
            <img src='$img_url' alt='doctor' height='48px' height='48px'>
            <div style = margin-left:14px;'>
                <label style='display: block;' class='big_text_size'>".$name."</label>
                <label style='display: block;' class='small_text_size'>".$speciality."</label>
            </div>
        </div>
            <label id='address' class='small_text_size'>".$address."</label>
        </div>
        <div id='section_2'>
            <div id='stars'>";
    $stars = array();
    for ($x = 1; $x <= 5; $x++) {
        if( $x <= $num_of_stars){
            array_push($stars,"solid");
        }
        else{
            array_push($stars,"regular");
        }
        
      }
    $doc_element =$doc_element."
                <i class='fa-".$stars[0]." fa-star'></i>
                <i class='fa-".$stars[1]." fa-star'></i>
                <i class='fa-".$stars[2]." fa-star'></i>
                <i class='fa-".$stars[3]." fa-star'></i>
                <i class='fa-".$stars[4]." fa-star'></i>
                </div>
            <div id='section_2_supsec_2'>
                <label id='price'>".$price." €</label>
                <button class='pink_background'>Κλέισε Ραντεβού</button>
            </div>
            
        </div>
    </div>
    ";
    return $doc_element;
}
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="../css/searchingForDoctors.css">
    <link rel="stylesheet" href="../css/global.css">
    <link rel="stylesheet" href="../css/searchBar.css">
</head>
<title>Search For Doctor</title>
<script src="https://kit.fontawesome.com/d2c306d566.js" crossorigin="anonymous"></script>
<body>

<div style = "margin-bottom: 25px;">
        <?php include "../components/searchBar.php";?>
</div>
<?php
foreach ($doctors as $doc) {
    echo add_doctor($doc[1],"Παθολόγος","Λαζαράκη 33,Γλυφάδα","50",0,$doc[9]);
    echo "<br>";
  }
?>

</body>
</html>