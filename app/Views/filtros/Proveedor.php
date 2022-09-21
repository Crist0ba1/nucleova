<style>
    .notActive { 
        pointer-events: none; 
        cursor: default; 
        -webkit-filter: grayscale(1); /* Webkit */
        filter: gray; /* IE6-9 */
        filter: grayscale(1); /* W3C */
    } 

    #form {
    width: 250px;
    margin: 0 auto;
    height: 50px;
    }

    #form p {
    text-align: center;
    }

    #form label {
    font-size: 60px;
    }

    input[type="radio"] {
    display: none;
    }

    label {
    color: grey;
    }

    .clasificacion {
    direction: rtl;
    unicode-bidi: bidi-override;
    }

    label:hover,
    label:hover ~ label {
    color: orange;
    }

    input[type="radio"]:checked ~ label {
    color: orange;
    }
</style>
<br>
<div class="container-fluid">
    <div class="row">  
        <!-- Apartado para el contenido -->
        <div class="col-sm-8 col-dm-10 col-lg-10">
            <div id="" class="col-12">
                <?php if($proveedores):?>
                    <div class="row">
                        <div class="card card-deck col-sm-12 col-dm-6 col-lg-6">
                            <div class="card-header border">   
                                <!-- Carrucel de imagenes -->                         
                                <div id="carouselExampleControls3" class="carousel slide" data-ride="carousel">
                                    <div class="carousel-inner">
                                        <?php foreach($proveedores as $prove):?>
                                            <?php foreach($prove['imagenes'] as $image):?>
                                                <?php if($image['imagen1'] != ""):?>
                                                    <div class="carousel-item active">
                                                        <img id="logo2" src="<?php echo base_url('/public/imgs/');?>/<?php echo  $image['idUsers']?>/<?php echo  $image['imagen1']?>" class="w-100">
                                                    </div>
                                                <?php endif;?>
                                                <?php if($image['imagen2'] != ""):?>
                                                    <div class="carousel-item">
                                                        <img id="logo2" src="<?php echo base_url('/public/imgs/');?>/<?php echo  $image['idUsers']?>/<?php echo  $image['imagen2']?>" class="w-100">
                                                    </div>
                                                <?php endif;?>
                                                <?php if($image['imagen3'] != ""):?>
                                                    <div class="carousel-item">
                                                        <img id="logo2" src="<?php echo base_url('/public/imgs/');?>/<?php echo  $image['idUsers']?>/<?php echo  $image['imagen3']?>" class="w-100">
                                                    </div>
                                                <?php endif;?>
                                                <?php if($image['imagen4'] != ""):?>
                                                    <div class="carousel-item">
                                                        <img id="logo2" src="<?php echo base_url('/public/imgs/');?>/<?php echo  $image['idUsers']?>/<?php echo  $image['imagen4']?>" class="w-100">
                                                    </div>
                                                <?php endif;?>
                                                <?php if($image['imagen5'] != ""):?>
                                                    <div class="carousel-item">
                                                        <img id="logo2" src="<?php echo base_url('/public/imgs/');?>/<?php echo  $image['idUsers']?>/<?php echo  $image['imagen5']?>" class="w-100">
                                                    </div>
                                                <?php endif;?>
                                            <?php endforeach;?>
                                        <?php endforeach;?>                                   
                                    </div>
                                    <a class="carousel-control-prev" href="#carouselExampleControls3" role="button" data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carouselExampleControls3" role="button" data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>                                  
                                </div>                        
                                <hr>
                                <!-- Estrellas -->
                                <!--div class="row">
                                        <div class="col-dm-4 col-lg-4"><h6>Puntuacion:</h6>
                                        </div>
                                        <div class="col-dm-3 col-lg-3"><h6>4 Estrellas</h6>
                                        </div>                                
                                        <div class="col-dm-5 col-lg-5">
                                            <form>
                                                <p class="clasificacion">
                                                    <input id="radio1" type="radio" name="estrellas" value="5">
                                                    <label for="radio1" class="label-lg">★</label>
                                                    <input id="radio2" type="radio" name="estrellas" value="4">
                                                    <label style="color: orange" for="radio2" class="label-lg">★</label>
                                                    <input id="radio3" type="radio" name="estrellas" value="3">
                                                    <label style="color: orange" for="radio3" class="label-lg">★</label>
                                                    <input id="radio4" type="radio" name="estrellas" value="2">
                                                    <label style="color: orange" for="radio4" class="label-lg">★</label>
                                                    <input id="radio5" type="radio" name="estrellas" value="1">
                                                    <label style="color: orange" for="radio5" class="label-lg">★</label>
                                                </p>
                                            </form>
                                        </div>
                                </div-->
                            </div>
                        </div>
                        
                        <div class="card-header col-sm-12 col-dm-6 col-lg-6">
                            <div class="card-header border">  
                                <h4><b>Proveedor de servicios</b></h4> 
                                <?php foreach($proveedores as $prove):?>
                                    <?php if($prove['rz']=!' '):?>
                                        <h5><?php echo $prove['firstname'] ?></h5> 
                                        <h5><?php echo $prove['rz'] ?></h5> 
                                    <?php else:?>
                                        <h5><?php echo $prove['firstname'] ?></h5> 
                                    <?php endif;?>
                                        <h5><b>Categorias:</b>  
                                            <?php foreach($prove['listaCat'] as $list):?>
                                                <?php echo $list['nombreSub']?> / 
                                            <?php endforeach;?>
                                        </h5> 
                                        <h5><b>Encuentranos en:</b>
                                            <?php foreach($prove['listaLug'] as $list):?>
                                                <?php echo $list['comuna']?> /
                                            <?php endforeach;?>
                                        </h5> 
                                <?php endforeach;?>
                            </div>
                            <hr>
                            <div class="card-header border">
                                <div class="row">
                                    <div class="form-group input-group">
                                        <h5 for="staticEmail" class="col-sm-3"><b>Telefono: </b></h5>
                                        <?php if( isset($prove) && strlen((string)$prove['telefono'])== '11'):?>
                                            <input type="password" class="form-control form-control-user" minlength="5"
                                                id="telefono" name="telefono" placeholder="No encontrado" disabled value="+<?php echo $prove['telefono'] ?>">
                                        <?php elseif(isset($prove)):?>
                                            <input type="password" class="form-control form-control-user" minlength="5"
                                                id="telefono" name="telefono" placeholder="No encontrado" disabled value="<?php echo $prove['telefono'] ?>">                                    
                                        <?php endif;?>
                                        <div class="input-group-append">
                                            <button id="ShowPasswordL" class="btn btn-primary" type="button" onclick="mostrarInformacion('telefono')"> <span id="iconTelefono" class="fa fa-eye-slash iconL"></span> </button>
                                        </div>
                                    </div>
                                    <div class="form-group input-group">
                                        <h5 for="staticEmail" class="col-sm-3"><b>Correo: </b></h5>
                                        <input type="password" class="form-control form-control-user" minlength="5"
                                            id="email" name="email" placeholder="No encontrado" disabled value="<?php echo $prove['email'] ?>">
                                        <div class="input-group-append">
                                            <button id="ShowPasswordL" class="btn btn-primary" type="button" onclick="mostrarInformacion('email')"> <span id="iconEmail" class="fa fa-eye-slash iconL"></span> </button>
                                        </div>
                                    </div>
                                    <div class="form-group input-group align-items-center">
                                        <h5 for="staticEmail" class="col-sm-3"><b>Redes sociales:</b></h5>
                                        <?php if($prove['rf'] !='' || $prove['rl'] !='' || $prove['ri'] !='' ):?>
                                            <?php if($prove['rf'] !=''):?>
                                                <a id="rrssF" class="btn btn-outline-primary border-0 notActive " title="Facebook" style="padding: 15px;" target="_blank" href="<?php echo $prove['rf']?>" disabled>
                                                <img src="<?php echo base_url('')?>/public/assets/rrss/facebook.png" class="w-100"></a>	
                                            <?php endif;?>
                                            <?php if($prove['rl'] !=''):?>
                                                <a id="rrssL" class="btn btn-outline-info border-0 notActive " title="Linkedin" style="padding: 15px;" target="_blank" href="<?php echo $prove['rl']?>" disabled>
                                                <img src="<?php echo base_url('')?>/public/assets/rrss/linkedin.png" class="w-100"></a>											
                                            <?php endif;?>
                                            <?php if($prove['ri'] !=''):?>
                                                <a id="rrssI" class="btn btn-outline-info border-0 notActive " title="Instagram" style="padding: 15px;" target="_blank" href="<?php echo $prove['ri']?>" disabled>
                                                <img src="<?php echo base_url('')?>/public/assets/rrss/instagram.png" class="w-100"></a>											
                                            <?php endif;?>
                                            <div class="input-group-append">
                                                <button id="ShowPasswordL" class="btn btn-primary" type="button" onclick="mostrarInformacion('not')"> <span id="iconR" class="fa fa-eye-slash iconL"></span> </button>
                                            </div>
                                        <?php else:?>
                                            <h5> No encontradas</h5>
                                        <?php endif;?>                    
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <?php foreach($proveedores as $prove):?>
                                <?php echo $prove['text'] ?>
                            <?php endforeach;?>
                        </div>
                    </div>
                <?php else:?>
                    <h5>Usuiario no encontrado</h5>
                <?php endif; ?>
            </div>
        </div>
        <!-- Apartado para la publicidad -->
        <div class="col-sm-4 col-dm-2 col-lg-2">
                <a href="https://www.sodimac.cl/sodimac-cl/" target="_blank"><img src="<?php echo base_url('/public/assets/pLadito/home.jpg');?>" class="w-100"></a>
        </div>
    </div>
</div>
<br>
<br>
<hr>

<script>
    $('#seeMore').click(function(id){
        document.getElementById("telefono").type= "text";
        document.getElementById("correo").type= "text";

    
        $('.notActive').removeClass("notActive")
        $(".notActive").prop('disabled', false);
    });
    function mostrarInformacion(id){
        if(id.includes("not")){

            let element = document.getElementById("rrssF");
            //var tiene = element.classList.contains("notActive");
            var tiene2 = element.classList.contains("aux-css");
            
            if(tiene2){
               // $(".aux-css").prop('disabled', true);
              //  $('.aux-css').addClass('notActive').removeClass("aux-css");
              //  $('#iconR').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
            }
            else{
                $(".notActive").prop('disabled', false);
                $('.notActive').addClass('aux-css').removeClass("notActive");
                $('#iconR').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
            }
        }
        else{
            var cambio = document.getElementById(id);
            if(cambio.type == "password"){
                cambio.type = "text";
                if(id=="telefono"){
                    $('#iconTelefono').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
                    
                }else{
                    $('#iconEmail').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
                }
                
            }else{
                //cambio.type = "password";
                if(id=="telefono"){
                   // $('#iconTelefono').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
                    
                }else{
                   // $('#iconEmail').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
                }
            }
        }
    } 

</script>