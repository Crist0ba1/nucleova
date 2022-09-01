<div class="">
    <form id="registerForm" class="registerForm" action="<?php echo base_url('/editarUsserEmpresa')?>" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <h4><span class="badge badge-secondary">Nombre de usuario o empresa:</span></h4>
            <input type="text" class="form-control form-control-user" id="nombreCompleto1" name="nombreCompleto"
            placeholder="Nombre completo" minlength="2" >
            <span id="nombreCompleto_error" class="text-danger">                                       
        </div>   
        <div class="row">
            <div class="form-group col-6 col-sm-6">
                <h4><span class="badge badge-secondary">Fecha de nacimiento (usuario):</span></h4>
                <input   type="date" class="form-control form-control-user" id="fech_nac1" name="fech_nac"
                placeholder="Fecha de nacimiento" min='1900-01-01' max="<?= date('Y-m-d'); ?>">                                            
                <span id="fech_nac_error" class="text-danger">                                       
            </div>                
            <div class="form-group col-6 col-sm-6">
                <h4><span class="badge badge-secondary">Seleccione segun corresponda:</span></h4>
                <select name="genero" id="genero1" class="form-control" name="genero"  >
                    <option value="" >-Seleccione su sexo -</option>
                    <option value="1"> Masculino </option>
                    <option value="2"> Femenino </option>
                    <option value="3"> Otro </option>
                </select>
            	<span id="genero_error" class="text-danger">										
            </div>  
        </div>    
        <div class="row"> 
            <div class="col-12 col-sm-12">
                <h4><span class="badge badge-primary">Direccion:</span></h4>
            </div>
            <div class="form-group col-6 col-sm-6">
                <h4><span class="badge badge-primary">Region:</span></h4>
            	<select name="regionRegister" id="regionRegister1" class="form-control"  >
                    <option value="">-Seleccione una region-</option>
                    <?php foreach($region as $row):?>
                        <option value="<?= $row['id'];?>"><?= $row['region'];?></option>
                    <?php endforeach;?>
                </select>
                <span id="regionRegister_error" class="text-danger">								
            </div>
            <div class="form-group col-6 col-sm-6">
                <h4><span class="badge badge-primary">Comuna:</span></h4>
                <select name="comunaRegister" id="comunaRegister1" class="form-control"  >
                    <option value="">-Falta seleccionar region-</option>
                </select>
                <span id="comunaRegister_error" class="text-danger">
            </div>
            <div class="form-group col-6 col-sm-6">
                <h4><span class="badge badge-primary">Calle:</span></h4>
                <input   type="text" class="form-control form-control-user" id="calle1" name="calle"
                    placeholder="Calle, Ejemplo: Villa piedra azul, pasaje rio aconcagua" minlength="2" >
                <span id="calle_error" class="text-danger">    
            </div>
            <div class="form-group col-6 col-sm-6">
                <h4><span class="badge badge-primary">Numero:</span></h4>
                <input   type="text" class="form-control form-control-user" id="numero1" name="numero"
                placeholder="Numero, Ejemplo: 1001" minlength="2" >
                <span id="numero_error" class="text-danger">    
            </div>
            <div class="form-group col-12 col-sm-12">
                <h4><span class="badge badge-primary">Dpto./ Casa/ Oficina/ Condominio (opcional):</span></h4>
                <input type="text" class="form-control form-control-user" id="optional1" name="optional"
                placeholder="Ejemplo: Departamento 16C" minlength="2" >
                <span id="optional_error" class="text-danger">   
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-sm-12">
                <h4><span class="badge badge-success">Datos de contacto:</span></h4>
            </div>
            <div class="form-group col-6 col-sm-6">
            	<h4><span class="badge badge-success">Email:</span></h4>
            	<input type="email" class="form-control form-control-user" id="emailRegister1" name="emailRegister"
                    placeholder="Email"  >
                <span id="emailRegister_error" class="text-danger">
            </div>
            <div class="form-group col-6 col-sm-6">
                <h4><span class="badge badge-success">Telefono:</span></h4>
            	<div class="form-inline">
                    <label style="margin-left: 15px;">Celulares sin el +
                    	<input type="tel" class="form-control form-control-user" id="celular1" name="celular" minlength="" maxlength="12"
                        placeholder="9 9999 9999" style="margin-left: 15px;"  >
                    </label>                    
                </div>                
            </div>    
        </div>
        <div class="row">
            <div class="col-12 col-sm-12">
                <h4><span class="badge badge-info">Enlaces a redes sociales:</span></h4>
            </div>
        	<div class="form-group col-6 col-sm-6">
            	<h4><span class="badge badge-info">Facebook:</span></h4>
            	<input type="url" class="form-control form-control-user" id="face1" name="face"
                	placeholder="Ejemplo: https://www.facebook.com/nucleova"  >
                <span id="face_error" class="text-danger">
            </div>
            <div class="form-group col-6 col-sm-6">
                <h4><span class="badge badge-info">Linkedin:</span></h4>
                <input type="url" class="form-control form-control-user" id="linkedin1" name="linkedin"
                    placeholder="Ejemplo: https://www.linkedin.com/company/nucleova/"  >
                <span id="linkedin_error" class="text-danger">
            </div> 
            <div class="form-group col-6 col-sm-6">
                <h4><span class="badge badge-info">Instagram:</span></h4>
                <input type="url" class="form-control form-control-user" id="instagram1" name="instagram"
                    placeholder="Ejemplo: https://www.instagram.com/nucleova/"  >
                <span id="instagram_error" class="text-danger">
            </div> 
        </div>                                                                                     
        <div class="card p-3 mb-2">
            <div class="d-flex justify-content-between">
            	<div class="d-flex flex-row align-items-center">
            		<h4><span class="badge badge-warning"><i class="fa fa-keyboard" aria-hidden="true"></i> Texto descriptivo:</span></h4>                                        
            	</div>
            </div>
            <textarea id="summernote1" name="editordata"></textarea>
        </div>
               
        <input id="editordata1" name="editordata" type="hidden">
        <input type="submit" onClick="placeOrder1()" name ="submit" id="submit_button2" class="btn btn-primary btn-user btn-block text-white" value="Editar informacion" />
                <!--/form-->		
    </form>
</div>


<!-- Set data en informacion personal -->
<script>
	
	<?php if(session()->get('isComplete') == 0 ):?> //si no esta completo
		/*Nombre de usuario y/o empresa*/
		<?php if(session()->has('nombreEM')):?>
			$("#nombreCompleto1").val("<?= session()->get('nombreEM') ?>");
			$("#fech_nac1").val("<?= session()->get('fech_nacEM') ?>");
			$("#genero1").val("<?= session()->get('generoEM') ?>");
			$("#regionRegister1").val("<?= session()->get('userRegionEM') ?>").change();
				/* Cambia las comunas despues de setear las regiones */
						var id = $('#regionRegister1').val();
						var select = document.getElementById("comunaRegister1"); //Seleccionamos el select

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
				/* Fin del cambio */
			$("#comunaRegister1").val("<?= session()->get('userComunaEM') ?>").change();
			$("#calle1").val("<?= session()->get('calle') ?>");
			$("#numero1").val("<?= session()->get('numero') ?>");
			$("#optional1").val("<?= session()->get('opt') ?>");
			$("#emailRegister1").val("<?= session()->get('emailEM') ?>");
			$("#celular1").val("<?= session()->get('telefonoEM') ?>");
			$("#face1").val("<?= session()->get('rf') ?>");
			$("#linkedin1").val("<?= session()->get('fl') ?>");
			$("#instagram1").val("<?= session()->get('ri') ?>");
      		$('#summernote1').summernote('code', '<?php echo session()->get('textEM')?>');

		<?php endif;?>

    <?php endif;?> //0 esta completo y no muestra nada
</script>


<script>
    $("#regionRegister1").change(function() {
       		$("#regionRegister1 option:selected").each(function() {
            	var id = $('#regionRegister1').val();
            	var select = document.getElementById("comunaRegister1"); //Seleccionamos el select

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
        <?php if(session()->getFlashdata('status')):?>
            <?php if(session()->getFlashdata('status')== true):?>
                alert("Usuario creado con exito");
            <?php else:?>
                alert("Error, Intente crear al usuario otra vez");
            <?php endif;?>
        <?php endif;?>

        $('#summernote1').summernote({
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
    });

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
    $("#tipoDeCuenta").change(function() {
        $("#tipoDeCuenta option:selected").each(function() {
            var id = $('#tipoDeCuenta').val();
            var idForm = document.getElementsByClassName('registerForm'); 
            if(id==0){
                document.getElementById("contenidoUsuario").innerHTML="";
                idForm.id= '';
                
                $("#iTitulo").removeClass()
                $("#iTitulo").toggleClass('fa').toggleClass('fa-plus');
            }
            if(id==2){
                document.getElementById("contenidoUsuario").innerHTML="";
                idForm.id= 'register1';
                $("#iTitulo").removeClass()
                $("#iTitulo").toggleClass('fa').toggleClass('fa-user-circle');
            }
            if(id==3){
                $("#iTitulo").removeClass()
                $("#iTitulo").toggleClass('fa').toggleClass('fa-building');
                idForm.id= 'register2';
                var razonSocial = document.createElement("div");
                razonSocial.classList.add("form-group");

                var rzInput = document.createElement("input");
                rzInput.setAttribute("type","text");
                rzInput.setAttribute("class","form-control form-control-user");
                rzInput.setAttribute("id","rz");
                rzInput.setAttribute("name","rz");
                rzInput.setAttribute("placeholder","Ingrese razon social");
                //rzInput.setAttribute(" ","");
                
                razonSocial.appendChild(rzInput);
                $('#contenidoUsuario')[0].appendChild(razonSocial);

                var rut = document.createElement("div");
                rut.classList.add("form-group");

                var rutInput = document.createElement("input");
                rutInput.setAttribute("type","text");
                rutInput.setAttribute("class","form-control form-control-user");
                rutInput.setAttribute("id","rut");
                rutInput.setAttribute("name","rut");
                rutInput.setAttribute("placeholder","Ingrese rut de la empresa");

                rut.appendChild(rutInput);
                $('#contenidoUsuario')[0].appendChild(rut);


            }
            if(id!=0 && id!=2 && id!=3){
                
                $("#iTitulo").removeClass()
                $("#iTitulo").toggleClass('fa').toggleClass('fa-plus');
            }
        });
    });
    function placeOrder1(){
        var markupStr = $('#summernote1').summernote('code');
        document.getElementById("editordata1").value = markupStr;
    }

</script>
