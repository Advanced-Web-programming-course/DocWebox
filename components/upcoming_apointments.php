<?php 
    require_once "../components/modals/phone_modal.php";
    include "../components/modals/edit_appointment_modal.php"; 
    include "../components/modals/cancel_modal.php"; 
    include "../db_services/appointment_service.php";
    //include "../db_services/patient_service.php";
    include "../db_services/doctor_service.php";

    $appointments = select_appointments_by_patient_id($conn, $_SESSION['id']);
?>
<div class='upcoming-apointments' id='upcoming_apointments'>
    <p>Επερχόμενα Ραντεβού</p>
    <div class=' upcoming-box'>

        <?php
        for ($i = 0; $i < count($appointments); $i++) {
            $doctor = select_doctor_by_id($conn, $appointments[$i]['doctor_id']);
            $date = explode(" ",$appointments[$i]['appointment_date']);
            $app_id = $appointments[$i]['id'];
            $imerominia = explode("-",$date[0]); 
            $ora = explode(":",$date[1]); 
    
          phone_modal($app_id, $doctor['phone']);
    
          echo"<div class='box'>
          <div class='icons'>
              <a href='' class='icon' role='button' data-bs-toggle='modal' data-bs-target='#phoneModal-$app_id'>
                  <img src='../images/call.png' alt='' width='20' height='20'>
              </a>
              <a href='' class='icon' role='button' data-bs-toggle='modal' data-bs-target='#editAppointmentModal'>
                  <img src='../images/edit.png' alt='' width='23' height='23'>
              </a>
              <a href='' class='icon' role='button' data-bs-toggle='modal' data-bs-target='#cancelModal'>
                  <img src='../images/delete.png' alt='' width='20' height='20'>
              </a>
          </div>
          <div class='date'>
              <div class='time'> $ora[0]:$ora[1] </div>
              <div class='day'>  $imerominia[2]/$imerominia[1]/$imerominia[0] </div>
          </div>
          <div class='info'>
              <div class='name'> ".$doctor['full_name']." </div>
              <div class='service'>Απλή Επίσκεψη</div>
          </div>
      </div>";
        }
        ?>

    </div>
</div>