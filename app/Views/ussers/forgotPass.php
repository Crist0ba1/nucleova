<div class="container">

<!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-10 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-block centrador">
                        <img class="imagen" src="<?php echo base_url('')?>/public/assets/Logos/logoPequeno.png"  >
                        </div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-2">¿A olvidado su contraseña?</h1>
                                    <p class="mb-4">Sabemos que estas cosas pasan, ingrese su email y le
                                        enviaremos una nueva. </p>
                                </div>
                                <form action="<?php echo base_url('/lostPasswordForm')?>" method="post" >
                                    <div class="form-group">
                                        <input type="email" class="form-control form-control-user" id="emailFP1" name="emailFP1" aria-describedby="emailHelp"
                                        placeholder="Ingrese su email..." required>
                                    </div>
                                    <input type="submit" name ="submit" class="btn btn-primary btn-user btn-block text-white" value="Enviar contraseña" />
                                </form>
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="<?php echo base_url('/registrar');?>" >Crear una cuenta!</a>
                                </div>
                                <div class="text-center">
                                    <a class="small" href="<?php echo base_url('/login');?>">¿Ya esta registrado? Inicie sesion aqui!</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
        <div class="row">
            <div class="col-12">
                <div class="row justify-content-center" style="background-color:#314A9A;">                        
                    <img class="img-fluid" src="<?php echo base_url('')?>/public/assets/Logos/logoCorreo.png" style="max-height: 150px;">
                </div>
            </div>
            <br>
            <hr>
            <div class="col-12">
                <hr>
                <h5>Bienvenido: Nicolas, se a modificado su contraseña con exito </h5>
                <br>
                <h5><b> Nueva contraseña</b>:</h5>
            </div>
            <br>
            <hr>
            <div class="col-12">
                <hr>
                <h5>¿Necesitas ayuda? Contacta con nosotros o a través de nuestras redes sociales:</h5>
                <div class="row justify-content-center"> 
							<div class="single-footer-widget ">
								<h6 style="color:#ffffff">Encuentranos en:</p>
								<div class="footer-social d-flex align-items-center">
									<a class="btn btn-outline-primary border-0" title="Facebook" style="padding: 15px;" target="_blank" href="https://www.facebook.com/nucleova">
									<img src="<?php echo base_url('')?>/public/assets/rrss/facebook.png" class="img-fluid"></a>	
									<a class="btn btn-outline-info border-0" title="Linkedin" style="padding: 15px;" target="_blank" href="https://www.linkedin.com/company/nucleova/">
									<img src="<?php echo base_url('')?>/public/assets/rrss/linkedin.png" class="img-fluid"></a>											
									<a class="btn btn-outline-info border-0" title="Instagram" style="padding: 15px;" target="_blank" href="https://www.instagram.com/nucleova/">
									<img src="<?php echo base_url('')?>/public/assets/rrss/instagram.png" class="img-fluid"></a>											
								</div>								
							</div>
						</div>
                <hr>
            </div>
        </div>

</div>
<div class="modal fade" id="msj_correo" role="dialog" >
		<div class="modal-dialog ">
			<div class="modal-content gradiente">
				<div class="modal-body">
					<h4 style="color:#FFFFFF;"class="modal-title float-left"> 
						Recuperar contraseña
					</h4>
					<button type="button" class="close float-right" data-dismiss="modal" aria-label="Close">
						<i class="fas fa-window-close" style="color:#ff0000;"></i></button>
				</div>
				<div class="modal-body">
					<h5 style="color:#FFFFFF;"><?php echo session()->get('msj_correo');?></h5>
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
    <?php if(session()->has('msj_correo')):?>
			$(document).ready(function() {  
			    $('#msj_correo').modal('show');
			});
            <?php session()->remove('msj_correo');?>
	<?php endif;?>
</script>