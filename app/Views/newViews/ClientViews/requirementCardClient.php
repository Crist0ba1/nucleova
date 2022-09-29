<div class="card bottom20 border-blue">      
    <div class="card-body">
        <div class="card-group bottom10">
            <div class="card bg-blue">
                <div class="card-body">
                    <h5 class="card-title text-light text-center">Resumen</h5>
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
                            <?php if($row['estado'] == 0):?>
                                <button onclick="eliminarRequerimiento(<?php echo $row['idR']?>)" type="button" class=" btn-close btn-close-white float-end" data-toggle="tooltip" data-placement="bottom" title="Cancelar requerimiento" aria-label="Close"></button>
                            <?php elseif($row['estado'] == 1):?>
                                <button onclick="eliminarRequerimiento(<?php echo $row['idR']?>)" type="button" class=" btn-close btn-close-white float-end" data-toggle="tooltip" data-placement="bottom" title="Cancelar requerimiento" aria-label="Close"></button>
                            <?php elseif($row['estado'] == 2):?>
                                <button onclick="noEliminaRequerimiento()" type="button" class=" btn-close btn-close-white float-end" data-toggle="tooltip" data-placement="bottom" title="Cancelar requerimiento" aria-label="Close"></button>
                            <?php elseif($row['estado'] == 3):?>
                                <button onclick="noEliminaRequerimiento()" type="button" class=" btn-close btn-close-white float-end" data-toggle="tooltip" data-placement="bottom" title="Cancelar requerimiento" aria-label="Close"></button>
                            <?php else:?>
                                <button onclick="noEliminaRequerimiento()" type="button" class=" btn-close btn-close-white float-end" data-toggle="tooltip" data-placement="bottom" title="Cancelar requerimiento" aria-label="Close"></button>
                            <?php endif;?>
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
                            <?php $aux = $subCategoria[$row['subCat']-1]['refCat']?>
                            <h4 class="card-title text-center"> <?php echo $categoria[$aux-1]['nombre']?> </h4>
                            <p class="card-text"><?php echo $subCategoria[$row['subCat']-1]['nombreSub']?> </p>
                        </div>
                    </div>
                    <div class="card bg-gray text-secondary">
                        <div class="card-body">
                            <h4 class="card-title text-center"><?php echo $row['titulo']?></h4>
                            <p class="card-text"><?php echo $row['descripcion']?>.</p>
                        </div>
                        <div class="card-body text-center">
                            <a class="btn btn-primary btn-block bottom10 text-start text-white" onclick="verImagenes(<?php echo $row['idR']?>)"><i class="fa fa-eye" aria-hidden="true"></i> Ver imágenes</a>
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
                                <div class="row">
                                    <div class="col">
                                        <div class="row">
                                            <div class="col"><strong>Fecha inicio:</strong></div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <p></p>
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
                                                <p></p>
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
                                                <p></p>
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
                                                <p></p>
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
                                                <p></p>
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
                                                <p></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            <?php elseif($row['estado']== 2):?>
                                <span class="badge rounded-pill bg-primary float-end">En Proceso</span>
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
                                                <p><?php echo $row['fechaInicio']?></p>
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
                                                <p><?php echo $row['fechaTentativa']?></p>
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
                                                <p></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php elseif($row['estado']== 3):?>
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
                                                <p><?php echo $row['fechaInicio']?></p>
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
                                                <p><?php echo $row['fechaTentativa']?></p>
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
                                                <p><?php echo $row['fechaFinalizado']?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php elseif($row['estado']== 5):?>
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
                                                <p><?php echo $row['fechaInicio']?></p>
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
                                                <p><?php echo $row['fechaTentativa']?></p>
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
                                                <p></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php elseif($row['estado']== 4):?>
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
                                                <p><?php echo $row['fechaInicio']?></p>
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
                                                <p><?php echo $row['fechaTentativa']?></p>
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
                                                <p><?php echo $row['fechaFinalizado']?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php elseif($row['estado']== 4):?>
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
                                                <p><?php echo $row['fechaInicio']?></p>
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
                                                <p><?php echo $row['fechaTentativa']?></p>
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
                                                <p><?php echo $row['fechaFinalizado']?></p>
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
                                                <p>25/06/2021 - 23:50</p>
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
                                                <p>25/06/2021 - 23:50</p>
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
                                                <p>25/06/2021 - 23:50</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endif;?>
                           
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
                                <!--div class="row"><button type="button" onclick="editarRequerimiento(<?php echo $row['idR']?>)" class="btn btn-primary btn-block bottom10 btn-purple text-start"><span class="fa fa-pencil"></span> Editar</button></div-->
                                <div class="row"><button type="button" onclick="chatWhatsap(<?php echo $row['idR']?>)" class="btn btn-primary btn-block bottom10 btn-purple text-start"><span class="fa fa-comment"></span> Chat</button></div>
                            <?php elseif($row['estado'] == 1):?>
                                <!--div class="row"><button type="button" onclick="editarRequerimiento(<?php echo $row['idR']?>)" class="btn btn-primary btn-block bottom10 btn-purple text-start"><span class="fa fa-pencil"></span> Editar</button></div-->
                                <div class="row"><button type="button" onclick="chatWhatsap(<?php echo $row['idR']?>)" class="btn btn-primary btn-block bottom10 btn-purple text-start"><span class="fa fa-comment"></span> Chat</button></div>
                                <div class="row"><button type="button" onclick="finalizarRequerimientoM(<?php echo $row['idR']?>)" class="btn btn-primary btn-block bottom10 btn-yellow text-start">Finalizar</button></div>
                            <?php elseif($row['estado'] == 2):?>                                
                                <div class="row"><button type="button" onclick="chatWhatsap(<?php echo $row['idR']?>)" class="btn btn-primary btn-block bottom10 btn-purple text-start"><span class="fa fa-comment"></span> Chat</button></div>
                                <div class="row"><button type="button" onclick="finalizarRequerimientoM(<?php echo $row['idR']?>)" class="btn btn-primary btn-block bottom10 btn-yellow text-start">Finalizar</button></div>
                            <?php elseif($row['estado'] == 3):?>
                                <div class="row"><button type="button" onclick="chatWhatsap(<?php echo $row['idR']?>)" class="btn btn-primary btn-block bottom10 btn-purple text-start"><span class="fa fa-comment"></span> Chat</button></div>
                                <div class="row"><button type="button" onclick="finalizarRequerimientoB(<?php echo $row['idR']?>)" class="btn btn-primary btn-block bottom10 btn-success text-start"><span class="fa fa-check"></span> Finalizar</button></div>
                            <?php elseif($row['estado'] == 4):?>
                                <!--div class="row"><button type="button" onclick="chatWhatsap(<?php echo $row['idR']?>)" class="btn btn-primary btn-block bottom10 btn-purple text-start"><span class="fa fa-comment"></span> Chat</button></div>
                                <div class="row"><button type="button" onclick="finalizarRequerimientoB(<?php echo $row['idR']?>)" class="btn btn-primary btn-block bottom10 btn-success text-start"><span class="fa fa-check"></span> Finalizar</button></div-->
                            <?php elseif($row['estado'] == 5):?>
                                <div class="row"><button type="button" onclick="chatWhatsap(<?php echo $row['idR']?>)" class="btn btn-primary btn-block bottom10 btn-purple text-start"><span class="fa fa-comment"></span> Chat</button></div>
                                <div class="row"><button type="button" class="btn btn-primary btn-block bottom10 btn-warning text-start" disabled><span class="fa fa-check"></span> Finalizado</button></div>
                                <div class="row"><button type="button"  onclick="verRporteRequerimientoM(<?php echo $row['idR']?>)" class="btn btn-primary btn-block bottom10 btn-warning text-start"><span class="fa fa-eye"></span> Ver reporte</button></div>
                            <?php else:?>
                                <!--div class="row"><button type="button" onclick="editarRequerimiento(<?php echo $row['idR']?>)" class="btn btn-primary btn-block bottom10 btn-purple text-start" disabled><span class="fa fa-pencil"></span> Editar</button></div-->
                                <div class="row"><button type="button" onclick="chatWhatsap(<?php echo $row['idR']?>)" class="btn btn-primary btn-block bottom10 btn-purple text-start"><span class="fa fa-comment"></span> Chat</button></div>
                                <div class="row"><button type="button" class="btn btn-primary btn-block bottom10 btn-yellow text-start"><span class="fa fa-check"></span> Finalizar</button></div>
                                <div class="row"><button type="button" class="btn btn-primary btn-block bottom10 btn-success text-start" disabled><span class="fa fa-check"></span> Finalizado</button></div>
                            <?php endif;?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> 
</div>

<script>

</script>

    


  