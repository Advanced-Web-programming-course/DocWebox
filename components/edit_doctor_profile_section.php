<?php
include "../components/modals/edit_description_modal.php";


function display_doctor_edit_profile_section($name, $email, $phone, $specialization, $region, $address, $id, $doctor_specialities)
{
    edit_doctor_description_modal($id);
    echo "
<div id='edit-doctor-profile-section'>
    <div class='title'>Επεξεργασία Προσωπικών Στοιχείων</div>
    <form action='' method='post' enctype='multipart/form-data'>
        <div class='row'>
            <input type='text' id='name' name='name' placeholder='Ονοματεπώνυμο' value= '" . $name . "'>
            <input type='email' id='email' name='email' placeholder='Email' value='" . $email . "'>
            <input type='tel' id='tel' name='tel' placeholder='Τηλέφωνο'  value='" . $phone . "'>

        </div>
        <div class='row'>
            <select name='specialization' id='doctor'>
                <option default hidden disabled >Ειδικότητα Ιατρού</option>";
    for ($i = 0; $i < count($doctor_specialities); $i++) {
        if ($specialization == $doctor_specialities[$i]) {
            echo "<option selected value='$doctor_specialities[$i]'>$doctor_specialities[$i]</option>";
        } else {
            echo "<option value='$doctor_specialities[$i]'>$doctor_specialities[$i]</option>";
        }
    }

    echo "</select>
            <input type='file' name='profile-pic' id='profile-pic' accept='.jpg, .jpeg, .png' style='display:none;' />
            <label id='profile-picture' for='profile-pic'>Ανέβασμα Εικόνας</label>
            <label id='description'><a href='#' id='editDesc' role='button' data-bs-toggle='modal'
                    data-bs-target='#editDescriptionModal'>Επεξεργασία Περιγραφής</a></label>
        </div>
        <div class='row'>
            <div class='title'>Επεξεργασία Στοιχείων Ιατρείου</div>
        </div>
        <div class='row'>
            <input type='text' id='address' name='address' placeholder='Οδός' value='" . $address . "'>
            <input type='text' id='region' name='region' placeholder='Περιοχή' value='" . $region . "'>
        </div>
        <input type='submit' name='submit' id='submit' style='display:none;'>
        <label id='save' for='submit'>Αποθήκευση</label>

    </form>

</div>";
}
