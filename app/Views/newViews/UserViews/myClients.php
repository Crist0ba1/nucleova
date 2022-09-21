<?php
    include("baseLoggedUser.php");
?>    
    
<div class="container cont60 botonesSolicitud">    
    <div class="row">
        <div class="col">
            <?php if(isset($solicitud)):?>
                <?php if($solicitud != 0):?>
                    <?php foreach($solicitudes as $usser):?>
                        <?php include("clientCard.php");?>
                    <?php endforeach;?>
                <?php else:?>
                    <div class="card bottom20 border-blue">
                        <div class="card-body">
                            <div class="row"> 
                                <h4> No tiene solicitudes pendientes</h4>
                            </div>
                        </div>
                    </div>    
                <?php endif;?>
            <?php endif;?>

            <?php if(isset($clientes)):?>
                <?php if($clientes!= 0):?>
                    <?php foreach($solicitudes as $usser):?>
                        <?php include("clientCard.php");?>
                    <?php endforeach;?>
                <?php else:?>
                    <div class="card bottom20 border-blue">
                        <div class="card-body">
                            <div class="row"> 
                                <h4> Por el momento no tiene clientes.</h4>
                            </div>
                        </div>
                    </div>    
                <?php endif;?>
            <?php endif;?>
        </div>
    </div>
</div>
<script>
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl)
    })  
</script>


