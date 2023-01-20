<?php

function show_search_bar($towns, $types)
{
    echo "
        <div class='search'>
                <select name='doctor' id='doctor'>
                    <option selected default >Ειδικότητα Ιατρού</option> ";
    for ($i = 0; $i < count($towns); $i++) {
        if ($types[$i] != "") {
            echo "<option value='" . $types[$i] . "'>" . $types[$i] . "</option>";
        }
    }
    echo "</select>
                <select name='location' id='location'>
                <option selected default >Τοποθεσία</option>";

    for ($i = 0; $i < count($towns); $i++) {
        if ($types[$i] != "") {
            echo "<option value='" . $towns[$i] . "'>" . $towns[$i] . "</option>";
        }
    }
    echo "</select>
                <button id='search_button' class='pink_background'>
                <i class='fa-solid fa-magnifying-glass' style='color:white;'></i>
                </button>
                <div class='livesearch'>
                    <div class='form-group'>
                        <div class='input-group'><input type='text' name='mysearch' 
                            id='mysearch' placeholder='Αναζήτησε...' class='form-control' /></div>
                    </div>
                </div>
        </div> 
    ";
}
