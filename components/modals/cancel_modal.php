<?php
function cancel_appointment_modal($id)
{
  echo "<div class='modal fade' id='cancelModal-$id' tabindex='-1' aria-labelledby='cancelModalLabel' aria-hidden='true' data-backdrop='static' data-keyboard='false'>
  <div class='modal-dialog modalCenter'>
    <div class='modal-content'>
      <form class='cancel-form' action='' method='post'>
        <div class='modal-body'>Επιθυμείς να ακυρώσεις το ραντεβού σου; <br />
        </div>
        <input type='text' hidden='true' name='appointmentId' value='$id'></p>
        <div class='modal-footer'>
          <button type='button' id='cancelbtn' class='cancel' data-bs-dismiss='modal'>Ακύρωση</button>
          <button type='submit' id='confirmbtn' class='confirm'>Επιβεβαίωση</button>
        </div>
      </form>
    </div>
  </div>
</div>";
}
?>