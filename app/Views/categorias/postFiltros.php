<style>

    .espacio{
        /* top right bottom left */
        padding: 5px 5px 5px 5px;
    }
    .cardH{
        max-width: 300px;
        justify-content: center;
    }


</style>
<br>
<div class="container-fluid">
    <div class="row">  
        <!-- Apartado para el contenido -->
        <div class="col-sm-8 col-dm-10 col-lg-10">
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

        
                <div class="row">
                    <?php foreach($proveedores as $row):?>                
                        <!-- ---->
                        <!--div id="cardContenedor" class="col-sm-6 col-md-6 col-lg-4 col-xl-4 espacio cardContenedor"-->
                        <div id="cardContenedor" class="col-4 espacio cardContenedor card-deck">
                            <div class="card text-white gradiente3 ">
                                <div class="row" style="justify-content: center;">                                                                    
                                    <div id="cardH" class="card-header">
                                        <div id="carrucel<?php echo $row['idUsser']?>" class="carousel slide carouselPequeño" data-ride="carousel">                                            
                                            <div class="carousel-inner">
                                                <?php foreach($row['imagenes'] as $image):?>
                                                    <?php if($image['imagen1'] != ""):?>
                                                        <div class="carousel-item active">
                                                            <img src="<?php echo base_url('/public/imgs/');?>/<?php echo  $image['idUsers']?>/<?php echo  $image['imagen1']?>" class="img-fluid d-block">
                                                        </div>
                                                    <?php endif;?>
                                                    <?php if($image['imagen2'] != ""):?>
                                                        <div class="carousel-item">
                                                            <img src="<?php echo base_url('/public/imgs/');?>/<?php echo  $image['idUsers']?>/<?php echo  $image['imagen2']?>" class="img-fluid d-block">
                                                        </div>
                                                    <?php endif;?>
                                                    <?php if($image['imagen3'] != ""):?>
                                                        <div class="carousel-item">
                                                            <img src="<?php echo base_url('/public/imgs/');?>/<?php echo  $image['idUsers']?>/<?php echo  $image['imagen3']?>" class="img-fluid d-block">
                                                        </div>
                                                    <?php endif;?>
                                                    <?php if($image['imagen4'] != ""):?>
                                                        <div class="carousel-item">
                                                            <img src="<?php echo base_url('/public/imgs/');?>/<?php echo  $image['idUsers']?>/<?php echo  $image['imagen4']?>" class="img-fluid d-block">
                                                        </div>
                                                    <?php endif;?>
                                                    <?php if($image['imagen5'] != ""):?>
                                                        <div class="carousel-item">
                                                            <img src="<?php echo base_url('/public/imgs/');?>/<?php echo  $image['idUsers']?>/<?php echo  $image['imagen5']?>" class="img-fluid d-block">
                                                        </div>
                                                    <?php endif;?>
                                                <?php endforeach;?>
                                            </div>
                                            <a class="carousel-control-prev" href="#carrucel<?php echo $row['idUsser']?>" role="button" data-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            </a>
                                            <a class="carousel-control-next" href="#carrucel<?php echo $row['idUsser']?>" role="button" data-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            </a>                                
                                        </div>

                                    </div>
                                    <div id="cardB" class="card-body cardB">
                                        <div class="card-header"><h5 class="card-title text-white"><?php echo $row['firstname']?> <i class="fa fa-building" aria-hidden="true"></i></h5></div>                           
                                            <div class="card-body">                                
                                                <p class="card-text text-white"> <b>Categorías: </b>
                                                <?php foreach($row['listaCat'] as $list):?>
                                                    <?php echo $list['nombreSub']?> / 
                                                <?php endforeach;?>
                                                <p class="card-text text-white"> <b>Encuéntranos en: </b>
                                                <?php foreach($row['listaLug'] as $list):?>
                                                    <?php echo $list['comuna']?> /
                                                <?php endforeach;?>
                                            </p>
                                            </div>       
                                                                        
                                    </div> 
                                    <div class="card-footer text-center">
                                        
                                            <a style="background-color: white; color:#314a9a!important" href="<?php echo base_url('/proveedor')?>/<?php echo $row['idUsser']?>" class="btn btn-primary"><i class="fa fa-eye" aria-hidden="true"></i> Ver más</a>
                                      
                                    </div>
                                </div> 
                            </div>
                        </div>       
                        <!-- --->
                        <hr>
                    <?php endforeach;?>
                </div>
          
        </div>
    
        <!-- Apartado para la publicidad -->
        <div class="col-sm-4 col-dm-2 col-lg-2">
            <div class="cardH" style="">
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