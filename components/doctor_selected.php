<?php
// info1 -> email for member + specializaton for doctor
// info2 -> tel for member + address,region for doctor

function display_doctor_selected_section($name,$info1,$info2a,$info2b,$description)
{
    echo "<div class='doctor_selected_section'>
                <div class='doctor'>
                    <div class='col info-wrapper'>
                        <div class='info'>
                            <div class='photo'></div>
                            <div class='doctor-info'>
                                <div class='name'>$name</div>
                                <div class='info1'>$info1</div>
                            </div>
                        </div>
                        <div class='info2'>$info2a, $info2b</div>
                    </div>
                </div>
                <div class='description'>$description</div>
           </div> " ;} 
?>


