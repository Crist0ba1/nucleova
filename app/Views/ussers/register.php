<style>
    #centrador1{
        justify-content: center;
        align-items: center;
    }

    #imagen1{
        justify-content: center;
        align-items: center;
        position: relative;
        width: 80%;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        margin: auto;
    }
</style>
<div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div id="centrador1" class="col-lg-5 text-center">
                        <img id="imagen1" src="<?php echo base_url('')?>/public/assets/Logos/LogoPequeno.png" >
                    </div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">¡Crea tu cuenta!</h1>
                            </div>
                            <form id="registerForm" class="registerForm" action="<?php echo base_url('/registrarPersona')?>" method="post">
                                <div class="form-group">
                                    <input required type="text" class="form-control form-control-user" id="nombre" name="nombre"
                                        placeholder="Ingrese su nombre" minlength="2" >
                                    <span id="nombreCompleto_error" class="text-danger">                                       
                                </div> 
                                <div class="form-group">
                                    <input required type="text" class="form-control form-control-user" id="apellidos" name="apellidos"
                                        placeholder="Ingrese sus apellidos" minlength="2" >
                                    <span id="apellidos_error" class="text-danger">                                       
                                </div>                   
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" id="emailRegister" name="emailRegister"
                                        placeholder="Email" required>
                                        <span id="emailRegister_error" class="text-danger">
                                </div>
                                <div class="form-group">                                    
                                    <select class="form-control" id="tipoDeCuenta" name="tipoDeCuenta" required >
                                        <option value="">Seleccione tipo de cuenta</option>
                                        <option value="1">Buscando un prestador de servicios</option>
                                        <option value="2">Prestador de servicios, persona natural</option>
                                        <option value="2">Prestador de servicios, empresa</option>
                                    </select>
                                    <span id="tipoDeCuenta_error" class="text-danger">
                                </div>
                                    <small id="passwordHelpBlock" class="form-text text-muted">
                                        La contraseña debe ser de mínimo 5 caracteres.
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
                                 <input type="submit" name ="submit" id="submit_button2" class="btn btn-primary btn-user btn-block text-white" value="Registrar cuenta" />
                            </form>
                                <!--hr>
                                <a href="index.html" class="btn btn-danger btn-user btn-block">
                                    <i class="fab fa-google fa-fw"></i> Registrarse con Google
                                </a>
                                <a href="index.html" class="btn btn-info btn-user btn-block">
                                    <i class="fab fa-facebook-f fa-fw"></i> Registrarse con Facebook
                                </a-->
                            <hr>
                            <div class="text-center">
                                <a class="small" href="<?php echo base_url('/lostPassword');?>" >¿Olvidaste tu contraseña?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="<?php echo base_url('/login');?>" >¿Ya estás registrado? ¡Inicie sesión aquí!</a>
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
        $('#registerForm')[0].reset();
        
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
                $(emailRegister_error).text('Correo ya a fue registrado en el sistema');
                setTimeout(function(){
                    $(emailRegister_error).text('');
                }, 5000);
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