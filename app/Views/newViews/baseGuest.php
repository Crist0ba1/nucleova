<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Nucleova</title>
        <link rel="shortcut icon"  type="image/png" href="<?php echo base_url('')?>/public/assets/Logos/LogoPequeno.png">
        <!-- bootstrap css-->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">    
        <!-- JS, Popper.js, and jQuery -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
        
        <script src="https://kit.fontawesome.com/c818a46c29.js" crossorigin="anonymous"></script>
        
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css" integrity="sha384-jLKHWM3JRmfMU0A5x5AkjWkw/EYfGUAGagvnfryNV3F9VqM98XiIH7VBGVoxVSc7" crossorigin="anonymous">

        <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.min.css">

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>

        <script src="https://www.google.com/recaptcha/api.js?render=6Le0NLgaAAAAAIv6TEINBxk8KTZA2R3ZJxDoNqns"></script>



        <link href="<?php echo base_url('')?>/public/sergio/assets/css/customStyles.css" rel="stylesheet" type="text/css">
    </head>
    <style>
        @font-face {
            font-family: 'Acumin_Variable_Concept';
            src: url('./public/fuentes/Acumin_Variable_Concept.ttf');
        }
        body{
            font-family:'Acumin_Variable_Concept';
        }
        .carousel-control-prev {
            background-color: rgba(255, 255, 255, 0.3);
            border-radius: 25px;
            box-shadow: 0 0 1px 1px rgba(0, 0, 0, 0.3);
            height: 40px;
        }
        .carousel-control-next {
            background-color: rgba(255, 255, 255, 0.3);
            border-radius: 25px;
            box-shadow: 0 0 1px 1px rgba(0, 0, 0, 0.3);
            height: 40px;
        }
    </style>
    <body>
        <nav class="navbar navbar-expand-sm navbar-dark bottom30 bg-blue">
            <div class="container">
                <a class="navbar-brand" href="<?php echo base_url('/');?>">
                    <div class="logo-image">
                        <img src="<?php echo base_url('')?>/public/sergio/assets/images/isoWhite.png" class="img-fluid">
                    </div>
                </a> 
                                  
                <ul class="navbar-nav ml-auto">
                <?php if(session()->get('isLoggedIn') && session()->get('tipo') == 0): ?><!-- Igual que el usuario FREE -->
                    <div class="col align-self-end">
                        <ul class="navbar-nav d-flex justify-content-between">
                            <li>
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-user-circle"></i> <?= session()->get('nombre') ?>
                                </a>
                                <div class="dropdown-menu" style="right: 0; left: auto;" aria-labelledby="navbarDropdown">
                                    <a id="opacar" class="dropdown-item" href="<?php echo base_url('/dashbordAdmin');?>"><b>Gestion de usuarios</b></a>
                                    <a id="opacar" class="dropdown-item" href="<?php echo base_url('/logout');?>"><b>Cerrar sesion</b></a>
                                </div>
                            </li>
                        </ul>
                    </div>
                <?php elseif(session()->get('isLoggedIn') && session()->get('tipo') == 1): ?><!-- Igual que el usuario FREE -->
                    <div class="col align-self-end">
                        <ul class="navbar-nav d-flex justify-content-between">
                            <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url('/'); ?>"><b>Inicio</b></a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url('/suscripcion'); ?>"><b>Suscripción</b></a>
                            </li>
                            <?php if(session()->has("fecha") && session()->get("fecha") == null):?>
                                <li class="nav-item">                                
                                    <a class="nav-link" href="<?php echo base_url('/')?>">Versión gratuita</a>                                
                                </li>
                            <?php endif;?>    
                            <li>
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-user-circle"></i> <?= session()->get('nombre') ?>
                                </a>
                                <div class="dropdown-menu" style="right: 0; left: auto;" aria-labelledby="navbarDropdown">
                                    <a id="opacar" class="dropdown-item" href="<?php echo base_url('/perfil');?>"><b>Perfil de usuario</b></a>
                                    <a id="opacar" class="dropdown-item" href="<?php echo base_url('/logout');?>"><b>Cerrar sesión</b></a>
                                </div>
                            </li>
                        </ul>
                    </div>
                <?php elseif(session()->get('isLoggedIn') && session()->get('tipo') == 2): ?>
                    <div class="col align-self-end">
                        <ul class="navbar-nav d-flex justify-content-between">
                            <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url('/'); ?>"><b>Inicio</b></a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url('/suscripcion'); ?>"><b>Suscripcion</b></a>
                            </li>
                            <?php if(session()->has("fecha") && session()->get("fecha") == null):?>
                                <li class="nav-item">                                
                                    <a class="nav-link" href="<?php echo base_url('/')?>">Versión gratuita</a>                                
                                </li>
                            <?php endif;?> 
                            <li>
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-user-circle"></i> <?= session()->get('nombre') ?>
                                </a>
                                <div class="dropdown-menu" style="right: 0; left: auto;" aria-labelledby="navbarDropdown">
                                    <a id="opacar" class="dropdown-item" href="<?php echo base_url('/perfil');?>"><b>Perfil de usuario</b></a>
                                    <a id="opacar" class="dropdown-item" href="<?php echo base_url('/logout');?>"><b>Cerrar sesion</b></a>
                                </div>
                            </li>
                        </ul>
                    </div>
                <?php elseif(session()->get('isLoggedIn') && session()->get('tipo') == 3): ?>

                <?php else:?>
                    <?php if(session()->has("fecha") && session()->get("fecha") != null):?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url('/')?>">Versión gratuita</a>
                        </li>
                    <?php endif;?>
                <?php endif;?>
                    <!--li class="nav-item">
                        <a class="nav-link" href="#">Nosotros</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Servicios</a>
                        <div class="dropdown-menu" aria-labelledby="dropdownId">
                            <a class="dropdown-item" href="#">Servicio 1</a>
                            <a class="dropdown-item" href="#">Servicio 2</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Mi cuenta</a>
                        <div class="dropdown-menu" aria-labelledby="dropdownId">
                            <a class="dropdown-item" href="#">Iniciar Sesión</a>
                       
                        </div>
                    </li-->
                   
                </ul>
                    
                
            </div>
        </nav>
          
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
        <script src="<?php echo base_url('')?>/public/sergio/assets/js/jquery-3.6.0.min.js"></script>
        <script src="<?php echo base_url('')?>/public/sergio/assets/bootstrap5/js/bootstrap.min.js"></script>
    </body>
</html>