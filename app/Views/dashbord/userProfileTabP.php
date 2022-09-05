<style>
    .notActive{
        filter: grayscale(75%);
    }
</style>
    <div class="row ">
        <div class="col-md-5">
            <div class="row">
                <div class="col">
                    <?php include("carrucelProveedor.php");?>
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
                    <div class="form-group input-group align-items-center">            
                        <a id="rrssF1" class="btn btn-outline-primary border-0 notActive " title="Facebook" style="padding: 15px;" target="_blank" href="" disabled>
                            <img src="<?php echo base_url('')?>/public/assets/rrss/facebook.png" class="img-fluid"></a>	
                        <a id="rrssL1" class="btn btn-outline-info border-0 notActive " title="Linkedin" style="padding: 15px;" target="_blank" href="" disabled>
                            <img src="<?php echo base_url('')?>/public/assets/rrss/linkedin.png" class="img-fluid"></a>											
                        <a id="rrssI1" class="btn btn-outline-info border-0 notActive " title="Instagram" style="padding: 15px;" target="_blank" href="" disabled>
                            <img src="<?php echo base_url('')?>/public/assets/rrss/instagram.png" class="img-fluid"></a>											    
                    </div>
                </div> 
            </div>
        </div>
    </div>

    <div class="modal fade" id="msj_cambiar_imagen" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Cambiar imagen</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="imageUploadForm" action="<?php echo base_url('/cambiar_imagen_empresaN');?>" method="post" enctype="multipart/form-data">
                    <div class="row" style="justify-content: center;">
                        <div class="col-4">
                            <?php include("carrucelProveedorN.php");?>
                        </div>
                    </div>
                    
                    <button type="button" class="btn btn-primary btn-block"> 
                        <div class="form-group small">
                            <div class="row">
                                <div class="col-2">
                                    <label for="exampleInputEmail1">Imagen 1</label>
                                </div>
                                <div class="col-10">
                                    <input type="file" class="form-control form-control-user" id="filePhoto0" name="filePhoto0"
                                    placeholder="Editar imagen" >
                                </div>
                            </div>                                                       
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-2">
                                    <label for="exampleInputEmail1">Imagen 2</label>
                                </div>
                                <div class="col-10">
                                    <input type="file" class="form-control form-control-user" id="filePhoto1" name="filePhoto1"
                                    placeholder="Editar imagen" >
                                </div>
                            </div>                                                       
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-2">
                                    <label for="exampleInputEmail1">Imagen 3</label>
                                </div>
                                <div class="col-10">
                                    <input type="file" class="form-control form-control-user" id="filePhoto2" name="filePhoto2"
                                    placeholder="Editar imagen" >
                                </div>
                            </div>                                                       
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-2">
                                    <label for="exampleInputEmail1">Imagen 4</label>
                                </div>
                                <div class="col-10">
                                    <input type="file" class="form-control form-control-user" id="filePhoto3" name="filePhoto3"
                                    placeholder="Editar imagen" >
                                </div>
                            </div>                                                       
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-2">
                                    <label for="exampleInputEmail1">Imagen 5</label>
                                </div>
                                <div class="col-10">
                                    <input type="file" class="form-control form-control-user" id="filePhoto4" name="filePhoto4"
                                    placeholder="Editar imagen" >
                                </div>
                            </div>                                                       
                        </div>            
                    </button>       
                
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