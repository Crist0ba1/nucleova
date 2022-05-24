<style>
    .espacio{
        /* top right bottom left */
        padding: 5px 5px 5px 5px;

    }
</style>
<br>
<div class="container-fluid">
    <div class="row">  
        <!-- Apartado para el contenido -->
        <div class="col-sm-6 col-dm-10 col-lg-10">
            <div class="row text-center">
                <div class="col-12 ">
                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                        <label class="btn btn-secondary active">
                            <input type="radio" name="options" id="grupo" autocomplete="off" checked> 
                            <i class="fa fa-th" aria-hidden="true"></i> Grupo
                        </label>
                        <label class="btn btn-secondary">
                            <input type="radio" name="options" id="lista" autocomplete="off"> 
                            <i class="fa fa-list" aria-hidden="true"></i> Lista
                        </label>                    
                    </div>  
                </div>
            </div>

            <div id="" class="col-12">
                <div class="row">
                    <?php foreach($proveedores as $row):?>                
                        <!-- ---->
                        <div id="cardContenedor" class="col-4 espacio cardContenedor">
                            <div class="card text-white gradiente3 ">
                                <div class="row">                                                                    
                                    <div id="cardH" class="card-header cardH">                            
                                        <div id="carouselExampleControls3" class="carousel slide" data-ride="carousel">
                                            <?php foreach($row['imagenes'] as $image):?>
                                                <div class="carousel-item active">
                                                    <img id="logo2" src="<?php echo base_url('/public/imgs/');?>/<?php echo  $image['idUsers']?>/<?php echo  $image['imagen1']?>" heigth="50px" class="img-fluid">
                                                </div>
                                                <div class="carousel-item">
                                                    <img id="logo2" src="<?php echo base_url('/public/imgs/');?>/<?php echo  $image['idUsers']?>/<?php echo  $image['imagen2']?>" heigth="50px" class="img-fluid">
                                                </div>
                                                <div class="carousel-item">
                                                    <img id="logo2" src="<?php echo base_url('/public/imgs/');?>/<?php echo  $image['idUsers']?>/<?php echo  $image['imagen3']?>" heigth="50px" class="img-fluid">
                                                </div>
                                                <div class="carousel-item">
                                                    <img id="logo2" src="<?php echo base_url('/public/imgs/');?>/<?php echo  $image['idUsers']?>/<?php echo  $image['imagen4']?>" heigth="50px" class="img-fluid">
                                                </div>
                                                <div class="carousel-item">
                                                    <img id="logo2" src="<?php echo base_url('/public/imgs/');?>/<?php echo  $image['idUsers']?>/<?php echo  $image['imagen5']?>" heigth="50px" class="img-fluid">
                                                </div>
                                            <?php endforeach;?>
                                            <a class="carousel-control-prev" href="#carouselExampleControls3" role="button" data-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="sr-only">Previous</span>
                                            </a>
                                            <a class="carousel-control-next" href="#carouselExampleControls3" role="button" data-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="sr-only">Next</span>
                                            </a>                                  
                                        </div>
                                    </div>
                                    <div id="cardB" class="card-body cardB">
                                        <div class="card-header"><h5 class="card-title text-white"><?php echo $row['firstname']?> <i class="fa fa-building" aria-hidden="true"></i></h5></div>                           
                                            <div class="card-body">                                
                                                <p class="card-text text-white"> <b>Categorias: </b>
                                                <?php foreach($row['listaCat'] as $list):?>
                                                    <?php echo $list['nombreSub']?> / 
                                                <?php endforeach;?>
                                                <p class="card-text text-white"> <b>Encuentranos en: </b>
                                                <?php foreach($row['listaLug'] as $list):?>
                                                    <?php echo $list['comuna']?> /
                                                <?php endforeach;?>
                                            </p>
                                            </div>       
                                        <div class="row justify-content-center">
                                            <a style="background-color: white; color:#314a9a!important" href="<?php echo base_url('/proveedor')?>/<?php echo $row['idUsser']?>" class="btn btn-primary"><i class="fa fa-eye" aria-hidden="true"></i> Ver mas</a>
                                        </div>                                  
                                    </div> 
                                </div> 
                            </div>
                        </div>       
                        <!-- --->
                        <hr>
                    <?php endforeach;?>
                </div>
            </div>
        </div>
    
        <!-- Apartado para la publicidad -->
        <div class="col-sm-6 col-dm-2 col-lg-2">
            <div style=" background-color: #314a9a;">
                <a href="https://www.sodimac.cl/sodimac-cl/" target="_blank"><img src="<?php echo base_url('/public/assets/pLadito/home.jpg');?>" class="img-fluid"></a>
            </div>
        </div>
    </div>
</div>
<br>
<hr>
<script>
     $(document).ready(function() { 
        $('#grupo').click(function() {
            let element = document.getElementById("cardContenedor");
            var tiene = element.classList.contains("col-4");
            if(!tiene){
                $(".cardContenedor").addClass("col-4");
            }

            element = document.getElementById("cardH");
            tiene = element.classList.contains("col-4");
            if(tiene){
                $(".cardH").removeClass("col-4");   
            }
            element = document.getElementById("cardB");
            tiene = element.classList.contains("col-8");
            if(tiene){
                $(".cardB").removeClass("col-8");   
            }
        });
        $('#lista').click(function() {
            let element = document.getElementById("cardContenedor");
            var tiene = element.classList.contains("col-4");
            if(tiene){
                $(".cardContenedor").removeClass("col-4");
            }

            element = document.getElementById("cardH");
            tiene = element.classList.contains("col-4");
            if(!tiene){
                $(".cardH").addClass("col-4");   
            }
            element = document.getElementById("cardB");
            tiene = element.classList.contains("col-8");
            if(!tiene){
                $(".cardB").addClass("col-8");   
            }
        });        
        
    });
</script>


