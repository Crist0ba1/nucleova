<div class="row justify-content-center">
    <div class="col-10">
        <br>    
        <div id="titulo" class="row justify-content-center align-content-center">
            <a class="btn">
                <h3><i id="iTitulo" class="fa fa-plus"></i> Agregar usuario</h3>
            </a>
        </div>
                    <form id="registerForm" class="registerForm" action="<?php echo base_url('/registerUsserAdmin')?>" method="post" enctype="multipart/form-data">
                                
                                <div class="form-group">                                     
                                    <h4><span class="badge badge-secondary">Tipo de cuenta:</span></h4>
                                    <input type="text" class="form-control form-control-user" id="tipoDeCuenta" name="nombreCompleto"
                                        placeholder="Nombre completo" >
                                    <select class="form-control" id="tipoDeCuenta" name="tipoDeCuenta"   >
                                        <option value="">Seleccione tipo de cuenta</option>
                                        <option value="2">Persona natural</option>
                                        <option value="3">Empresa</option>
                                    </select>
                                    <span id="tipoDeCuenta_error" class="text-danger">
                                </div>
                                <div class="form-group">
                                    <h4><span class="badge badge-secondary">Nombre de usuario o empresa:</span></h4>
                                    <input   type="text" class="form-control form-control-user" id="nombreCompleto" name="nombreCompleto"
                                        placeholder="Nombre completo" minlength="2" >
                                    <span id="nombreCompleto_error" class="text-danger">                                       
                                </div>   
                                <div id="contenidoUsuario">
                                </div>
                                <div class="row">
                                    <div class="form-group col-6 col-sm-6">
                                    <h4><span class="badge badge-secondary">Fecha de nacimiento (usuario):</span></h4>
                                        <input   type="date" class="form-control form-control-user" id="fech_nac" name="fech_nac"
                                            placeholder="Fecha de nacimiento" min='1900-01-01' max="<?= date('Y-m-d'); ?>">                                            
                                        <span id="fech_nac_error" class="text-danger">                                       
                                    </div>                
                                    <div class="form-group col-6 col-sm-6">
                                        <h4><span class="badge badge-secondary">Seleccione segun corresponda:</span></h4>
                                        <select name="genero" id="genero" class="form-control" name="genero"  >
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
                                        <select name="regionRegister" id="regionRegister" class="form-control"  >
                                            <option value="">-Seleccione una region-</option>
                                                <?php foreach($region as $row):?>
                                                    <option value="<?= $row['id'];?>"><?= $row['region'];?></option>
                                                <?php endforeach;?>
                                        </select>		
                                        <span id="regionRegister_error" class="text-danger">								
                                    </div>
                                    <div class="form-group col-6 col-sm-6">
                                        <h4><span class="badge badge-primary">Comuna:</span></h4>
                                        <select name="comunaRegister" id="comunaRegister" class="form-control"  >
                                            <option value="">-Falta seleccionar region-</option>
                                        </select>
                                        <span id="comunaRegister_error" class="text-danger">
                                    </div>
                                    <div class="form-group col-6 col-sm-6">
                                        <h4><span class="badge badge-primary">Calle:</span></h4>
                                        <input   type="text" class="form-control form-control-user" id="calle" name="calle"
                                                placeholder="Calle, Ejemplo: Villa piedra azul, pasaje rio aconcagua" minlength="2" >
                                        <span id="calle_error" class="text-danger">    
                                    </div>
                                    <div class="form-group col-6 col-sm-6">
                                        <h4><span class="badge badge-primary">Numero:</span></h4>
                                        <input   type="text" class="form-control form-control-user" id="numero" name="numero"
                                                placeholder="Numero, Ejemplo: 1001" minlength="2" >
                                        <span id="numero_error" class="text-danger">    
                                    </div>
                                    <div class="form-group col-12 col-sm-12">
                                        <h4><span class="badge badge-primary">Dpto./ Casa/ Oficina/ Condominio (opcional):</span></h4>
                                        <input type="text" class="form-control form-control-user" id="optional" name="optional"
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
                                        <input type="email" class="form-control form-control-user" id="emailRegister" name="emailRegister"
                                            placeholder="Email"  >
                                            <span id="emailRegister_error" class="text-danger">
                                    </div>
                                    <div class="form-group col-6 col-sm-6">
                                    <h4><span class="badge badge-success">Telefono:</span></h4>
                                        <div class="form-inline">
                                            <label style="margin-left: 15px;">Celulares sin el +
                                                <input type="tel" class="form-control form-control-user" id="celular" name="celular" minlength="" maxlength="12"
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
                                        <input type="url" class="form-control form-control-user" id="face" name="face"
                                            placeholder="Ejemplo: https://www.facebook.com/nucleova"  >
                                            <span id="face_error" class="text-danger">
                                    </div>
                                    <div class="form-group col-6 col-sm-6">
                                        <h4><span class="badge badge-info">Linkedin:</span></h4>
                                        <input type="url" class="form-control form-control-user" id="linkedin" name="linkedin"
                                            placeholder="Ejemplo: https://www.linkedin.com/company/nucleova/"  >
                                            <span id="linkedin_error" class="text-danger">
                                    </div> 
                                    <div class="form-group col-6 col-sm-6">
                                        <h4><span class="badge badge-info">Instagram:</span></h4>
                                        <input type="url" class="form-control form-control-user" id="instagram" name="instagram"
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
                                    <textarea id="summernote" name="editordata"></textarea>
                                </div>
                                <div class="row">
                                    <div class="col-12 col-sm-12">
                                    <h4><span class="badge badge-secondary"> Imagenes:</span></h4>
                                    </div>
                                    <div class="form-group col-12 col-sm-12">
                                        <input type="file" class="form-control form-control-user" id="file1" name="file1"
                                            placeholder="Imagen"  >
                                        <input type="file" class="form-control form-control-user" id="file2" name="file2"
                                            placeholder="Imagen"  >
                                        <input type="file" class="form-control form-control-user" id="file3" name="file3"
                                            placeholder="Imagen"  >
                                        <input type="file" class="form-control form-control-user" id="file4" name="file4"
                                            placeholder="Imagen"  >
                                        <input type="file" class="form-control form-control-user" id="file5" name="file5"
                                            placeholder="Imagen"  >
                                            
                                    </div>
                                </div>
                                
                                <div class="form-group">                                    
                                    <div class="container">
                                        <h4><span class="badge badge-secondary"> Seleccione categorias en las que se desempeñe:</span></h4>
                                        <select id="selectpicker" name="selectpicker" class="selectpicker" title="Seleccione su(s) actividade(s)" 
                                          multiple data-live-search="true" data-width="100%">                                            
                                        </select>     
                                        <input type="text" id="selectpickerValue" name="selectpickerValue" hidden>
                                    </div>                                                                                       
                                </div>
                                <div class="form-group">                                    
                                    <div class="container">
                                        <h4><span class="badge badge-danger"> Seleccione comunas en las que puede proveer sus servicios:</span></h4>
                                        <select id="selectpicker2" name="selectpicker2" class="selectpicker" title="Seleccione su(s) actividade(s)" 
                                          multiple data-live-search="true" data-width="100%">
                                        </select>     
                                        <input type="text" id="selectpickerValue2" name="selectpickerValue2" hidden>
                                    </div>                                                                                       
                                </div>
                                <input id="editordata" name="editordata" type="hidden">
                                 <input type="submit" onClick="placeOrder()" name ="submit" id="submit_button2" class="btn btn-primary btn-user btn-block text-white" value="Registrar cuenta" />
                    </form>
				
					<br>

					<div><img style="
					width: 150px;
       				 max-width:100%;
        			height:100%;
        			max-height:150px;
					" src="<?php echo base_url('')?>/public/assets/Logos/LogoPequeno2.png" class="mx-auto d-block"></div>				
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
        <?php if(session()->getFlashdata('status')):?>
            <?php if(session()->getFlashdata('status')== true):?>
                alert("Usuario creado con exito");
            <?php else:?>
                alert("Error, Intente crear al usuario otra vez");
            <?php endif;?>
        <?php endif;?>

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
    function placeOrder(){
        var markupStr = $('#summernote').summernote('code');
        document.getElementById("editordata").value = markupStr;
    }

</script>
<script>
    $(document).ready(function() { 
        var optgroup ="";
        <?php foreach($categoria as $car):?>
            optgroup += "<optgroup value='<?php echo $car['id']?>' label='<?php echo $car['id']?> <?php echo $car['nombre']?>' >"; 
            <?php foreach($subCategoria as $subcat):?>
                <?php if($car['id']==$subcat['refCat']):?>
                optgroup += "<option value='<?php echo $subcat['idSubCat']?>'> <?php echo $subcat['refCat']?>.<?php echo $subcat['idSubCat']?> <?php echo $subcat['nombreSub']?> </option>"
                <?php endif;?>
            <?php endforeach;?>
            optgroup += "</optgroup>";
        <?php endforeach;?>
        optgroup += "";
        //alert(optgroup);
        $('#selectpicker').append(optgroup);
        $('#selectpicker').selectpicker('refresh');
    });
    /* Mantiene los campos de subcategorias en arrSelected*/
    $('#selectpicker').on('change', function(){
        var selected = $(this).find("option:selected");
        var arrSelected = [];
        selected.each(function(){
        arrSelected.push($(this).val());
        });
        $("#selectpickerValue").val(arrSelected);
        //alert(arrSelected);
    });
</script>
<script>
    $(document).ready(function() { 
        var optgroup ="";
        <?php foreach($region as $car):?>
            optgroup += "<optgroup value='<?php echo $car['id']?>' label='<?php echo $car['id']?> <?php echo $car['region']?>' >"; 
            <?php foreach($comuna as $subcat):?>
                <?php if($car['id']==$subcat['region_id']):?>
                optgroup += "<option value='<?php echo $subcat['id']?>'> <?php echo $subcat['region_id']?>.<?php echo $subcat['id']?> <?php echo $subcat['comuna']?> </option>"
                <?php endif;?>
            <?php endforeach;?>
            optgroup += "</optgroup>";
        <?php endforeach;?>
        optgroup += "";
        //alert(optgroup);
        $('#selectpicker2').append(optgroup);
        $('#selectpicker2').selectpicker('refresh');
    });
    /* Mantiene los campos de subcategorias en arrSelected*/
    $('#selectpicker2').on('change', function(){
        var selected = $(this).find("option:selected");
        var arrSelected = [];
        selected.each(function(){
        arrSelected.push($(this).val());
        });
        $("#selectpickerValue2").val(arrSelected);
        //alert(arrSelected);
    });
</script>