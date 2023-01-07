<?php 
    require_once "../components/modals/phone_modal.php";
?>

<div class='all-apointments' id='all_apointments'>
    <div class='title-custom'>Ολοκληρωμένες Επισκέψεις</div>
    <section>
        <?php
         $today = time();
         $completed = 0;
         for ($i = 0; $i < count($appointments); $i++) { 
            $date=strtotime($appointments[$i]['appointment_date']); 
            if($date< $today){
                $completed++;
            }
        }
            
        if ($completed == 0){
            echo "
            <div class='not-completed-box'><span id='not-completed'> Ακόμα δεν έχεις πραγματοποιήσει καμία επίσκεψη σε γιατρό!</span></div>";
        }
        else{
            echo"<header>
                <div class='column'>Ονοματεπώνυμο Γιατρού</div>
                <div class='column'>Υπηρεσία</div>
                <div class='column'>Τιμή</div>
                <div class='column'>Ημερομηνία</div>
                <div class='column column-sm'></div>
            </header>";
           
            for ($i = 0; $i < count($appointments); $i++) { 
                $date=strtotime($appointments[$i]['appointment_date']); 
                if($date< $today){ 
                    $doctor=select_doctor_by_id($conn, $appointments[$i]['doctor_id']);
                    $service=select_doctor_service_by_id($conn, $appointments[$i]['service_id']);
                    $app_id=$appointments[$i]['id']; 
                    $formated_date=date("d/m/Y H:m", $date); 
                    phone_modal($app_id,$doctor['phone']); 
                    echo" <div class='row'>
                    <div class='column'>".$doctor['full_name']."</div>
                    <div class='column'>".$service['title']."</div>
                    <div class='column'>".$service['price']."€</div>
                    <div class='column'>$formated_date</div>
                    <div class='column column-sm'>
                        <a href='#' class='icon' role='button' data-bs-toggle='modal' data-bs-target='#phoneModal-$app_id'>
                            <img src='../images/call.png' alt='' width='20' height='20'>
                        </a>
                    </div>
                    </div>
                ";
                }
            }
        }
?>


    </section>
</div>