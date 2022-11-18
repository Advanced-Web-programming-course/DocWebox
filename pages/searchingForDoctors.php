<?php
include "../db_services/db_functions.php";
$doctor_specialities = array("","Παθολόγος", "Ψυχολόγος", "Γυναικολόγος", "Ενδοκρινολόγος");

if (str_ends_with($_SERVER["REQUEST_URI"], '/searchingForDoctors.php')) {
    $doctors = get_doctors("");
}
else{
    
    if($_GET['location'] == "Τοποθεσία" && $_GET['speciality'] == "Υπηρεσία"){
        $doctors = get_doctors("");
    }
    else if($_GET['location'] != "Τοποθεσία" && $_GET['speciality'] == "Υπηρεσία"){
        $doctors = get_doctors(" WHERE region=".$_GET['location']);
    }
    else if($_GET['location'] == "Τοποθεσία" && $_GET['speciality'] != "Υπηρεσία"){
        $doctors = get_doctors(" WHERE specialization=".$_GET['speciality']);
    }
    else if($_GET['location'] != "Τοποθεσία" && $_GET['speciality'] != "Υπηρεσία"){
        $doctors = get_doctors(" WHERE specialization=".$_GET['speciality']." and region=".$_GET['location']);
    }
}






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
            <input style='display:none;' id='doc_".$id."_region' type='text' value='".$region."'>
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
                <label id='price'>".$price."&nbsp€</label>
                <button onclick=\"select_doctor(".$id.")\" class='pink_background'>Κλέισε&nbspΡαντεβού</button>
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
    echo add_doctor($doc[0],$doc[1],$doctor_specialities[$doc[7]],$doc[5],$doc[6],"50",0,$doc[9]);
}

?>
 <script >
    document.getElementById("search_button").addEventListener("click", search_for_doctor);
    
    function search_for_doctor(){
        document.getElementById("search_button").href="searchingForDoctors.php?location="+document.getElementById("location").value+"&speciality="+document.getElementById("doctor").value;
    }
    if(window.location.href.includes("location")){
          
        let params = (new URL(window.location.href)).searchParams;
        document.getElementById("doctor").value = params.get('speciality');
        document.getElementById("location").value = params.get('location');
    }
    

 </script>
</body>
</html>