<?php 
    include "../components/modals/phone_modal.php";
    include "../components/modals/edit_appointment_modal.php"; 
    include "../components/modals/cancel_modal.php"; 
?>


<div class='upcoming-apointments'>
    <p>Επερχόμενα Ραντεβού</p>
    <div class='upcoming-box'>
        <div class='box'>
            <div class='icons'>
                <a href="" class="icon" role="button" data-bs-toggle="modal" data-bs-target="#phoneModal">
                    <img src="../images/call.png" alt="" width="20" height="20">
                </a>
                <a href="" class="icon" role="button" data-bs-toggle="modal" data-bs-target="#editAppointmentModal">
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

