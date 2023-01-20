<!-- book appointment modal -->
<?php
function book_appointment_modal($id, $service, $doctor_id, $conn)
{
    require_once "../db_services/availability_service.php";

    $month = date('m');
    $day = date('d');
    $year = date('Y');

    $json_availability_array = json_encode(get_non_available_hours($conn, $doctor_id, $day, $month, $year));

    echo "<div class='modal fade' id='bookAppointmentModal-$id' tabindex='-1' aria-labelledby='bookAppointmentModalLabel'
    aria-hidden='true' data-bs-backdrop='static' data-bs-keyboard='false'>
    <div class='modal-dialog modalCenter'>
        <div class='modal-content'>
            <form class='book-appointment-form' action='' method='post'>
            <input type='text' name='service-id' value='$id' hidden>
                <div class='modal-body'>
                    <div class='btitle'>Υπηρεσία</div>
                    <div class='bsubtitle' id='simple-visit'>" . $service["title"] . " " . $service["price"] . "</div>
                    <div class='btitle'>Επιλέξτε ημέρα και ώρα του ραντεβού</div> <br />
                    <div class='comment'>
                        <div class='calendararea'>
                            <section class='container'>
                                    <div class='row form-group'>
                                    <div class='col-md-12'>
                                    <label for='date' class='col-md col-form-label'>Ημέρα</label>
                                            <div class='input-group date' id='datepicker$id'>
                                                <input required name='date' id='datepicker$id' type='text' class='form-control'>
                                                <span class='input-group-append'>
                                                    <span class='input-group-text bg-white d-block'>
                                                        <i class='fa fa-calendar'></i>
                                                    </span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                            </section>
                            <section class='container'>
                                    <div class='row form-group'>
                                    <div class='col-md-12'>
                                    <label for='date' class='col-md col-form-label'>Ώρα</label>
                                            <div class='input-group date' id='timepicker$id'>
                                                <input required name='time' type='text' class='timepicker$id form-control'>
                                                <span class='input-group-append'>
                                                    <span class='input-group-text bg-white d-block'>
                                                        <i class='fa-regular fa-clock'></i>
                                                    </span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                            </section>
                        </div>
                    </div>
                    <script src = '../js/datePicker.js'> </script>
                    <script>
                        handleDateTime($id, $doctor_id, $json_availability_array);
                    </script>
                </div>
                <div class='modal-footer'>
                    <button type='button' class='cancel' id='dcancelbtn' data-bs-dismiss='modal'>Ακύρωση</button>
                    <button type='submit' class='continue' id='continue'>Συνέχεια</button>
                </div>
            </form>
        </div>
    </div>
</div>";
}
?>