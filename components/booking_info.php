
<?php
function display_booking_info_section($date, $hour, $visitType, $price)
{
    echo "  
    <div class='booking_info_section'>
        <div class='title'>Πληροφορίες Ραντεβού</div>
        <div class='booking'>
            <div class='info-booking'>
                <div class='date'>$date,</div>
                <div class='hour'>$hour</div>|
                <div class='visitType'>$visitType </div> 
            </div> 
            <div class='price'> $price </div>    
        </div>
    </div> 
    ";
}


function display_member_info_section($fullname, $email, $phone, $doctor_id, $service_id, $date, $time)
{
    echo "  
    <div class='member_info_section'>
        <div class='title'>Στοιχεία Χρήστη</div>
        <div class='member'>
            <div class='info-member'>
                <div class='details-field'>
                    <i class='fa-solid fa-user'></i>
                    <div class='fullname'>$fullname</div>
                </div>
                    <div class='details-field'>
                    <i class='fa-solid fa-envelope'></i>
                <div class='email'>$email</div>
                </div>
                    <div class='details-field'>
                    <i class='fa-solid fa-mobile-screen'></i>
                <div class='phone'><a style='text-decoration: none;' href='tel:+$phone'>$phone</a></div>    
                </div>  
            </div>
        </div>
    </div>
    <div class='confirmB'> 
    <form action='' method='post'>
        <input type='text' hidden name='date' value='$date'>
        <input type='text' hidden name='time' value='$time'>
        <input type='text' hidden name='doctor_id' value='$doctor_id'>
        <input type='text' hidden name='service_id' value='$service_id'>
        <button type='submit' name='confirm' class='btn btn-secondary' data-toggle='modal' data-target='#confirmationModal'>
        Επιβεβαίωση</button>
    </form>
    </div>";
}

include "../components/modals/booking_confirmation_modal.php";
?>


