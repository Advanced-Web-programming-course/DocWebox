<?php
include "../db_services/db_functions.php";
$doctors = get_doctors("");
function add_doctor($id,$name, $speciality,$address,$region,$price,$num_of_stars,$img_url){
    $doc_element ="
    <div class='doctor grey_font_color gray_borderline' id='doc_".$id."'>
        
        <div id='section_1'>
            <div style='display: flex;'>
            <img class='circle' src='$img_url' alt='doctor' height='48px' height='48px'>
            <div style = 'margin-left:14px;'>
                <label style='display: block;' class='big_text_size'>".$name."</label>
                <label style='display: block;' class='small_text_size'>".$speciality."</label>
            </div>
        </div>
            <label id='address' class='small_text_size'>".$address."</label>
            <input style='display:none;' id='doc_".$id."region' type='text' value='".$region."'>
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
                <button onclick=\"select_doctor(".$id.")\" class='pink_background'>Κλέισε Ραντεβού</button>
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
    <link rel="stylesheet" href="../css/searching_for_doctors.css">
    <link rel="stylesheet" href="../css/global.css">
    <link rel="stylesheet" href="../css/search_bar.css">
    <script src="https://kit.fontawesome.com/d2c306d566.js" crossorigin="anonymous"></script>
    <script src="../js/searchig_for_doctor.js"></script>
</head>
<title>Search For Doctor</title>

<body>

<div style = "margin-bottom: 25px;">
        <?php include "../components/search_bar.php";?>
</div>
<?php
foreach ($doctors as $doc) {
    echo add_doctor($doc[0],$doc[1],"Παθολόγος","Λαζαράκη 33,Γλυφάδα",$doc[6],"50",0,$doc[9]);
    echo "<br>";
  }
?>
 <script >
    document.getElementById("search_button").addEventListener("click", search_for_doctor);
    
    function search_for_doctor(){
        var doctors_list = document.getElementsByClassName("doctor");
        //doctor location
        if(document.getElementById("doctor").value == "Υπηρεσία" && document.getElementById("location").value != "Τοποθεσία"){
            alert("Τοποθεσία");
            window.location.replace("http://www.w3schools.com");
        }
        //doctor speciality
        else if(document.getElementById("doctor").value != "Υπηρεσία" && document.getElementById("location").value == "Τοποθεσία"){
            alert("Υπηρεσία");
        }
        //both
        else if(document.getElementById("doctor").value == "Υπηρεσία" && document.getElementById("location").value == "Τοποθεσία"){
            alert("--");
        }
        //Nothing
        else if(document.getElementById("doctor").value != "Υπηρεσία" && document.getElementById("location").value != "Τοποθεσία"){
            alert("2");
            window.location.replace("http://www.w3schools.com");
        }
    }
 </script>
</body>
</html>