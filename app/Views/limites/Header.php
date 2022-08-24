<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Nucleova</title>
	<link rel="shortcut icon"  type="image/png" href="<?php echo base_url('')?>/public/assets/Logos/LogoPequeno.png">

	<meta name="description" content="Primera presentacion Nucleova.">

<!-- -->


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


    <style type="text/css" media="screen">
      #logo{
        width: 300px;
        max-width:100%;
        height:100%;
        max-height:300px;
      }
      .nav-gradiente{
        background: rgb(255,255,255);
        background: linear-gradient(90deg, rgba(255,255,255,1) 0%, rgba(192,72,148,1) 50%, rgba(51,26,154,1) 100%);      
        }
      .gradiente{
        /* background-color: #c04894;
        background-image: linear-gradient(180deg, #c04894 0%, #331a9a 33%, #ffffff 66%); */

        background-color: #314a9a;
        background-image: linear-gradient(180deg, #314a9a 0%, #c04894 50%, #ffffff 100%);

      }
      .gradiente3{
        background-color: #314a9a;
      }
      .gradiiente4{
        background-color: #c04894;
      }
      .centrador{
     position: relative;
    }

    .imagen{
        position: absolute;
        width: 80%;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        margin: auto;
    }
    </style>
    
</head>
<body>


<nav class="navbar navbar-expand-lg navbar-light bg-light">

  <div class="row justify-content-between">

    <div class="col">
      <a class="navbar-brand" href="<?php echo base_url('/');?>"><img id="logo" src="<?php echo base_url('')?>/public/assets/Logos/LogoHSF.png" class="img-fluid"></a>
    </div>

      <?php if(session()->get('isLoggedIn') && session()->get('tipo') == 0): ?> 
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
      <?php elseif(session()->get('isLoggedIn') && session()->get('tipo') == 1): ?>
        <div class="col align-self-end">
          <ul class="navbar-nav d-flex justify-content-between">
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url('/'); ?>"><b>Inicio</b></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url('/suscripcion'); ?>"><b>Suscripcion</b></a>
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
            <li>
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fa fa-user-circle"></i> <?= session()->get('nombre') ?>
            </a>
            <div class="dropdown-menu" style="right: 0; left: auto;" aria-labelledby="navbarDropdown">
              <a id="opacar" class="dropdown-item" href="<?php echo base_url('/logout');?>"><b>Cerrar sesion</b></a>
            </div>
          </li>
          </ul>
        </div>
      <?php elseif(session()->get('isLoggedIn') && session()->get('tipo') == 3): ?>
        <div class="col align-self-end">
          <ul class="navbar-nav d-flex justify-content-between">
            <li>
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fa fa-user-circle"></i> <?= session()->get('nombre') ?>
            </a>
            <div class="dropdown-menu" style="right: 0; left: auto;" aria-labelledby="navbarDropdown">
              <a id="opacar" class="dropdown-item" href="<?php echo base_url('/logout');?>"><b>Cerrar sesion</b></a>
            </div>
          </li>
          </ul>
        </div>
      <?php else:?>  
        <div class="col align-self-end">
          <ul class="navbar-nav d-flex justify-content-between">
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url('/login');?>"><b>Iniciar sesion</b> </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url('/registrar'); ?>"><b>Registrarce</b></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url('/suscripcion'); ?>"><b>Suscripcion</b></a>
            </li>
          </ul>
        </div> 
      <?php endif;?> 
  

    
    
    
  </div>

</nav>
<script>

</script>