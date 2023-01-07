<?php
function display_edit_profile_section($name,$email,$phone){
    echo "
<div id='edit-profile-section'>
    <div class='title'>Επεξεργασία Στοιχείων</div>
    <form action=''>
        <div class='row1'>
            <input type='text' id='name' name='name' placeholder='Ονοματεπώνυμο' value='".$name."'>
            <input type='email' id='email' name='email' placeholder='Email' value='".$email."'>
        </div>
        <div class='row2'>
            <input type='tel' id='tel' name='tel' placeholder='Τηλέφωνο' value='".$phone."'>

            <input type='file' name='profile-pic' id='profile-pic' accept='.jpg, .jpeg, .png' style='display:none;' />
            <label id='profile-picture' for='profile-pic'>Ανέβασμα Εικόνας</label>
            <input type='submit' id='submit' style='display:none;'>
            <label id='save' for='submit'>Αποθήκευση</label>
        </div>
    </form>

</div>";}
?>