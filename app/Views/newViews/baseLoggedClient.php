<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Nucleova Pro</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        
        <link href="<?php echo base_url('')?>/public/sergio/assets/bootstrap4/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="<?php echo base_url('')?>/public/sergio/assets/css/customStyles.css" rel="stylesheet" type="text/css">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
        <!--link href="<?php echo base_url('')?>/public/assets/bootstrap4/css/bootstrap.min.css" rel="stylesheet" type="text/css"-->
        <!--link href="<?php echo base_url('')?>/public/assets/css/customStyles.css" rel="stylesheet" type="text/css"-->
        <!-- Tempus Dominus Styles -->
        <link href="https://cdn.jsdelivr.net/gh/Eonasdan/tempus-dominus@master/dist/css/tempus-dominus.css" rel="stylesheet" crossorigin="anonymous">    
    </head>
    <body>
        <nav class="navbar navbar-expand-sm navbar-dark bottom30 bg-blue">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <div class="logo-image">
                        <img src="<?php echo base_url('')?>/public/sergio/assets/images/isoWhite.png" class="img-fluid">
                        
                    </div>
                </a> 
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Buscar Proveedores</a>
                    </li>                  
                </ul>
                    
                <ul class="navbar-nav ml-auto">
                    <!--li class="nav-item active">
                        <a class="nav-link" href="#">Historial</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Mis Proveedores <span class="badge rounded-pill bg-danger">2</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Requerimientos <span class="badge rounded-pill bg-danger">10</span></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Mi cuenta</a>
                        <div class="dropdown-menu" aria-labelledby="dropdownId">
                            <a class="dropdown-item" href="#">Mi perfil</a>
                            <a class="dropdown-item" href="#">Cerrar Sesión</a>
                        </div>
                    </li-->
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
                            <a class="nav-link" href="<?php echo base_url('/suscripcion'); ?>"><b>Suscripcion</b></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo base_url('/')?>">Version gratuita</a>
                            </li>
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
                <?php elseif(session()->get('isLoggedIn') && session()->get('tipo') == 2): ?>
                    <div class="col align-self-end">
                        <ul class="navbar-nav d-flex justify-content-between">
                            <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url('/'); ?>"><b>Inicio</b></a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link" href="<?php echo base_url('/suscripcion'); ?>"><b>Suscripcion</b></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo base_url('/')?>">Version gratuita</a>
                            </li>
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
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url('/')?>">Version gratuita</a>
                    </li>
                <?php endif;?>
                </ul>
                    
                
            </div>
        </nav>
    
    </body>
</html>