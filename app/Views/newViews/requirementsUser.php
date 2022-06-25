<?php
    include("baseLogged.php");
?>    
    
<div class="container cont60">
    
    <div class="row">
        <div class="col">
            <?php
                for($i = 0; $i <3; $i++){
                    include("requirementCardUser.php");
                }
            ?>
        </div>
    </div>
</div>
<script>
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl)
    })  
</script>


