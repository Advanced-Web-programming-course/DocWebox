<?php
include "../controllers/auth_controller.php";
ensure_auth();
include "../config/db_connection.php";
include "../db_services/doctor_service.php";

$logged_user = get_loggedin_user($conn, $_SESSION['type'], $_SESSION['id']);


$doctor_specialities = array("");
$doctor_towns = array("");

$doctor_specialities_json = json_decode(file_get_contents("../data/doctor_types.json"), true);

foreach ($doctor_specialities_json as $speciality) {
    array_push($doctor_specialities, $speciality);
}

$doctor_towns_json = json_decode(file_get_contents("../data/towns.json"), true);

foreach ($doctor_towns_json as $town) {
    array_push($doctor_towns, $town);
}

if (str_ends_with($_SERVER["REQUEST_URI"], '/searching_for_doctors.php')) {
    $doctors = select_doctors($conn);
} else {
    if ($_GET['location'] == "Τοποθεσία" and $_GET['speciality'] == "Ειδικότητα Ιατρού") {
        $doctors = select_doctors($conn);
    } else if ($_GET['location'] != "Τοποθεσία" and  $_GET['speciality'] == "Ειδικότητα Ιατρού") {
        $doctors = select_doctors_by_region($conn, $_GET['location']);
    } else if ($_GET['location'] == "Τοποθεσία" and  $_GET['speciality'] != "Ειδικότητα Ιατρού") {
        $doctors = select_doctors_by_specialization($conn, $_GET['speciality']);
    } else if ($_GET['location'] != "Τοποθεσία" and  $_GET['speciality'] != "Ειδικότητα Ιατρού") {
        $doctors = select_doctors_by_specialization_region($conn, $_GET['speciality'], $_GET['location']);
    }
}

function add_doctor($id, $name, $speciality, $address, $region, $region_id, $price, $img_url)
{

    $doc_element = "
    <div class='doctor grey_font_color gray_borderline' id='doc_" . $id . "'>
        
        <div id='section_1'>
            <div style='display: flex;'>
            <img class='circle' src='$img_url' alt='doctor' height='48px' height='48px'>
            <div style = 'margin-left:14px;'>
                <label style='display: block;' class='big_text_size'>" . $name . "</label>
                <label style='display: block;' class='small_text_size'>" . $speciality . "</label>
            </div>
        </div>
            <label id='address' class='small_text_size'>" . $address . ", " . $region . "</label>
            <input style='display:none;' id='doc_" . $id . "_region' type='text' value='" . $region_id . "'>
        </div>
        <div id='section_2'>
            <div class='price big_text_size'>" . $price . "&nbsp€</div>
            <button onclick=\"select_doctor(" . $id . ")\" class='book_appointment pink_background big_text_size'>Κλέισε&nbsp Ραντεβού</button>
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
    <link rel="stylesheet" href="../css/data_not_found.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/d2c306d566.js" crossorigin="anonymous"></script>
    <script src="../js/searching_for_doctor.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-
EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<title>Search For Doctor</title>

<body>

    <div style="margin: 5px;">
        <div style="margin-bottom: 25px;">
            <?php include "../components/search_bar.php"; ?>
        </div>
        <div id="search-results"> 
            <?php
                if ($doctors != null) {
                    foreach ($doctors as $doc) {
                        echo add_doctor($doc['id'], $doc['full_name'], $doc['specialization'], $doc['address'], $doc['region'], $doc['region'], "50", $doc['img_url']);
                    }
                }
            ?>
        </div>
    </div>
    <script>
        document.getElementById("search_button").onclick = search_for_doctor;

        function search_for_doctor() {
            window.location.href = "searching_for_doctors.php?location=" + document.getElementById("location").value +
                "&speciality=" + document.getElementById("doctor").value;
        }
        if (window.location.href.includes("location")) {

            let params = (new URL(window.location.href)).searchParams;
            document.getElementById("doctor").value = params.get('speciality');
            document.getElementById("location").value = params.get('location');
        }
    </script>
</body>

</html>

<script>

    $(document).ready(function(){

        function load_data(input)
        {
            $.ajax({
                url:"../controllers/live_search.php",
                method:"POST",
                data: {input},
                dataType:"json",
                success:function(data)
                {   
                    let results = document.getElementById("search-results");
                    results.innerHTML= " ";
                    if (data.length > 0)
                    {
                        $.each(data, function(index, element) {  
                            doctorAdd(element); 
                        });
                    }
                    else { // in case the serach does not match to a doctor specialization then show Data Not Found
                        dataNotFound(results);           
                    }
                }
            });
        }

        function dataNotFound(results){
            let div = document.createElement("div");
            div.classList.add('no-data');
            div.innerHTML= 
            `<p><b>Oops! Δεν βρέθηκαν αποτελέσματα.</b></p>`
            results.appendChild(div);
        }

        // 
        function doctorAdd(doctor){     

            let results = document.getElementById("search-results");
            let div = document.createElement("div");
            div.classList.add('doctor');
            div.classList.add('grey_font_color');
            div.classList.add('gray_borderline');
            div.setAttribute('id',doctor.id);

            div.innerHTML= 
            `<div id='section_1'>
                    <div style='display: flex;'>
                    <img class='circle' src='${doctor.img_url}' alt='doctor' height='48px' height='48px'>
                    <div style = 'margin-left:14px;'>
                        <label style='display: block;' class='big_text_size'>${doctor.full_name}</label>
                        <label style='display: block;' class='small_text_size'>${doctor.spec}</label>
                    </div>
                </div>
                    <label id='address' class='small_text_size'>${doctor.address}, ${doctor.region}</label>
                    <input style='display:none;' id='1' type='text' value='2'>
                </div>
                <div id='section_2'>
                    <div class='price big_text_size'>50&nbsp€</div>
                    <button onclick='window.location.href = "doctor_selected_page.php?doctor_id=${doctor.id}"' class='book_appointment pink_background big_text_size'>Κλέισε&nbsp Ραντεβού</button>
            </div>`
   
            results.appendChild(div);
    
        }

        $('#mysearch').keyup(function(){
            var search = $(this).val();

            if(search != ''){
                load_data(search);
            } else {
                load_data();
            }
        });
    });

</script>