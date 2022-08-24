<!-- Latest compiled and minified JavaScript -->
<script type="text/javascript" charset="utf8" src="<?php echo base_url('/public/steps/jquery.steps.min.js')?>"></script>
<script type="text/javascript" charset="utf8" src="<?php echo base_url('/public/steps/jquery.steps.js')?>"></script>

<style>
    #centrador1{
     position: relative;
    }

    #imagen1{
        position: absolute;
        width: 80%;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        margin: auto;
    }
    /*
    Common 
    */

    .wizard,
    .tabcontrol
    {
        display: block;
        width: 100%;
        overflow: hidden;
    }

    .wizard a,
    .tabcontrol a
    {
        outline: 0;
    }

    .wizard ul,
    .tabcontrol ul
    {
        list-style: none !important;
        padding: 0;
        margin: 0;
    }

    .wizard ul > li,
    .tabcontrol ul > li
    {
        display: block;
        padding: 0;
    }

    /* Accessibility */
    .wizard > .steps .current-info,
    .tabcontrol > .steps .current-info
    {
        position: absolute;
        left: -999em;
    }

    .wizard > .content > .title,
    .tabcontrol > .content > .title
    {
        position: absolute;
        left: -999em;
    }



    /*
        Wizard
    */

    .wizard > .steps
    {
        position: relative;
        display: block;
        width: 100%;
    }

    .wizard.vertical > .steps
    {
        display: inline;
        float: left;
        width: 30%;
    }

    .wizard > .steps .number
    {
        font-size: 1.429em;
    }

    .wizard > .steps > ul > li
    {
        width: 25%;
    }

    .wizard > .steps > ul > li,
    .wizard > .actions > ul > li
    {
        float: left;
    }

    .wizard.vertical > .steps > ul > li
    {
        float: none;
        width: 100%;
    }

    .wizard > .steps a,
    .wizard > .steps a:hover,
    .wizard > .steps a:active
    {
        display: block;
        width: auto;
        margin: 0 0.5em 0.5em;
        padding: 1em 1em;
        text-decoration: none;

        -webkit-border-radius: 5px;
        -moz-border-radius: 5px;
        border-radius: 5px;
    }

    .wizard > .steps .disabled a,
    .wizard > .steps .disabled a:hover,
    .wizard > .steps .disabled a:active
    {
        background: #eee;
        color: #aaa;
        cursor: default;
    }

    .wizard > .steps .current a,
    .wizard > .steps .current a:hover,
    .wizard > .steps .current a:active
    {
        background: #2184be;
        color: #fff;
        cursor: default;
    }

    .wizard > .steps .done a,
    .wizard > .steps .done a:hover,
    .wizard > .steps .done a:active
    {
        background: #9dc8e2;
        color: #fff;
    }

    .wizard > .steps .error a,
    .wizard > .steps .error a:hover,
    .wizard > .steps .error a:active
    {
        background: #ff3111;
        color: #fff;
    }

    .wizard > .content
    {
        background: #eee;
        display: block;
        margin: 0.5em;
        min-height: 35em;
        overflow: hidden;
        position: relative;
        width: auto;

        -webkit-border-radius: 5px;
        -moz-border-radius: 5px;
        border-radius: 5px;
    }

    .wizard.vertical > .content
    {
        display: inline;
        float: left;
        margin: 0 2.5% 0.5em 2.5%;
        width: 65%;
    }

    .wizard > .content > .body
    {
        float: left;
        position: absolute;
        width: 95%;
        height: 95%;
        padding: 2.5%;
    }

    .wizard > .content > .body ul
    {
        list-style: disc !important;
    }

    .wizard > .content > .body ul > li
    {
        display: list-item;
    }

    .wizard > .content > .body > iframe
    {
        border: 0 none;
        width: 100%;
        height: 100%;
    }

    .wizard > .content > .body input
    {
        display: block;
        border: 1px solid #ccc;
    }

    .wizard > .content > .body input[type="checkbox"]
    {
        display: inline-block;
    }

    .wizard > .content > .body input.error
    {
        background: rgb(251, 227, 228);
        border: 1px solid #fbc2c4;
        color: #8a1f11;
    }

    .wizard > .content > .body label
    {
        display: inline-block;
        margin-bottom: 0.5em;
    }

    .wizard > .content > .body label.error
    {
        color: #8a1f11;
        display: inline-block;
        margin-left: 1.5em;
    }

    .wizard > .actions
    {
        position: relative;
        display: block;
        text-align: right;
        width: 100%;
    }

    .wizard.vertical > .actions
    {
        display: inline;
        float: right;
        margin: 0 2.5%;
        width: 95%;
    }

    .wizard > .actions > ul
    {
        display: inline-block;
        text-align: right;
    }

    .wizard > .actions > ul > li
    {
        margin: 0 0.5em;
    }

    .wizard.vertical > .actions > ul > li
    {
        margin: 0 0 0 1em;
    }

    .wizard > .actions a,
    .wizard > .actions a:hover,
    .wizard > .actions a:active
    {
        background: #2184be;
        color: #fff;
        display: block;
        padding: 0.5em 1em;
        text-decoration: none;

        -webkit-border-radius: 5px;
        -moz-border-radius: 5px;
        border-radius: 5px;
    }

    .wizard > .actions .disabled a,
    .wizard > .actions .disabled a:hover,
    .wizard > .actions .disabled a:active
    {
        background: #eee;
        color: #aaa;
    }

    .wizard > .loading
    {
    }

    .wizard > .loading .spinner
    {
    }



    /*
        Tabcontrol
    */

    .tabcontrol > .steps
    {
        position: relative;
        display: block;
        width: 100%;
    }

    .tabcontrol > .steps > ul
    {
        position: relative;
        margin: 6px 0 0 0;
        top: 1px;
        z-index: 1;
    }

    .tabcontrol > .steps > ul > li
    {
        float: left;
        margin: 5px 2px 0 0;
        padding: 1px;

        -webkit-border-top-left-radius: 5px;
        -webkit-border-top-right-radius: 5px;
        -moz-border-radius-topleft: 5px;
        -moz-border-radius-topright: 5px;
        border-top-left-radius: 5px;
        border-top-right-radius: 5px;
    }

    .tabcontrol > .steps > ul > li:hover
    {
        background: #edecec;
        border: 1px solid #bbb;
        padding: 0;
    }

    .tabcontrol > .steps > ul > li.current
    {
        background: #fff;
        border: 1px solid #bbb;
        border-bottom: 0 none;
        padding: 0 0 1px 0;
        margin-top: 0;
    }

    .tabcontrol > .steps > ul > li > a
    {
        color: #5f5f5f;
        display: inline-block;
        border: 0 none;
        margin: 0;
        padding: 10px 30px;
        text-decoration: none;
    }

    .tabcontrol > .steps > ul > li > a:hover
    {
        text-decoration: none;
    }

    .tabcontrol > .steps > ul > li.current > a
    {
        padding: 15px 30px 10px 30px;
    }

    .tabcontrol > .content
    {
        position: relative;
        display: inline-block;
        width: 100%;
        height: 35em;
        overflow: hidden;
        border-top: 1px solid #bbb;
        padding-top: 20px;
    }

    .tabcontrol > .content > .body
    {
        float: left;
        position: absolute;
        width: 95%;
        height: 95%;
        padding: 2.5%;
    }

    .tabcontrol > .content > .body ul
    {
        list-style: disc !important;
    }

    .tabcontrol > .content > .body ul > li
    {
        display: list-item;
    }
</style>
<div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div id="centrador1" class="col-lg-5">
                        <img id="imagen1" src="<?php echo base_url('')?>/public/assets/Logos/logoPequeno.png" >
                    </div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Crea tu cuenta!</h1>
                            </div>
                            <form id="registerForm" class="registerForm" action="<?php echo base_url('/registerUsserAdmin')?>" method="post" enctype="multipart/form-data">
                                <!--div id="registerDiv">
                                    <h3>Usuario</h3>
                                    <section>
                                        <p>Try the keyboard navigation by clicking arrow left or right!</p>
                                    </section>
                                    <h3>Informacion</h3>
                                    <section>
                                        <p>Wonderful transition effects.</p>
                                    </section>
                                    <h3>Localizacion</h3>
                                    <section>
                                        <p>The next and previous buttons help you to navigate through your content.</p>
                                    </section>
                                </div-->
                                <div class="form-group">                                     
                                    <h4><span class="badge badge-secondary">Tipo de cuenta:</span></h4>
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
                                <small id="passwordHelpBlock" class="form-text text-muted">
                                        La contraseña debe ser de minimo 5 caracteres.
                                    </small>
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
                                    <span id="password_error" class="text-danger">   
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

					<div><img style="width: 150px; max-width:100%; height:100%; max-height:150px;" src="<?php echo base_url('')?>/public/assets/Logos/LogoPequeno2.png" class="mx-auto d-block"></div>				
                                <!--hr>
                                <a href="index.html" class="btn btn-danger btn-user btn-block">
                                    <i class="fab fa-google fa-fw"></i> Registrarse con Google
                                </a>
                                <a href="index.html" class="btn btn-info btn-user btn-block">
                                    <i class="fab fa-facebook-f fa-fw"></i> Registrarse con Facebook
                                </a-->
                            <hr>
                            <div class="text-center">
                                <a class="small" href="<?php echo base_url('/lostPassword');?>" >¿Olvido su contraseña?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="<?php echo base_url('/login');?>" >¿Ya esta registrado? Inicie sesion aqui!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
 
    <div class="modal fade" id="errorRegister" role="dialog" >
		<div class="modal-dialog ">
			<div class="modal-content gradiente">
				<div class="modal-body">
					<h4 style="color:#FFFFFF;"class="modal-title float-left"> 
						Error inesperado
					</h4>
					<button type="button" class="close float-right" data-dismiss="modal" aria-label="Close">
						<i class="fas fa-window-close" style="color:#ff0000;"></i></button>
				</div>
				<div class="modal-body">
					<h5 style="color:#FFFFFF;">Error al registrar usuario, por favor intentelo de nuevo<i style="color:#FFFFFF;" class="fa fa-map-marker" aria-hidden="true"></i></h5>
				</div>
				<div class="modal-body">                    
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

<script type="text/javascript">

    
    function mostrarPassword(){
		var cambio = document.getElementById("passwordR1");
		if(cambio.type == "password"){
			cambio.type = "text";
			$('.icon').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
		}else{
			cambio.type = "password";
			$('.icon').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
		}
	} 
	
	$(document).ready(function () {
	//CheckBox mostrar contraseña

        $('#ShowPassword1').click(function () {
            $('#Passwordr1').attr('type', $(this).is(':checked') ? 'text' : 'password');
        });
        $('#ShowPassword2').click(function () {
            $('#Passwordr2').attr('type', $(this).is(':checked') ? 'text' : 'password');
        });
        <?php if(session()->has('errorRegister')):?>
            <?php session()->remove('errorRegister');?>
            <?php if(session()->has('correo')):?>
                <?php session()->remove('correo');?>
                alert("Correo ya a fue registrado en el sistema");
            <?php else:?>
                alert("Error al registrar los datos, intentelo de nuevo mas tarde");
            <?php endif;?>
        <?php endif;?>

    });

    function mostrarPasswordr1(){
        var cambio = document.getElementById("passwordr1");
        if(cambio.type == "password"){
            cambio.type = "text";
            $('#icon1').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
        }else{
            cambio.type = "password";
            $('#icon1').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
        }
    } 

    function mostrarPasswordr2(){
        var cambio = document.getElementById("passwordr2");
        if(cambio.type == "password"){
            cambio.type = "text";
            $('#icon2').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
        }else{
            cambio.type = "password";
            $('#icon2').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
        }
    } 
    registerForm.addEventListener("submit", (e) => { // Escuchar cuando se envíe el formulario
        if (passwordr1.value !== passwordr2.value) { // Comprobar si los valores de los inputs son iguales, si no lo son continuar
            e.preventDefault(); // Prevenir que la página se recargue
            alert("Las contraseñas no coinciden");

        }
        });
</script>

<!-- Para el paso a paso -->
<script>
 
$("#registerDiv").steps({
    headerTag: "h3",
    bodyTag: "section",
    transitionEffect: "slideLeft",
    autoFocus: true
});
</script>