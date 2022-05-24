<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

	<!-- DataTables-->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
	
<div class="secction">
    <div class="row justify-content-center">
        <div>
            <div class="card">
                <div class="card-header">
                        <h4> Gestion de usuarios </h4>
                        <a class="btn btn-secondary btn-icon-split" href="<?php echo base_url('/agregarUsuario')?>">
                                    <span class="icon text-white-50">
                            <span class="icon text-white-50"><i class="fa fa-plus"></i></span>
                            <span class="text">Agregar prestador de servicios</span>
                        </a>

                        <!--button type="button" name="btnAddComite" id="btnAddComite" class="btn btn-secondary btn-icon-split" data-toggle="modal" data-target="#addComite">
                                    <span class="icon text-white-50">
                            <span class="icon text-white-50"><i class="fa fa-plus"></i></span>
                            <span class="text">Agregar prestador de servicios</span>
                        </button-->
                    </div>
                </div>
                <div class="card-body">
                <div class="table-responsive">
                    <table id="tablaUsser" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>idUssers</th>
                                <th>Nombre</th>
                                <th>Genero</th>
                                <th>telefono</th>
                                <th>Email</th>                                
                                <th>Comuna</th>
                                <th>Calle</th>
                                <th>Numero</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                    </table>
                </div>
                <div class="card-footer">

                </div>
            </div>
    
        </div>


        
    </div>
</div>

<!-- Modal Agregar comite -->
<div class="modal fade" id="addComite" role="dialog" >
		<div class="modal-dialog ">
			<div class="modal-content gradiente">
				<div class="modal-body">
					<h4 style="color:#FFFFFF;"class="modal-title float-left"> 
						Crear usuario
					</h4>
					<button type="button" class="close float-right" data-dismiss="modal" aria-label="Close">
						<i class="fas fa-window-close" style="color:#ff0000;"></i></button>
				</div>
				<div class="modal-body">
					<h5 style="color:#FFFFFF;">Ingrese ubicacion <i style="color:#FFFFFF;" class="fa fa-map-marker" aria-hidden="true"></i></h5>
				</div>
				<div class="modal-body">
					
                    <form id="registerForm" class="registerForm" action="<?php echo base_url('/registerUsser')?>" method="post">
                                <div class="form-group">
                                    <input required type="text" class="form-control form-control-user" id="nombreCompleto" name="nombreCompleto"
                                        placeholder="Nombre completo" minlength="2" >
                                    <span id="nombreCompleto_error" class="text-danger">                                       
                                </div>    
                                <div class="form-group">                                    
                                    <select class="form-control" id="tipoDeCuenta" name="tipoDeCuenta" required >
                                        <option value="">Seleccione tipo de cuenta</option>
                                        <option value="1">Buscando un prestador de servicios</option>
                                        <option value="2">Prestador de servicios</option>
                                    </select>
                                    <span id="tipoDeCuenta_error" class="text-danger">
                                </div>
                                <div id="contenidoUsuario">

                                </div>
                                <div class="form-group">
                                    <input required type="date" class="form-control form-control-user" id="fech_nac" name="fech_nac"
                                        placeholder="Fecha de nacimiento" min='1900-01-01' max="<?= date('Y-m-d'); ?>">
                                        <span class="badge badge-secondary">Fecha de nacimiento</span>
                                    <span id="fech_nac_error" class="text-danger">                                       
                                </div>                      
                                <div class="form-group">
                                    <div class="mx-auto">
                                        <div class="form-group">
                                            <select name="genero" id="genero" class="form-control" name="genero" required>
                                                <option value="" >-Seleccione su sexo -</option>
                                                    <option value="1"> Masculino </option>
                                                    <option value="2"> Femenino </option>
                                                    <option value="3"> Otro </option>
                                            </select>
                                            <span id="genero_error" class="text-danger">										
                                        </div>
                                        <div class="form-group">
                                            <select name="regionRegister" id="regionRegister" class="form-control" required>
                                                <option value="">-Seleccione una region-</option>
                                                <?php foreach($region as $row):?>
                                                    <option value="<?= $row['id'];?>"><?= $row['region'];?></option>
                                                <?php endforeach;?>
                                            </select>		
                                            <span id="regionRegister_error" class="text-danger">								
                                        </div>
                                        <div class="mx-auto">
                                            <div class="form-group">
                                                <select name="comunaRegister" id="comunaRegister" class="form-control" required>
                                                    <option value="">-Falta seleccionar region-</option>
                                                </select>
                                                <span id="comunaRegister_error" class="text-danger">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" id="emailRegister" name="emailRegister"
                                        placeholder="Email" required>
                                        <span id="emailRegister_error" class="text-danger">
                                </div>
                                <div class="form-group">
                                    <div class="form-inline">
                                        <label style="margin-left: 15px;">+56 
                                            <input type="tel" class="form-control form-control-user" id="celular" name="celular" minlength="" maxlength="9"
                                                placeholder="9 9999 9999" style="margin-left: 15px;" required>
                                        </label>
                                        <span id="celular_error" class="text-danger">
                                    </div>                
                                </div>                                    
                                    
                                <div class="form-group row ">
                                    <div class="col-sm-6 input-group">
                                        <input id="passwordr1" name="passwordr1" type="password" class="form-control form-control-user"
                                            id="exampleInputPassword" placeholder="Contraseña" minlength="5" required>
                                            <div class="input-group-append">
                                                <button id="ShowPassword1" class="btn btn-primary" type="button" onclick="mostrarPasswordr1()"> <span id="icon1" class="fa fa-eye-slash"></span> </button>
                                            </div>
                                    </div>
                                    <div class="col-sm-6 input-group">
                                        <input id="passwordr2" name="passwordr2" type="password" class="form-control form-control-user"
                                            id="exampleRepeatPassword" placeholder="Repita contraseña" minlength="5" required>
                                            <div class="input-group-append">
                                                <button id="ShowPassword2" class="btn btn-primary" type="button" onclick="mostrarPasswordr2()"> <span id="icon2" class="fa fa-eye-slash icon"></span> </button>
                                            </div>
                                    </div>  
                                    <span class="badge badge-secondary">La contraseña debe ser de minimo 5 caracteres.</span>   
                                    <span id="password_error" class="text-danger">   
                                </div>
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
                                </div>
                                
                                 <input type="submit" name ="submit" id="submit_button2" class="btn btn-primary btn-user btn-block text-white" value="Registrar cuenta" />
                            </form>
				
					<br>

					<div><img style="
					width: 150px;
       				 max-width:100%;
        			height:100%;
        			max-height:150px;
					" src="<?php echo base_url('')?>/public/assets/Logos/LogoPequeno2.png" class="mx-auto d-block"></div>
					
					<div class="modal-body float-right">
						<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
					</div>
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
<script>
    $(document).ready(function(){
        $('#tablaUsser').dataTable({
            "responsive": true,
            "order":[],
            "serverSide":true,
            "ajax":{
                url:"<?php echo base_url('/usser_fetch_all')?>",
                type:"POST",
                
            }
        });
    });
    $(document).on('click', '.deleteUsser',function(){
        var id = $(this).data('id');
        if(confirm("Esta seguro que desea eliminar este usuario")){
            $.ajax({
                url:"<?php echo base_url('/deleteUsser')?>",
                type: "POST",                        
                data:{id:id},
                success:function(data){
                    $('#mensajeUsser').html(data);
                    $('#tablaComites').DataTable().ajax.reload();
                    setTimeout(() => {
                        $('#mensajeUsser').html('');
                    }, 5000);
                },
                error:function(){
                    alert("Error en la llamada AJAX");
                }
            });
        }               
    });

</script>