<!-- book appointment modal -->
<?php
function book_appointment_modal($id, $service)
{
    echo "<div class='modal fade' id='bookAppointmentModal-$id' tabindex='-1' aria-labelledby='bookAppointmentModalLabel'
    aria-hidden='true' data-bs-backdrop='static' data-bs-keyboard='false'>
    <div class='modal-dialog modalCenter modal-lg'>
        <div class='modal-content'>
            <form class='book-appointment-form' action='' method='post'>
                <div class='modal-body'>
                    <div class='btitle'>Υπηρεσία</div>

                    <!-- PREPEI NA ALLAZEI H YPHRESIA ANALOGWS TI DIALEGEI O XRISTIS-->
                    <div class='bsubtitle' id='simple-visit'>" . $service["title"] . " " . $service["price"] . "</div>
                    <div class='btitle'>Επιλέξτε ημέρα και ώρα του ραντεβού</div> <br />
                    <div class='comment'>
                        <div class='calendararea'>
                            <section class='container'>
                                <form>
                                    <div class='row form-group'>
                                        <label for='date' class='col-sm-1 col-form-label'>Ημέρα</label>
                                        <div class='col-sm-4'>
                                            <div class='input-group date' id='datepicker'>
                                                <input type='text' class='form-control'>
                                                <span class='input-group-append'>
                                                    <span class='input-group-text bg-white d-block'>
                                                        <i class='fa fa-calendar'></i>
                                                    </span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </section>
                            <section class='container'>
                                <form>
                                    <div class='row form-group'>
                                        <label for='date' class='col-sm-1 col-form-label'>Ώρα</label>
                                        <div class='col-sm-4'>
                                            <div class='input-group date' id='timepicker'>
                                                <input type='text' class='timepicker form-control'>
                                                <span class='input-group-append'>
                                                    <span class='input-group-text bg-white d-block'>
                                                        <i class='fa-regular fa-clock'></i>
                                                    </span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </section>
                        </div>
                    </div>
                    <script defer src = '../js/datePicker.js'> </script>
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