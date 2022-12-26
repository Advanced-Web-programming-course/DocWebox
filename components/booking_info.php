<?php
function display_booking_info_section($date,$hour,$visitType,$price)
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

function display_member_info_section($fullname,$email,$phone)
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
                <div class='phone'>$phone</div>    
                </div>  
            </div>
        </div>
    </div> 
    <form class='button'>
        <input type='submit' class='confirm' id='confirm-button' value='Επιβεβαίωση'>
    </form>
    ";
}

function display_booking_confrimation()
{
    echo "
    <div class='confirmation'>
        <img src='../images/Checkmark.png' alt='Checkmark'>
        <div class='text'>Το ραντεβού σου επιβεβαιώθηκε!</div>
        <div class='subtext'>Μπορείς να βρείς περισσότερες πληροφορίες για την επίσκεψη σου στα Επερχόμενα Ραντεβού </div>       
    </div> 
    ";
}


?>
