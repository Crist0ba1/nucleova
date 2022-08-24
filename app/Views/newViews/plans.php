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
        <?php foreach($pagos as $pago):?>
            <div class="col-md-3">
                <?php if($pago['mejorPrecio']==1):?>
                    <div class="card border-blue border-2">
                    <div class="card">
                        <div class="card-body text-center p-4"><span class="badge rounded-pill bg-blue position-absolute top-0 start-50 translate-middle text-uppercase">Mejor precio</span>
                            <h6 class="text-uppercase text-muted card-subtitle"><?php echo $pago['texto1']?></h6>
                            <h4 class="display-4 fw-bold card-title font-scale-price" style="font-size:2vw;">$<?php echo $pago['precio']?></h4>
                        </div>
                    </div>

                <?php else:?>
                    <div class="card">
                    <div class="card">
                        <div class="card-body text-center p-4">
                        <h6 class="text-uppercase text-muted card-subtitle"><?php echo $pago['texto1']?></h6>
                        <h4 class="display-4 fw-bold card-title" style="font-size:2vw;">$<?php echo $pago['precio']?></h4>
                    </div>
                    <?php endif?>
                    
                    <div class="card-footer p-4">
                        <div>
                            <ul class="list-unstyled">
                                <li><span class="fa-regular fa-circle-dot"></span>  Nucleova pro por $<?php echo $pago['precio']/$pago['meses']?> mensual.</li>
                                
                            </ul>
                        </div>
                        <!--a class="btn btn-blue text-white d-block w-100" role="button" href="<?php echo base_url('/pasareladepago');?>/<?php echo $pago['precio']?>">Contratar Ahora</a-->
                        <a class="btn btn-blue text-white d-block w-100" type="button" onclick ="contruModal()" id="contru">Contratar Ahora</a>
                    </div>
                </div>
                </div>
            </div>
           
        <?php endforeach;?>
    </div>
</div>

<?php if(session()->has('auxTDK')):?>
    <form id="tdk" method="post" action="<?php echo session()->get('url')?>">
    <input type="hidden" name="token_ws" value="<?php echo session()->get('token')?>" />
    </form>
<?php endif;?>

<?php if(session()->has('mensajeControlador')):?>
    <div id="modalController" class="modal" tabindex="-1" role="dialog">
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
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Portal de pago.</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>¿Seguro que desea continuar a la pasarela de pago?.</p>
                </div>
                <div class="modal-footer">
                    <button id="mdAceptar" type="button" class="btn btn-secondary" data-dismiss="modal">Aceptar</button>
                    <button id="mensajeTDK" type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
</div>

<div class="modal fade" id="construccion" role="dialog" >
		<div class="modal-dialog ">
			<div class="modal-content">
				<div class="modal-header">
                    <h5 class="modal-title">Próximamente:</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
                    
                    <div class="row" id="">
                                <div><img style="
					width: 400px;
       				 max-width:100%;
        			height:100%;
        			max-height:300px;
					" src="https://pinguinodigital.com/wp-content/uploads/2020/08/pagina-en-construcci%C3%B3n1.jpg" class="mx-auto d-block"></div>
                                

					<div><img style="
					width: 150px;
       				 max-width:100%;
        			height:100%;
        			max-height:150px;
					" src="<?php echo base_url('')?>/public/assets/Logos/LogoPequeno2.png" class="mx-auto d-block"></div>
				</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
			</div>
		</div>
</div>
<script>
    function contruModal() {
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
