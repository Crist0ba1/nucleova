<style>
    .centrador{
     position: relative;
    }

    .imagen{
        position: absolute;
        width: 80%;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        margin: auto;
    }
</style>

<div class="row justify-content-center">
    <div class="col-xl-10 col-lg-12 col-md-9">
        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div id="centrador" class="col-lg-6 centrador">
                        <img id="imagen" class="imagen" src="<?php echo base_url('')?>/public/assets/Logos/logoPequeno.png" >
                    </div>
                    <div class="col-lg-6">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Bienvenidos!</h1>
                            </div>
                            <form id="loginForm" action="<?php echo base_url('/iniciarSession')?>"  class="user" method="post">
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user"
                                        id="emailrL" name="emailrL" aria-describedby="emailHelp"
                                        placeholder="Ingrese su email..." required>
                                    <span id="email_error" class="text-danger">
                                </div>
                                <div class="form-group input-group">
                                    <input type="password" class="form-control form-control-user" minlength="5"
                                        id="passwordrL" name="passwordrL" placeholder="Ingrese su contraseña" required>
                                    <span id="passwordrL_error" class="text-danger">
                                    <div class="input-group-append">
                                        <button id="ShowPasswordL" class="btn btn-primary" type="button" onclick="mostrarPasswordrL()"> <span id="iconL" class="fa fa-eye-slash iconL"></span> </button>
                                    </div>
                                </div>
                                <?php if(isset($errorLogin)): ?>
                                    <div class="col-12"> 
                                        <div class="alert alert-danger" role="alert">
                                            <?php echo $errorLogin; ?>
                                            <?php session()->remove($errorLogin);?>
                                        </div>
                                    </div>
                                <?php endif; ?> 

                                <!--input type="hidden" name ="action" id="action" value="ini" /-->
                                <input type="submit" name ="submit" id="submit_button" class="btn btn-primary btn-user btn-block" value="Iniciar" />
                                <a href="<?php echo base_url('/invitado');?>" class="btn btn-secondary btn-user btn-block">
                                    Seguir como invitado
                                </a>
                                <hr>
                                <!--  login con face y gmail -->
                                <a href="index.html" class="btn btn-danger btn-user btn-block">
                                    <i class="fab fa-google fa-fw"></i> Iniciar sesion con Google
                                </a>
                                <a href="index.html" class="btn btn-info btn-user btn-block">
                                    <i class="fab fa-facebook-f fa-fw"></i> Iniciar sesion con Facebook
                                </a>                                
                                
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="<?php echo base_url('/lostPassword');?>" >¿Olvido su contraseña?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="<?php echo base_url('/registrar');?>" >Crear una cuenta!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>

<script>
    $(document).ready(function () {
	//CheckBox mostrar contraseña
        $('#ShowPasswordL').click(function () {
            $('#PasswordrL').attr('type', $(this).is(':checked') ? 'text' : 'password');
        });
    });

    function mostrarPasswordrL(){
        var cambio = document.getElementById("passwordrL");
        if(cambio.type == "password"){
            cambio.type = "text";
            $('#iconL').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
        }else{
            cambio.type = "password";
            $('#iconL').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
        }
    } 
    /*
    $('#loginForm').on('submit',function(event){
        event.preventDefault();
            $.ajax ({
                type: "POST",
                url: "<?php echo base_url('/iniciarSession')?>",
                data: $(this).serialize(),
                dataType: "JSON",
                beforSend: function(){
                  //  $('submit_button').val('Espere...');
                  //  $('submit_button').attr('disabled','disabled');
                  alert("entro a ajax");
                },
                success: function(data){
                    if(data.error == "yes"){
                        $('#email_error_error').text(data.codigo_comite_error);
                        $('#passwordrL_error').text(data.nombre_comite_error);
                    }
                    else{
                       alert("Usuario logeado"); 
                    }
                },
                error: function(){
                    alert("Error en la llamada ajax");
                }

            });
    });
    */


</script>