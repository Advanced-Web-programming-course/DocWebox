<!-- edit description modal -->
<div class="modal fade" id="editDescriptionModal" tabindex="-1" aria-labelledby="editDescriptionModalLabel" aria-hidden="true" data-bs-backdrop='static' data-bs-keyboard='false'>
  <div class="modal-dialog modalCenter">
    <div class="modal-content">
        <form class='cancel-form' action='' method='post'>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Η περιγραφή μου</label>
                        <textarea class="form-control" id="message-text" id='description-text' type='text' placeholder="Γράψτε περισσότερα για εσάς......"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id='ccancelbtn' class="cancel" data-bs-dismiss="modal" >Ακύρωση</button>
                <button class='save' id='save'>Αποθήκευση</button>
            </div>
        </form>
    </div>
  </div>
</div>
