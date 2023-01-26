<?php
function delete_account_modal($id)
{

  $message = "Επιθυμείς να διαγράψεις τον λογαριασμό σου;";

  if ($_SESSION['type'] == 'a') {
    $message = "Επιθυμείς να διαγράψεις αυτόν τον λογαριασμό;";
  }

  echo "<div class='modal fade' id='deleteModal-$id' tabindex='-1' aria-labelledby='cancelModalLabel' aria-hidden='true' data-bs-backdrop='static' data-bs-keyboard='false'>
    <div class='modal-dialog modalCenter'>
      <div class='modal-content'>
        <form class='cancel-form' action='' method='post'>
          <div class='modal-body'>$message <br />
          </div>
          <input type='text' hidden='true' name='account_id' value='$id'></p>
          <div class='modal-footer'>
            <button type='button' id='cancelbtn' class='cancel' data-dismiss='modal'>Ακύρωση</button>
            <button type='submit' id='confirmbtn' class='confirm'>Επιβεβαίωση</button>
          </div>
        </form>
      </div>
    </div>
  </div>";
}