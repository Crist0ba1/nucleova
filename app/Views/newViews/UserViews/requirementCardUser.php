<div class="card bottom20 border-blue">
    <div class="card-body">
        <div class="card-group bottom10">
            <div class="card bg-blue">
                <div class="card-body">
                    <h5 class="card-title text-light text-center">Cliente</h5>
                </div>
            </div>
            <div class="card bg-blue">
                <div class="card-body">
                    <h5 class="card-title text-light text-center">Problemática</h5>
                </div>
            </div>
            <div class="card bg-blue">
                <div class="card-body">
                    <h5 class="card-title text-light text-center">Respuesta</h5>
                </div>
            </div>
            <div class="card bg-blue">
                <div class="card-body">
                    <div class="row">
                            <div class="col">
                                <h5 class="card-title text-light text-center">Opciones</h5>
                            </div>
                            <div class="col">
                                <!-- el boton se pone disabled en estado finalizado -->
                                <button onclick="cancelarRequerimiento(<?php echo $row['idR']?>)" type="button" class=" btn-close btn-close-white float-end" data-toggle="tooltip" data-placement="bottom" title="Cancelar requerimiento" aria-label="Close"></button>
                            </div>
                        </div>
                    </div>
            </div>
        </div> 
        <div class="row">
            <div class="col-9">
                <div class="card-group">
                    <div class="card bg-gray text-secondary">
                        <div class="card-body">
                            <?php $aux = $subCategoria[$row['subCat']]['refCat']?>
                            <h4 class="card-title text-center"> <?php echo $categoria[$aux]['nombre']?> </h4>
                            <p class="card-text"><?php echo $subCategoria[$row['subCat']]['nombreSub']?> </p>
                        </div>
                    </div>
                    <div class="card bg-gray text-secondary">
                        <div class="card-body">
                            <h4 class="card-title text-center"><?php echo $row['titulo']?></h4>
                            <p class="card-text"><?php echo $row['descripcion']?>.</p>
                        </div>
                        <div class="card-body text-center">
                        <a class="btn btn-primary btn-block bottom10 text-start text-white" onclick="verImagenesR()"><i class="fa fa-eye" aria-hidden="true"></i> Ver imágenes</a>
                        </div>
                    </div>
                    <div class="card bg-gray text-secondary">
                    <div class="card-body">

                            <?php if($row['estado'] == 0):?>
                                <span class="badge rounded-pill bg-danger float-end">Cancelado</span>
                                <div class="row">
                                    <div class="col">
                                        <div class="row">
                                            <div class="col"><strong>Publicado:</strong></div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <p><?php echo $row['fechaPublicado']?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            <?php elseif($row['estado'] == 1):?>
                                <span class="badge rounded-pill bg-warning float-end">Pendiente</span>
                                <div class="row">
                                    <div class="col">
                                        <div class="row">
                                            <div class="col"><strong>Publicado:</strong></div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <p><?php echo $row['fechaPublicado']?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="row">
                                            <div class="col"><strong>Fecha inicio:</strong></div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class='input-group' id='dtpBegin' data-td-target-input='nearest' data-td-target-toggle='nearest'>
                                                    <input id='dtpBeginInput' type='text' class='form-control' data-td-target='#dtpBegin'/>
                                                    <span class='input-group-text' data-td-target='#dtpBegin' data-td-toggle='datetimepicker'><span class='fa fa-calendar'></span></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="row">
                                            <div class="col"><strong>Fecha tentativa:</strong></div>
                                        </div>
                                        <div class="row">
                                            <div class="col">                                            
                                                <div class='input-group' id='dtpTentative' data-td-target-input='nearest' data-td-target-toggle='nearest'>
                                                    <input id='dtpTentativeInput' type='text' class='form-control' data-td-target='#dtpTentative'/>
                                                    <span class='input-group-text' data-td-target='#dtpTentative' data-td-toggle='datetimepicker'><span class='fa fa-calendar'></span></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="row">
                                            <div class="col"><strong>Fecha Finalización</strong></div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <hr>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php elseif($row['estado']== 2):?>
                                <span class="badge rounded-pill bg-warning float-end">En Proceso</span>
                                <div class="row">
                                    <div class="col">
                                        <div class="row">
                                            <div class="col"><strong>Publicado:</strong></div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <p><?php echo $row['fechaPublicado']?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="row">
                                            <div class="col"><strong>Fecha inicio:</strong></div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class='input-group' id='dtpBegin' data-td-target-input='nearest' data-td-target-toggle='nearest'>
                                                    <input id='dtpBeginInput' type='text' class='form-control' data-td-target='#dtpBegin'/>
                                                    <span class='input-group-text' data-td-target='#dtpBegin' data-td-toggle='datetimepicker'><span class='fa fa-calendar'></span></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="row">
                                            <div class="col"><strong>Fecha tentativa:</strong></div>
                                        </div>
                                        <div class="row">
                                            <div class="col">                                            
                                                <div class='input-group' id='dtpTentative' data-td-target-input='nearest' data-td-target-toggle='nearest'>
                                                    <input id='dtpTentativeInput' type='text' class='form-control' data-td-target='#dtpTentative'/>
                                                    <span class='input-group-text' data-td-target='#dtpTentative' data-td-toggle='datetimepicker'><span class='fa fa-calendar'></span></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="row">
                                            <div class="col"><strong>Fecha Finalización</strong></div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <hr>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php else:?>                            
                                <span class="badge rounded-pill bg-success float-end">Finalizado</span>
                                <div class="row">
                                    <div class="col">
                                        <div class="row">
                                            <div class="col"><strong>Publicado:</strong></div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <p><?php echo $row['fechaPublicado']?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="row">
                                            <div class="col"><strong>Fecha inicio:</strong></div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class='input-group' id='dtpBegin' data-td-target-input='nearest' data-td-target-toggle='nearest'>
                                                    <input id='dtpBeginInput' type='text' class='form-control' data-td-target='#dtpBegin'/>
                                                    <span class='input-group-text' data-td-target='#dtpBegin' data-td-toggle='datetimepicker'><span class='fa fa-calendar'></span></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="row">
                                            <div class="col"><strong>Fecha tentativa:</strong></div>
                                        </div>
                                        <div class="row">
                                            <div class="col">                                            
                                                <div class='input-group' id='dtpTentative' data-td-target-input='nearest' data-td-target-toggle='nearest'>
                                                    <input id='dtpTentativeInput' type='text' class='form-control' data-td-target='#dtpTentative'/>
                                                    <span class='input-group-text' data-td-target='#dtpTentative' data-td-toggle='datetimepicker'><span class='fa fa-calendar'></span></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="row">
                                            <div class="col"><strong>Fecha Finalización</strong></div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <hr>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endif;?>
                            


                            <!-- se encuentran las 3 badges de estado, seleccionar al cargar datos -->
                            <!--span class="badge rounded-pill bg-danger float-end">Pendiente</span-->
                            <!--span class="badge rounded-pill bg-warning float-end">En Proceso</span-->
                            <!--span class="badge rounded-pill bg-success float-end">Finalizado</span-->

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="card border-white">
                    <div class="card-body">
                        <div class="col">
                            <!-- botones se ponen disabled segun estado, finalizar cambia a boton comentado -->
                            <?php if($row['estado'] == 0):?>
                                <div class="row"><button type="button" class="btn btn-primary btn-block bottom10 btn-purple text-start"><span class="fa-regular fa-comment"></span> Chat</button></div>
                            <?php elseif($row['estado'] == 1):?>
                                <div class="row"><button type="button" class="btn btn-primary btn-block bottom10 btn-purple text-start"><span class="fa-regular fa-reply"></span> Enviar Respuesta</button></div>                    
                                <div class="row"><button type="button" class="btn btn-primary btn-block bottom10 btn-purple text-start"><span class="fa-regular fa-comment"></span> Chat</button></div>
                                <div class="row"><button type="button" class="btn btn-primary btn-block bottom10 btn-yellow text-start"><span class="fa-regular fa-check"></span> Finalizar</button></div>
                            <?php elseif($row['estado'] == 2):?>
                            <?php endif;?>
                            <!--div class="row"><button type="button" class="btn btn-primary btn-block bottom10 btn-purple text-start"><span class="fa-regular fa-reply"></span> Enviar Respuesta</button></div-->
                            <!--div class="row"><button type="button" class="btn btn-primary btn-block bottom10 btn-purple text-start"><span class="fa-regular fa-calendar-xmark"></span> Reagendar</button></div-->
                            <!--div class="row"><button type="button" class="btn btn-primary btn-block bottom10 btn-purple text-start"><span class="fa-regular fa-comment"></span> Chat</button></div-->
                            <!--div class="row"><button type="button" class="btn btn-primary btn-block bottom10 btn-yellow text-start"><span class="fa-regular fa-check"></span> Finalizar</button></div-->
                            <!--div class="row"><button type="button" class="btn btn-primary btn-block bottom10 btn-success text-start"><span class="fa-regular fa-check"></span> Finalizado</button></div-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> 
<script>
    new tempusDominus.TempusDominus(document.getElementById('dtpTentative'));
    new tempusDominus.TempusDominus(document.getElementById('dtpBegin'));
</script>
    


  