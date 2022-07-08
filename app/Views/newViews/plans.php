<?php
    include("baseGuest.php");
?>    
  

<div class="container cont60 py-4 py-xl-5">
    <div class="row mb-5">
        <div class="col-md-8 col-xl-6 text-center mx-auto">
            <h2>Planes</h2>
            <p class="w-lg-50">Elige el plan que mejor te acomode para disfrutar de Nucleova</p>
        </div>
    </div>
    <div class="row gy-4 gy-xl-0 row-cols-1 row-cols-md-2 row-cols-xl-3 d-xl-flex align-items-xl-center gutter-y">
        <div class="col">
            <div class="card">
                <div class="card-body text-center p-4">
                    <h6 class="text-uppercase text-muted card-subtitle">Mensual</h6>
                    <h4 class="display-4 fw-bold card-title">$5.000</h4>
                </div>
                <div class="card-footer p-4">
                    <a class="btn btn-blue text-white d-block w-100" role="button" href="<?php echo base_url('/pasareladepago');?>/5000">Contratar Ahora</a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-body text-center p-4">
                    <h6 class="text-uppercase text-muted card-subtitle">Semestral</h6>
                    <h4 class="display-4 fw-bold card-title">$28.800</h4>
                </div>
                <div class="card-footer p-4">
                    <div>
                        <ul class="list-unstyled">
                            <li><span class="fa-regular fa-circle-dot"></span>  Nucleova pro por $4.800 mensual.</li>
                            
                        </ul>
                    </div><a class="btn btn-blue text-white d-block w-100" role="button" href="<?php echo base_url('/pasareladepago');?>/28000">Contratar Ahora</a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card border-blue border-2">
                <div class="card-body text-center p-4"><span class="badge rounded-pill bg-blue position-absolute top-0 start-50 translate-middle text-uppercase">Mejor precio</span>
                    <h6 class="text-uppercase text-muted card-subtitle">Anual</h6>
                    <h4 class="display-4 fw-bold card-title">$54.000</h4>
                </div>
                <div class="card-footer p-4">
                    <div>
                        <ul class="list-unstyled">
                            <li><span class="fa-regular fa-circle-dot"></span> Nucleova pro por $4.500 mensual.</li>                            
                        </ul>
                    </div><a class="btn btn-blue text-white d-block w-100" role="button" href="<?php echo base_url('/pasareladepago');?>/54000">Contratar Ahora</a>
                </div>
            </div>
        </div>
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

 <script>

    $(document).ready(function(){

        $('#mensajeTDK').click(function() {
            <?php session()->remove('mensajeControlador'); ?>
        });

        <?php if(session()->has('auxTDK')):?>
            document.getElementById("tdk").submit();
        <?php endif;?>

        <?php if(session()->has('mensajeControlador')):?>
            $('#modalController').modal('show');
        <?php endif;?>
        
	});
 </script>