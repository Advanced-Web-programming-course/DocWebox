<!-- review popUp form -->
<script src="https://kit.fontawesome.com/5f72dfafa5.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="../css/pop_up.css">

<div class='popUp'>
    <form class='review-form' action='' method='post'>  

        <div class='review-head'> 
                <div class='title'>Η κριτική μου</div>
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
            <button class='cancel' id='rcancelbtn'>Ακύρωση</button>
            <button class='send' id='sendbtn'>Αποστολή</button>
        </div>

    </form>

</div>


