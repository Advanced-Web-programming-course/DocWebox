<!-- edit description modal -->
<?php
function edit_doctor_description_modal($doc_id)
{
    
    echo "<div class='modal fade' id='editDescriptionModal' tabindex='-1' 
            aria-labelledby='editDescriptionModalLabel' aria-hidden='true' 
            data-bs-backdrop='static' data-bs-keyboard='false'>
            <div class='modal-dialog modalCenter'>
                <div class='modal-content'>
                    <form class='cancel-form' action='' method='POST' >
                        <div class='modal-body'>
                            <form>
                                <div class='form-group'>
                                    <input type='text' hidden='true' id='docId' name='doctorModalId' value='$doc_id'></p>
                                    <label for='message-text' class='col-form-label'>Η περιγραφή μου</label>
                                    <textarea name = 'description' class='form-control' id='desc-text' type='text' value='SOOOS' placeholder='Γράψτε περισσότερα για εσάς......'></textarea>
                                </div>
                            </form>
                        </div>
                        <div class='modal-footer'>
                            <button type='button' id='ccancelbtn' class='cancel' data-bs-dismiss='modal' >Ακύρωση</button>
                            <button type='submit' class='save' id='saveBtn' name='updateDesc' value='Αποθήκευση'>Αποθήκευση</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>";
        
} ?>
