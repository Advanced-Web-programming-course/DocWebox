<?php
require_once "../components/modals/phone_modal.php";
 require_once "../components/modals/edit_appointment_modal.php";
 require_once "../components/modals/cancel_modal.php";
//  require_once "../db_services/appointment_service.php";
require_once "../db_services/patient_service.php";
require_once "../db_services/doctor_service.php";


function patient_upcoming_apointments($conn){
    $appointments = select_appointments_by_patient_id($conn, $_SESSION['id']);
    $upcomming = 0;
    $today = time();
    for ($i = 0; $i < count($appointments); $i++) {
        $date = strtotime($appointments[$i]['appointment_date']);
        if ($date > $today) {
            $upcomming++;
            $doctor = select_doctor_by_id($conn, $appointments[$i]['doctor_id']);
            $service = select_doctor_service_by_id($conn, $appointments[$i]['service_id']);
            $app_id = $appointments[$i]['id'];
            $imerominia = date("d/m/Y", $date);
            $ora = date("H:00", $date);

            phone_modal($app_id,$doctor['phone']);
            edit_appointment_modal($app_id, $appointments[$i], $service, $doctor["id"]);
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
          <div class='service'>" . $doctor['specialization'] . "-" . $service['title'] . "</div>
      </div>
  </div>";
        }
    }
    if ($upcomming == 0) {
        echo "<span id='not-upcomming'> Δεν έχεις κλείσει κάποιο ραντεβού. Ξεκίνησε την αναζήτηση επιλέγοντας τη ειδικότητα που ψάχνεις και την τοποθεσία σου!</span>";
    }
}
function doctor_upcoming_apointments($conn){
    $appointments = select_appointments_by_doctor_id($conn, $_SESSION['id']);
    $upcomming = 0;
    $today = time();
    for ($i = 0; $i < count($appointments); $i++) {
        $date = strtotime($appointments[$i]['appointment_date']);
        if ($date > $today) {
            $upcomming++;
            $patient = select_patient_by_id($conn, $appointments[$i]['patient_id']);
            $service = select_doctor_service_by_id($conn, $appointments[$i]['service_id']);
            $app_id = $appointments[$i]['id'];
            $imerominia = date("d/m/Y", $date);
            $ora = date("H:00", $date);
            phone_modal($app_id,$patient['phone']);
            cancel_appointment_modal($app_id);
            echo "<div class='box'>
      <div class='icons'>
          <a href='' class='icon' role='button' data-bs-toggle='modal' data-bs-target='#phoneModal-$app_id'>
              <img src='../images/call.png' alt='' width='20' height='20'>
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
          <div class='name'> " . $patient['full_name'] . " </div>
          <div class='service'>  " . $service['title'] . "</div>
      </div>
  </div>";
        }
    }
    if ($upcomming == 0) {
        echo "<span id='not-upcomming'> Κανένας ασθενής δεν έχει προγραμματίσει προσεχές ραντεβού!</span>";
    }
}
?>
<div class='upcoming-apointments' id='upcoming_apointments'>
    <p>Επερχόμενα Ραντεβού</p>
    <div class='upcoming-box'>
        <?php
        if ($_SESSION['type'] == "p") {
            patient_upcoming_apointments($conn);
        }else if ($_SESSION['type'] == "d") {
            doctor_upcoming_apointments($conn);
        }
        ?>

    </div>
</div>