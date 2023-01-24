<?php
function doctor_row_display($doctor, $button_label)
{
    $doc_element = "
    <div class='doctor grey_font_color gray_borderline' id='doc_$doctor[id]'>    
        <div id='section_1'>
            <div style='display: flex;'>
                <img class='circle' src='$doctor[img_url]' alt='doctor' height='48px' height='48px'>
                <div style = 'margin-left:14px;'>
                    <label style='display: block;' class='big_text_size'>$doctor[full_name]</label>
                    <label style='display: block;' class='small_text_size'>$doctor[specialization]</label>
                </div>
            </div>
            <label id='address' class='small_text_size'>$doctor[address], $doctor[region]</label>
            <input style='display:none;' id='doc_$doctor[id]_region' type='text' value='$doctor[region]'>
        </div>
        <div id='section_2'>
            <button onclick = \" window.location.href='doctor_profile_page.php?doctor_id=$doctor[id]'   \" class='book_appointment pink_background big_text_size'>$button_label</button>
        </div>
    </div>
    ";
    return $doc_element;
}
