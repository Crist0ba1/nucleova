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
                                <button type="button" class=" btn-close btn-close-white float-end" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Cancelar requerimiento" aria-label="Close"></button>
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
                            <h4 class="card-title text-center">Detalles Cliente</h4>
                            <p class="card-text">Nullam id dolor id nibh ultricies vehicula ut id elit. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus.</p>
                        </div>
                    </div>
                    <div class="card bg-gray text-secondary">
                        <div class="card-body">
                            <h4 class="card-title text-center">Titulo</h4>
                            <p class="card-text">Nullam id dolor id nibh ultricies vehicula ut id elit. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus.</p>
                        </div>
                        <div class="card-body text-center">
                            <a href="url">Ver imágenes</a>
                        </div>
                    </div>
                    <div class="card bg-gray text-secondary">
                    <div class="card-body">
                            <!-- se encuentran las 3 badges de estado, seleccionar al cargar datos -->
                            <span class="badge rounded-pill bg-danger float-end">Pendiente</span>
                            <!--span class="badge rounded-pill bg-warning float-end">En Proceso</span-->
                            <!--span class="badge rounded-pill bg-success float-end">Finalizado</span-->
                            <div class="row">
                                <div class="col">
                                    <div class="row">
                                        <div class="col"><strong>Publicado:</strong></div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <p>25/06/2021 - 23:50</p>
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
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="card border-white">
                    <div class="card-body">
                        <div class="col">
                            <!-- botones se ponen disabled segun estado, finalizar cambia a boton comentado -->
                            <div class="row"><button type="button" class="btn btn-primary btn-block bottom10 btn-purple text-start"><span class="fa-regular fa-reply"></span> Enviar Respuesta</button></div>
                            <div class="row"><button type="button" class="btn btn-primary btn-block bottom10 btn-purple text-start"><span class="fa-regular fa-calendar-xmark"></span> Reagendar</button></div>
                            <div class="row"><button type="button" class="btn btn-primary btn-block bottom10 btn-purple text-start"><span class="fa-regular fa-comment"></span> Chat<span class="badge rounded-pill bg-danger float-sm-end">5</span></button></div>
                            <div class="row"><button type="button" class="btn btn-primary btn-block bottom10 btn-yellow text-start"><span class="fa-regular fa-check"></span> Finalizar</button></div>
                            <div class="row"><button type="button" class="btn btn-primary btn-block bottom10 btn-success text-start"><span class="fa-regular fa-check"></span> Finalizado</button></div>
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
    


  