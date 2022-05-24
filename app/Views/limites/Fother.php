<!-- https://uigradients.com/#Lunada -->
<style type="text/css" media="screen">
    #fother{    
		background-color: #331a9a;
    }
	.blanco{
		color: #ffffff;
	}
</style>
<footer id="fother" class="footer-area section-gap">
			<div class="container">
				<br><br>
				<div class="row">
					<div class="col-lg-7 col-md-7 col-sm-7">
						<div class="single-footer-widget">
							<div class="row">
								<div class="col-md-offset-1 col-md-10 col-sm-12">
									<h6 style="color:#ffffff">Contactanos al correo: <b>contacto@nucleova.cl</b></p> o llene el siguiente formulario:</h6></b>
								</div>
								<div class="col-md-offset-1 col-md-10 col-sm-12 wow fadeIn">
									<form method="post" id="fotherCorreo" >
										<div style="padding-top: 5px" class="col-md-6 col-sm-6">
											<input type="text" class="form-control" name="name" id="name" placeholder="Nombre" required >
										</div>
										<div style="padding-top: 10px" class="col-md-10 col-sm-10">
											<input type="email" class="form-control" name="email" placeholder="Correo" required>
										</div>
										<div style="padding-top: 10px" class="col-md-12 col-sm-12">
											<textarea rows="8" class="form-control" name="mensaje" id="mensaje" placeholder="Mensaje" required  style="height: 99px;"></textarea>
										</div>
										<div style="display: inline-flex; padding-top: 10px" class="col-md-offset-3 col-md-6 col-sm-offset-3 col-sm-6">
											<br> 
											<div><button type="submit" class="btn btn-success">Enviar</button></div>
											<div style="padding-left: 5px"><button type="reset" class="btn btn-secondary">Cancelar</button></div>		
											<br><br>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-5 col-md-5 col-sm-5 ">
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
						<div class="row">
							<a href="https://www.easy.cl/tienda/" target="_blank"><img src="<?php echo base_url('/public/assets/pfother/easy.png');?>" class="img-fluid"></a>
						</div>
						
					</div>					
				</div>
			</div>
</footer>
<footer class="text-center"> Todos los derechos recervados, &copy; Copyright 2022 Nucleova</footer>

	<div class="modal fade" id="landingMsj" role="dialog" >
		<div class="modal-dialog ">
			<div class="modal-content gradiente">
				<div class="modal-body">
					<h4 style="color:#FFFFFF;"class="modal-title float-left"> 
						Bienvenido
					</h4>
					<button type="button" class="close float-right" data-dismiss="modal" aria-label="Close">
						<i class="fas fa-window-close" style="color:#ff0000;"></i></button>
				</div>
				<div class="modal-body">
					<h5 style="color:#FFFFFF;">Elija la opcion que corresponda <i class="fa-solid fa-circle-check"></i></h5>
				</div>
				<div class="modal-body">
					<a type="button" href="<?php echo base_url('/login');?>" class="btn btn-primary btn-block ">
                        Iniciar sesion</a>
					<a type="button" href="<?php echo base_url('/registrar');?>" class="btn btn-primary btn-block ">
                        Registrarse</a>
				
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

 
	<div class="modal fade" id="mensajeControlador" role="dialog" >
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title"> 
						<?php if( session()->has('mensajeControlador')): ?>
							<?php echo session()->get('mensajeControlador')['titulo']; ?> 
						<?php endif;?>
					</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<i class="fas fa-window-close" style="color:#DD2B2B;"></i></button>
				</div>
				<div class="modal-body">
					<h4>
						<?php if( session()->has('mensajeControlador')): ?>
							<?php echo session()->get('mensajeControlador')['mensaje'] ?>
						<?php endif; ?>	
					</h4>
					<br>
					
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade" id="mensajeUbicacion" role="dialog" >
		<div class="modal-dialog ">
			<div class="modal-content gradiente">
				<div class="modal-body">
					<h4 style="color:#FFFFFF;"class="modal-title float-left"> 
						Informacion relevante 
					</h4>
					<button type="button" class="close float-right" data-dismiss="modal" aria-label="Close">
						<i class="fas fa-window-close" style="color:#ff0000;"></i></button>
				</div>
				<div class="modal-body">
					<h5 style="color:#FFFFFF;">Ingrese ubicacion <i style="color:#FFFFFF;" class="fa fa-map-marker" aria-hidden="true"></i></h5>
				</div>
				<div class="modal-body">
					<form id="modalUbicacion" action="">
						<div class="row">
							<div class="col-12">
								<div class="form-group">
										<select name="region" id="region" class="form-control-lg" required>
											<option value="0">-Seleccione una region-</option>
											<?php foreach($region as $row):?>
												<option value="<?= $row['id'];?>"><?= $row['region'];?></option>
											<?php endforeach;?>
										</select>
															
								</div>
							</div>

							<div class="col-12">
								<div class="form-group">
									<select name="comuna" id="comuna" class="form-control-lg" required>
										<option value="0">-Falta seleccionar region-</option>
									</select>
								</div>
							</div>
						</div>
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

	<div class="modal fade" id="mensajeSesion" role="dialog" >
		<div class="modal-dialog ">
			<div class="modal-content gradiente">
				<div class="modal-body">
					<h4 style="color:#FFFFFF;"class="modal-title float-left"> 
						Informacion relevante 
					</h4>
					<button type="button" class="close float-right" data-dismiss="modal" aria-label="Close">
						<i class="fas fa-window-close" style="color:#ff0000;"></i></button>
				</div>
				<div class="modal-body">
					<h5 style="color:#FFFFFF;">Ingrese ubicacion <i style="color:#FFFFFF;" class="fa fa-map-marker" aria-hidden="true"></i></h5>
				</div>
				<div class="modal-body">
					<form id="modalUbicacion" action="">
						<div class="row">
							<div class="col-12">
								<div class="form-group">
										<select name="region" id="region" class="form-control-lg" required>
											<option value="0">-Seleccione una region-</option>
											<?php foreach($region as $row):?>
												<option value="<?= $row['id'];?>"><?= $row['region'];?></option>
											<?php endforeach;?>
										</select>
															
								</div>
							</div>

							<div class="col-12">
								<div class="form-group">
									<select name="comuna" id="comuna" class="form-control-lg" required>
										<option value="0">-Falta seleccionar region-</option>
									</select>
								</div>
							</div>
						</div>
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

	<script type="text/javascript">
		<?php if(session()->has('verModal')):?>
			/*<?php if(session()->get('verModal')== "1" && !session()->get('isLoggedIn')):?>
				$(document).ready(function() {  
				$('#landingMsj').modal('show');
				});
				<?php session()->set('verModal',"0");?>
			<?php endif;?>*/
			<?php if(session()->get('verModal')== "2" && session()->get('isLoggedIn')):?>
				$(document).ready(function() {  
				$('#mensajeUbicacion').modal('show');
				});
				<?php session()->set('verModal',"0");?>
			<?php endif;?>
		<?php endif;?>

		//para el selec de categoria y subcategoria 
    	$("#region").change(function() {
       		$("#region option:selected").each(function() {
            	var id = $('#region').val();
            	var select = document.getElementById("comuna"); //Seleccionamos el select

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
		
		$('#comuna').change(function () {
			//alert("LLegeamos aqui");
			$('#mensajeUbicacion').modal('hide');

			var modalRegion = document.getElementById("region").value;
			var modalComuna = document.getElementById("comuna").value;
			
			/* Aqui debo cargar a la sesionlandingMsj 
			<?php session()->set('refRegion', $region);?>
			<?php session()->set('refComuna', $region);?>
			*/

			document.getElementById("region1").value = modalRegion;
			var id = modalRegion;
            	var select = document.getElementById("comuna1"); //Seleccionamos el select

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
            document.getElementById("comuna1").value = modalComuna;

			//alert(modalRegion +" / " + modalComuna);

		});
		

    </script>
	<script>
		$(document).ready(function(){
			//action="<?php echo base_url('/enviarCorreo')?>"
			$('#fotherCorreo').on('submit',function(event){
				alert('Enviando correo');
                    event.preventDefault();
                    $.ajax ({
                        type: "POST",
                        url: "<?php echo base_url('/enviarCorreo')?>",
                        data: $(this).serialize(),
                        success: function(data){
                            if(data == 1){
								alert('Correo enviado con exito');
								$('#fotherCorreo')[0].reset();
							}
							else{
								alert('Error al enviar el correo, intente de nuevo. Data:' + data);
							}
                        },
						error: function(jqXHR, textStatus, errorThrown ){
							if (jqXHR.status === 0) {

							alert('Not connect: Verify Network.');

							} else if (jqXHR.status == 404) {

							alert('Requested page not found [404]');

							} else if (jqXHR.status == 500) {

							alert('Internal Server Error [500].');

							} else if (textStatus === 'parsererror') {

							alert('Requested JSON parse failed.');

							} else if (textStatus === 'timeout') {

							alert('Time out error.');

							} else if (textStatus === 'abort') {

							alert('Ajax request aborted.');

							} else {

							alert('Uncaught Error: ' + jqXHR.responseText);

							}
						}
                    })
                });
		});
	</script>
</body>
</html>