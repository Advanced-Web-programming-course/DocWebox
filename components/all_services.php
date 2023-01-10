<?php
include "../components/modals/book_appointment_modal.php";
// for testing
book_appointment_modal(1, 2);
?>

<div class='all-services'>
    <div class='title'>Όλες οι Yπηρεσίες</div>
    <section>
        <a href='#' class="service" role="button" data-bs-toggle="modal" data-bs-target="#bookAppointmentModal">
            <div class="el colservice">Απλή Επίσκεψη</div>
            <div class="el colprice">€25</div>
        </a>
        <hr>
        <a href='#' class="service" role="button" data-bs-toggle="modal" data-bs-target="#bookAppointmentModal">
            <div class="el colservice">Τεστ Γρίπης</div>
            <div class="el colprice">€25</div>
        </a>
        <hr>
        <a href='#' class="service" role="button" data-bs-toggle="modal" data-bs-target="#bookAppointmentModal">
            <div class="el colservice">Κατ’οίκον Επίσκεψη</div>
            <div class="el colprice">€25</div>
        </a>
    </section>
</div>