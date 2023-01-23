<!-- edit appointment modal -->
<?php
function edit_appointment_modal($id, $appointment, $service, $doctor_id)
{

    $date = explode(" ", $appointment["appointment_date"])[0];
    $date = explode("-", $date);

    $year = $date[0];
    $month = $date[1];
    $day = $date[2];

    $date = $month . "/" . $day . "/" . $year;

    $time = explode(" ", $appointment["appointment_date"])[1];
    $timeArr = explode(":", $time);
    $time = $timeArr[0] . ":" . $timeArr[1];

    echo "<div class='modal fade' id='editAppointmentModal-$id' tabindex='-1' aria-labelledby='editAppointmentModalLabel'
    aria-hidden='true' data-bs-backdrop='static' data-bs-keyboard='false'>
    <div class='modal-dialog modalCenter'>
        <div class='modal-content'>
            <form class='book-appointment-form' action='./confirm_appointment_page.php' method='post'>
            <input type='text' name='service_id' value='$id' hidden>
            <input type='text' name='doctor_id' value='$doctor_id' hidden>
            <input type='text' name='appointment_id' value='$appointment[id]' hidden>

                
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
                                                <input value='$date' required name='date' id='datepicker$id' type='text' class='form-control'>
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
                                                <input value='$time' required name='time' type='text' class='timepicker$id form-control'>
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
                        handleDateTime($id, $doctor_id);
                    </script>
                </div>
                <div class='modal-footer'>
                    <button type='button' class='cancel' id='dcancelbtn' data-bs-dismiss='modal'>Ακύρωση</button>
                    <button type='submit' name='continue' value='Συνέχεια' class='continue' id='continue'>Συνέχεια</button>
                </div>
            </form>
        </div>
    </div>
</div>";
}
?>