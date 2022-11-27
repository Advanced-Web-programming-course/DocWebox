<?php
function display_doctor_selected_section($fullname,$specializaton,$address,$region,$description)
{
    echo "<div class='doctor_selected_section'>
                <div class='doctor'>
                    <div class='col info-wrapper'>
                        <div class='info'>
                            <div class='photo'></div>
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

function display_simple_doctor_selected_section($fullname,$specializaton,$address,$region)
{
    echo "<div class='doctor_selected_section'>
                <div class='doctor'>
                    <div class='col info-wrapper'>
                        <div class='info'>
                            <div class='photo'></div>
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
?>


