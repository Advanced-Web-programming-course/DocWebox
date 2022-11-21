<div id='edit-doctor-profile-section'>
    <div class='title'>Επεξεργασία Προσωπικών Στοιχείων</div>
    <form action=''>
        <div class="row">
            <input type='text' id='name' name='name' placeholder='Ονοματεπώνυμο'>
            <input type='email' id='email' name='email' placeholder='Email'>
            <input type='tel' id='tel' name='tel' placeholder='Τηλέφωνο'>

        </div>
        <div class="row">
            <select name='doctor' id='doctor'>
                <option selected hidden>Ειδικότητα Ιατρού</option>
                <option value='1'>ΠΑΘΟΛΟΓΟΣ</option>
                <option value='2'>ΨΥΧΟΛΟΓΟΣ</option>
                <option value='3'>ΓΥΝΑΙΚΟΛΟΓΟΣ</option>
            </select>
            <input type='file' name='profile-pic' id='profile-pic' accept='.jpg, .jpeg, .png' style='display:none;' />
            <label id='profile-picture' for='profile-pic'>Ανέβασμα Εικόνας</label>
            <label id='description'>Επεξεργασία Περιγραφής</label>
        </div>
        <div class="row">
            <div class='title'>Επεξεργασία Στοιχείων Ιατρείου</div>
        </div>
        <div class="row">
            <input type='text' id='address' name='address' placeholder='Οδός'>
            <input type='text' id='region' name='region' placeholder='Περιοχή'>
        </div>
        <input type='submit' id='submit' style='display:none;'>
        <label id='save' for='submit'>Αποθήκευση</label>

    </form>

</div>