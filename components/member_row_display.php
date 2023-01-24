<?php
function patient_row_display($patient, $button_label)
{
    $patient_element = "
    <div class='doctor grey_font_color gray_borderline' id='doc_$patient[id]'>    
        <div id='section_1'>
            <div style='display: flex;'>
                <img class='circle' src='$patient[img_url]' alt='patient' height='48px' height='48px'>
                <div style = 'margin-left:14px;'>
                    <label style='display: block;' class='big_text_size'>$patient[full_name]</label>
                </div>
            </div>
        </div>
        <div id='section_2'>
            <button onclick = \" window.location.href='member_profile_page.php?patient_id=$patient[id]'   \" class='book_appointment pink_background big_text_size'>$button_label</button>
        </div>
    </div>
    ";
    return $patient_element;
}
