<?php
require_once "../components/modals/phone_modal.php";
include "../components/modals/edit_appointment_modal.php";
include "../components/modals/cancel_modal.php";
// include "../db_services/appointment_service.php";
//include "../db_services/patient_service.php";
include "../db_services/doctor_service.php";

$appointments = select_appointments_by_patient_id($conn, $_SESSION['id']);
?>
<div class='upcoming-apointments' id='upcoming_apointments'>
    <p>Επερχόμενα Ραντεβού</p>
    <div class='upcoming-box'>
        <?php
        $upcomming=0;
        $today = time();
        for ($i = 0; $i < count($appointments); $i++) {
            $date = strtotime($appointments[$i]['appointment_date']);
            if ($date > $today) {
                $upcomming++;
                $doctor = select_doctor_by_id($conn, $appointments[$i]['doctor_id']);
                $service = select_doctor_service_by_id($conn, $appointments[$i]['service_id']);
                $app_id = $appointments[$i]['id'];
                $imerominia = date("d/m/Y", $date);
                $ora = date("H:m", $date);

                phone_modal($app_id, $doctor['phone']);
                edit_appointment_modal($app_id, $service);
                cancel_appointment_modal($app_id);
                echo "<div class='box'>
          <div class='icons'>
              <a href='' class='icon' role='button' data-bs-toggle='modal' data-bs-target='#phoneModal-$app_id'>
                  <img src='../images/call.png' alt='' width='20' height='20'>
              </a>
              <a href='' class='icon' role='button' data-bs-toggle='modal' data-bs-target='#editAppointmentModal-$app_id'>
                  <img src='../images/edit.png' alt='' width='23' height='23'>
              </a>
              <a href='' class='icon' role='button' data-bs-toggle='modal' data-bs-target='#cancelModal-$app_id'>
                  <img src='../images/delete.png' alt='' width='20' height='20'>
              </a>
          </div>
          <div class='date'>
              <div class='time'>$ora</div>
              <div class='day'>$imerominia</div>
          </div>
          <div class='info'>
              <div class='name'> " . $doctor['full_name'] . " </div>
              <div class='service'>  " . $service['title'] . "</div>
          </div>
      </div>";
            }
        }
        if ($upcomming == 0){
            echo "<span id='not-upcomming'> Δεν έχεις κλήσει κάποιο ραντεβού. Ξεκίνησε την αναζήτηση επιλέγοντας τη ειδικότητα που ψάχνεις και την τοποθεσία σου!</span>";

        }
        ?>

    </div>
</div>