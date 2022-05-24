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
    .flip {
    -webkit-perspective: 800;   
            perspective: 800;

    }
    .flip .card.flipped {
    -webkit-transform: rotatey(-180deg);
            transform: rotatey(-180deg);

    }
    .flip .card {
        z-index: 1;
        width: 270px;
        height: 250px;
        -webkit-transform-style: preserve-3d;
        -webkit-transition: 0.5s;
        transform-style: preserve-3d;
        transition: 0.5s;
    
    }
    .flip .card .face {
    -webkit-backface-visibility: hidden ;
        backface-visibility: hidden ;
        position: relative;
        z-index: 1;
    }
    .flip .card .front {
    width: 270px;
    }
    .flip .card .front img{
    width: 270px;
    height: 100%;
    }
    .flip .card .back {
    padding-top: 10%;
    -webkit-transform: rotatey(-180deg);
            transform: rotatey(-180deg);
    position: absolute;
    top:0;
    left:0;
    right:0;
    margin: 0 auto;
    background-color: red;
    z-index: 100 !important;
    color: #DAF7A6;
    background-color: #314a9a;
        background-image: linear-gradient(180deg, #314a9a 0%, #c04894 50%, #ffffff 100%);

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
<!--div class="container">
    <div  class="row">
        <?php foreach($categoria as $row):?>			
            <div id="cardCategoria" class="col-sm-3" >
                <div class="flip">
                    <div id="padre"class="card"> 
                        <div class="face front hijoFront"> 
                            <div class="inner my-auto">   
                                <img id="logo2" src="<?php echo base_url('/public/assets/Logos/categorias/');?>/<?= $row['nombreImagen'];?>.png" heigth="50px" class="img-fluid">
                            </div>
                        </div> 
                        <div class="face back hijoBack">  
                            <div class="inner content-center row"> 
                                <h4 style="margin-left: 15px;"><?php echo $row['nombre']?></h4>                                
                                <br>
                                <?php foreach($subCategoria as $row2):?>
                                    <?php if($row['id'] == $row2['refCat']):?>
                                        <a class="btn btn-block btn-link text-white btn-sm listadoBtn" href=""><?php echo  $row2['nombreSub'] ?><br></a>
                                    <?php endif;?>
                                <?php endforeach;?>
                            </div>
                        </div>
                    </div>	 
                </div>
            </div>
        <?php endforeach;?>
    </div>
</div-->

<div class="container">
    <div id="padre" class="row">
        <?php foreach($categoria as $row):?>			
            <div id="cardCategoria" class="col-sm-3" >
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
    $('.flip').hover(function(){
        $(this).find('.card').toggleClass('flipped');

    });
    function myFunction($id){
        $('#Listado').empty();
        <?php foreach($subCategoria as $row):?>
            if($id == <?php echo $row['refCat'];?>){
                let btn = document.createElement("button");
                btn.innerHTML = "<?php echo $row['nombreSub'];?>";  
                btn.classList.add('listadoBtn','btn','btn-link','text-white','btn-sm','btn-block','col-5');
                btn.onclick = function () {
                location.href = "<?php echo base_url('/subCategoria')?>/<?php echo $row['idSubCat'];?>";
                    /*
                        $.ajax({
                            url:"<?php echo base_url('/subCategoria')?>/<?php echo $row['idSubCat'];?>",
                            type: "POST",                        
                            success:function(data){
                                alert(data);
                            },
                            error:function(){
                                alert("Error, recargue el sitio \n si el error persiste intente más tarde");
                            }

                        });
                    */
                };
                document.getElementById("Listado").appendChild(btn);
            }
        <?php endforeach;?>
        $("#categoriaModal").modal();
        }
</script>