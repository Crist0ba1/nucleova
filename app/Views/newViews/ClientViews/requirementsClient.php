
<div class="container cont60">
    <div class="row">
        <div class="col-sm-3">
            <button type="button" class="btn btn-primary btn-purple bottom15"  data-toggle="modal" data-target="#modalIngresarReq"><span class="fa fa-plus"></span> Nuevo Requerimiento</button>
        </div>
    </div>
    <div class="row">
        <div id="reqDiv" class="col">
            <?php foreach($requerimientos as $req):?>
                <?php foreach($req as $row):?>
                    <?php include("requirementCardClient.php");?>
                <?php endforeach;?>            
            <?php endforeach;?>            
        </div>
    </div>
</div>
        <!-- Modal-->
        <div class="modal fade" id="modalIngresarReq" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Ingresar Requerimiento</h4>
                        <button class="btn-close" type="button" data-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form id="imageUploadForm" action="<?php echo base_url('/nuevoRequerimiento');?>" method="post" enctype="multipart/form-data">
                        <div class="modal-body">
                            <div class="col">
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group select">
                                            <select name="categoriaSelect" id="categoriaSelectR" class="form-select bottom10 select-lg" title="Categoría(s)" style="width:100% !important;">
                                                <option value="0">- Categoría-</option>
                                                <?php foreach($categoria as $rowC):?>
                                                    <option  value="<?= $rowC['id'];?>"><?= $rowC['id'];?>. <?= $rowC['nombre'];?></option>
                                                <?php endforeach;?>
                                            </select>										
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <select name="subCategoriaSelect" id="subCategoriaSelectR" class="form-select bottom10 select-lg" title="Subcategoría(s)" style="width:100% !important;" required>
                                            <option>-Subcategoría-</option>
                                            <?php foreach($subCategoria as $row):?>
                                                <option value="<?= $row['idSubCat'];?>"><?= $row['refCat'];?>.<?= $row['idSubCat'];?> <?= $row['nombreSub'];?></option>
                                            <?php endforeach;?>                                            
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <select name="prestadores" id="prestadores" class="form-select bottom10 select-lg" title="Prestador de servicio(s)" style="width:100% !important;" required>
                                            <option value="none" selected disabled hidde>-Prestador de servicio-</option>                                            
                                        </select>                
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <label for="exampleFormControlInput1" class="form-label">Título Requerimiento</label>
                                        <input type="text" class="form-control bottom5" name='inputTitleReq' id="inputTitleReq" required>
                                    </div>
                                </div>                            
                                <div class="row">
                                    <div class="col">
                                        <label for="textDescriptionReq" class="form-label">Descripción</label>
                                        <textarea class="form-control bottom10" id="textDescriptionReq" name="textDescriptionReq" rows="3" required></textarea>
                                    </div>
                                </div>                            
                                <div class="row" style="justify-content: center;">
                                    <div class="form-group col-10">
                                        <div class="row imagenHori">
                                            <div class="col-2">
                                                <label class="labelImagen">Imagen 1</label>
                                            </div>
                                            <div class="col-8">
                                                <input type="file" class="form-control form-control-user" id="filePhoto0" name="filePhoto0"
                                                placeholder="Editar imagen" required>
                                            </div>
                                        </div>                                                       
                                    </div>
                                    <div class="form-group col-10">
                                        <div class="row imagenHori">
                                            <div class="col-2">
                                                <label class="labelImagen">Imagen 2</label>
                                            </div>
                                            <div class="col-8">
                                                <input type="file" class="form-control form-control-user small" id="filePhoto1" name="filePhoto1"
                                                placeholder="Editar imagen" >
                                            </div>
                                        </div>                                                       
                                    </div>
                                    <div class="form-group col-10">
                                        <div class="row imagenHori">
                                            <div class="col-2">
                                                <label class="labelImagen">Imagen 3</label>
                                            </div>
                                            <div class="col-8">
                                                <input type="file" class="form-control form-control-user" id="filePhoto2" name="filePhoto2"
                                                placeholder="Editar imagen" >
                                            </div>
                                        </div>                                                       
                                    </div>
                                    <div class="form-group col-10">
                                        <div class="row imagenHori">
                                            <div class="col-2">
                                                <label class="labelImagen">Imagen 4</label>
                                            </div>
                                            <div class="col-8">
                                                <input type="file" class="form-control form-control-user" id="filePhoto3" name="filePhoto3"
                                                placeholder="Editar imagen" >
                                            </div>
                                        </div>                                                       
                                    </div>
                                    <div class="form-group col-10">
                                        <div class="row imagenHori">
                                            <div class="col-2">
                                                <label class="labelImagen">Imagen 5</label>
                                            </div>
                                            <div class="col-8">
                                                <input type="file" class="form-control form-control-user" id="filePhoto4" name="filePhoto4"
                                                placeholder="Editar imagen" >
                                            </div>
                                        </div>                                                       
                                    </div>            
                                </div>
                            
                            </div>
                        </div>
                        <div class="modal-footer" style="display: block;">
                            <div class="col">
                                <div class="row">
                                    <div class="d-grid gap-2 col-6">
                                        <button class="btn btn-purple text-light text-start" type="submit" style="display: inline-block;"><span class="fa fa-check"></span> Confirmar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
<script>
    //No se que hace esto.
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl)
    })  
</script>
<script>
    function eliminarRequerimiento(idR){
        event.preventDefault();
        $.ajax ({
            type: "get",
            url: "<?php echo base_url('/eliminarRequerimiento')?>/"+idR,
            success: function(data){
                $("#reqDiv").load(location.href+" #reqDiv>*","");
            },
            error: function(){
                alert("Error en la llamada ajax, de eliminar requerimiento");
            }
        });
    }

    function verImagenes(){
        alert('Se mostraran las imagenes');
    }
    
    $("#categoriaSelectR").change(function() {
       		$("#categoriaSelectR option:selected").each(function() {
				   
            	var id = $('#categoriaSelectR').val();
            	var select = document.getElementById("subCategoriaSelectR"); //Seleccionamos el select

            	while (select.hasChildNodes()) {  // mientras exita un nodo child lo borra
                	select.removeChild(select.firstChild);
            	}

            	var aux = document.createElement("option"); //Creamos la opcion
            	aux.text = "-Subcategoría-"; //Metemos el texto en la opción
            	aux.value = "0";
            	select.add(aux);

            	//alert(idCategoria);
            	<?php foreach($subCategoria as $row):?>
	                if(id == <?= $row['refCat'];?>){
                    	var option = document.createElement("option"); //Creamos la opcion
                    	option.text = "<?php echo $row['refCat']?>.<?php echo $row['idSubCat']?> <?php echo $row['nombreSub']?> "; //Metemos el texto en la opción
                    	option.value = "<?php echo $row['idSubCat'];?>";
                    	select.add(option); //Metemos la opción en el select
                	}
            	<?php endforeach;?>
        	});
        	$('#subCategoriaSelectR').selectmenu('refresh');
    });
    
    $("#subCategoriaSelectR").change(function() {
       		$("#subCategoriaSelectR option:selected").each(function() {
                prestadores
            	var id = $('#subCategoriaSelectR').val();
            	var select = document.getElementById("prestadores"); //Seleccionamos el select

            	while (select.hasChildNodes()) {  // mientras exita un nodo child lo borra
                	select.removeChild(select.firstChild);
            	}

            	var aux = document.createElement("option"); //Creamos la opcion
            	aux.text = "-Prestador de servicio-"; //Metemos el texto en la opción
            	aux.value = "0";
            	select.add(aux);

            	//alert(idCategoria);
                $aux = 0;
            	<?php foreach($proveedores as $prove):?>
                    <?php foreach($prove['subCats'] as $row):?>
                        if(id == <?php echo $row['idSubCat'];?>){
                            $aux++;
                            var option = document.createElement("option"); //Creamos la opcion
                            option.text = "<?php echo $prove['nombre']?> "; //Metemos el texto en la opción
                            option.value = "<?php echo $prove['idPersona'];?>";
                            select.add(option); //Metemos la opción en el select
                        }
                    <?php endforeach;?>    
            	<?php endforeach;?>
                if($aux == 0){
                    var option = document.createElement("option"); //Creamos la opcion
                    option.text = "Sin prestadores de servicio"; //Metemos el texto en la opción
                    select.add(option); //Metemos la opción en el select
                }
        	});
        	$('#subCategoriaSelectR').selectmenu('refresh');
    });	
	
</script>

 