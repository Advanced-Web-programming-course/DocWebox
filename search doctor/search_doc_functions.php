<?php
function add_doctor($name, $speciality,$address,$price,$num_of_stars){
    $doc_element ="
    <div class='doctor grey_font_color gray_borderline'>
        <div id='section_1'>
            <label class='big_text_size'>".$name."</label>
            <label class='small_text_size'>".$speciality."</label>
            <label class='small_text_size'>".$address."</label>
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
                <button class='pink_background'>Κλέισε Ραντεβού</button>
            </div>
            
        </div>
    </div>
    ";
    return $doc_element;
}
?>