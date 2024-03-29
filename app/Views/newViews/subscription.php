
<?php
    include("baseGuest.php");
?>    
        
<div class="container cont60">
    <div class="row">
        <div class="col-sm-3">
            <div class="row top30 bottom20">
                <h4>Nucleova para Empresas</h4>
            </div>           
            <div class="row">
                <p id="startContent" align="justify">Acceso rápido y sencillo a través de la aplicación web para establecer los requerimientos de los servicios solicitados con indicadores de gestión que te ayudarán a medir constantemente la calidad de los servicios y un acceso total a la red de proveedores de nucleova</p>
            </div>
        </div>
        <div class="col-sm-6">
            <div id="carouselId" class="carousel slide top30" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-bs-target="#carouselId" data-slide-to="0" class="active" aria-current="true" aria-label="First slide"></li>
                    <li data-bs-target="#carouselId" data-slide-to="1" aria-label="Second slide"></li>
                    <!--li data-bs-target="#carouselId" data-bs-slide-to="2" aria-label="Third slide"></li-->
                </ol>
                <div class="carousel-inner" role="listbox">
                    <div class="carousel-item active">
                        <img class="img-fluid" id="logo" src="<?php echo base_url('')?>/public/assets/Logos/LogoHSF.png" alt="1">
                    </div>
                    <div class="carousel-item">
                        <img class="img-fluid" id="logo" src="<?php echo base_url('')?>/public/sergio/Captura.jpg" alt="2">
                    </div>
                    <!--div class="carousel-item">
                        <img src="" alt="3">
                    </div-->
                </div>
                <button class="carousel-control-prev controls" type="button" data-target="#carouselId" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Anterior</span>
                </button>
                <button class="carousel-control-next controls" type="button" data-target="#carouselId" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Siguiente</span>
                  </button>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="row top30 bottom20">
                <h4>Caracteristicas</h4>
            </div>
            <div class="row">
                <ul class="list-group list-group-flush bottom20">
                    <li class="list-group-item">Interfaz de administración</li>
                    <li class="list-group-item">Historial de servicios</li>
                    <li class="list-group-item">Control de servicios</li>
                    <!--li class="list-group-item">Interfaz de administración</li>
                    <li class="list-group-item">Historial de servicios</li>
                    <li class="list-group-item">Control de servicios</li-->
                </ul>  
           </div>           
           <div class="row">
               <button onclick="location.href='<?php echo base_url('/verplanes')?>'" class="btn btn-primary">Ver Planes</button>
           </div>  
        </div>
    </div>
</div>
<br>    

