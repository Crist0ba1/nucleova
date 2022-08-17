<style type="text/css" media="screen">
    #filtro .select{
        padding-right: 10px;
        color: #c04894;
    }
    #filtrosButton{
        padding-left: 10px;
        padding-right: 5px;
    }
	.mx-auto{
		padding-top: 5px;
		padding-bottom: 5px;	
	}
    .navbar-darck{
		background-color: #314a9a !important;	
	}
	/*314a9a   c04894*/ 
</style>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>



<nav class="navbar navbar-expand-lg navbar-darck bg-secondary"> <!-- nav-gradiente -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
    
    <form id="filtro"  class="form-inline form-row mx-auto " action="<?php echo base_url('/filtro')?>" method="GET"> 
			<div class="col-12 text-center text-white">
				<h4>Seleccione filtros de busqueda:</h4>
			</div>
			<div class="col-10">
				<div class="row text-center">
					<div class="col-3 col-sm-3">
						<div class="form-group select">
							<select name="region" id="region1" data-live-search="true" class="form-control select-lg selectpicker"  style="width:100% !important;">
								<option value="0">-Region-</option>
								<?php foreach($region as $row):?>
									<option value="<?= $row['id'];?>"><?= $row['region'];?></option>
								<?php endforeach;?>
							</select>										
						</div>
					</div>
					<div class="col-3 col-sm-3">
						<div class="form-group select">
							<select name="comuna" id="comuna1" data-live-search="true" class="form-control select-lg selectpicker"  style="width:100% !important;">
								<option value="0">-Comuna-</option>
								<?php foreach($comuna as $row):?>
									<option value="<?= $row['id'];?>"><?= $row['comuna'];?></option>
								<?php endforeach;?>
							</select>
						</div>
					</div>
					<div class="col-3 col-sm-3">
						<div class="form-group select">
							<select name="categoriaSelect" id="categoriaSelect" class="selectpicker select-lg" title="Categoria(s)" 
							 multiple data-live-search="true" style="width:100% !important;">
								<option disabled >- Categoria-</option>
								<?php foreach($categoria as $rowC):?>
									<option  value="<?= $rowC['id'];?>"><?= $rowC['id'];?>. <?= $rowC['nombre'];?></option>
								<?php endforeach;?>
								<input type="hidden" class="form-control form-control-user" id="listCategorias" name="listCategorias">
							</select>										
						</div>
					</div>
					<div class="col-3 col-sm-3">
						<div class="form-group select">
							<select name="subCategoriaSelect" id="subCategoriaSelect" class="selectpicker select-lg" title="Subcategoria(s)" 
							 multiple data-live-search="true" style="width:100% !important;">
								<option >-Subcategoria-</option>
								<?php foreach($subCategoria as $row):?>
									<option value="<?= $row['idSubCat'];?>"><?= $row['nombreSub'];?></option>
								<?php endforeach;?>
								<input type="hidden" class="form-control form-control-user" id="listSubCategorias" name="listSubCategorias">
							</select>
						</div>
					</div>
				</div>
			</div>
			<div class="col-2 text-center">
				<!-- div id="filtrosButton"><button type="submit" class="btn btn-primary btn-block">Buscar</button></div-->
				<div id="filtrosButton">
					<button type="submit" class="btn btn-primary btn-block"> Buscar</button>
					
				</div>
			</div>
    	
    </form>
    
  </div>
</nav>

<script>
    $("#region1").change(function() {
       		$("#region1 option:selected").each(function() {
				   
            	var id = $('#region1').val();
            	var select = document.getElementById("comuna1"); //Seleccionamos el select

            	while (select.hasChildNodes()) {  // mientras exita un nodo child lo borra
                	select.removeChild(select.firstChild);
            	}

            	var aux = document.createElement("option"); //Creamos la opcion
            	aux.text = "-Seleccionar una comuna-"; //Metemos el texto en la opción
            	aux.value = "0";
            	select.add(aux);

            	//alert(idCategoria);
            	<?php foreach($comuna as $row):?>
	                if(id == <?= $row['region_id'];?>){
                    	var option = document.createElement("option"); //Creamos la opcion
                    	option.text = "<?= $row['comuna'];?>"; //Metemos el texto en la opción
                    	option.value = "<?= $row['id'];?>";
                    	select.add(option); //Metemos la opción en el select
                	}
            	<?php endforeach;?>
        	});
        	$('#comuna1').selectpicker('refresh');
    });
	
</script>

<script>
    $(document).ready(function() { 
        var optgroup ="";
        <?php foreach($region as $car):?>
            optgroup += "<optgroup value='<?php echo $car['id']?>' label='<?php echo $car['id']?> <?php echo $car['region']?>' >"; 
            <?php foreach($comuna as $subcat):?>
                <?php if($car['id']==$subcat['region_id']):?>
                optgroup += "<option value='<?php echo $subcat['id']?>'> <?php echo $subcat['region_id']?>.<?php echo $subcat['id']?> <?php echo $subcat['comuna']?> </option>"
                <?php endif;?>
            <?php endforeach;?>
            optgroup += "</optgroup>";
        <?php endforeach;?>
        optgroup += "";
        //alert(optgroup);
        $('#selectpicker2').append(optgroup);
        $('#selectpicker2').selectpicker('refresh');
    });
    /* Mantiene los campos de subcategorias en arrSelected*/
    $('#subCategoriaSelect').on('change', function(){
        var selected = $(this).find("option:selected");
        var arrSelected = [];
		var subCat = "";
        selected.each(function(){
        	arrSelected.push($(this).val());
			subCat+= $(this).val() +" ";
        });
        $("#selectpickerValue2").val(arrSelected);
        //alert(subCat);
		$('#listSubCategorias').val(subCat);
    });
    $('#categoriaSelect').on('change', function(){
        var selected = $(this).find("option:selected");
        var arrSelected = [];
		var  cat = "";
        selected.each(function(){
        	arrSelected.push($(this).val());
			 cat+= $(this).val() +" ";
        });
		$('#listCategorias').val(cat);
		$select = document.getElementById("subCategoriaSelect");
		for (let i = $select.options.length; i >= 0; i--) {
			$select.remove(i);
		}
		
		var categoriasSelec =  cat.split(" ");

		var optgroup ="";
		var i;
		//alert('Categoria: '+cat);
		for (i = 0; i < categoriasSelec.length; i++) {
			if(cat.length == 0){		
				optgroup ='<option>-Subcategoria-</option>';				
				<?php foreach($subCategoria as $row):?>
					optgroup +=	'<option value="<?= $row['idSubCat'];?>"><?= $row['nombreSub'];?></option>';
				<?php endforeach;?>	
			}
			else{
				<?php foreach($categoria as $car):?>					
					if(categoriasSelec[i] == <?php echo $car['id']?>){		
						//alert(categoriasSelec[i]);						
						//optgroup += '<optgroup label='""' >'; 						
						<?php foreach($subCategoria as $subcat):?>
							<?php if($car['id']==$subcat['refCat']):?>								
								optgroup += "<option value='<?php echo $subcat['idSubCat']?>'> <?php echo $subcat['refCat']?>.<?php echo $subcat['idSubCat']?> <?php echo $subcat['nombreSub']?> </option>"
							<?php endif;?>
						<?php endforeach;?>
						//optgroup += "</optgroup>";
					}
				<?php endforeach;?>
				optgroup += " ";				
			}
		}
		
		$('#subCategoriaSelect').append(optgroup);
        $('#subCategoriaSelect').selectpicker('refresh');

    });

	
</script>
