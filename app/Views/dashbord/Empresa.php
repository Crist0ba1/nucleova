<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<style>

    #cardInfo .card {
        border: none;
        border-radius: 10px;
        box-shadow: 6px -6px teal;
    }

    #cardInfo .c-details span {
        font-weight: 300;
        font-size: 13px
    }

    #cardInfo .icon {
        width: 50px;
        height: 50px;
        background-color: #eee;
        border-radius: 15px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 39px
    }

    #cardInfo .badge span {
        background-color: #fffbec;
        width: 60px;
        height: 25px;
        padding-bottom: 3px;
        border-radius: 5px;
        display: flex;
        color: #fed85d;
        justify-content: center;
        align-items: center
    }

    #cardInfo .progress {
        height: 10px;
        border-radius: 10px
    }

    #cardInfo .progress div {
        background-color: red
    }

    #cardInfo .text1 {
        font-size: 14px;
        font-weight: 600
    }

    #cardInfo .text2 {
        color: #a5aec0
    }
</style>


    <div id="cardInfo" class="container mt-5 mb-3">
        <div class="row justify-content-around " >
            <h2>Div del proveedor de la empresa</h2>
            <div>
                <img src="<?php echo base_url('')?>/public/vistas/Dempresa.png" class="img-fluid"></a>
            </div>
            
        </div>
    </div>

<script>
    $("#regionRegister").change(function() {
       		$("#regionRegister option:selected").each(function() {
            	var id = $('#regionRegister').val();
            	var select = document.getElementById("comunaRegister"); //Seleccionamos el select

            	while (select.hasChildNodes()) {  // mientras exita un nodo child lo borra
                	select.removeChild(select.firstChild);
            	}

            	var aux = document.createElement("option"); //Creamos la opcion
            	aux.text = "-Seleccionar una comuna-"; //Metemos el texto en la opción
            	aux.value = "0";
            	select.add(aux);

            	//alert(idCategoria);
            	<?php foreach($comuna as $row):?>
	                if(id == <?= $row['region_id'];?>){
                    	var option = document.createElement("option"); //Creamos la opcion
                    	option.text = "<?= $row['comuna'];?>"; //Metemos el texto en la opción
                    	option.value = "<?= $row['id'];?>";
                    	select.add(option); //Metemos la opción en el select
                	}
            	<?php endforeach;?>
        	});
    });
    $(document).ready(function() {  
        var mySelect =document.getElementById('regionRegister');
        mySelect.value = <?php echo session()->get('userRegion')?>;

        var select = document.getElementById("comunaRegister"); //Seleccionamos el select
        while (select.hasChildNodes()) {  // mientras exita un nodo child lo borra
                	select.removeChild(select.firstChild);
            	}
        var aux = document.createElement("option"); //Creamos la opcion
            	aux.text = "-Seleccionar una comuna-"; //Metemos el texto en la opción
            	aux.value = "0";
            	select.add(aux);

            	//alert(idCategoria);
            	<?php foreach($comuna as $row):?>
	                if(<?= $row['region_id'];?> == <?php echo session()->get('userRegion')?>){
                    	var option = document.createElement("option"); //Creamos la opcion
                    	option.text = "<?= $row['comuna'];?>"; //Metemos el texto en la opción
                    	option.value = "<?= $row['id'];?>";
                    	select.add(option); //Metemos la opción en el select
                	}
            	<?php endforeach;?>
        document.getElementById('comunaRegister').value = <?php echo session()->get('userComuna')?> ;        

        $('#summernote').summernote({
        placeholder: 'Ingrese texto descriptivo de los servicios que ofrece',
        tabsize: 2,
        height: 150,
        toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
        ]
      });
      var markupStr = '<?php echo session()->get('text')?>';
        $('#summernote').summernote('code', markupStr);

    });
    
    function cancelar() {
        var markupStr = '<?php echo session()->get('text')?>';
        $('#summernote').summernote('code', markupStr);
    }

    function guardar() {
        event.preventDefault();
            $.ajax ({
                type: "post",
                url: "<?php echo base_url('/cambiar_texto')?>",
                data: { texto: $('#summernote').summernote('code')},
                beforSend: function(){
                  alert("entro a ajax");
                },
                success: function(data){
                    if(data){
                        alert(data);
                        cancelar();
                    }
                    else{
                        alert(data);
                    }
                },
                error: function(){
                    alert("Error en la llamada ajax");
                }

            });
    }

    function ubicacionFunction(){
        event.preventDefault();
            $.ajax ({
                type: "post",
                url: "<?php echo base_url('/cambiar_ubicacion')?>",
                data: $("#ubicacionForm").serialize(),
                beforSend: function(){
                  alert("entro a ajax");
                },
                success: function(data){
                    if(data){
                        alert(data);
                    }
                    else{
                        alert(data);
                    }
                },
                error: function(){
                    alert("Error en la llamada ajax");
                }

            });
    }
    function contactoFunction(){
        event.preventDefault();
            $.ajax ({
                type: "post",
                url: "<?php echo base_url('/cambiar_contacto')?>",
                data: $("#contactoForm").serialize(),
                beforSend: function(){
                  alert("entro a ajax");
                },
                success: function(data){
                    if(data){
                        alert(data);
                    }
                    else{
                        alert(data);
                    }
                },
                error: function(){
                    alert("Error en la llamada ajax");
                }

            });
    }
</script>

