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

<div class="container cont60">
    <?php if($proveedor):?>
        <div class="card">    
            <div class="card-body">			
                <div class="row bottom5">
                    <div class="col-md-5">
                        <div class="row">
                            <div class="col">
                                <div id="carouselExampleControls3" class="carousel slide" data-ride="carousel">
                                    <div class="carousel-inner">
                                        <?php foreach($proveedor as $prove):?>
                                            <?php foreach($prove['imagenes'] as $image):?>
                                                <?php if($image['imagen1'] != ""):?>
                                                    <div class="carousel-item active">
                                                        <img id="logo2" src="<?php echo base_url('/public/imgs/');?>/<?php echo  $image['idUsers']?>/<?php echo  $image['imagen1']?>" class="rounded img-fluid w-100 fit-cover bottom20" style="min-height: 300px;">
                                                    </div>
                                                <?php endif;?>
                                                <?php if($image['imagen2'] != ""):?>
                                                    <div class="carousel-item">
                                                        <img id="logo2" src="<?php echo base_url('/public/imgs/');?>/<?php echo  $image['idUsers']?>/<?php echo  $image['imagen2']?>" class="rounded img-fluid w-100 fit-cover bottom20" style="min-height: 300px;">
                                                    </div>
                                                <?php endif;?>
                                                <?php if($image['imagen3'] != ""):?>
                                                    <div class="carousel-item">
                                                        <img id="logo2" src="<?php echo base_url('/public/imgs/');?>/<?php echo  $image['idUsers']?>/<?php echo  $image['imagen3']?>" class="rounded img-fluid w-100 fit-cover bottom20" style="min-height: 300px;">
                                                    </div>
                                                <?php endif;?>
                                                <?php if($image['imagen4'] != ""):?>
                                                    <div class="carousel-item">
                                                        <img id="logo2" src="<?php echo base_url('/public/imgs/');?>/<?php echo  $image['idUsers']?>/<?php echo  $image['imagen4']?>" class="rounded img-fluid w-100 fit-cover bottom20" style="min-height: 300px;">
                                                    </div>
                                                <?php endif;?>
                                                <?php if($image['imagen5'] != ""):?>
                                                    <div class="carousel-item">
                                                        <img id="logo2" src="<?php echo base_url('/public/imgs/');?>/<?php echo  $image['idUsers']?>/<?php echo  $image['imagen5']?>" heigth="50px" class="img-fluid">
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
                            </div>
                        </div>      
                        <div class="row">                                
                            <div class="col">
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                            </div>
                        </div>
                        <br>      
                        <div class="row">
                            
                            <div class="row">
                                <div class="col-12 d-grid gap-2">
                                    <button type="button" class="btn btn-primary bottom15 btn-purple text-start"><span class="fa fa-comment"></span> Chat con el proveedor <!--span class="badge rounded-pill bg-danger float-sm-end">5</span--></button>
                                </div>
                            </div>
                            <div class="row">                                
                                <div id="botonesSolicitud" class="col-12 d-grid gap-2">  
                                    <?php if($relacion == 0):?>
                                        <h4>Error</h4>
                                    <?php elseif($relacion == 1):?>
                                        <button type="button" onclick="aceptarSolicitud()" class="btn btn-primary bottom15 btn-success text-start"><span class="fa fa-user-group"></span> Aceptar solicitud</button>
                                    <?php elseif($relacion == 2):?>
                                        <button type="button"  onclick="eliminarContacto()" class="btn bottom15 btn-danger text-start"><span class="fa fa-user-group"></span> Eliminar contacto</button>
                                    <?php elseif($relacion == 3):?>
                                        <button type="button" class="btn bottom15 btn-warning text-start"><span class="fa fa-user-group"></span> No se puede enviar solicitud</button>
                                    <?php else:?>
                                        <h4>Error</h4>
                                    <?php endif;?>
                                </div>                            
                            </div>
                        </div>  
                        
                    </div>
                    <div class="col-md-7">            
                        <div class="card bottom30">
                            <div class="card-header text-center">
                                <h4><b>Empresa</b></h4> 
                                <?php foreach($proveedor as $prove):?>
                                    <?php if($prove['rz']=!' '):?>
                                        <h5><?php echo $prove['firstname'] ?></h5> 
                                        <h5><?php echo $prove['rz'] ?></h5> 
                                    <?php else:?>
                                        <h5><?php echo $prove['firstname'] ?></h5> 
                                    <?php endif;?>
                                        <h5><b>Encuentranos en:</b></h4> 
                                            <h5>Region: <?php echo $region[$prove['refRegion']]['region']?></h5>
                                            <h5>Comuna: <?php echo $comuna[$prove['refComuna']]['comuna']?></h5>
                                            <h5>Calle: <?php echo $prove['calle']?></h5>
                                            <h5>Numero: <?php echo $prove['numero']?></h5>
                                        
                                <?php endforeach;?>
                            </div>                
                        </div>
                        <div class="card bottom30">                
                            <div class="card-body"> 
                                <?php foreach($proveedor as $prove):?>
                                    <h4>Informacion de la empresa</h4>
                                    <h5><?php echo $prove['text'] ?></h5>
                                <?php endforeach;?>
                                <ul class="list-group text-center">
                                    
                                    <li class="list-group-item">
                                        <div class="form-group input-group">
                                            <h5 for="staticEmail" class="col-sm-3"><b><span class="fa fa-phone"></span></b></h5>
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
                                    </li>
                                    <li class="list-group-item">
                                        <div class="form-group input-group">
                                            <h5 for="staticEmail" class="col-sm-3"><span class="fa fa-envelope"></span></h5>
                                            <input  type="password" minlength="5" class="form-control form-control-user"
                                                        id="email" name="email" placeholder="No encontrado" disabled 
                                                        value="<?php echo $prove['email'] ?>">
                                            <div class="input-group-append">
                                                <button id="ShowPasswordL" class="btn btn-primary" type="button" onclick="mostrarInformacion('email')"> <span id="iconEmail" class="fa fa-eye-slash iconL"></span> </button>
                                            </div>
                                        </div>                            
                                    </li>
                                    <li class="list-group-item">                                                
                                        <?php if($prove['rf'] !='' || $prove['rl'] !='' || $prove['ri'] !='' ):?>
                                            <div  class="row" style="display: inline-block;">
                                                <?php if($prove['rf'] !=''):?>                                    
                                                    <a id="rrssF" class="btn btn-outline-primary border-0 notActive col-3" title="Facebook" style="padding: 15px;" target="_blank" href="<?php echo $prove['rf']?>" disabled>
                                                    <img src="<?php echo base_url('')?>/public/assets/rrss/facebook.png" class="img-fluid"></a>	
                                                <?php endif;?>
                                                <?php if($prove['rl'] !=''):?>
                                                    <a id="rrssL" class="btn btn-outline-info border-0 notActive col-3" title="Linkedin" style="padding: 15px;" target="_blank" href="<?php echo $prove['rl']?>" disabled>
                                                    <img src="<?php echo base_url('')?>/public/assets/rrss/linkedin.png" class="img-fluid"></a>											
                                                <?php endif;?>
                                                <?php if($prove['ri'] !=''):?>
                                                    <a id="rrssI" class="btn btn-outline-info border-0 notActive col-3" title="Instagram" style="padding: 15px;" target="_blank" href="<?php echo $prove['ri']?>" disabled>
                                                    <img src="<?php echo base_url('')?>/public/assets/rrss/instagram.png" class="img-fluid"></a>											
                                                <?php endif;?>
                                            </div>
                                            <button id="ShowPasswordL" class="btn btn-primary col-2" type="button" onclick="mostrarInformacion('not')"> <span id="iconR" class="fa fa-eye-slash iconL"></span> </button>
                                        <?php else:?>
                                            <h5> No encontradas</h5>
                                        <?php endif;?>                                             
                                    </li>
                                </ul>
                            </div>                
                        </div>                         
                    </div>
                </div>
            </div>
        </div>    
    <?php else:?>
        <h5>Usuiario no encontrado</h5>
    <?php endif; ?>
</div>


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
<script>
    /* para manejar los btns de match*/
    function aceptarSolicitud(){
        var pathname = window.location.pathname;
        var pathArray = pathname.split('/');
        var proveedor = parseInt(pathArray[ pathArray.length -1 ]);
        event.preventDefault();
            $.ajax ({
                type: "get",
                url: "<?php echo base_url('/aceptarSolicitud')?>/"+proveedor,
                success: function(data){
                    alert(data);
                    if(data == 1){                        
                        alert('Solicitud aceptada');                        
                        /* Cambiar el boton del div botonesSolicitud*/
                        $("#botonesSolicitud").load(location.href+" #botonesSolicitud>*","");
                    }else{
                        alert('Error en la solicitud');
                    }
                },
                error: function(){
                    alert("Error en la llamada ajax, de solicitud de contacto");
                }

            });
    }
    function eliminarContacto(){
        var pathname = window.location.pathname;
        var pathArray = pathname.split('/');
        var empresa = parseInt(pathArray[ pathArray.length -1 ]);
        event.preventDefault();
        $.ajax ({
            type: "get",
            url: "<?php echo base_url('/eliminarSolicitud')?>/"+empresa,
            success: function(data){
                if(data == 1){                           
                    window.location.replace("<?php echo base_url('/mis_clientes')?>");
                }else{
                    alert('Error en la solicitud');
                }
            },
            error: function(){
                alert("Error en la llamada ajax, de eliminar solicitud");
            }
        });
    }

</script>