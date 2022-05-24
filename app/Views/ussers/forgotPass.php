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
                                <form action="<?php echo base_url('/lostPasswordForm')?>" method="post">
                                    <div class="form-group">
                                        <input type="email" id="emailFP" mame="emailFP" class="form-control" required
                                            placeholder="Ingrese su email...">
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