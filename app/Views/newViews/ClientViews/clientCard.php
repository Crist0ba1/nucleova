<?php foreach($solicitudes as $sol):?>
    <div class="card bottom20 border-blue">
        <div class="card-body">
            <div class="row"> 
                <div class="col-9">  
                    <div class="card bg-gray text-secondary">
                        <div class="row g-0">
                            <div class="col-md-4">                                
                                <?php foreach($sol['imagenes'] as $image):?>
                                    <?php if($image['imagen1'] != ""):?>
                                        <div class="carousel-item active">
                                            <img id="logo2" src="<?php echo base_url('/public/imgs/');?>/<?php echo  $image['idUsers']?>/<?php echo  $image['imagen1']?>" class="rounded img-fluid w-100 fit-cover bottom20" style="min-height: 300px;">
                                        </div>
                                    <?php endif;?>                                    
                                <?php endforeach;?>
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h4 class="card-title text-center"><?php echo $usser['firstname'];?></h4>
                                    <p class="card-text"> <?php echo $usser['text'];?> </p>
                                </div>
                                <div class="card-body text-center">
                                    <a href="<?php echo base_url('/proveedorPro')?>/<?php echo $usser['idUssers']?>" class="btn btn-primary btn-blue"><span class="fa fa-eye"></span> Ver más</a>
                                </div>        
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="card border-white">
                        <div class="card-body">
                            <div class="col">                               
                                <?php if(isset($proveedor)):?>
                                    <div class="row"><button type="button" class="btn btn-primary btn-block bottom10 btn-purple text-start"><span class="fa-regular fa-comment"></span> Chat<span class="badge rounded-pill bg-danger float-sm-end">5</span></button></div>
                                    <div class="row"><button type="button" class="btn btn-primary btn-block bottom10 btn-purple text-start"><span class="fa-regular fa-circle-exclamation"></span> Reclamo</button></div>
                                    <div class="row"><button type="button" onclick="eliminar1(<?php echo $usser['idUssers']?>)" class="btn btn-primary btn-block bottom10 btn-danger text-start"><span class="fa-regular fa-xmark"></span> Eliminar</button></div>
                                <?php endif;?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endforeach;?>

<script>
    function eliminar1(idProveedor){
        event.preventDefault();
        $.ajax ({
            type: "get",
            url: "<?php echo base_url('/eliminarProveedor')?>/"+idProveedor,
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