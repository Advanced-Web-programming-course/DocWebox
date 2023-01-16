<!-- phone modal -->
<?php
    function phone_modal($id, $phone){
        echo "
            <div class='modal fade' id='phoneModal-$id' tabindex='-1' role='dialog' aria-labelledby='phoneModalLabel' aria-hidden='true' data-bs-backdrop='static' data-bs-keyboard='false'>
                <div class='modal-dialog modalCenter' >
                    <div class='modal-content'>
                        <div class='modal-header'><button type='button' class='btn-close' data-bs-dismiss='modal'
                                aria-label='Close'></button></div>
                        <div class='modal-body'>Κάλεσε στο <a id='phoneNumber' href='tel:+$phone'>$phone</a></div><br />
                    </div>
                </div>
            </div>
        ";}
?>