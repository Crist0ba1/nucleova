<?php
    include("baseGuest.php");
?> 

<div class="container cont60 text-center">
    <div class="row bottom30">
        <div class="col-xl-9 mx-auto position-relative">
            <h3 class="mb-5">Buscar proveedores</h3>
        </div>
        <div class="col-md-10 col-lg-8 col-xl-7 mx-auto position-relative">
            <form>
                <div class="row bottom30">
                    <div class="col-12 col-md-9 mb-2 mb-md-0">
                        <input class="form-control form-control-lg" type="text" placeholder="ingresa el campo de búsqueda"/></div>            
                        <button class="btn btn-primary" type="submit"><span class="fa fa-search"></span> Buscar</button>                    
                </div>
            </form>
        </div>        
    </div>
    <div class="row top30 bottom20">
        <?php foreach($categoria as $row):?>
            <div class="col right10 left10">	
                <!--a onclick="myFunction(<?php echo $row['id']?>)"><img src="<?php echo base_url('/public/assets/Logos/categorias/');?>/<?= $row['nombreImagen'];?>.png" style="width: 150px;    height: 150px;"></a-->
                <a onclick="myFunction(<?php echo $row['id']?>)"> 
                    <div class=" my-auto">   
                        <img src="<?php echo base_url('/public/assets/Logos/categorias/');?>/<?= $row['nombreImagen'];?>.png" style="width: 150px;    height: 150px;" >
                    </div>
                </a> 
            </div>
            <br>
        <?php endforeach;?>
    </div>
    <div class="row top30 bottom20">
        <div class="col right10 left10">
            <a href="#"><img src="/assets/images/categorias/ServiciosNucleova-01.png" style="width: 150px;    height: 150px;"></a>            
        </div>
        <div class="col right10 left10">
            <a href="#"><img src="/assets/images/categorias/ServiciosNucleova-02.png" style="width: 150px;    height: 150px;"></a>
        </div>
        <div class="col right10 left10">
            <a href="#"><img src="/assets/images/categorias/ServiciosNucleova-03.png" style="width: 150px;    height: 150px;"></a>
        </div>
        <div class="col right10 left10">
            <a href="#"><img src="/assets/images/categorias/ServiciosNucleova-04.png" style="width: 150px;    height: 150px;"></a>
        </div>
        <div class="col right10 left10">
            <a href="#"><img src="/assets/images/categorias/ServiciosNucleova-05.png" style="width: 150px;    height: 150px;"></a>
        </div>        
    </div>
    <div class="row top30 bottom20">
        <div class="col right10 left10">
            <a href="#"><img src="/assets/images/categorias/ServiciosNucleova-06.png" style="width: 150px;    height: 150px;"></a>
        </div>
        <div class="col right10 left10">
            <a href="#"><img src="/assets/images/categorias/ServiciosNucleova-07.png" style="width: 150px;    height: 150px;"></a>
        </div>
        <div class="col right10 left10">
            <a href="#"><img src="/assets/images/categorias/ServiciosNucleova-08.png" style="width: 150px;    height: 150px;"></a>
        </div>
        <div class="col right10 left10">
            <a href="#"><img src="/assets/images/categorias/ServiciosNucleova-09.png" style="width: 150px;    height: 150px;"></a>
        </div>
        <div class="col right10 left10">
            <a href="#"><img src="/assets/images/categorias/ServiciosNucleova-10.png" style="width: 150px;    height: 150px;"></a>
        </div>        
    </div>
</header>

<div class="modal fade" id="categoriaModal1" role="dialog" >
	<div class="modal-dialog ">
			<div class="modal-content gradiente">
				<div class="modal-body">
					<h4 id="tituloModal" style="color:#FFFFFF;"class="modal-title float-left"> 
						
					</h4>
					<button type="button" class="close float-right" data-dismiss="modal" aria-label="Close">
						<i class="fas fa-window-close" style="color:#ff0000;"></i></button>
				</div>
				<div class="modal-body">
					<h5 style="color:#FFFFFF;">Elija la subcategoria que desee:<i class="fa-solid fa-circle-check"></i></h5>
				</div>
				<div class="modal-body">
                    <div class="row" id="Listado"></div>                        					
					<div><img style="
					width: 150px;
       				 max-width:100%;
        			height:100%;
        			max-height:150px;
					" src="<?php echo base_url('')?>/public/assets/Logos/LogoPequeno2.png" class="mx-auto d-block"></div>
					
					<div class="modal-body float-right">
						<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
					</div>
				</div>
			</div>
	</div>
</div>
<script>
    function myFunction($id){
        $('#Listado').empty();
        <?php foreach($subCategoria as $row):?>
            if($id == <?php echo $row['refCat'];?>){
                let btn = document.createElement("button");
                btn.innerHTML = "<?php echo $row['nombreSub'];?>";  
                btn.classList.add('listadoBtn','btn','btn-link','text-black','btn-sm','btn-block','col-5');
                btn.onclick = function () {
                location.href = "<?php echo base_url('/subCategoria')?>/<?php echo $row['idSubCat'];?>";
                };
                document.getElementById("Listado").appendChild(btn);
            }
        <?php endforeach;?>
        $("#categoriaModal1").modal('show');
    }
</script>