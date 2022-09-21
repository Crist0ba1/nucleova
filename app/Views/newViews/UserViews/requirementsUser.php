<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
  crossorigin="anonymous"></script>
<!-- Tempus Dominus JavaScript -->
<script src="https://cdn.jsdelivr.net/gh/Eonasdan/tempus-dominus@master/dist/js/tempus-dominus.js"
  crossorigin="anonymous"></script>

<!-- Tempus Dominus Styles -->
<link href="https://cdn.jsdelivr.net/gh/Eonasdan/tempus-dominus@master/dist/css/tempus-dominus.css"
  rel="stylesheet" crossorigin="anonymous">

<script>
	// Default date and time picker
	$('#datetimepicker-default').datetimepicker();
</script>

<?php
    include("baseLoggedUser.php");
?>    
    
<div class="container cont60">
    
    <div class="row">
        <div id="reqDiv2" class="col">
        <?php foreach($requerimientos as $req):?>
                <?php foreach($req as $row):?>
                    <?php include("requirementCardUser.php");?>
                <?php endforeach;?>            
            <?php endforeach;?>                
        </div>
    </div>
</div>
<script>
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl)
    })  
</script>
<script>
    function cancelarRequerimiento(idR){
        alert('cancelar requerimiento')
        event.preventDefault();
        $.ajax ({
            type: "get",
            url: "<?php echo base_url('/cancelarRequerimiento')?>/"+idR,
            success: function(data){
                $("#reqDiv2").load(location.href+" #reqDiv2>*","");
            },
            error: function(){
                alert("Error en la llamada ajax, de cancelar requerimiento");
            }
        });
    }
    function verImagenesR(){
        alert('Se mostraran las imagenes');
    }
</script>


