<?php
    include("baseGuest.php");
?> 

<div class="container">
    <div class="row">
        <div class="col-sm-3 d-flex">
            <button class="btn bottom15 right10" data-toggle="collapse" data-target="#collapsableFilters" aria-expanded="false" aria-controls="collapsableFilters"><span class="fa-solid fa-grip-lines"></span></button>
            <form class="d-flex bottom15">
                <input class="form-control right15" type="search" placeholder="Buscar" aria-label="Search">
                <button class="btn btn-purple text-light" type="submit"><span class="fa-regular fa-search"></span></button>
            </form>            
        </div>
        <div class="col">
            <div class="d-flex flex-row-reverse bottom15">                              
                <div class="dropdown left5">
                    <a class="btn btn-light dropdown-toggle" href="#" role="button" id="dropOrderBy" data-bs-toggle="dropdown" aria-expanded="false">Ordenar Por</a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <li><a class="dropdown-item" href="#">Nombre</a></li>
                        <li><a class="dropdown-item" href="#">Puntuación</a></li>
                        <li><a class="dropdown-item" href="#">Fecha de ingreso</a></li>
                    </ul>
                </div> 
                <div class="btn-group">
                  <button type="button" class="btn btn-light active"><span class="fa-regular fa-list"></span></button>
                  <button type="button" class="btn btn-light"><span class="fa-regular fa-th"></span></button>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3 collapse" id="collapsableFilters">        
            
            <p class="bottom15"><span class="fa-regular fa-filter"></span> Filtrar por</p>

        
            <div id="accordion-1" class="accordion " role="tablist">
                <div class="accordion-item">
                    <h2 class="accordion-header" role="tab">
                        <button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#accordion-1 .item-1" aria-expanded="false" aria-controls="accordion-1 .item-1">Región</button>
                    </h2>
                    <div class="accordion-collapse collapse item-1" role="tabpanel" data-bs-parent="#accordion-1">
                        <div class="accordion-body" style="padding:0;">
                            <ul class="list-group-flush">
                                <a href="#" class="list-group-item list-group-item-action "><span class="fa-solid fa-caret-right"></span> Arica y Parinacota</a>
                                <a href="#" class="list-group-item list-group-item-action "><span class="fa-solid fa-caret-right"></span> Tarapacá</a>
                                <a href="#" class="list-group-item list-group-item-action "><span class="fa-solid fa-caret-right"></span> Antofagasta</a>
                                <a href="#" class="list-group-item list-group-item-action "><span class="fa-solid fa-caret-right"></span> Atacama</a>
                                <a href="#" class="list-group-item list-group-item-action "><span class="fa-solid fa-caret-right"></span> Coquimbo</a>
                                <a href="#" class="list-group-item list-group-item-action "><span class="fa-solid fa-caret-right"></span> Valparaíso</a>
                                <a href="#" class="list-group-item list-group-item-action "><span class="fa-solid fa-caret-right"></span> Metropolitana de Santiago</a>
                                <a href="#" class="list-group-item list-group-item-action "><span class="fa-solid fa-caret-right"></span> Bernardo O'Higgins</a>
                                <a href="#" class="list-group-item list-group-item-action "><span class="fa-solid fa-caret-right"></span> Maule</a>
                                <a href="#" class="list-group-item list-group-item-action "><span class="fa-solid fa-caret-right"></span> Ñuble</a>
                                <a href="#" class="list-group-item list-group-item-action "><span class="fa-solid fa-caret-right"></span> Biobío</a>
                                <a href="#" class="list-group-item list-group-item-action "><span class="fa-solid fa-caret-right"></span> Araucanía</a>
                                <a href="#" class="list-group-item list-group-item-action "><span class="fa-solid fa-caret-right"></span> Los Ríos</a>
                                <a href="#" class="list-group-item list-group-item-action "><span class="fa-solid fa-caret-right"></span> Los Lagos</a>
                                <a href="#" class="list-group-item list-group-item-action "><span class="fa-solid fa-caret-right"></span> Aysén</a>
                                <a href="#" class="list-group-item list-group-item-action "><span class="fa-solid fa-caret-right"></span> Magallanes y la Antártica</a>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" role="tab">
                        <button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#accordion-1 .item-2" aria-expanded="false" aria-controls="accordion-1 .item-2">Ciudad</button>
                    </h2>
                    <div class="accordion-collapse collapse item-2" role="tabpanel" data-bs-parent="#accordion-1">
                        <div class="accordion-body" style="padding:0;">
                            <ul class="list-group-flush"> 
                                <a href="#" class="list-group-item list-group-item-action "><span class="fa-solid fa-caret-right"></span> Ciudad 1</a>
                                <a href="#" class="list-group-item list-group-item-action "><span class="fa-solid fa-caret-right"></span> Ciudad 2</a>
                                <a href="#" class="list-group-item list-group-item-action "><span class="fa-solid fa-caret-right"></span> Ciudad 3</a>
                                <a href="#" class="list-group-item list-group-item-action "><span class="fa-solid fa-caret-right"></span> Ciudad 4</a>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" role="tab"><button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#accordion-1 .item-3" aria-expanded="false" aria-controls="accordion-1 .item-3">Categoría</button></h2>
                    <div class="accordion-collapse collapse item-3" role="tabpanel" data-bs-parent="#accordion-1">
                        <div class="accordion-body">
                            <ul class="list-group-flush">
                                <a href="#" class="list-group-item list-group-item-action "><span class="fa-solid fa-caret-right"></span> Categoría 1</a>
                                <a href="#" class="list-group-item list-group-item-action "><span class="fa-solid fa-caret-right"></span> Categoría 2</a>
                                <a href="#" class="list-group-item list-group-item-action "><span class="fa-solid fa-caret-right"></span> Categoría 3</a>
                                <a href="#" class="list-group-item list-group-item-action "><span class="fa-solid fa-caret-right"></span> Categoría 4</a>
                                <a href="#" class="list-group-item list-group-item-action "><span class="fa-solid fa-caret-right"></span> Categoría 5</a>
                                <a href="#" class="list-group-item list-group-item-action "><span class="fa-solid fa-caret-right"></span> Categoría 6</a>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" role="tab"><button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#accordion-1 .item-4" aria-expanded="false" aria-controls="accordion-1 .item-3">Subcategoría</button></h2>
                    <div class="accordion-collapse collapse item-4" role="tabpanel" data-bs-parent="#accordion-1">
                        <div class="accordion-body">
                            <ul class="list-group-flush">
                                <a href="#" class="list-group-item list-group-item-action "><span class="fa-solid fa-caret-right"></span> Subcategoría 1</a>
                                <a href="#" class="list-group-item list-group-item-action "><span class="fa-solid fa-caret-right"></span> Subcategoría 2</a>
                                <a href="#" class="list-group-item list-group-item-action "><span class="fa-solid fa-caret-right"></span> Subcategoría 3</a>
                                <a href="#" class="list-group-item list-group-item-action "><span class="fa-solid fa-caret-right"></span> Subcategoría 4</a>
                                <a href="#" class="list-group-item list-group-item-action "><span class="fa-solid fa-caret-right"></span> Subcategoría 5</a>
                                <a href="#" class="list-group-item list-group-item-action "><span class="fa-solid fa-caret-right"></span> Subcategoría 6</a>
                            </ul>
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
                <div class="card-deck d-flex justify-content-end">
                    <?php
                        for($i = 0; $i <4; $i++){
                            include("searchResultCardGrid.php");
                        }
                    ?>
                </div>
                <div class="card-deck d-flex justify-content-end">
                    <?php
                        for($i = 0; $i <4; $i++){
                            include("searchResultCardGrid.php");
                        }
                    ?>
                </div>
                <div class="container justify-content-end">
                    <?php
                        for($i = 0; $i <4; $i++){
                            include("searchResultCardList.php");
                        }
                    ?>
                </div>

                
            </div>
            <nav>
                <ul class="pagination justify-content-end">
                    <li class="page-item"><a class="page-link" href="#">Anterior</a></li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">Siguiente</a></li>
                </ul>
            </nav>
        </div>
    </div>
</div>