<style>
    .gradiente{
        /* background-color: #c04894;
        background-image: linear-gradient(180deg, #c04894 0%, #331a9a 33%, #ffffff 66%); */

        background-color: #314a9a;
        background-image: linear-gradient(180deg, #314a9a 0%, #c04894 50%, #ffffff 100%);

      }
</style>
<?php
    include("baseGuest.php");
?>    
  

<div class="container cont60 py-4 py-xl-5">
    <div class="row mb-5">
        <div class="col-md-8 col-xl-6 text-center mx-auto">
            <h2>Planes</h2>
            <p class="w-lg-50">Elige el plan que mejor te acomode para disfrutar de Nucleova </p>
            <strong>1 mes gratis por tiempo limitado contratando cualquier plan</strong>
        </div>
    </div>
    <div class="row gy-4 gy-xl-0 row-cols-1 row-cols-md-2 row-cols-xl-3 d-xl-flex align-items-xl-center gutter-y">
        <?php $c=1; foreach($pagos as $pago):?>
            <div class="col-md-3">
                <?php if($pago['mejorPrecio']==1):?>
                    <div class="card border-blue border-2">
                        <div class="card">
                            <div class="card-body text-center p-4"><span class="badge rounded-pill bg-blue position-absolute top-0 start-50 translate-middle text-uppercase">Mejor precio</span>
                                <h6 class="text-uppercase text-muted card-subtitle"><?php echo $pago['texto1']?></h6>
                                <h4 class="display-4 fw-bold card-title font-scale-price" style="font-size:2vw;">$<?php echo number_format($pago['precio'], 0,"",".")?></h4>
                            </div>
                        </div>

                <?php else:?>
                    <div class="card">
                        <div class="card">
                            <div class="card-body text-center p-4">
                            <h6 class="text-uppercase text-muted card-subtitle"><?php echo $pago['texto1']?></h6>
                            <h4 class="display-4 fw-bold card-title" style="font-size:2vw;">$<?php echo number_format($pago['precio'], 0,"",".")?></h4>
                        </div>
                <?php endif?>                    
                    <div class="card-footer p-4">
                        <div>
                            <ul class="list-unstyled">
                                <li><span class="fa-regular fa-circle-dot"></span>  Nucleova pro por $<?php echo number_format(($pago['precio']/$pago['meses']), 0,"",".")?> mensual.</li>
                                
                            </ul>
                        </div>
                        <?php if(session()->get('isLoggedIn')):?>
                            <a class="btn btn-blue text-white d-block w-100" role="button" href="<?php echo base_url('/pasareladepago').$c;?>/1">Contratar Ahora</a>
                            <!--a class="btn btn-blue text-white d-block w-100" type="button" onclick ="contruModal()" id="contru">Contratar Ahora</a-->
                        <?php else:?>
                            <!--a class="btn btn-blue text-white d-block w-100" role="button" href="<?php echo base_url('/pasareladepago').$c;?>/1">Contratar Ahora</a-->
                            <a class="btn btn-blue text-white d-block w-100" type="button" onclick ="iSM()" id="contru2">Contratar Ahora</a>  

                        <?php endif;?>
                                                
                    </div>
                </div>
                </div>
            </div>
        <?php $c++;?>   
        <?php endforeach;?>
    </div>
</div>

<?php if(session()->has('auxTDK')):?>
    <form id="tdk" method="post" action="<?php echo session()->get('url')?>">
    <input type="hidden" name="token_ws" value="<?php echo session()->get('token')?>" />
    </form>
<?php endif;?>

<?php if(session()->has('mensajeControlador')):?>
    <div id="modalController" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><?php echo session()->get('mensajeControlador')['titulo']?>.</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p><?php echo session()->get('mensajeControlador')['mensaje']?>.</p>
                </div>
                <div class="modal-footer">
                    <button id="mensajeTDK" type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
<?php endif;?>

<div id="modalSeguro" class="modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content gradiente">
                <div class="modal-header">
                    <h5 style="color:#FFFFFF;" class="modal-title">Portal de pago.</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p style="color:#FFFFFF;">¿Seguro que desea continuar a la pasarela de pago?.</p>
                </div>
                <div class="modal-footer">
                    <button id="mdAceptar" type="button" class="btn btn-secondary" data-dismiss="modal">Aceptar</button>
                    <button id="mensajeTDK" type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
</div>

<div class="modal" id="construccion" tabindex="-1" role="dialog" >
	<div class="modal-dialog ">
		<div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Próximamente:</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">                
                <div class="row" id="">
                    <div>
                        <img style="width: 400px; max-width:100%; height:100%; max-height:300px;"
                        src="https://pinguinodigital.com/wp-content/uploads/2020/08/pagina-en-construcci%C3%B3n1.jpg" class="mx-auto d-block">
                    </div>                                
					<div>
                        <img style=" width: 150px; max-width:100%; height:100%; max-height:150px;" 
                        src="<?php echo base_url('')?>/public/assets/Logos/LogoPequeno2.png" class="mx-auto d-block">
                    </div>
				</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
			</div>
		</div>
    </div>
</div>

<div class="modal" id="iniciarModalS" tabindex="-1" role="dialog" >
	<div class="modal-dialog ">
		<div class="modal-content gradiente">
			<div class="modal-header">
                <h5 class="modal-title" style="color:#FFFFFF;">Importante:</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
                <br>
                <p style="color:#FFFFFF;">Debe iniciar sesión para seguir a la pasarela de pago.</p>
                <br>
                <p style="color:#FFFFFF;">Si ya se ha registrado en el sistema: <a style="color:#FFE9E9;" class="nav-link" href="<?php echo base_url('/login');?>"><b>Iniciar sesión</b> </a></p>
                <br>
                <p style="color:#FFFFFF;">Si <b>NO</b> se ha registrado en el sistema: <a style="color:#FFE9E9;" class="nav-link" href="<?php echo base_url('/registrar'); ?>"><b>Registrarse</b></a></p>
                
				<div>
                    <img style="width: 150px; max-width:100%; height:100%; max-height:150px;" 
                    src="<?php echo base_url('')?>/public/assets/Logos/LogoPequeno2.png" 
                    class="mx-auto d-block"
                ></div>
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
		</div>
	</div>
</div>

<script>
    function iSM(){
        $("#iniciarModalS").modal('show');
    }

    function contruModal(){
        $("#construccion").modal('show');
    }
    
    
</script>
<script>

    $(document).ready(function(){

        $('#mensajeTDK').click(function() {
            <?php session()->remove('mensajeControlador'); ?>
        });

        <?php if(session()->has('auxTDK')):?>
            //document.getElementById("tdk").submit();
            $('#modalSeguro').modal('show');
        <?php endif;?>

        $('#mdAceptar').click(function() {
            <?php session()->remove('auxTDK'); ?>
            document.getElementById("tdk").submit();
            
        });



        <?php if(session()->has('mensajeControlador')):?>
            $('#modalController').modal('show');
        <?php endif;?>
	});
</script>
