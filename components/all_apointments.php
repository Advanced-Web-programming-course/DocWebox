<?php 
    require_once "../components/modals/phone_modal.php";
?>

<div class='all-apointments' id='all_apointments'>
    <div class='title-custom'>Ολοκληρωμένες Επισκέψεις</div>
    <section>
        <header>
            <div class="column">Ονοματεπώνυμο Γιατρού</div>
            <div class="column">Υπηρεσία</div>
            <div class="column">Τιμή</div>
            <div class="column">Ημερομηνία</div>
            <div class="column column-sm"></div>
        </header>
        <div class="row">
            <div class="column">Δρ. Παπαιωάννου</div>
            <div class="column">Απλή Επίσκεψη</div>
            <div class="column">€25</div>
            <div class="column">27/10/2022 09:30</div>
            <div class="column column-sm">
                <a href="#" class="icon" role="button" data-bs-toggle="modal" data-bs-target="#phoneModal">
                    <img src="../images/call.png" alt="" width="20" height="20">
                </a>
            </div>
        </div>

    </section>
</div>