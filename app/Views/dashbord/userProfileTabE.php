<style>
    .notActive{
        filter: grayscale(75%);
    }
</style>
    <div class="row ">
        <div class="col-md-5">
            <div class="row">
                <div class="col">
                    <img id="imgPerfil" class="rounded img-fluid w-100 fit-cover bottom20" style="min-height: 300px !important; max-height: 450px !important;   max-width: 450px !important;" src="<?php echo base_url('')?>/public/assets/sin-foto.jpg" />
                    <button type="button" onclick="cambiarImagen()" class="btn btn-primary btn-block"><i class="fa fa-camera" aria-hidden="true"></i> Cambiar imagen
                    </button>   
                    
                </div>
            </div><br>            
            <div class="row text-center">
                <br>
                <div class="col">
                    <span>Calificación general</span>
                </div>
            
                <div class="col">
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star"></span>
                    <span class="fa fa-star"></span>
                </div>
            </div>
        </div>
        <div class="col-md-7">            
            <div class="card bottom30 text-center">
                <div class="card-header">
                    <h4><?= session()->get('nombre') ?></h4>
                </div>                
            </div>
            <div class="card bottom30">                
                <div class="card-body"> 
                    <p class="card-text"><?= session()->get('textEM') ?></p>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-7">
                    <h4>Ingrese redes sociales</h4>
                    <div class="row form-group input-group align-items-center">            
                        <a id="rrssF1" class="col-4 btn btn-outline-primary border-0 notActive " title="Facebook" style="padding: 15px;" target="_blank" href="" disabled>
                            <img src="<?php echo base_url('')?>/public/assets/rrss/facebook.png" class="img-fluid"></a>	
                        <a id="rrssL1" class="col-4 btn btn-outline-info border-0 notActive " title="Linkedin" style="padding: 15px;" target="_blank" href="" disabled>
                            <img src="<?php echo base_url('')?>/public/assets/rrss/linkedin.png" class="img-fluid"></a>											
                        <a id="rrssI1" class="col-4 btn btn-outline-info border-0 notActive " title="Instagram" style="padding: 15px;" target="_blank" href="" disabled>
                            <img src="<?php echo base_url('')?>/public/assets/rrss/instagram.png" class="img-fluid"></a>											    
                    </div>
                </div> 
            </div>
        </div>
    </div>

    <div class="modal fade" id="msj_cambiar_imagen" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content gradiente">
            <div class="modal-header">
                <h5 class="modal-title text-white">Cambiar imagen</h5>
                <button type="button" class="close float-right" data-dismiss="modal" aria-label="Close">
					<i class="fas fa-window-close" style="color:#ff0000;"></i></button>
            </div>
            <div class="modal-body">
                <form id="imageUploadForm" action="<?php echo base_url('/cambiar_imagen_empresa');?>" method="post" enctype="multipart/form-data">
                    <div class="row" style="justify-content: center;">
                        <div class="contenedorImagen">
                            <img id="imgPerfil2" class="rounded img-fluid w-100 fit-cover bottom20" style="min-height: 250px; max-height: 300px;" src="<?php echo base_url('')?>/public/assets/sin-foto.jpg" />                            
                        </div>
                        <div class="col-10">
                            <br>
                            <div class="row" style="justify-content: center; background-color: #314a9a; padding:7px;">
                                <div class="col-2">
                                    <label class="labelImagen text-white">Imagen</label>
                                </div>
                                <div class="col-10">
                                    <input type="file" class="form-control form-control-user text-white" id="filePhoto" name="filePhoto"
                                    placeholder="Editar imagen" >     
                                </div>
                                
                            </div>

                        </div>
                    </div>
                    
                
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Cambiar imagen</button>
                </form>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
            </div>
        </div>
    </div>  
<script>

    function cambiarImagen(){
        $('#msj_cambiar_imagen').modal('show');
    }

    <?php if(session()->get('isComplete') == 0 ):?>
        <?php if(session()->has('imagenEM')):?>
            <?php if(session()->get('imagenEM') != 'No'):?>
                $("#imgPerfil").attr("src", "<?php echo base_url('')?>/public/imgs/<?php echo session()->get('idEM')?>/<?php echo session()->get('imagenEM')?>");
                $("#imgPerfil2").attr("src", "<?php echo base_url('')?>/public/imgs/<?php echo session()->get('idEM')?>/<?php echo session()->get('imagenEM')?>");
            <?php endif;?>        
        <?php endif;?>
        <?php if(session()->has('rf')):?>
            <?php if(session()->get('rf') != ''):?>
                $("#rrssF1").attr("href", "<?php echo session()->get('rf')?>");
                $("#rrssF1").removeClass("notActive");
            <?php endif;?>        
        <?php endif;?>
        <?php if(session()->has('rl')):?>
            <?php if(session()->get('rl') != ''):?>
                $("#rrssL1").attr("href", "<?php echo session()->get('rl')?>");
                $("#rrssL1").removeClass("notActive");
            <?php endif;?>        
        <?php endif;?>
        <?php if(session()->has('ri')):?>
            <?php if(session()->get('ri') != ''):?>
                $("#rrssI1").attr("href", "<?php echo session()->get('ri')?>");
                $("#rrssI1").removeClass("notActive");
            <?php endif;?>        
        <?php endif;?>
    <?php endif;?>



      
</script>