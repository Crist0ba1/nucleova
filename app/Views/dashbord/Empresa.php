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
    .badge-secondary{
        background-color: #314a9a;
        color:white;
    }
    .imagenHori{
        justify-content: center;
        /**background-color: #314a9a;*/
        align-items: center;
    }
    .labelImagen {
        color: white;
    }
    .padre{
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .labelInImage{
        width: 50px;
        height: 50px;
        background-color: rgba(0,0,0,0);
    }
    .labelInImage:Hover{
        background-color: rgba(0,0,0,0.5);
    }
    #file-chosen{
    color: white;
    margin-left: 0.3rem;
    font-family: sans-serif;
    }
    #imagenFile1{
        width: 49px!important;
        height: 49px!important;
    }
    
</style>

<div class="modal fade" id="setData" role="dialog" >
	<div class="modal-dialog modal-lg">
		<div class="modal-content gradiente">
    		<div class="modal-body">
				<h4 id="tituloModal" style="color:#FFFFFF;"class="modal-title float-left"> 
						
				</h4>
				<button type="button" class="close float-right" data-dismiss="modal" aria-label="Close">
					<i class="fas fa-window-close" style="color:#ff0000;"></i></button>
			</div>
			<div class="modal-body">
                <!-- 314A9A -->
				<h5 style="color:#FFFFFF;">Complete la informacion requerida:<i class="fa-solid fa-circle-check"></i></h5>
			</div>
			<div class="modal-body">
            
                <form id="registerForm" class="registerForm" action="<?php echo base_url('/registerUsserEmpresa')?>" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <h4><span class="badge badge-secondary">Nombre de usuario o empresa:</span></h4>
                                    <input   type="text" class="form-control form-control-user" id="nombreCompleto" name="nombreCompleto"
                                        placeholder="Nombre completo" minlength="2" required>
                                    <span id="nombreCompleto_error" class="text-danger">                                       
                                </div>   
                                <div id="contenidoUsuario">
                                </div>
                                <div class="row">
                                    <div class="form-group col-6 col-sm-6">
                                    <h4><span class="badge badge-secondary">Fecha de nacimiento (usuario):</span></h4>
                                        <input   type="date" class="form-control form-control-user" id="fech_nac" name="fech_nac"
                                            placeholder="Fecha de nacimiento" min='1900-01-01' max="<?= date('Y-m-d'); ?>" required>                                            
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
                                    <h4><span class="badge badge-secondary">Direccion:</span></h4>
                                    </div>
                                    <div class="form-group col-6 col-sm-6">
                                        <h4><span class="badge badge-secondary">Region:</span></h4>
                                        <select name="regionRegister" id="regionRegister" class="form-control"  required>
                                            <option value="">-Seleccione una region-</option>
                                                <?php foreach($region as $row):?>
                                                    <option value="<?= $row['id'];?>"><?= $row['region'];?></option>
                                                <?php endforeach;?>
                                        </select>		
                                        <span id="regionRegister_error" class="text-danger">								
                                    </div>
                                    <div class="form-group col-6 col-sm-6">
                                        <h4><span class="badge badge-secondary">Comuna:</span></h4>
                                        <select name="comunaRegister" id="comunaRegister" class="form-control"  required>
                                            <option value="">-Falta seleccionar region-</option>
                                        </select>
                                        <span id="comunaRegister_error" class="text-danger">
                                    </div>
                                    <div class="form-group col-6 col-sm-6">
                                        <h4><span class="badge badge-secondary">Calle:</span></h4>
                                        <input   type="text" class="form-control form-control-user" id="calle" name="calle"
                                                placeholder="Calle, Ejemplo: Villa piedra azul, pasaje rio aconcagua" minlength="2" required>
                                        <span id="calle_error" class="text-danger">    
                                    </div>
                                    <div class="form-group col-6 col-sm-6">
                                        <h4><span class="badge badge-secondary">Numero:</span></h4>
                                        <input   type="text" class="form-control form-control-user" id="numero" name="numero"
                                                placeholder="Numero, Ejemplo: 1001" minlength="2" required>
                                        <span id="numero_error" class="text-danger">    
                                    </div>
                                    <div class="form-group col-12 col-sm-12">
                                        <h4><span class="badge badge-secondary">Dpto./ Casa/ Oficina/ Condominio (opcional):</span></h4>
                                        <input type="text" class="form-control form-control-user" id="optional" name="optional"
                                                placeholder="Ejemplo: Departamento 16C" minlength="2" >
                                        <span id="optional_error" class="text-danger">   
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 col-sm-12">
                                        <h4><span class="badge badge-secondary">Datos de contacto:</span></h4>
                                    </div>
                                    <div class="form-group col-6 col-sm-6">
                                        <h4><span class="badge badge-secondary">Email:</span></h4>
                                        <input type="email" class="form-control form-control-user" id="emailRegister" name="emailRegister"
                                            placeholder="Email"  required>
                                            <span id="emailRegister_error" class="text-danger">
                                    </div>
                                    <div class="form-group col-6 col-sm-6">
                                    <h4><span class="badge badge-secondary">Telefono:</span></h4>
                                        <div class="form-inline">
                                            <label style="margin-left: 15px;">Celulares sin el +
                                                <input type="tel" class="form-control form-control-user" id="celular" name="celular" minlength="" maxlength="12"
                                                    placeholder="9 9999 9999" style="margin-left: 15px;"  required>
                                            </label>
                                            
                                        </div>                
                                    </div>    
                                </div>
                                <div class="row">
                                    <div class="col-12 col-sm-12">
                                        <h4><span class="badge badge-secondary">Enlaces a redes sociales:</span></h4>
                                    </div>
                                    <div class="form-group col-6 col-sm-6">
                                        <h4><span class="badge badge-secondary">Facebook:</span></h4>
                                        <input type="url" class="form-control form-control-user" id="face" name="face"
                                            placeholder="Ejemplo: https://www.facebook.com/nucleova"  >
                                            <span id="face_error" class="text-danger">
                                    </div>
                                    <div class="form-group col-6 col-sm-6">
                                        <h4><span class="badge badge-secondary">Linkedin:</span></h4>
                                        <input type="url" class="form-control form-control-user" id="linkedin" name="linkedin"
                                            placeholder="Ejemplo: https://www.linkedin.com/company/nucleova/"  >
                                            <span id="linkedin_error" class="text-danger">
                                    </div> 
                                    <div class="form-group col-6 col-sm-6">
                                        <h4><span class="badge badge-secondary">Instagram:</span></h4>
                                        <input type="url" class="form-control form-control-user" id="instagram" name="instagram"
                                            placeholder="Ejemplo: https://www.instagram.com/nucleova/"  >
                                            <span id="instagram_error" class="text-danger">
                                    </div> 
                                </div>                                                                                     
                                <div class="card p-3 mb-2">
                                    <div class="d-flex justify-content-between">
                                        <div class="d-flex flex-row align-items-center">
                                        <h4><span class="badge badge-secondary"><i class="fa fa-keyboard" aria-hidden="true"></i> Texto descriptivo:</span></h4>                                        
                                                </div>
                                    </div>
                                    <textarea id="summernote" name="editordata"></textarea>
                                </div>
                                <div class="row">
                                    <div class="col-12 col-sm-12">
                                    <h4><span class="badge badge-secondary"> Imagenes:</span></h4>
                                    </div>
                                    <div class="form-group col-12 col-sm-12">
                                        <div class="row imagenHori">
                                            <div id="padre" class="col-8">
                                                <input type="file" id="file1" name="file1" hidden required>
                                                <label for="file1" class="labelInImage border border-dark">
                                                    <img id="imagenFile1" src="<?php echo base_url('')?>/public/assets/img-plus.png" class="img-fluid" style="  height: 49px !important; width: 49px !important;">
                                                </label>
                                                <span id="fileE"> Imagen, sin seleccionar</span>
                                            </div>                                                                                                                     
                                        </div>
                                    </div>
                                </div>
                            
                                <input id="editordata" name="editordata" type="hidden">
                                 <input type="submit" onClick="placeOrder()" name ="submit" id="submit_button2" class="btn btn-primary btn-user btn-block text-white" value="Agregar informacion" />
                <!--/form-->
				
			</div>
                </form>
		</div>
	</div>
</div>


    <?php
		include("userProfileE.php");
	?> 

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
        /* Modal que ingresa datos */
        <?php if(session()->get('isComplete') == 1 ):?> //si no esta completo
            
            $('#setData').modal();
        <?php endif;?> //0 esta completo y no muestra nada
        //alert('<?php echo session()->get('isComplete')?>');
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

    const actualBtn0 = document.getElementById('file1');
    const fileChosen0 = document.getElementById('fileE');

    actualBtn0.addEventListener('change', function(){

        fileChosen0.textContent = this.files[0].name;
        TmpPath = URL.createObjectURL(this.files[0]);
        $('#imagenFile1').attr('src', TmpPath);
    });
</script>

