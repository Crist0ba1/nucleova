<style>
    .notActive{
        filter: grayscale(75%);
    }
    .imagenHori{
        justify-content: center;
        /**background-color: #314a9a;*/
        align-items: center;
    }
    .labelImagen {
        color: white;
    }
    .padre{
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .labelInImage{
        width: 50px;
        height: 50px;
        background-color: rgba(0,0,0,0);
    }
    .labelInImage:Hover{
        background-color: rgba(0,0,0,0.5);
    }
    #file-chosen{
    color: white;
    margin-left: 0.3rem;
    font-family: sans-serif;
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
                    <div class="row align-items-center">            
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
        <div class="modal-dialog modal-lg " role="document">
            <div class="modal-content gradiente">
            <div class="modal-header">
                <h5 class="modal-title text-white">Cambiar imagen</h5>
                <button type="button" class="close float-right" data-dismiss="modal" aria-label="Close">
					<i class="fas fa-window-close" style="color:#ff0000;"></i></button>
            </div>
            <div class="modal-body">
                <form id="imageUploadForm" action="<?php echo base_url('/cambiar_imagen_empresaN');?>" method="post" enctype="multipart/form-data">
                    <div class="row" style="justify-content: center;">
                        <div class="col-4">
                            <?php include("carrucelProveedorN.php");?>
                        </div>
                    </div>
                    <br>
                    <div class="row" style="justify-content: center;">
                        <div class="form-group col-10">
                            <div class="row imagenHori">
                                <div id="padre" class="col-8">
                                    <input type="file" id="filePhoto0" name="filePhoto0" hidden>
                                    <label for="filePhoto0" class="labelInImage border border-dark">
                                        <img id="imagenfilePhoto0" src="<?php echo base_url('')?>/public/assets/img-plus.png" class="img-fluid" style="  height: 49px !important; width: 49px !important;">
                                    </label>
                                    <span id="file-chosen0"> Imagen 1, sin seleccionar</span>
                                </div>
                            </div>                                                       
                        </div>
                        <div class="form-group col-10">
                            <div class="row imagenHori">
                                <div id="padre" class="col-8">
                                    <input type="file" id="filePhoto1" name="filePhoto1" hidden>
                                    <label for="filePhoto1" class="labelInImage border border-dark">
                                        <img id="imagenfilePhoto1" src="<?php echo base_url('')?>/public/assets/img-plus.png" class="img-fluid" style="  height: 49px !important; width: 49px !important;">
                                    </label>
                                    <span id="file-chosen1"> Imagen 2, sin seleccionar</span>
                                </div>                               
                            </div>                                                       
                        </div>
                        <div class="form-group col-10">
                            <div class="row imagenHori">
                                <div id="padre" class="col-8">
                                    <input type="file" id="filePhoto2" name="filePhoto2" hidden>
                                    <label for="filePhoto2" class="labelInImage border border-dark">
                                        <img id="imagenfilePhoto2" src="<?php echo base_url('')?>/public/assets/img-plus.png" class="img-fluid" style="  height: 49px !important; width: 49px !important;">
                                    </label>
                                    <span id="file-chosen2"> Imagen 3, sin seleccionar</span>
                                </div>
                            </div>                                                       
                        </div>
                        <div class="form-group col-10">
                            <div class="row imagenHori">
                                <div id="padre" class="col-8">
                                    <input type="file" id="filePhoto3" name="filePhoto3" hidden>
                                    <label for="filePhoto3" class="labelInImage border border-dark">
                                        <img id="imagenfilePhoto3" src="<?php echo base_url('')?>/public/assets/img-plus.png" class="img-fluid" style="  height: 49px !important; width: 49px !important;">
                                    </label>
                                    <span id="file-chosen3"> Imagen 4, sin seleccionar</span>
                                </div>
                            </div>                                                       
                        </div>
                        <div class="form-group col-10">
                            <div class="row imagenHori">
                                <div id="padre" class="col-8">
                                    <input type="file" id="filePhoto4" name="filePhoto4" hidden>
                                    <label for="filePhoto4" class="labelInImage border border-dark">
                                        <img id="imagenfilePhoto4" src="<?php echo base_url('')?>/public/assets/img-plus.png" class="img-fluid" style="  height: 49px !important; width: 49px !important;">
                                    </label>
                                    <span id="file-chosen4"> Imagen 5, sin seleccionar</span>
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
            $('#filePhoto0').val("");
            $('#imagenfilePhoto0').attr('src', '<?php echo base_url('')?>/public/assets/img-plus.png');
            $('#file-chosen0').text('Imagen 1, sin seleccionar');

            $('#filePhoto1').val("");
            $('#imagenfilePhoto1').attr('src', '<?php echo base_url('')?>/public/assets/img-plus.png');
            $('#file-chosen1').text('Imagen 2, sin seleccionar');

            $('#filePhoto2').val("");
            $('#imagenfilePhoto2').attr('src', '<?php echo base_url('')?>/public/assets/img-plus.png');
            $('#file-chosen2').text('Imagen 3, sin seleccionar');

            $('#filePhoto3').val("");
            $('#imagenfilePhoto3').attr('src', '<?php echo base_url('')?>/public/assets/img-plus.png');
            $('#file-chosen3').text('Imagen 4, sin seleccionar');

            $('#filePhoto4').val("");
            $('#imagenfilePhoto4').attr('src', '<?php echo base_url('')?>/public/assets/img-plus.png');
            $('#file-chosen4').text('Imagen 5, sin seleccionar');

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
<script>
    /* Para los botones de imagenes*/
    const actualBtn0 = document.getElementById('filePhoto0');
    const fileChosen0 = document.getElementById('file-chosen0');

    actualBtn0.addEventListener('change', function(){
        fileChosen0.textContent = this.files[0].name;
        TmpPath = URL.createObjectURL(this.files[0]);
        $('#imagenfilePhoto0').attr('src', TmpPath);
    });

    const actualBtn1 = document.getElementById('filePhoto1');
    const fileChosen1 = document.getElementById('file-chosen1');

    actualBtn1.addEventListener('change', function(){
        fileChosen1.textContent = this.files[0].name;
        TmpPath = URL.createObjectURL(this.files[0]);
        $('#imagenfilePhoto1').attr('src', TmpPath);
    });

    const actualBtn2 = document.getElementById('filePhoto2');
    const fileChosen2 = document.getElementById('file-chosen2');

    actualBtn2.addEventListener('change', function(){
        fileChosen2.textContent = this.files[0].name;
        TmpPath = URL.createObjectURL(this.files[0]);
        $('#imagenfilePhoto2').attr('src', TmpPath);
    });

    const actualBtn3 = document.getElementById('filePhoto3');
    const fileChosen3 = document.getElementById('file-chosen3');

    actualBtn3.addEventListener('change', function(){
        fileChosen3.textContent = this.files[0].name;
        TmpPath = URL.createObjectURL(this.files[0]);
        $('#imagenfilePhoto3').attr('src', TmpPath);
    });

    const actualBtn4 = document.getElementById('filePhoto4');
    const fileChosen4 = document.getElementById('file-chosen4');

    actualBtn4.addEventListener('change', function(){
        fileChosen4.textContent = this.files[0].name;
        TmpPath = URL.createObjectURL(this.files[0]);
        $('#imagenfilePhoto4').attr('src', TmpPath);
    });
</script>