
<?php

    function ModalError($title, $body){
        ?>
        
        <div class="modal fade show" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-modal="true" style="display: block;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"><?php echo $title ?></h5>
                    </div>
                    <div class="modal-body">
                        <p><?php echo $body ?></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="#exampleModal" id="Close">Close</button>
                    </div>
                </div>
            </div>
        </div> 
        <?php
    }
?>

