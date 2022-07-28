<!doctype html>
<html lang="en">
    <head>
              
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
        <link href="../assets/bootstrap5/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="../assets/css/customStyles.css" rel="stylesheet" type="text/css">
        <!-- Tempus Dominus Styles -->
        <link href="https://cdn.jsdelivr.net/gh/Eonasdan/tempus-dominus@master/dist/css/tempus-dominus.css" rel="stylesheet" crossorigin="anonymous">
        </-- Star Rating -->
        <link href="../assets/starRating/css/star-rating.css" media="all" rel="stylesheet" type="text/css"/>
        <link href="../assets/starRating/themes/krajee-fas/theme.css" media="all" rel="stylesheet" type="text/css"/>
        <link href="../assets/starRating/themes/krajee-svg/theme.css" media="all" rel="stylesheet" type="text/css"/>
           

    </head>
    <body>
        <!-- Modal Ingresar Requerimiento-->
        <!-- Botón para prueba -->
        <button type="button" class="btn btn-primary top10 bottom10" data-bs-toggle="modal" data-bs-target="#modalIngresarReq">Ingresar Requerimiento</button>
        <!-- Modal-->
        <div class="modal fade" id="modalIngresarReq" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Ingresar Requerimiento</h4>
                        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="col">
                            <div class="row">
                                <div class="col">
                                    <select class="form-select bottom10">
                                        <option selected>Categoría</option>
                                        <option value="1">Otra opcion 1</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <select class="form-select bottom10" >
                                        <option selected>Subcategoría</option>
                                        <option value="1">Otra opcion 1</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <select class="form-select bottom10">
                                        <option selected>Prestador de servicio</option>
                                        <option value="1">Otra opcion 1</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label for="exampleFormControlInput1" class="form-label">Título Requerimiento</label>
                                    <input type="text" class="form-control bottom5" id="inputTitleReq">
                                </div>
                            </div>                            
                            <div class="row">
                                <div class="col">
                                    <label for="textDescriptionReq" class="form-label">Descripción</label>
                                    <textarea class="form-control bottom10" id="textDescriptionReq" rows="3"></textarea>
                                </div>
                            </div>                            
                            <div class="row">
                                <div class="d-grid gap-2 col-6">
                                    <button class="btn btn-blue text-light text-start" type="button"><span class="fa-solid fa-image"></span> Adjuntar Imágenes</button>
                                </div>
                            </div>
                           
                        </div>
                    </div>
                    <div class="modal-footer" style="display: block;">
                        <div class="col">
                            <div class="row">
                                <div class="d-grid gap-2 col-6">
                                    <button class="btn btn-purple text-light text-start" type="button" style="display: inline-block;"><span class="fa-regular fa-check"></span> Confirmar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Editar Requerimiento-->
        <!-- Botón para prueba -->
        <button type="button" class="btn btn-primary top10 bottom10" data-bs-toggle="modal" data-bs-target="#modalEditarReq">Editar Requerimiento</button>
        <!-- Modal-->
        <div class="modal fade" id="modalEditarReq" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Editar Requerimiento</h4>
                        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="col">
                            <div class="row">
                                <div class="col">
                                    <select class="form-select bottom10" aria-label="Default select example">
                                        <option selected>Opcion seleccionada</option>
                                        <option value="1">Otra opcion 1</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <label for="exampleFormControlInput1" class="form-label">Título Requerimiento</label>
                                    <input type="text" class="form-control bottom5" id="inputTitleReq">
                                </div>
                            </div>                            
                            <div class="row">
                                <div class="col">
                                    <label for="textDescriptionReq" class="form-label">Descripción</label>
                                    <textarea class="form-control bottom10" id="textDescriptionReq" rows="3"></textarea>
                                </div>
                            </div>                            
                            <div class="row">
                                <div class="d-grid gap-2 col-6">
                                    <button class="btn btn-blue text-light text-start" type="button"><span class="fa-solid fa-image"></span> Adjuntar Imágenes</button>
                                </div>
                            </div>
                           
                        </div>
                    </div>
                    <div class="modal-footer" style="display: block;">
                        <div class="col">
                            <div class="row">
                                <div class="d-grid gap-2 col-6">
                                    <button class="btn btn-purple text-light text-start" type="button" style="display: inline-block;"><span class="fa-regular fa-check"></span> Confirmar</button>
                                </div>
                                <div class="d-grid gap-2 col-6">
                                    <button class="btn btn-purple text-light text-start" type="button" style="display: inline-block;"><span class="fa-regular fa-xmark"></span> Cancelar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Cancelar Requerimiento-->
        <!-- Botón para prueba -->
        <button type="button" class="btn btn-primary top10 bottom10" data-bs-toggle="modal" data-bs-target="#modalCancelarReq">Cancelar Requerimiento</button>
        <!-- Modal-->
        <div class="modal fade" id="modalCancelarReq" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Cancelar Requerimiento</h4>
                        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-center">
                        <p>¿Seguro que desea cancelar el Requerimiento?</p>
                    </div>
                    <div class="modal-footer" style="display: block;">
                        <div class="col">
                            <div class="row">
                                <div class="d-grid gap-2 col-6">
                                    <button class="btn btn-purple text-light text-start" type="button" style="display: inline-block;"><span class="fa-regular fa-check"></span> Confirmar</button>
                                </div>
                                <div class="d-grid gap-2 col-6">
                                    <button class="btn btn-purple text-light text-start" type="button" style="display: inline-block;"><span class="fa-regular fa-xmark"></span> Cancelar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Finalizar Requerimiento incompleto-->
        <!-- Botón para prueba -->
        <button type="button" class="btn btn-primary top10 bottom10" data-bs-toggle="modal" data-bs-target="#modalFinReqInc">Finalizar Requerimiento incompleto</button>
        <!-- Modal-->
        <div class="modal fade" id="modalFinReqInc" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Finalizar Requerimiento</h4>
                        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="col">
                            <div class="row">
                                <div class="col">                               
                                    <div class="form-check">
                                        <input id="formCheck-1" class="form-check-input" type="checkbox" />
                                        <label class="form-check-label" for="formCheck-1">El proveedor no respondió el requerimiento</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-check">
                                        <input id="formCheck-1" class="form-check-input" type="checkbox" />
                                        <label class="form-check-label" for="formCheck-1">El proveedor no finalizó el requerimiento</label>
                                    </div>
                                </div>
                            </div>                            
                            <div class="row">
                                <div class="col">
                                    <div class="form-check">
                                        <input id="formCheck-1" class="form-check-input" type="checkbox" />
                                        <label class="form-check-label" for="formCheck-1">El proveedor no cumple los horarios establecidos</label>
                                    </div>
                                </div>
                            </div>                            
                            <div class="row">
                                <div class="col">
                                    <div class="form-check">
                                        <input id="formCheck-1" class="form-check-input" type="checkbox" />
                                        <label class="form-check-label" for="formCheck-1">Otro</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <textarea class="form-control bottom10" id="textDescriptionReq" rows="3"></textarea>
                                </div>
                            </div>
                           
                           
                        </div>
                    </div>
                    <div class="modal-footer" style="display: block;">
                        <div class="col">
                            <div class="row">
                                <div class="d-grid gap-2 col-6">
                                    <button class="btn btn-purple text-light text-start" type="button" style="display: inline-block;"><span class="fa-regular fa-check"></span> Finalizar Requerimiento</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Finalizar Requerimiento completo-->
        <!-- Botón para prueba -->
        <button type="button" class="btn btn-primary top10 bottom10" data-bs-toggle="modal" data-bs-target="#modalFinReqCom">Finalizar Requerimiento Completo</button>
        <!-- Modal-->
        <div class="modal fade" id="modalFinReqCom" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Finalizar Requerimiento</h4>
                        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="col">
                            <div class="row">
                                <div class="col">                               
                                    <label for="ratingTrabajo" class="control-label">Trabajo</label>
                                    <input id="ratingTrabajo" name="ratingTrabajo" class="rating rating-loading bottom5" data-size="xs" data-min="0" data-max="5" data-step="1" data-show-clear="false" data-show-caption="false">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">                                                                  
                                    <label for="ratingTiempos" class="control-label">Tiempos</label>
                                    <input id="ratingTiempos" name="ratingTiempos" class="rating rating-loading bottom5" data-size="xs" data-min="0" data-max="5" data-step="1" data-show-clear="false" data-show-caption="false">                                 
                                </div>
                            </div>                            
                            <div class="row">
                                <div class="col">                                                                  
                                    <label for="ratingResponsabilidad" class="control-label">Responsabilidad</label>
                                    <input id="ratingResponsabilidad" name="ratingResponsabilidad" class="rating rating-loading bottom5" data-size="xs" data-min="0" data-max="5" data-step="1" data-show-clear="false" data-show-caption="false">                                 
                                </div>
                            </div>                                                        
                            <div class="row">
                                <div class="col">
                                    <label for="textRatingReq" class="control-label">Observaciones</label>
                                    <textarea class="form-control bottom10" id="textRatingReq" rows="3"></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="d-grid gap-2 col-6">
                                    <button class="btn btn-blue text-light text-start" type="button"><span class="fa-solid fa-image"></span> Adjuntar Imágenes</button>
                                </div>
                            </div> 
                        </div>
                    </div>
                    <div class="modal-footer" style="display: block;">
                        <div class="col">
                            <div class="row">
                                <div class="d-grid gap-2 col-6">
                                    <button class="btn btn-success text-start" type="button" style="display: inline-block;"><span class="fa-regular fa-check"></span> Finalizar Requerimiento</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Eliminar Proveedor-->
        <!-- Botón para prueba -->
        <button type="button" class="btn btn-primary top10 bottom10" data-bs-toggle="modal" data-bs-target="#modalEliminarProveedor">Eliminar proveedor</button>
        <!-- Modal-->
        <div class="modal fade" id="modalEliminarProveedor" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Eliminar Proveedor</h4>
                        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-center">
                        <p>¿Seguro que desea eliminar al proveedor?</p>
                    </div>
                    <div class="modal-footer" style="display: block;">
                        <div class="col">
                            <div class="row">
                                <div class="d-grid gap-2 col-6">
                                    <button class="btn btn-purple text-light text-start" type="button" style="display: inline-block;"><span class="fa-regular fa-check"></span> Confirmar</button>
                                </div>
                                <div class="d-grid gap-2 col-6">
                                    <button class="btn btn-purple text-light text-start" type="button" style="display: inline-block;"><span class="fa-regular fa-xmark"></span> Cancelar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Cancelar Requerimiento Proveedor-->
        <!-- Botón para prueba -->
        <button type="button" class="btn btn-primary top10 bottom10" data-bs-toggle="modal" data-bs-target="#modalCancelarReqProv">Cancelar Requerimiento proveedor</button>
        <!-- Modal-->
        <div class="modal fade" id="modalCancelarReqProv" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Cancelar Requerimiento</h4>
                        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="col">                            
                            <div class="row">
                                <div class="col">
                                    <div class="form-check">
                                        <input id="formCheck-1" class="form-check-input" type="checkbox" />
                                        <label class="form-check-label" for="formCheck-1">El cliente no especificó el requerimiento</label>
                                    </div>
                                </div>
                            </div>                            
                            <div class="row">
                                <div class="col">
                                    <div class="form-check">
                                        <input id="formCheck-1" class="form-check-input" type="checkbox" />
                                        <label class="form-check-label" for="formCheck-1">El cliente no cumple los horarios establecidos</label>
                                    </div>
                                </div>
                            </div>                            
                            <div class="row">
                                <div class="col">
                                    <div class="form-check">
                                        <input id="formCheck-1" class="form-check-input" type="checkbox" />
                                        <label class="form-check-label" for="formCheck-1">Otro</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <textarea class="form-control bottom10" id="textDescriptionReq" rows="3"></textarea>
                                </div>
                            </div>
                           
                           
                        </div>
                    </div>
                    <div class="modal-footer" style="display: block;">
                        <div class="col">
                            <div class="row">
                                <div class="d-grid gap-2 col-6">
                                    <button class="btn btn-purple text-light text-start" type="button" style="display: inline-block;"><span class="fa-regular fa-check"></span> Cancelar Requerimiento</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        
        <!-- Modal Finalizar Requerimiento completo proveedor-->
        <!-- Botón para prueba -->
        <button type="button" class="btn btn-primary top10 bottom10" data-bs-toggle="modal" data-bs-target="#modalFinReqComProv">Finalizar Requerimiento Completo proveedor</button>
        <!-- Modal-->
        <div class="modal fade" id="modalFinReqComProv" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Finalizar Requerimiento</h4>
                        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="col">
                            <div class="row">
                                <div class="col">                               
                                    <label for="ratingTrabajo" class="control-label">Trabajo</label>
                                    <input id="ratingTrabajo" name="ratingTrabajo" class="rating rating-loading bottom5" data-size="xs" data-min="0" data-max="5" data-step="1" data-show-clear="false" data-show-caption="false">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">                                                                  
                                    <label for="ratingTiempos" class="control-label">Tiempos</label>
                                    <input id="ratingTiempos" name="ratingTiempos" class="rating rating-loading bottom5" data-size="xs" data-min="0" data-max="5" data-step="1" data-show-clear="false" data-show-caption="false">                                 
                                </div>
                            </div>                            
                            <div class="row">
                                <div class="col">                                                                  
                                    <label for="ratingResponsabilidad" class="control-label">Responsabilidad</label>
                                    <input id="ratingResponsabilidad" name="ratingResponsabilidad" class="rating rating-loading bottom5" data-size="xs" data-min="0" data-max="5" data-step="1" data-show-clear="false" data-show-caption="false">                                 
                                </div>
                            </div>                                                        
                            <div class="row">
                                <div class="col">
                                    <label for="textRatingReq" class="control-label">Observaciones</label>
                                    <textarea class="form-control bottom10" id="textRatingReq" rows="3"></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="d-grid gap-2 col-6">
                                    <button class="btn btn-blue text-light text-start" type="button"><span class="fa-solid fa-image"></span> Adjuntar Imágenes</button>
                                </div>
                            </div> 
                        </div>
                    </div>
                    <div class="modal-footer" style="display: block;">
                        <div class="col">
                            <div class="row">
                                <div class="d-grid gap-2 col-6">
                                    <button class="btn btn-success text-start" type="button" style="display: inline-block;"><span class="fa-regular fa-check"></span> Finalizar Requerimiento</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        



        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
        <script src="../assets/js/jquery-3.6.0.min.js"></script>
        <script src="../assets/bootstrap5/js/bootstrap.min.js"></script>
        <!-- Tempus Dominus JavaScript -->
        <script src="https://cdn.jsdelivr.net/gh/Eonasdan/tempus-dominus@master/dist/js/tempus-dominus.js" crossorigin="anonymous"></script>
        </-- Star Rating -->
        <script src="../assets/starRating/js/star-rating.js" type="text/javascript"></script>
        <script src="../assets/starRating/themes/krajee-fas/theme.js" type="text/javascript"></script>
        <script src="../assets/starRating/themes/krajee-svg/theme.js" type="text/javascript"></script>

    </body>
</html>