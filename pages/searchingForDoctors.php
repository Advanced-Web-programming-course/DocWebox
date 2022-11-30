<?php
include "../db_services/doctor_service.php";

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

if (str_ends_with($_SERVER["REQUEST_URI"], '/searchingForDoctors.php')) {
    $doctors = select_doctors();
} else {
    if ($_GET['location'] == "Τοποθεσία" and $_GET['speciality'] == "Ειδικότητα Ιατρού") {
        $doctors = select_doctors();
    } else if ($_GET['location'] != "Τοποθεσία" and  $_GET['speciality'] == "Ειδικότητα Ιατρού") {
        $doctors = select_doctors_by_region($_GET['location']);
    } else if ($_GET['location'] == "Τοποθεσία" and  $_GET['speciality'] != "Ειδικότητα Ιατρού") {
        $doctors = select_doctors_by_specialization($_GET['speciality']);
    } else if ($_GET['location'] != "Τοποθεσία" and  $_GET['speciality'] != "Ειδικότητα Ιατρού") {
        $doctors = select_doctors_by_specialization_region($_GET['speciality'], $_GET['location']);
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
    <script src="https://kit.fontawesome.com/d2c306d566.js" crossorigin="anonymous"></script>
    <script src="../js/searchig_for_doctor.js"></script>
</head>
<title>Search For Doctor</title>

<body>

    <div style="margin-bottom: 25px;">
        <?php include "../components/search_bar.php"; ?>
    </div>
    <?php
    if ($doctors != null) {
        foreach ($doctors as $doc) {
            echo add_doctor($doc['id'], $doc['full_name'], $doc['specialization'], $doc['address'], $doc['region'], $doc['region'], "50", $doc['img_url']);
        }
    }

    ?>
    <script>
        document.getElementById("search_button").onclick = search_for_doctor;

        function search_for_doctor() {
            window.location.href = "searchingForDoctors.php?location=" + document.getElementById("location").value +
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