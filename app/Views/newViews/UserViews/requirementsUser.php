
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
<?php
    include("baseLoggedUser.php");
?>    
    
<div class="container cont60">
    <div id="reqDiv2" class="row">
        <div class="col">
            <?php if(isset($requerimientos) && count($requerimientos) >0):?>
                <?php foreach($requerimientos as $req):?>
                    <?php foreach($req as $row):?>
                        <?php include("requirementCardUser.php");?>
                    <?php endforeach;?>            
                <?php endforeach;?>                                    
            <?php else:?>
                <div class="card bottom20 border-blue">
                    <div class="card-body">
                        <div class="row"> 
                            <h4> Por el momento no tiene requerimientos.</h4>
                        </div>
                    </div>
                </div>    
            <?php endif;?>
        </div>
    </div>
</div>


    <div class="modal fade" id="modalImagenesReq1" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Imagenes del Requerimiento</h4>
                    <button class="btn-close" type="button" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div id="reloadContent1" class="modal-body">
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
    <div class="modal fade" id="modalFinReqInc1" tabindex="-1" aria-hidden="true">
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
                                <button id="btn-finalzarRM1" class="btn btn-purple text-light text-start" onclick="finalzarRM()" type="button" style="display: inline-block;"><span class="fa fa-check"></span> Finalizar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script>
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl)
    })  
</script>
<script>
    function cancelarRequerimiento(idR){
        event.preventDefault();
        $.ajax ({
            type: "get",
            url: "<?php echo base_url('/cancelarRequerimiento')?>/"+idR,
            success: function(data){
                $("#reqDiv2").load(location.href+" #reqDiv2>*","");
                window.location.reload();
            },
            error: function(){
                alert("Error en la llamada ajax, de cancelar requerimiento");
            }
        });
    }
    function noCancelarRequerimiento(idR){
        alert('Un requerimiento en proceso o finalizado no puede ser cancelado');
    }
    function verImagenesR(idR){
        $.ajax ({
            type: "get",
            url: "<?php echo base_url('/getImagenesR')?>/"+idR,
            success: function(data){                
                if(data == 1){                    
                    $("#reloadContent1").load(location.href+" #reloadContent1>*","");
                    setTimeout(() => {
                        $('#modalImagenesReq1').modal();  
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
    function enviarRespuesta(idRespuesta){      
        var inicio = $('#dtpBegin'+idRespuesta).val();
        var final = $('#dtpTentative'+idRespuesta).val();
        alert(inicio);
        
        if(inicio != "" && final !=""){
            event.preventDefault();
            $.ajax ({
                type: "post",
                url: "<?php echo base_url('/respuestaFecha')?>",
                data:{ idReq:idRespuesta, fechaI:inicio , fechaF:final},
                success: function(data){
                    $("#reqDiv2").load(location.href+" #reqDiv2>*","");
                    window.location.reload();
                },
                error: function(){
                    alert("Error en la llamada ajax, del envio de fechas");
                }

            });
        }
        if(inicio == "" || final ==""){
            var text = "Ingrese fecha";
            document.getElementById("error_fecha_"+idRespuesta).innerHTML = text;
            document.getElementById("error_fecha_"+idRespuesta).classList.add("alert");
            document.getElementById("error_fecha_"+idRespuesta).classList.add("alert-danger");
            setInterval(function(){
                var text = "";
                document.getElementById("error_fecha_"+idRespuesta).innerHTML = text;
                document.getElementById("error_fecha_"+idRespuesta).classList.remove("alert");
                document.getElementById("error_fecha_"+idRespuesta).classList.remove("alert-danger");
            }, 3000);
        }
        
    }
    function reagendarFecha(idRespuesta){
        event.preventDefault();
        $.ajax ({
            type: "post",
            url: "<?php echo base_url('/reagendarFecha')?>",
            data:{idReq:idRespuesta},
            success: function(data){
                $("#reqDiv2").load(location.href+" #reqDiv2>*","");
                window.location.reload();
            },
            error: function(){
                alert("Error en la llamada ajax, de reagendar requerimiento");
            }
        });

    }
    function chatWhatsap1(idR){
        $.ajax ({
            type: "get",
            url: "<?php echo base_url('/getNumeroProvedor')?>/"+idR,
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
                window.location.replace("whatsapp://send/?phone="+$telefono+"&text= Estimad@ empresa, le contacto a través de la app de nuecleova" );
            },
            error: function(){
                alert("Error en la llamada ajax, de eliminar requerimiento");
            }
        });
    }
    function finalizarRequerimiento(idR){
        alert('te finalizo');
        $.ajax ({
            type: "post",
            url: "<?php echo base_url('/finalizarRequerimiento')?>",
            data: {idRequerimiento: idR},
            success: function(data){                
                $("#reqDiv2").load(location.href+" #reqDiv2>*","");
                window.location.reload();
            },
            error: function(){
                alert("Error en la llamada ajax, de ver imagenes de requerimiento");
            }
        });
    }
    function verRporteRequerimientoM1(idR){
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
                    $('#btn-finalzarRM1').attr("onclick","closeModal1()");
                    $('#btn-finalzarRM1').html("Cerrar");
                    $('#modalFinReqInc1').modal();

                },
                error: function(){
                    alert("Error en la llamada ajax, de ver reporte");
                }
            });
    }
    function closeModal1(){
        $('#modalFinReqInc1').modal('hide');
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