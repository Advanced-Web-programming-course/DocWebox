<?php

///info1 -> email for member + specializaton for doctor
///info2 -> tel for member + address,region for doctor

function display_profile_section($name,$info1,$info2)
{
    echo "
    <div class='profile-section'>
    <div class='title'>Το προφίλ μου</div>
    <div class='profile'>
        <div class='col info-wrapper'>
            <div class='info'>
                <div class='photo'></div>
                <div class='person-info'>
                    <div class='name'>$name</div>
                    <div class='info1'>$info1</div>
                </div>
            </div>
            <div class='info2'>$info2</div>
        </div>
        <div class='buttons'>
            <div class='col'>
                <a id='delete-button'>Διαγραφή Λογαριασμού</a>
            </div>
            <div class='col'>
                <a href='../controllers/logout.php' id='logout-button'>Αποσύνδεση</a>
                <a id='edit-button'>Επεξεργασία</a>
            </div>
        </div>
    </div>
</div>";
}

function display_doctor_profile_section($name,$info1,$info2a,$info2b)
{
    echo "
    <div class='profile-section'>
    <div class='title'>Το προφίλ μου</div>
    <div class='profile'>
        <div class='col info-wrapper'>
            <div class='info'>
                <div class='photo'></div>
                <div class='person-info'>
                    <div class='name'>$name</div>
                    <div class='info1'>$info1</div>
                </div>
            </div>
            <div class='info2'>$info2a, $info2b</div>
        </div>
        <div class='buttons'>
            <div class='col'>
                <a id='delete-button'>Διαγραφή Λογαριασμού</a>
            </div>
            <div class='col'>
                <a href='../controllers/logout.php' id='logout-button'>Αποσύνδεση</a>
                <a id='edit-button'>Επεξεργασία</a>
            </div>
        </div>
    </div>
</div>";
}
?>