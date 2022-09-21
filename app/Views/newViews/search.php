<style>
    .sh:hover{
        color: #0c63e4;
        background-color: #e7f1ff;
        box-shadow: inset 0 -1px 0 rgb(0 0 0 / 13%);
    }
    .seleccionado{
        color: #0c63e4;
        background-color: #e7f1ff;
        box-shadow: inset 0 -1px 0 rgb(0 0 0 / 13%);
    }
</style>
<div class="container">
    <div class="row">
        <div class="col-sm-3 d-flex">
            <button class="btn bottom15 right10" data-toggle="collapse" data-target="#collapsableFilters" aria-expanded="false" aria-controls="collapsableFilters"><i class="fa fa-outdent" aria-hidden="true"></i></button>
            <form class="d-flex bottom15">
                <input class="form-control right15" type="search" placeholder="Buscar" aria-label="Search">
                <button class="btn btn-purple text-light" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
            </form>            
        </div>
        <div class="col">
            <div class="d-flex flex-row-reverse bottom15">                              
                <div class="dropdown left5">
                    <a class="btn btn-light dropdown-toggle" href="#" role="button" id="dropOrderBy" data-toggle="dropdown" aria-expanded="false">Ordenar Por</a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <li><a class="dropdown-item" href="#">Nombre</a></li>
                        <li><a class="dropdown-item" href="#">Puntuación</a></li>
                        <li><a class="dropdown-item" href="#">Fecha de ingreso</a></li>
                    </ul>
                </div> 
                <div class="btn-group">
                  <button type="button" id="grupoPro" class="btn btn-light"> <i class="fa fa-th" aria-hidden="true"></i> Grupo</button>
                  <button type="button" id="listaPro" class="btn btn-light"><i class="fa fa-list" aria-hidden="true"></i> Lista</button>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3 collapse" id="collapsableFilters">        
            
            <p class="bottom15"><i class="fa fa-filter" aria-hidden="true"></i></span> Filtrar por</p>

            <div id="accordion-1" class="accordion " role="tablist">
                <div class="accordion-item">
                    <h2 class="accordion-header" role="tab">
                        <button class="accordion-button collapsed" data-toggle="collapse" data-target="#accordion-1 .item-1" aria-expanded="false" aria-controls="accordion-1 .item-1">Región</button>
                    </h2>
                    <div class="accordion-collapse collapse item-1" role="tabpanel" data-parent="#accordion-1">
                        <div class="accordion-body" style="padding:0;">
                            <ul class="list-group-flush">                                
                                <?php foreach($region as $row):?>	
                                    <?php $id = $row['id'];?>
                                    <a id="<?php echo $id?>Region" onclick="regionSeleccionada('<?php echo $id?>')" class="list-group-item list-group-item-action sh"><?php echo $row['region'];?></a>                                    
								<?php endforeach;?>
                                <input type="hidden" value="0" class="form-control form-control-user" id="regionSearch" name="region">
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" role="tab">
                        <button class="accordion-button collapsed" data-toggle="collapse" data-target="#accordion-1 .item-2" aria-expanded="false" aria-controls="accordion-1 .item-2">Ciudad</button>
                    </h2>
                    <div class="accordion-collapse collapse item-2" role="tabpanel" data-parent="#accordion-1">
                        <div class="accordion-body" style="padding:0;">
                            <ul id="ulComuna" class="list-group-flush">
                                <a href="#" class="list-group-item list-group-item-action " data-toggle="collapse" data-target="#accordion-1 .item-1" aria-expanded="false" aria-controls="accordion-1 .item-1"> Seleccione una región</a> 
                            </ul>
                            <input type="hidden" value="0" class="form-control form-control-user" id="comunaSearch" name="comuna">
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" role="tab"><button class="accordion-button collapsed" data-toggle="collapse" data-target="#accordion-1 .item-3" aria-expanded="false" aria-controls="accordion-1 .item-3">Categoría</button></h2>
                    <div class="accordion-collapse collapse item-3" role="tabpanel" data-parent="#accordion-1">
                        <div class="accordion-body">
                            <ul class="list-group-flush">
                                <?php foreach($categoria as $rowC):?>
                                    <?php $id = $rowC['id'];?>
                                    <a id="<?php echo $id?>Categoria" onclick="categoriaSeleccionada('<?php echo $id?>')" class="list-group-item list-group-item-action sh categoria"><?php echo $rowC['nombre'];?></a>                                    
								<?php endforeach;?>
                                <input type="hidden" class="form-control form-control-user" id="listCategoriasSearch" name="listCategorias">
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" role="tab"><button class="accordion-button collapsed" data-toggle="collapse" data-target="#accordion-1 .item-4" aria-expanded="false" aria-controls="accordion-1 .item-3">Subcategoría</button></h2>
                    <div class="accordion-collapse collapse item-4" role="tabpanel" data-parent="#accordion-1">
                        <div class="accordion-body">
                            <ul id="subCatSearch" class="list-group-flush">
                                <a href="#" class="list-group-item list-group-item-action" data-toggle="collapse" data-target="#accordion-1 .item-3" aria-expanded="false" aria-controls="accordion-1 .item-3">Seleccione una categoría </a>
                            </ul>
                            <input type="hidden" class="form-control form-control-user" id="listSubCategoriasSearch" name="listSubCategorias">
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <button class="btn btn-purple text-light top15" type="submit"><span class="fa-regular fa-filter-circle-xmark"></span> Quitar Filtros</button>
                </div>
            </div>
        </div>
        <div class="col">
            
            <div class="container-fluid justify-content-end">

                <div id="incertCards">
                    <?php if(isset($proveedores)):?>                    
                        
                            <?php if(session()->get('grupoLista') == 1):?>
                                <?php include("searchResultCardGrid.php");?>
                            <?php elseif(session()->get('grupoLista') == 2):?>
                                <?php include("searchResultCardList.php");?>
                            <?php endif;?>
                        </div>
                    <?php else:?>
                        <div class="container justify-content-end">
                            <?php
                                include("categorias/categorias.php");
                            ?>
                    <?php endif;?>
                </div>
         

                
            </div>
            
        </div>
    </div>

</div>
    <?php if(!session()->has('grupoLista')):?>
    <?php session()->set('grupoLista', 1);?> 
    <?php endif;?>
<script>
    $('#grupoPro').click(function() {
        var pathname = window.location.href.split('/');
        pathname= pathname[pathname.length-1];
        $.ajax ({
            type: "get",
                url: "<?php echo base_url('/grupoLista/1')?>/"+pathname,
                success: function(data){
                    $("#incertCards").html(data);
                },
                error: function(){
                    alert("Error en la llamada ajax, que define si es lista o grupo");
                }
        });
        $('#listaPro').removeClass('active'); 
        $('#grupoPro').addClass('active'); 
       

        /* Aqui se debe ingresar el contenido a la pagina*/        
    });

    $('#listaPro').click(function() {
        var pathname = window.location.href.split('/');
        pathname= pathname[pathname.length-1];
        $.ajax ({
            type: "get",
                url: "<?php echo base_url('/grupoLista/2')?>/"+pathname,
                success: function(data){
                    $("#incertCards").html(data);
                },
                error: function(){                    
                    alert("Error en la llamada ajax, que define si es lista o grupo");
                }
        });
        $('#grupoPro').removeClass('active'); 
        $('#listaPro').addClass('active'); 

        /* Aqui se debe ingresar el contenido a la pagina*/
        
    });

    function regionSeleccionada(region){
        if(Number.isInteger(parseInt(region))){       
            if($( "#"+region+"Region" ).hasClass( "seleccionado" )){
                //alert("TRUE");
                $( "#"+region+"Region" ).removeClass( "seleccionado" );

                var ulComuna = document.getElementById("ulComuna"); //Seleccionamos el select

            	while (ulComuna.hasChildNodes()) {  // mientras exita un nodo child lo borra
                	ulComuna.removeChild(ulComuna.firstChild);
            	}

                var aElement = document.createElement("a"); //Creamos la opcion
                aElement.setAttribute("class","list-group-item list-group-item-action sh");
                aElement.setAttribute("data-toggle","collapse"); 
                aElement.setAttribute("data-target","#accordion-1 .item-1"); 
                aElement.setAttribute("aria-expanded","false"); 
                aElement.setAttribute("aria-controls","accordion-1 .item-1"); 
                var aElementText = document.createTextNode("Seleccione una región"); //Metemos el texto en la opción            	
                aElement.appendChild(aElementText);
                ulComuna.append(aElement);
                $("#regionSearch").val('0');
                $("#comunaSearch").val('0');
            }
            else{
                //alert("FALSE");
                $( ".seleccionado" ).removeClass( "seleccionado" );
                $("#"+region+"Region").addClass( "seleccionado" );
                $("#regionSearch").val(region);
                /* Aqui debo llamar a un ajax para que busque */

            	var ulComuna = document.getElementById("ulComuna"); //Seleccionamos el select
            	while (ulComuna.hasChildNodes()) {  // mientras exita un nodo child lo borra
                	ulComuna.removeChild(ulComuna.firstChild);
            	}

                <?php foreach($comuna as $row):?>
	                if(region == <?= $row['region_id'];?>){
                    	var  aElement = document.createElement("a");   
                        aElement.setAttribute("class","list-group-item list-group-item-action sh comuna");
                        aElement.setAttribute("id","<?php echo $row['id']?>Comuna");
                        aElement.setAttribute("onclick","comunaSeleccionada('<?php echo $row['id']?>')");
                        var aElementText = document.createTextNode("<?php echo $row['comuna']?>");
                        aElement.appendChild(aElementText);    
                        ulComuna.append(aElement);             	
                	}
            	<?php endforeach;?>

            }
            /* Llamado ajax para que busque*/
            searchFiltro();
        }
        else{
            alert("Error region, vuelva a cargar la pagina");
        }
    }
    function comunaSeleccionada(comuna){
        if($("#"+comuna+"Comuna").hasClass("seleccionado")){
            $("#"+comuna+"Comuna").removeClass("seleccionado");
            $("#comunaSearch").val('0');
        
        }else{
            $(".comuna").removeClass("seleccionado" );
            $("#"+comuna+"Comuna").addClass("seleccionado");
            $("#comunaSearch").val(comuna);
            /* Llamado ajax para que busque*/
        }
        searchFiltro();
    }
    function categoriaSeleccionada(categoria){
        if(Number.isInteger(parseInt(categoria))){
            var listCategoriasSearch = $('#listCategoriasSearch').val();
            const myArray = listCategoriasSearch.split(" ");
            var texto = "";
            if($( "#"+categoria+"Categoria" ).hasClass( "seleccionado" )){
                myArray.forEach(function(element) {
                    if(Number.isInteger(parseInt(element)) && element != categoria){
                        texto += element+" ";
                    }
                });
                $("#"+categoria+"Categoria").removeClass( "seleccionado" );
                $('#listCategoriasSearch').val(texto);
            }
            else{
                myArray[categoria] = categoria;
                myArray.forEach(function(element) {
                    texto += element+" ";
                });
                $("#"+categoria+"Categoria").addClass( "seleccionado" );  
                $('#listCategoriasSearch').val(texto);
            }
            /* Se cargan los valores anteriormente seteados */
            myArray2 = texto.split(" ");
            /* Aqui se cambian los valores de la subcategoria dependiendo de si tienen la id correspondiente */
            var ulSubCat = document.getElementById("subCatSearch"); //Seleccionamos el select
            while (ulSubCat.hasChildNodes()) {  // mientras exita un nodo child lo borra
            	ulSubCat.removeChild(ulSubCat.firstChild);
        	}
            if(myArray2.length > 1){
                myArray2.forEach(function(element) {
                    <?php foreach($subCategoria as $subcat):?>
                        if(element == <?php echo$subcat['refCat'] ?>){
                            var  aElement = document.createElement("a");   
                            aElement.setAttribute("class","list-group-item list-group-item-action sh subCategoria");
                            aElement.setAttribute("id","<?php echo $subcat['idSubCat']?>SubCat");
                            aElement.setAttribute("onclick","subCatSeleccionada('<?php echo $subcat['idSubCat']?>')");
                            var aElementText = document.createTextNode("<?php echo $subcat['refCat']?>.<?php echo $subcat['idSubCat']?> <?php echo $subcat['nombreSub']?>");
                            aElement.appendChild(aElementText);    
                            ulSubCat.append(aElement);  
                        }
                    <?php endforeach;?>
                });
            }
            else{
                var  aElement = document.createElement("a");   
                aElement.setAttribute("class","list-group-item list-group-item-action sh subCategoria");
                aElement.setAttribute("data-toggle","collapse"); 
                aElement.setAttribute("data-target","#accordion-1 .item-3"); 
                aElement.setAttribute("aria-expanded","false"); 
                aElement.setAttribute("aria-controls","accordion-1 .item-3"); 
                var aElementText = document.createTextNode("Seleccione una categoría");
                aElement.appendChild(aElementText);    
                ulSubCat.append(aElement);             
            }
            /* Llamado ajax para que busque*/
            searchFiltro();
        }
        else{
            alert("Error categorias, vuelva a cargar la pagina");
        }
        
    }

    function subCatSeleccionada(subCat){
        if(Number.isInteger(parseInt(subCat))){
            var listSubCategoriasSearch = $('#listSubCategoriasSearch').val();
            const myArray = listSubCategoriasSearch.split(" ");
            var texto = "";
            
            if($( "#"+subCat+"subCat" ).hasClass( "seleccionado" )){
                myArray.forEach(function(element) {
                    if(Number.isInteger(parseInt(element)) && element != subCat){
                        texto += element+" ";
                    }
                });

                $("#"+subCat+"subCat").removeClass( "seleccionado" );

                
                $('#listSubCategoriasSearch').val(texto);
            }
            else{
                myArray[subCat] = subCat;
                myArray.forEach(function(element) {
                    texto += element+" ";
                });
                $("#"+subCat+"subCat").addClass( "seleccionado" );  
                $('#listSubCategoriasSearch').val(texto);
            }

            /* Llamado ajax para que busque*/
            searchFiltro();
        }
        else{
            alert("Error categorias, vuelva a cargar la pagina");
        }
    }

    function searchFiltro(){
        event.preventDefault();
            $.ajax ({
                type: "get",
                url: "<?php echo base_url('/filtroPRO')?>",
                data: {
                    region: $("#regionSearch").val(),
                    comuna: $("#comunaSearch").val(),
                    listCategorias: $("#listCategoriasSearch").val(),
                    listSubCategorias: $("#listSubCategoriasSearch").val()
                },
                success: function(data){
                    $("#incertCards").html(data);
                },
                error: function(){
                    alert("Error en la llamada ajax, del filtro de busqueda");
                }

            });
    }

</script>
<script>
         $(document).ready(function() { 
            var aux = "<?php echo session()->get('grupoLista');?>";
            if(aux==1){
                $('#grupoPro').addClass('active'); 
            }
            if(aux==2){
                $('#listaPro').addClass('active'); 
            }
         });
</script>