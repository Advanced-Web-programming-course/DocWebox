<?php
function display_doctor_selected_section($fullname, $specializaton, $address, $region, $description, $img_url, $doctor_id)
{
    echo "<div class='doctor_selected_section'>
                <div class='doctor'>
                    <div class='col-info wrapper'>
                        <div class='information'>
                            <div><img class='photo' src=$img_url alt='doctor profile'></div>
                            <div class='doctor-info'>
                                <div class='name'>$fullname</div>
                                <div class='info1'>$specializaton</div>
                            </div>
                        </div>
                        <div class='info2'>$address, $region</div>
                    </div>
                </div>
                <div class='description'>$description</div>
           </div> ";
}

function display_simple_doctor_selected_section($fullname, $specializaton, $address, $region, $img_url)
{
    echo "<div class='doctor_selected_section'>
                <div class='doctor'>
                    <div class='col-info wrapper'>
                        <div class='information'>
                            <div><img class='photo' src=$img_url alt='doctor profile'></div>
                            <div class='doctor-info'>
                                <div class='name'>$fullname</div>
                                <div class='info1'>$specializaton</div>
                            </div>
                        </div>
                        <div class='info2'>$address, $region</div>
                    </div>
                </div>
           </div> ";
}
