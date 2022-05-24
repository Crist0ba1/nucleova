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
            <div class="col-4">
                <div class="card p-3 mb-2">
                    <?php if(session()->get('isLoggedIn') && session()->get('tipo') == 1 && session()->get('rz') != ""): ?>
                        <div class="d-flex justify-content-between">
                            <div class="d-flex flex-row align-items-center">
                                <div class="icon"><i class="fa fa-building" aria-hidden="true"></i></div>
                                    <div class="ms-2 c-details">
                                        <h6 class="mb-0"><?= session()->get('rz') ?></h6> <span>Rut empresa: <?= session()->get('rut') ?></span>
                                    </div>
                                </div>                        
                            </div>
                        </div>             
                    <?php elseif(session()->get('isLoggedIn') && session()->get('tipo') == 2 && session()->get('rz') != ""): ?>
                        <div class="d-flex justify-content-between">
                            <div class="d-flex flex-row align-items-center">
                                <div class="icon"><i class="fa fa-user" aria-hidden="true"></i></div>
                                <div class="ms-2 c-details">
                                        <h6 class="mb-0"><?= session()->get('nombre') ?></h6> <span>Boleta de honorarios</span>
                                </div>
                            </div>
                            
                        </div>
                    <?php endif;?> 
                    <div class="mt-5">
                        <h3 class="heading">Ubicacion <i class="fa fa-map-marker" aria-hidden="true"></i></h3>
                        <div class="mt-5">
                            <form id="ubicacionForm" action="">
                                <div class="form-group">
                                    <select name="regionRegister" id="regionRegister" class="form-control" required>
                                        <option value="">-Seleccione una region-</option>
                                        <?php foreach($region as $row):?>
                                            <option value="<?= $row['id'];?>"><?= $row['region'];?></option>
                                        <?php endforeach;?>
                                    </select>		
                                    <span class="badge badge-secondary">Region</span>
                                    <span id="regionRegister_error" class="text-danger">								
                                </div>
                                <div class="mx-auto">
                                    <div class="form-group">
                                        <select name="comunaRegister" id="comunaRegister" class="form-control" required>
                                            <option value="">-Falta seleccionar region-</option>
                                        </select>
                                        <span class="badge badge-secondary">Comuna</span>
                                        <span id="comunaRegister_error" class="text-danger">
                                    </div>
                                </div>
                                <div class="text-center">
                                    <a id="ubicacionFunction" onclick="ubicacionFunction()" class="btn btn btn-info" >Cambiar ubicacion</a>
                                </div>
                            </form>    
                            <div class="mt-3"> <span class="text1">Para cambiar su ubicacion, debe seleccionar segun corresponda</span> </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card p-3 mb-2">
                    <div class="d-flex justify-content-between">
                        <div class="d-flex flex-row align-items-center">
                            <div class="icon"><i class="fa fa-address-book" aria-hidden="true"></i></div>
                            <div class="ms-2 c-details">
                                <h6 class="mb-0">Datos de contacto</h6> 
                            </div>
                        </div>
                    </div>
                    <div class="mt-5">
                        <form id="contactoForm" action="">
                            <div class="form-group">
                                <div class="form-inline">
                                    <span><i class="fa fa-phone" aria-hidden="true"></i>: </span>
                                    <label style="margin-left: 15px;">+56 
                                        <input type="tel" class="form-control form-control-user" id="celular" name="celular" minlength="" maxlength="9"
                                            placeholder="9 9999 9999" style="margin-left: 15px;" value="<?php echo session()->get('telefono')?>" required>
                                    </label><span class="badge badge-secondary">Telefono</span>
                                    
                                    <span id="celular_error" class="text-danger">
                                </div>                
                            </div>
                            <div class="form-group">
                                <div class="form-inline">
                                    <span style="padding-right:15px;"><i class="fa fa-envelope" aria-hidden="true"></i>: </span>
                                    <input type="email" class="form-control form-control-user" id="emailRegister" name="emailRegister"
                                        placeholder="Email" value="<?php echo session()->get('email')?>" required style="padding-left:15px;">
                                        <span class="badge badge-secondary">Correo electronico</span>
                                </div>                
                            </div>
                            <div class="form-group">
                                <div class="form-inline">
                                    <span style="padding-right:15px;"><i class="fa fa-calendar" aria-hidden="true"></i>: </span>
                                    <input required type="date" class="form-control form-control-user" id="fech_nac" name="fech_nac" value="<?php echo session()->get('fech_nac') ?>"
                                        placeholder="Fecha de nacimiento" min='1900-01-01' max="<?= date('Y-m-d'); ?>">
                                        <span class="badge badge-secondary">Fecha de nacimiento</span>
                                </div>                
                            </div>
                            <div class="text-center">
                                <a id="contactoFunction" onclick="contactoFunction()" class="btn btn btn-info" >Cambiar contacto</a>
                            </div>
                        </form>
                        
                    </div>
                </div>
            </div>
            <div class="col-10">
                <div class="card p-3 mb-2">
                    <div class="d-flex justify-content-between">
                        <div class="d-flex flex-row align-items-center">
                            <div class="icon"> <i class="fa fa-keyboard" aria-hidden="true"></i></div>
                            <div class="ms-2 c-details">
                                <h6 class="mb-0">Texto descriptivo</h6>
                            </div>
                        </div>
                    </div>
                    <form method="post">
                        <textarea id="summernote" name="editordata"></textarea>
                        <button id="save" class="btn btn-primary" onclick="guardar()" type="button">Guardar</button>
                        <button id="save" class="btn btn-primary" onclick="cancelar()" type="button">Cancelar</button>
                        <div class="click2edit"></div>
                    </form>
                </div>
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

