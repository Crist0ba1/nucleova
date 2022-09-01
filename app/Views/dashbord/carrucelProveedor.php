<?php if(session()->get('isComplete') == 0  && !empty(session()->get('imagenEM'))):?>
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <?php $contador = count(session()->get('imagenEM'));?>
        <?php if($contador == 0):?>
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <?php else:?>
            <?php $i=0; foreach(session()->get('imagenEM') as $arrow):?>
                <?php if($i == 0):?>
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <?php $i=1;?>
                <?php else:?>
                    <li data-target="#carouselExampleIndicators" data-slide-to="<?php echo $i?>"></li>
                    <?php $i++;?>
                <?php endif;?>
            <?php endforeach;?>
        <?php endif;?>        
    </ol>

    <div class="carousel-inner">
        <?php if($contador == 0):?>
            <div class="carousel-item active">
                <img id="imgPerfil" class="rounded img-fluid w-100 fit-cover bottom20" style="min-height: 300px; max-height: 450px;" src="<?php echo base_url('')?>/public/assets/sin-foto.jpg" />
            </div>
        <?php else:?>
            <?php $i=0; foreach(session()->get('imagenEM') as $arrow):?>
                <?php if($i == 0):?>
                    <div class="carousel-item active">
                        <img src="<?php echo base_url('')?>/public/imgs/<?php echo session()->get('idEM')?>/<?php echo session()->get('imagenEM')[$i]?>" class="rounded img-fluid w-100 fit-cover bottom20" style="min-height: 300px; max-height: 450px;" >
                    </div>
                    <?php $i=1;?>
                <?php else:?>
                    <div class="carousel-item ">
                        <img src="<?php echo base_url('')?>/public/imgs/<?php echo session()->get('idEM')?>/<?php echo session()->get('imagenEM')[$i]?>" class="rounded img-fluid w-100 fit-cover bottom20" style="min-height: 300px; max-height: 450px;" >
                    </div>
                    <?php $i++;?>
                <?php endif;?>
            <?php endforeach;?>
        <?php endif;?> 
    </div>
    <button class="carousel-control-prev" type="button" data-target="#carouselExampleIndicators" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-target="#carouselExampleIndicators" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </button>
    </div>
<?php else:?>
    <img id="imgPerfil" class="rounded img-fluid w-100 fit-cover bottom20" style="min-height: 300px; max-height: 450px;" src="<?php echo base_url('')?>/public/assets/sin-foto.jpg" />
<?php endif;?>