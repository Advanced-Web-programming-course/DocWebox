<!-- review popUp form -->
<head>
<script src="https://kit.fontawesome.com/5f72dfafa5.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="../css/pop_up.css">
</head>
<div class='popUp'>
    <form class='review' action='' method='post'>  

        <div class='row'> 
                <div class='col'>Η κριτική μου</div>
                <a class='stars' >
                    <i class="fa-regular fa-star" onmouseover="this.className = 'fa-solid fa-star'"; onmouseout="this.className='fa-regular fa-star'" ></i>
                    <i class="fa-regular fa-star" onmouseover="this.className = 'fa-solid fa-star'"; onmouseout="this.className='fa-regular fa-star'" ></i>
                    <i class="fa-regular fa-star" onmouseover="this.className = 'fa-solid fa-star'"; onmouseout="this.className='fa-regular fa-star'" ></i>
                    <i class="fa-regular fa-star" onmouseover="this.className = 'fa-solid fa-star'"; onmouseout="this.className='fa-regular fa-star'" ></i>
                    <i class="fa-regular fa-star" onmouseover="this.className = 'fa-solid fa-star'"; onmouseout="this.className='fa-regular fa-star'" ></i>

                </a>    
        </div>

        <div class='comment'>
            <textarea class='rtext' id='review_text' type='text' placeholder="Γράψτε ένα σχόλιο..."></textarea>
        </div>

        <div class='bottombtns'>
            <button class='cancel' id='cancelbtn'>Ακύρωση</button>
            <button class='send' id='sendbtn'>Αποστολή</button>
        </div>

    </form>

</div>


