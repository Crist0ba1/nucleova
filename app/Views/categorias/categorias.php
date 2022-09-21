<style>
    #padre{
        position: relative;
        z-index: 1;
    }
    .hijoFront{
        position: relative;
        z-index: 1;
    }
    .hijoBack{
        position: absolute;
        z-index: 12;
    }
    #cardCategoria{
        padding-top: 15px;
        padding-bottom: 15px;
        text-align: center;

    }
    .inner{
    margin:0px !important;
    width: auto;
    height: auto;
    }
    #logo2{
        height: 250px;
    }
    .listadoBtn{
        margin-top: 5px;        
        margin-left: 10px;
        margin-right: 10px;
        margin-bottom: 5px;
        background-color: #314a9a !important;	
    }
    .listadoBtn:hover{
        background-color: #c04894 !important;
    }
    
</style>

<div class="container">
    <div id="padre" class="row">
        <?php foreach($categoria as $row):?>			
            <div id="cardCategoria" class="col-sm-6 col-md-6 col-lg-3 col-xl-3">
                    <div class="card"> 
                        <a onclick="myFunction(<?php echo $row['id']?>)"> 
                            <div class=" my-auto">   
                                <img id="logo2" src="<?php echo base_url('/public/assets/Logos/categorias/');?>/<?= $row['nombreImagen'];?>.png" heigth="50px" class="img-fluid">
                            </div>
                        </a> 
                    </div>	 
            </div>
        <?php endforeach;?>
    </div>
</div>

<div class="modal fade" id="categoriaModal" role="dialog" >
		<div class="modal-dialog ">
			<div class="modal-content gradiente">
				<div class="modal-body">
					<h4 id="tituloModal" style="color:#FFFFFF;"class="modal-title float-left"> 
						
					</h4>
					<button type="button" class="close float-right" data-dismiss="modal" aria-label="Close">
						<i class="fas fa-window-close" style="color:#ff0000;"></i></button>
				</div>
				<div class="modal-body">
                    <!-- 314A9A -->
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
                btn.classList.add('listadoBtn','btn','btn-link','text-white','btn-sm','btn-block','col-5');
                btn.onclick = function () {
                location.href = "<?php echo base_url('/subCategoria')?>/<?php echo $row['idSubCat'];?>";
                };
                document.getElementById("Listado").appendChild(btn);
            }
        <?php endforeach;?>
        $("#categoriaModal").modal();
        }
</script>