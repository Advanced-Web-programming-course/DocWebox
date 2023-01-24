<?php
include "../components/modals/book_appointment_modal.php";

function display_all_services($services, $doctor_id, $patient_id)
{

    echo '
        <div class="all-services">
            <div class="title">Όλες οι Yπηρεσίες</div>
            <section>';
    for ($i = 0; $i < count($services); $i++) {
        book_appointment_modal($services[$i]["id"], $services[$i], $doctor_id, $patient_id);
        echo "<a href='#' class='service' role='button' data-bs-toggle='modal' data-bs-target='#bookAppointmentModal-" . $services[$i]["id"] . "'" . ">
                    <div class='el colservice'>" . $services[$i]["title"] . "</div>
                    <div class='el colprice'>€" . $services[$i]["price"] . "</div>
                </a>
                <hr>";
    }
    echo '</section>
        </div>
    ';
}
