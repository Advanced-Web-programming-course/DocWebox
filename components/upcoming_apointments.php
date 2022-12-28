<div class='upcoming-apointments'>
    <p>Επερχόμενα Ραντεβού</p>
    <div class='upcoming-box'>
        <div class='box'>
            <div class='icons'>
                <a href="" class="icon">
                    <img src="../images/call.png" alt="" width="20" height="20">
                </a>
                <a href="" class="icon">
                    <img src="../images/edit.png" alt="" width="23" height="23">
                </a>
                <a href="" class="icon" role="button" data-bs-toggle="modal" data-bs-target="#cancelModal">
                    <img src="../images/delete.png" alt="" width="20" height="20">
                </a>
            </div>
            <div class='date'>
                <div class='time'> 9:30 </div>
                <div class='day'> 06/11/2022 </div>
            </div>
            <div class='info'>
                <div class='name'>Μαρία Παπαδοπούλου </div>
                <div class='service'>Απλή Επίσκεψη</div>
            </div>
        </div>
    </div>
</div>

<!-- cancel modal -->
<div class="modal fade" id="cancelModal" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modalCenter">
    <div class="modal-content">
      <br />
      <div class="modal-body">
      Επιθυμείς να ακυρώσεις το ραντεβού σου; <br />
      </div>
      <div class="modal-footer">
        <button type="button" id='ccancelbtn' class="cancel" data-bs-dismiss="modal" >Άκυρο</button>
		<button type="submit" id='confirmbtn' class="confirm">Επιβεβαίωση</button>
      </div>
    </div>
  </div>
</div>