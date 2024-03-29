<?php

function button_sidebar($name)
{

    $type = $_SESSION["type"];

    $url = "";
    if ($type === "p") {
        $url = 'member_profile_page.php?patient_id=' . $_SESSION["id"];
    } else if ($type === "d") {
        $url = 'doctor_profile_page.php?doctor_id=' . $_SESSION["id"];
    }

    echo "<link rel='stylesheet' href='../css/sidebar_style.css'>
    <nav id='sidebar-component' class='col-lg-2 col-md-4'>

        <div id='navbuttons'>
            <a class='sidebarbutton' id='upcoming_apointments_button' href='main_page.php#upcoming_apointments'>Επερχόμενα<br>Ραντεβού</a>
            <a class='sidebarbutton' id='all_apointments_button' href='main_page.php#all_apointments'>Όλα τα Ραντεβού</a>
        </div>
        
        <div id='user-div' onclick=location.href='$url'>
            <a id='user-name' href='#'>$name</a>
            <div id='image-wrapper'>
            <img id='user-image' width=30 height=30 src='../images/user_image.png' alt='profile image'>
            </div>
        </div>
    </nav>";

}

function checklist_sidebar()
{


    echo "<link rel='stylesheet' href='../css/sidebar_style.css'>
        <nav id='sidebar-component'>
    
            <h1 id='locheader'>Τοποθεσία</h1>
            <div id='navcheckbox'>
                <input type='checkbox' id='loc1' name='location1' value='loc1'>
                <label for='loc1'>location1</label><br>
                <input type='checkbox' id='loc2' name='location2' value='loc2'>
                <label for='loc2'>location2</label><br>
                <input type='checkbox' id='loc3' name='location3' value='loc3'>
                <label for='loc3'>location3</label><br>
                <input type='checkbox' id='loc4' name='location4' value='loc4'>
                <label for='loc4'>location4</label><br>
                <input type='checkbox' id='loc5' name='location5' value='loc5'>
                <label for='loc5'>location5</label><br>
            </div>
    
            <div id='range_container'>
                <h1 id='priceheader'>Τιμή</h1>
                <div class='sliders_control'>
                    <input id='fromSlider' type='range' value='43' min='0' max='100'/>
                    <input id='toSlider' type='range' value='58' min='0' max='100'/>
                </div>
                <div class='form_control'>
                    <div class='form_control_container'>
                        <div id='fromInput'></div>
                    </div>
                    <div class='form_control_container'>
                        <div id='toInput'></div>
                    </div>
                 </div>
            </div>
            
            <div id='user-div'>
                <a id='user-name' href='#'>Ονοματεπώνημο Μέλους</a>
                <img id='user-image' src='../images/user_image.png' alt=''>
            </div>
            <script src='../js/sidebar_price_functions.js'></script>
        </nav>";

}

?>