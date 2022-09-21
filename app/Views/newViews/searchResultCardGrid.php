<style>
    .cardEnFila{
        min-width: 200px;
        max-width: 300px;
   }
</style>
<div class="card-deck d-flex justify-content-end"> 
    <?php foreach($proveedores as $row):?>
        <div class="card bottom20 right20 border-blue cardEnFila">
            <!--img class="card-img-top" src="..." alt="Card image cap"-->
            <div class="card-header text-center">
                <h2 class="top30 bottom30">
                    <div id="carrucel<?php echo $row['idUsser']?>" class="carousel slide carouselPequeño" data-ride="carousel">
                        <div class="carousel-inner">
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
                        </div>
                        <a class="carousel-control-prev" href="#carrucel<?php echo $row['idUsser']?>" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carrucel<?php echo $row['idUsser']?>" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>                                  
                    </div>  
                </h2>
            </div>
            <div class="card-body text-center text-secondary">
                <h5 class="card-title"> <?php echo $row['firstname']?></h5>
                <div class="row">
                    <div class="col">
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                    </div>
                </div>  
                <div class="card-body">                                
                    <p class="card-text "> <b>Categorias: </b>
                        <?php foreach($row['listaCat'] as $list):?>
                            <?php echo $list['nombreSub']?> / 
                        <?php endforeach;?>
                    </p>
                    <p class="card-text "> <b>Encuentranos en: </b>
                        <?php foreach($row['listaLug'] as $list):?>
                            <?php echo $list['comuna']?> /
                        <?php endforeach;?>
                    </p>
                </div>              
            </div>
            <div class="card-footer text-center">
                <a href="<?php echo base_url('/proveedorPro')?>/<?php echo $row['idUsser']?>" class="btn btn-primary btn-blue"><i class="fa fa-eye" aria-hidden="true"></i> Ver más</a>
            </div>
        </div>
    <?php endforeach;?>
</div>