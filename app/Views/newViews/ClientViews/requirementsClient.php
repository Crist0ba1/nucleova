
<style>
    .imagenReq{
        transition: transform .2s; /* Animation */
        margin: 0 auto;
    }
    .imgSeleccionada{
        filter: grayscale(75%);
    }
    .verImagenReq{
        height: 400px !important; 
        width: 400px !important;
    }
    .gradiente{         
        background-color: #314a9a;
        background-image: linear-gradient(180deg, #314a9a 0%, #c04894 50%, #ffffff 100%);        
      }
    .uploadFile {
        opacity: 0; 
        display: block;
    }
    .imagenHori{
        justify-content: center;
        /**background-color: #314a9a;*/
        align-items: center;
    }
    .labelImagen {
        color: white;
    }
    .padre{
        display: flex;
        justify-content: center;
        align-items: center;
        z-index:1;
    }
    .labelInImage{
        width: 50px;
        height: 50px;
        background-color: rgba(0,0,0,0);
    }
    .labelInImage:Hover{
        background-color: rgba(0,0,0,0.5);
    }
    #file-chosen{
        color: white;
        margin-left: 0.3rem;
        font-family: sans-serif;
    }
</style>
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
            <div class="modal-dialog modal-lg ">
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
                                            <select name="categoriaSelect" id="categoriaSelectR" class="form-select bottom10 select-lg" title="Categoría(s)" style="width:100% !important;" required>
                                                <option value="">- Categoría-</option>
                                                <?php foreach($categoria as $rowC):?>
                                                    <option  value="<?= $rowC['id'];?>"><?= $rowC['id'];?>. <?= $rowC['nombre'];?></option>
                                                <?php endforeach;?>
                                            </select>										
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group select">
                                            <select name="subCategoriaSelect" id="subCategoriaSelectR" required class="form-select bottom10 select-lg" title="Subcategoría(s)" style="width:100% !important;">
                                                <option value="">-Subcategoría-</option>
                                                <?php foreach($subCategoria as $row):?>
                                                    <option value="<?= $row['idSubCat'];?>"><?= $row['refCat'];?>.<?= $row['idSubCat'];?> <?= $row['nombreSub'];?></option>
                                                <?php endforeach;?>                                            
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <select name="prestadores" id="prestadores" class="form-select bottom10 select-lg" title="Prestador de servicio(s)" style="width:100% !important;" required>
                                            <option value="">-Prestador de servicio-</option>                                            
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
                                    <div class="form-group col-12 col-sm-12">
                                        <div class="row imagenHori">
                                            <div id="padre" class="col-8">
                                                <input type="file" id="filePhoto0" name="filePhoto0" required class="uploadFile">
                                                <label for="filePhoto0" class="labelInImage border border-dark">
                                                    <img id="imagenFilePhoto0" src="<?php echo base_url('')?>/public/assets/img-plus.png" class="img-fluid" style="  height: 49px !important; width: 49px !important;">
                                                </label>
                                                <span id="filePhotoE0"> Imagen 1, sin seleccionar</span>
                                            </div>                                                                                                                     
                                        </div>
                                    </div>
                                    <div class="form-group col-12 col-sm-12">
                                        <div class="row imagenHori">
                                            <div id="padre" class="col-8">
                                                <input type="file" id="filePhoto1" name="filePhoto1" required class="uploadFile">
                                                <label for="filePhoto1" class="labelInImage border border-dark">
                                                    <img id="imagenFilePhoto1" src="<?php echo base_url('')?>/public/assets/img-plus.png" class="img-fluid" style="  height: 49px !important; width: 49px !important;">
                                                </label>
                                                <span id="filePhotoE1"> Imagen 2, sin seleccionar</span>
                                            </div>                                                                                                                     
                                        </div>
                                    </div>
                                    <div class="form-group col-12 col-sm-12">
                                        <div class="row imagenHori">
                                            <div id="padre" class="col-8">
                                                <input type="file" id="filePhoto2" name="filePhoto2" required class="uploadFile">
                                                <label for="filePhoto2" class="labelInImage border border-dark">
                                                    <img id="imagenFilePhoto2" src="<?php echo base_url('')?>/public/assets/img-plus.png" class="img-fluid" style="  height: 49px !important; width: 49px !important;">
                                                </label>
                                                <span id="filePhotoE2"> Imagen 3, sin seleccionar</span>
                                            </div>                                                                                                                     
                                        </div>
                                    </div>
                                    <div class="form-group col-12 col-sm-12">
                                        <div class="row imagenHori">
                                            <div id="padre" class="col-8">
                                                <input type="file" id="filePhoto3" name="filePhoto3" class="uploadFile">
                                                <label for="filePhoto3" class="labelInImage border border-dark">
                                                    <img id="imagenFilePhoto3" src="<?php echo base_url('')?>/public/assets/img-plus.png" class="img-fluid" style="  height: 49px !important; width: 49px !important;">
                                                </label>
                                                <span id="filePhotoE3"> Imagen 4, sin seleccionar</span>
                                            </div>                                                                                                                     
                                        </div>
                                    </div>
                                    <div class="form-group col-12 col-sm-12">
                                        <div class="row imagenHori">
                                            <div id="padre" class="col-8">
                                                <input type="file" id="filePhoto4" name="filePhoto4" class="uploadFile">
                                                <label for="filePhoto4" class="labelInImage border border-dark">
                                                    <img id="imagenFilePhoto4" src="<?php echo base_url('')?>/public/assets/img-plus.png" class="img-fluid" style="  height: 49px !important; width: 49px !important;">
                                                </label>
                                                <span id="filePhotoE4"> Imagen 5, sin seleccionar</span>
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
        
        <div class="modal fade" id="modalImagenesReq" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Imagenes del Requerimiento</h4>
                        <button class="btn-close" type="button" data-dismiss="modal" aria-label="Close"></button>
                    </div>
                        <div id="reloadContent" class="modal-body">
                            <div class="col">
                                <div class="row" style="justify-content: center;">
                                    <?php if(session()->has('imagenesReq') && count(session()->get('imagenesReq')) > 0):?>
                                        <?php $contador = 1; $imagenes = session()->get('imagenesReq');?>
                                        <?php foreach($imagenes as $img):?>
                                            <div class="form-group col-6 col-sm-6">
                                                <div class="row imagenHori">
                                                    <div id="padre" class="col-8 padre">
                                                        <label class="labelInImage border border-dark">
                                                            <img id="img<?php echo $contador?>" onclick="verImagenRequerimiento(<?php echo $contador;?>)" src="<?php echo base_url('')?>/public/imgsReq/<?php echo session()->get('idRequerimientoimagenes');?>/<?php echo $img?>" class="img-fluid imagenReq" style="  height: 49px !important; width: 49px !important;">
                                                        </label>
                                                        <span id="filePhotoE0"> - Imagen <?php echo $contador; $contador++;?>.</span>
                                                    </div>                                                                                                                     
                                                </div>
                                            </div>
                                        <?php endforeach;?>
                                        <div id="divFade" class="row fade">
                                            <div class="col-12 col-sm-12" >
                                                <button onclick="cerrarDivFade()" class="btn-close" type="button" aria-label="Close" style="float:right;"></button>
                                            </div>      
                                            <div class="col-12 col-sm-12 imagenHori">
                                                <img id="verImagenRequerimiento" src="" class="img-fluid">
                                            </div>
                                                                                      
                                        </div>
                                    <?php else:?>
                                        <h4>Error: Requerimiento sin imagenes. </h4>
                                    <?php endif;?> 
                                </div>         
                            </div>
                        </div>
                        <div class="modal-footer" style="display: block;">
                            <div class="col">
                                <div class="row">
                                    <div class="d-grid gap-2 col-6">
                                        <button class="btn btn-purple text-light text-start" data-dismiss="modal" style="display: inline-block;"> Cerrar</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                </div>
            </div>        
        </div>

        <div class="modal fade" id="modalFinReqInc" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Finalizar Requerimiento</h4>
                        <button class="btn-close" type="button" data-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="col">
                            <div class="row">
                                <div class="col">                               
                                    <div class="form-check">
                                        <input id="idRequerimientoModal" type="text" hidden>
                                        <input id="formCheck-1" class="form-check-input" type="checkbox" />
                                        <label class="form-check-label" for="formCheck-1">El proveedor no respondió el requerimiento</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-check">
                                        <input id="formCheck-2" class="form-check-input" type="checkbox" />
                                        <label class="form-check-label" for="formCheck-2">El proveedor no finalizó el requerimiento</label>
                                    </div>
                                </div>
                            </div>                            
                            <div class="row">
                                <div class="col">
                                    <div class="form-check">
                                        <input id="formCheck-3" class="form-check-input" type="checkbox" />
                                        <label class="form-check-label" for="formCheck-3">El proveedor no cumple los horarios establecidos</label>
                                    </div>
                                </div>
                            </div>                            
                            <div class="row">
                                <div class="col">
                                    <div class="form-check">
                                        <input id="formCheck-0" class="form-check-input" type="checkbox" onchange="textarea()"/>
                                        <label class="form-check-label" for="formCheck-0">Otro</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <textarea class="form-control bottom10" id="textDescriptionReq1" rows="3" disabled="true"></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div id="error_chexboxs"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer" style="display: block;">
                        <div class="col">
                            <div class="row">
                                <div class="d-grid gap-2 col-6">
                                    <button id="btn-finalzarRM" class="btn btn-purple text-light text-start" onclick="finalzarRM()" type="button" style="display: inline-block;"><span class="fa fa-check"></span> Finalizar</button>
                                </div>
                            </div>
                        </div>
                    </div>
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
    function noEliminaRequerimiento(){
        alert('Un requerimiento en proceso o finalizado no puede ser eliminado');
    }
    function verImagenes(idR){
        $.ajax ({
            type: "get",
            url: "<?php echo base_url('/getImagenesR')?>/"+idR,
            success: function(data){
                if(data == 1){                    
                    $("#reloadContent").load(location.href+" #reloadContent>*","");
                    setTimeout(() => {
                        $('#modalImagenesReq').modal();  
                    }, 300);                    
                }else{
                    alert("Error al buscar las imagenes de requerimiento");
                }                                      
            },
            error: function(){
                alert("Error en la llamada ajax, de ver imagenes de requerimiento");
            }
        });
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
            	aux.value = "";
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
    function chatWhatsap(idR){
        $.ajax ({
            type: "get",
            url: "<?php echo base_url('/getNumeroEmpresa')?>/"+idR,
            success: function(data){
                if(data.length == 8){
                    $telefono = '569'+data;
                }else if(data.length == 9){
                    $telefono = '56'+data;
                }else if(data.length == 10){
                    $telefono = '5'+data;
                }else{
                    alert('El numero del proveedor es incorrecto')
                }
                /* Esto lo tengo que sacar despues ya que es mi numero */
                $telefono = 56997815288;
                /********************************************************/
                alert('telefono = '+ $telefono);
                window.location.replace("whatsapp://send/?phone="+$telefono+"&text= Estimad@ proveedor, le contacto a través de la app de nuecleova" );
                
            },
            error: function(){
                alert("Error en la llamada ajax, de eliminar requerimiento");
            }
        });
    }

</script>
<script>
    /* Expcusivo para finalizar requerimiento */
    function finalizarRequerimientoB(idR){
        alert('bien');
        //imgSeleccionada
    }
    function finalizarRequerimientoM(idR){
        $('#textDescriptionReq1').val("");
        $("#formCheck-0").prop('checked', false);
        $("#formCheck-1").prop('checked', false);
        $("#formCheck-2").prop('checked', false);
        $("#formCheck-3").prop('checked', false);
        $('#idRequerimientoModal').val(idR);
        $('#modalFinReqInc').modal();
        /* Se cambia el estado del requerimiento a 5 */
        /* Y se realiza un reclamo */
    }
    function finalzarRM(){
        idR = $('#idRequerimientoModal').val();
        textarea ="";
        problema ="";
        /* Datos de los chexbox */
            if($("#formCheck-0").is(':checked')) {            
                textarea = $('#textDescriptionReq1').val();
                problema = "0";
            }
            if($("#formCheck-1").is(':checked')) {            
                if(problema ==""){
                    problema = "1";
                }else{problema =problema+" 1";}
            }
            if($("#formCheck-2").is(':checked')) {            
                problema =problema+" 2";
            }
            if($("#formCheck-3").is(':checked')) {            
                problema = problema+" 3";
            }
        /* Datos de los chexbox */    
        if(textarea=="" && problema==""){
            var text = "Seleccione una opcion";
            document.getElementById("error_chexboxs").innerHTML = text;
            document.getElementById("error_chexboxs").classList.add("alert");
            document.getElementById("error_chexboxs").classList.add("alert-danger");
            setInterval(function(){
                var text = "";
                document.getElementById("error_chexboxs").innerHTML = text;
                document.getElementById("error_chexboxs").classList.remove("alert");
                document.getElementById("error_chexboxs").classList.remove("alert-danger");
            }, 3000);
        }else{
            $.ajax ({
                type: "post",
                url: "<?php echo base_url('/finalzarRM')?>",
                data:{idRequerimiento:idR, seleccion: problema, descripcion: textarea},
                success: function(data){
                    $('#modalFinReqInc').modal('hide');
                    $("#reqDiv").load(location.href+" #reqDiv>*","");
                },
                error: function(){
                    alert("Error en la llamada ajax, de finalizar requerimiento (Por problemas con el proveedor)");
                }
            });
        }
        

    }
    function textarea(){ 
        if($("#formCheck-0").is(':checked')) {            
            $('#textDescriptionReq1').removeAttr("disabled"); 
        } else {
            $('#textDescriptionReq1').attr("disabled", "disabled"); 
        }
    }
    function verRporteRequerimientoM(idR){
            $.ajax ({
                type: "get",
                url: "<?php echo base_url('/verRporteRequerimientoM')?>/"+idR,
                success: function(data){
                    reporte = JSON.parse(data);
                    if(reporte.Descripcion != ""){
                        $('#textDescriptionReq1').val(reporte.Descripcion);
                    }
                    arraySeleccion = reporte.Seleccion.split(" ")
                    arraySeleccion.forEach(function(numero) {
                        $("#formCheck-"+numero).prop('checked', true);
                        $("#formCheck-"+numero).attr("disabled", true);
                    });         
                    /* Cambiar el texto y la funcion del modal */
                    $('#btn-finalzarRM').attr("onclick","closeModal()");
                    $('#btn-finalzarRM').html("Cerrar");
                    $('#modalFinReqInc').modal();

                },
                error: function(){
                    alert("Error en la llamada ajax, de ver reporte");
                }
            });
    }
    function closeModal(){
        $('#modalFinReqInc').modal('hide');
    }

    function verImagenRequerimiento(aux){
        $('.imgSeleccionada').removeClass('imgSeleccionada');
        valor = 0;
        src = "";
        if(aux==1){
            $('#img1').addClass('imgSeleccionada');
            valor = aux;
            src = $("#img1").attr("src");
        } 
        if(aux==2){
            $('#img2').addClass('imgSeleccionada');
            valor = aux;
            src = $("#img2").attr("src");
        }
        if(aux==3){
            $('#img3').addClass('imgSeleccionada');
            valor = aux;
            src = $("#img3").attr("src");
        }
        if(aux==4){
            $('#img4').addClass('imgSeleccionada');
            valor = aux;
            src = $("#img4").attr("src");
        }
        if(aux==5){
            $('#img5').addClass('imgSeleccionada');
            valor = aux;
            src = $("#img5").attr("src");
        }

        if(aux>0 && aux<6 && src != ""){
            $('#divFade').removeClass('fade');
            $('#verImagenRequerimiento').addClass('verImagenReq');
            $('#verImagenRequerimiento').attr("src", src);
        }else{
            $('#verImagenRequerimiento').removeClass('verImagenReq');
            $('#verImagenRequerimiento').attr("src", "");
        }
        
        
    }
    function cerrarDivFade(){
        $('.imgSeleccionada').removeClass('imgSeleccionada');
        $('#verImagenRequerimiento').removeClass('verImagenReq');
        $('#verImagenRequerimiento').attr("src", "");
        $('#divFade').addClass('fade');
    }
</script>

 <script>
    /* Para los botones de las imagenes */
    const actualBtnP0 = document.getElementById('filePhoto0');
    const fileChosenP0 = document.getElementById('filePhotoE0');

    actualBtnP0.addEventListener('change', function(){

        fileChosenP0.textContent = this.files[0].name;
        TmpPath = URL.createObjectURL(this.files[0]);
        $('#imagenFilePhoto0').attr('src', TmpPath);
    });

    const actualBtnP1 = document.getElementById('filePhoto1');
    const fileChosenP1 = document.getElementById('filePhotoE1');

    actualBtnP1.addEventListener('change', function(){

        fileChosenP1.textContent = this.files[0].name;
        TmpPath = URL.createObjectURL(this.files[0]);
        $('#imagenFilePhoto1').attr('src', TmpPath);
    });

    const actualBtnP2 = document.getElementById('filePhoto2');
    const fileChosenP2 = document.getElementById('filePhotoE2');

    actualBtnP2.addEventListener('change', function(){

        fileChosenP2.textContent = this.files[0].name;
        TmpPath = URL.createObjectURL(this.files[0]);
        $('#imagenFilePhoto2').attr('src', TmpPath);
    });

    const actualBtnP3 = document.getElementById('filePhoto3');
    const fileChosenP3 = document.getElementById('filePhotoE3');

    actualBtnP3.addEventListener('change', function(){

        fileChosenP3.textContent = this.files[0].name;
        TmpPath = URL.createObjectURL(this.files[0]);
        $('#imagenFilePhoto3').attr('src', TmpPath);
    });

    const actualBtnP4 = document.getElementById('filePhoto4');
    const fileChosenP4 = document.getElementById('filePhotoE4');

    actualBtnP4.addEventListener('change', function(){

        fileChosenP4.textContent = this.files[0].name;
        TmpPath = URL.createObjectURL(this.files[0]);
        $('#imagenFilePhoto4').attr('src', TmpPath);
    });
 </script>