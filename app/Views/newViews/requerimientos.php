<?php
    include("baseLogged.php");
?>    
        
<div class="container cont60">
    <div class="row">
        <div class="col-sm-3">
            <button type="button" name="" id="" class="btn btn-primary btn-purple bottom15" >Nuevo Requerimiento <span class="badge bg-light text-dark">+</span></button>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <?php
                for($i = 0; $i <3; $i++){
                    include("cards.php");
                }
            ?>
        </div>
    </div>
</div>
        

 