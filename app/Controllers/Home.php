<?php
namespace App\Controllers;

use CodeIgniter\I18n\Time;
use App\Models\RegionesModel;
use App\Models\ComunasModel;
use App\Models\CategoriasModel;
use App\Models\UssersModel;
use App\Models\PersonaModel;
use App\Models\SubCategoriasModel;
use App\Models\ImagenesModel;

use App\Models\CategoriasListModel;
use App\Models\ComunasListModel;

use monken\TablesIgniter;
class Home extends BaseController
{
    public function index(){
        session()->set("verModal", "1");
        $modelR = new RegionesModel();
		$modelCo = new ComunasModel();
        $modelCategoria = new CategoriasModel();
        $modelSubCategoria = new SubCategoriasModel();
        $data['region'] = $modelR->findAll();
		$data['comuna'] = $modelCo->orderBy('comuna', 'ASC')->findAll();
        $data['categoria'] = $modelCategoria->findAll();
        $data['subCategoria'] = $modelSubCategoria->findAll();
        //die(json_encode(session()->get("tipo")));
        if(session()->has('isLoggedIn') && session()->get('tipo') ==1 && session()->get('fecha') !=null){
            $time = Time::parse(session()->get("fecha"));
            $hoy = new Time('now');
            if(session()->has('tipo') && session()->get('tipo') ==1 && $time->isAfter($hoy)){
                echo view('newViews/ClientViews/baseLoggedClient',$data);
            }else{
                echo view('limites/Header',$data);
                echo view('filtros/Filtros');
            }
        }
        elseif(session()->has('tipo') && session()->get('tipo') >=2 && session()->get('tipo')<=3){
            echo view('newViews/UserViews/baseLoggedUser',$data);
        }else{
            echo view('limites/Header',$data);
            echo view('filtros/Filtros');
        }

        echo view('categorias/categorias');
        echo view('limites/Fother');
    }
    public function register(){
        $modelR = new RegionesModel();
		$modelCo = new ComunasModel();
        $modelCategoria = new CategoriasModel();
        $modelSubCategoria = new SubCategoriasModel();
        $data['region'] = $modelR->findAll();
		$data['comuna'] = $modelCo->orderBy('comuna', 'ASC')->findAll();
        $data['categoria'] = $modelCategoria->findAll();
        $data['subCategoria'] = $modelSubCategoria->findAll();
        echo view('limites/Header',$data);
        echo view('ussers/register');
        //echo view('ussers/AddUsser');
        echo view('limites/Fother');
    }

    /* Persona */
    public function registrarPersona(){
        helper(['form']);

        $model = new PersonaModel();
        $session = session();
        $correo = $this->request->getVar('emailRegister');
        $aux = $this->verifiarCorreoPersona( $correo);

		if($this-> request -> getMethod() == 'post' && !$aux){
            $data['nombre'] = $this->request->getVar('nombre');
            $data['apellidos'] = $this->request->getVar('apellidos');
            $data['clave'] = $this->request->getVar('passwordr1');
            $data['tipo'] = $this->request->getVar('tipoDeCuenta');
            $data['email'] = $this->request->getVar('emailRegister');
            
            if($model->insert($data)){
                $user = $model->where('email', $this->request->getVar('emailRegister'))->first();
                $this->usuarioCreado($this->request->getVar('emailRegister'));
            }else{
                $user=null;
            }
            
            if($user != null){
                $this-> setPersonaSessionRegister($user); // aqui tenemos ya al usuario que corresponde               
                //Se deve enviar el correo de usuario registrado a quien corresponda
                return redirect()->to('/perfil');
            }
            else{
                //return redirect()->to('/registerError');
                die('Murio en el else de usuario');
                $this->registerError();
                   
            }
        
        }
        return redirect()->to('/registerError');
    }
    public function perfil(){
        $modelR = new RegionesModel();
		$modelCo = new ComunasModel();
        $modelCategoria = new CategoriasModel();
        $modelSubCategoria = new SubCategoriasModel();
        $data['region'] = $modelR->findAll();
		$data['comuna'] = $modelCo->orderBy('comuna', 'ASC')->findAll();
        $data['categoria'] = $modelCategoria->findAll();
        $data['subCategoria'] = $modelSubCategoria->findAll();
        $modelU = new UssersModel();
        $model = new PersonaModel();
        $user = $model->where('idPersona', session()->get('id'))->first();
        if($user['otraID'] == null){
            $user2 = null;
        }else{
            $user2 = $modelU->where('idUssers',$user['otraID'])->first();
        }

        if($user2 == null){
            $this->setPersonaSessionRegister($user); /* 1 es imcompleto */
            /*Al que tiene la id como completa */
        }else{
            /* al que tiene la ide como incompleta */
            $this->setPersonaSession($user);
            if(session()->get("tipo") == 1){
                $this->setUserSessionEmpresa($user2);
            }
            if(session()->get("tipo") == 2){
                $this->setUserSessionProveedor($user2);
            }
            if(session()->get("tipo") == 3){
                $this->setUserSessionProveedor($user2);
            }
            
        }
       

        if(session()->get("isComplete") == 0){
           $valor = 0;
        }
        else{
            $valor = 1;
        }
        $data['verModal'] = $valor;

        if(session()->has("isLoggedIn") && session()->get("tipo") == 0 ){ //Admin
            //Redireccionar a la vista de admin
        }

        if(session()->has("fecha") && session()->get("fecha") != null){

            $time = Time::parse(session()->get("fecha"));
            $hoy = new Time('now');
            // Si la fecha en persona es despues que el dia de hoy aun es pro
            if($time->isAfter($hoy)){
                return redirect()->to('/perfilPro');
            }else{
                $data['tiempo'] = NULL;
                $model->where('idPersona', session()->get('id'))->set($data)->update();
                return redirect()->to('/perfil');
            }
        }else{
            if(session()->has("isLoggedIn") && session()->get("tipo") == 1 ){ //Buscador
                echo view('limites/Header',$data);
                echo view('dashbord/Empresa');
                echo view('limites/Fother');
            }
            elseif(session()->has("isLoggedIn") && session()->get("tipo") == 2){//P Persona Natural
                echo view('newViews/UserViews/baseLoggedUser',$data);
                echo view('dashbord/Proveedor');
                echo view('limites/Fother');
            }
            elseif(session()->has("isLoggedIn") && session()->get("tipo") == 3){//P Empresa
                echo view('newViews/UserViews/baseLoggedUser',$data);
                echo view('dashbord/Proveedor');
                echo view('limites/Fother');
            }
            else{
                return redirect()->to('/');
            }
        }
            
    }
    
    private function setPersonaSession($user){
		$data =[
			'id' => $user['idPersona'],
            'otroID' =>$user['otraID'],
			'nombre' => $user['nombre'],
            'apellidos' => $user['apellidos'],
            'tipo' => $user['tipo'],			
            'email' => $user['email'],
			'isLoggedIn' => true,
            'isComplete' => 0,
            'fecha' => $user['tiempo'],
		];
		session()->set($data);
		
		return true;
	}
    private function setPersonaSessionRegister($user){
		$data =[
			'id' => $user['idPersona'],
            'otroID' =>$user['otraID'],
			'nombre' => $user['nombre'],
            'apellidos' => $user['apellidos'],
            'tipo' => $user['tipo'],			
            'email' => $user['email'],
			'isLoggedIn' => true,
            'isComplete' => 1, //uno es incompleto
            'fecha' => $user['tiempo'],
		];
		session()->set($data);
		
		return true;
	}

    private function setUserSessionEmpresa($user){
        $modelI = new ImagenesModel();
        $imagen = $modelI->where('idUsers',$user['idUssers'])->first();
        if($imagen != null && $imagen['imagen1'] != ''){
                $img = $imagen['imagen1'];  
        }
        else{
            $img = 'No';
        }
        //Datos de usuario
        $data =[
			'idEM' => $user['idUssers'],
			'nombreEM' => $user['firstname'],
            'fech_nacEM' => $user['fech_nac'],
            'generoEM' => $user['genero'],			
			'userRegionEM' =>$user['refRegion'],
            'userComunaEM' =>$user['refComuna'],
            'calle' =>$user['calle'],
            'numero' =>$user['numero'],
            'opt' =>$user['optional'],
            'emailEM' => $user['email'],
            'telefonoEM'=>$user['telefono'],
            'imagenEM'=> $img,
            'rf' => $user['rf'],
            'fl' => $user['rl'],
            'ri' => $user['ri'],
			'tipoEM' => $user['tipo'],
            'rzEM' => $user['rz'],
            'rutEM' => $user['rut'],
            'textEM' => $user['text'],
			'isLoggedInEM' => true,
		];
		session()->set($data);
  
		return true;
	} 
    private function setUserSessionProveedor($user){
        $modelI = new ImagenesModel();
        $imagen = $modelI->where('idUsers',$user['idUssers'])->first();
        $img[] = array();
        $contadorAux = 0;
        if($imagen != null){
            if($imagen['imagen1'] != ''){
                $i = $imagen['imagen1'];  
                $img[$contadorAux] =$i;
                $contadorAux++;
            }
            if($imagen['imagen2'] != ''){
                $i = $imagen['imagen2'];  
                $img[$contadorAux] =$i;
                $contadorAux++;
            }  
            if($imagen['imagen3'] != ''){
                $i = $imagen['imagen3'];  
                $img[$contadorAux] =$i;
                $contadorAux++;
            }  
            if($imagen['imagen4'] != ''){
                $i = $imagen['imagen4'];  
                $img[$contadorAux] =$i;
                $contadorAux++;
            }  
            if($imagen['imagen5'] != ''){
                $i = $imagen['imagen5'];  
                $img[$contadorAux] =$i;
                $contadorAux++;
            }      
            
        }

        $modelCL = new CategoriasListModel();
        $catList = $modelCL->where('idUsser', $user['idUssers'])->findAll();

        $modelCoL = new ComunasListModel();
        $comunaList= $modelCoL->where('idUsser', $user['idUssers'])->findAll();

        //Datos de usuario
        $data =[
			'idEM' => $user['idUssers'],
			'nombreEM' => $user['firstname'],
            'fech_nacEM' => $user['fech_nac'],
            'generoEM' => $user['genero'],			
			'userRegionEM' =>$user['refRegion'],
            'userComunaEM' =>$user['refComuna'],
            'calle' =>$user['calle'],
            'numero' =>$user['numero'],
            'opt' =>$user['optional'],
            'emailEM' => $user['email'],
            'telefonoEM'=>$user['telefono'],
            'imagenEM'=> $img,
            'rf' => $user['rf'],
            'fl' => $user['rl'],
            'ri' => $user['ri'],
			'tipoEM' => $user['tipo'],
            'rzEM' => $user['rz'],
            'rutEM' => $user['rut'],
            'textEM' => $user['text'],
			'isLoggedInEM' => true,
            'categoriaList' => $catList,
            'comunaList' => $comunaList,
		];
		session()->set($data);
  
		return true;
	} 
    public function registerError(){
        $modelR = new RegionesModel();
        $modelCo = new ComunasModel();
        session()->set("errorRegister", "yes");
        $modelCategoria = new CategoriasModel();
        $data['region'] = $modelR->findAll();
        $data['comuna'] = $modelCo->orderBy('comuna', 'ASC')->findAll();
        $data['categoria'] = $modelCategoria->findAll();
        echo view('limites/Header',$data);
        echo view('ussers/register');
        echo view('limites/Fother');
    }

    // Perder contraseña INICIO
    public function lostPassword(){
        $modelR = new RegionesModel();
		$modelCo = new ComunasModel();
        $data['region'] = $modelR->findAll();
		$data['comuna'] = $modelCo->orderBy('comuna', 'ASC')->findAll();
        echo view('limites/Header',$data);
        echo view('ussers/forgotPass');
        echo view('limites/Fother');
    }
    public function lostPasswordForm(){
        helper(['form']);
        $correo = "Inicio de variable";
        if($this-> request -> getMethod() == 'post' ){
            $correo = $this->request->getVar('emailFP1');
        }
        
        $aux = $this->verifiarCorreoPersona($correo);
        //$aux = $this->verifiarCorreo($correo);
        if($aux){
            $pass = $this->setNewPass($correo);
            if($aux){
                $bool = $this->correoLostPass($correo, $pass);
                if($bool){
                    $mensaje = "Verifique su correo: ".$correo.".";
                    session()->set("msj_correo", $mensaje); 
                }else{
                    $error = session()->get('errorEmail');
                    $mensaje = "Error, al enviar el correo. Error:".$error.".";
                    session()->set("msj_correo", $mensaje); 
                }
            }
            else{
                session()->set("msj_correo", "Error, verifique la direccion de correo o intente más tarde 1."); 
            }
            
        }else{
            session()->set("msj_correo", "Error, verifique la direccion de correo o intente más tarde 2."); 
        }

        return redirect()->to('/lostPassword');
    }
    private function setNewPass($correo){
        $pass = $this->generatePass("6");
        $modelPersona = new PersonaModel();
        $data['clave'] = $pass;
        if($modelPersona->where("email", $correo)->set($data)->update()){
            return $pass;
        }
        else{
            return "";
        }
    }
    private function generatePass($longitud){
		$str = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
		$pass = "";
		//Reconstruimos la contraseña segun la longitud que se quiera
		for($i=0;$i<$longitud;$i++) {
		   //obtenemos un caracter aleatorio escogido de la cadena de caracteres
		   $pass .= substr($str,rand(0,61),1);
		}

		return $pass;
	}
    private function verifiarCorreoPersona($correo){
        $model = new PersonaModel();
        $user = $model->where('email', $correo)
            ->first();
        if(!$user){
            return false;
        }
        else{
            session()->set("correo", "yes"); 
            return true;
        }
    }
    //Perder contraseña FIN

    public function postFiltros(){
        $modelR = new RegionesModel();
		$modelCo = new ComunasModel();
        $modelCategoria = new CategoriasModel();
        $modelSubCategoria = new SubCategoriasModel();
        $data['region'] = $modelR->findAll();
		$data['comuna'] = $modelCo->orderBy('comuna', 'ASC')->findAll();
        $data['categoria'] = $modelCategoria->findAll();
        $data['subCategoria'] = $modelSubCategoria->findAll();
        echo view('limites/Header',$data);
        echo view('filtros/Filtros');
        echo view('filtros/postFiltros');
        echo view('limites/Fother');
    }

    /* Seccion de correos desde el HOME */
	private function correoLostPass($correo, $pass){
		$email = \Config\Services::email();
        
        $modelPersona = new PersonaModel();
        $userData = $modelPersona->where("email", $correo)->first();
        //$modelPersona = new UssersModel();
        //$userData = $modelPersona->where("email", $correo)->first();
        
		$email->setFrom('Contacto@nucleova.com', 'Equipo Nucleova');
		//$email->setTo($correo);
        $email->setTo('cristobal.henriquez.g@gmail.com');
		$email->setSubject('Cambio de credenciales de acceso');
		$email->setMessage('
            <!DOCTYPE html>
            <html lang="en">
                <head>
                <meta charset="UTF-8">
                <title>Nucleova</title>

                <!-- bootstrap css-->
                <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">    
                <!-- JS, Popper.js, and jQuery -->
                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
                <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
                
                <script src="https://kit.fontawesome.com/c818a46c29.js" crossorigin="anonymous"></script>
                <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css" integrity="sha384-jLKHWM3JRmfMU0A5x5AkjWkw/EYfGUAGagvnfryNV3F9VqM98XiIH7VBGVoxVSc7" crossorigin="anonymous">


                <style>
                        h5{
                            font-size: 1.17em;
                            color:#4F4F4F !important;
                        }
                        .hoverAzul:hover {
                            background-color:#314A9A;
                            filter: saturate(180%);
                        }
                        .box{
                            position: relative;
                            background-color:#FFFFFF !important;
                            margin: auto;
                            width: 50%;
                        }
                        .imgBox{
                            position: absolute;
                            top: 0;
                            background-color:#314A9A; 
                            text-align: center;
                            
                        }
                        .sangria{
                            padding-top: 10px;
                              padding-bottom: 10px;
                              padding-right: 30px;
                              padding-left: 30px;
                        }
                </style>
                <body>
                    <div class="row">
                        <div class="col-6" style="background-color:#C5C5C5;">
                            <br>
                            <div class="row box">
                                <div class="col-12 " style="background-color:#314A9A; text-align: center;">
                                    <div class="row justify-content-center">                        
                                        <img class="img-fluid" src="https://app.nucleova.com/public/assets/Logos/logoCorreo.png" style="max-height: 100px;">
                                    </div>
                                </div>
                        
                                <div class="col-12 sangria">
                                    <h5>'.$userData['nombre'].' ,esperando se encuentre bien, se ha modificado su contraseña con éxito </h5>
                                    <h5><b> Nueva contraseña</b>: '.$pass.'</h5>
                                </div>
                                <hr>
                                <div class="col-12 sangria">
                                    <h5>¿Necesitas ayuda? Contacta con nosotros o a través de nuestras redes sociales:</h5>
                                    <div class="row justify-content-center" style="text-align: center;"> 
                                                <div class="single-footer-widget ">
                                                    <h5 style="color:#ffffff">Encuentranos en:</h5>
                                                    <div class="footer-social d-flex align-items-center">
                                                        <a class="btn btn-outline-primary border-0" title="Facebook" style="padding: 15px;" target="_blank" href="https://www.facebook.com/nucleova">
                                                        <img src="https://app.nucleova.com/public/assets/rrss/facebook.png" class="img-fluid hoverAzul"></a>	
                                                        <a class="btn btn-outline-info border-0" title="Linkedin" style="padding: 15px;" target="_blank" href="https://www.linkedin.com/company/nucleova/">
                                                        <img src="https://app.nucleova.com/public/assets/rrss/linkedin.png" class="img-fluid hoverAzul"></a>											
                                                        <a class="btn btn-outline-info border-0" title="Instagram" style="padding: 15px;" target="_blank" href="https://www.instagram.com/nucleova/">
                                                        <img src="https://app.nucleova.com/public/assets/rrss/instagram.png" class="img-fluid hoverAzul"></a>											
                                                    </div>								
                                                </div>
                                            </div>
                                </div>
                            </div>
                            <br>
                        </div>
                    </div>
                </body>
            </html>
        ');
		
       // $succes = $email->send();
		if($email->send()){
			return true;
		}
		else{
            $error = $email->printDebugger();
            session()->set('errorEmail',$error);
			return false;
		}
	}

    /*Correo usuario creado */
    private function usuarioCreado($correo){
		$email = \Config\Services::email();
        
        $modelPersona = new PersonaModel();
        $userData = $modelPersona->where("email", $correo)->first();
        
		$email->setFrom('Contacto@nucleova.com', 'Equipo Nucleova');
		//$email->setTo($correo);
        $email->setTo('cristobal.henriquez.g@gmail.com');
		$email->setSubject('Usuario creado con éxito!');
		$email->setMessage('
            <!DOCTYPE html>
            <html lang="en">
                <head>
                <meta charset="UTF-8">
                <title>Nucleova</title>

                <!-- bootstrap css-->
                <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">    
                <!-- JS, Popper.js, and jQuery -->
                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
                <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
                
                <script src="https://kit.fontawesome.com/c818a46c29.js" crossorigin="anonymous"></script>
                <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css" integrity="sha384-jLKHWM3JRmfMU0A5x5AkjWkw/EYfGUAGagvnfryNV3F9VqM98XiIH7VBGVoxVSc7" crossorigin="anonymous">


                <style>
                        h5{
                            font-size: 1.17em;
                            color:#4F4F4F !important;
                        }
                        .hoverAzul:hover {
                            background-color:#314A9A;
                            filter: saturate(180%);
                        }
                        .box{
                            position: relative;
                            background-color:#FFFFFF !important;
                            margin: auto;
                            width: 50%;
                        }
                        .imgBox{
                            position: absolute;
                            top: 0;
                            background-color:#314A9A; 
                            text-align: center;
                            
                        }
                        .sangria{
                            padding-top: 10px;
                              padding-bottom: 10px;
                              padding-right: 30px;
                              padding-left: 30px;
                        }
                        
                </style>
                <body>
                    <div class="row">
                        <div class="col-6" style="background-color:#C5C5C5;">
                            <br>
                            <div class="row box">
                                <div class="col-12" style="background-color:#314A9A; text-align: center;">
                                    <div class="row justify-content-center">                        
                                        <img class="img-fluid" src="https://app.nucleova.com/public/assets/Logos/logoCorreo.png" style="max-height: 100px;">
                                    </div>
                                </div>
                        
                                <div class="col-12">
                                    <h5> De parte del equipo de Nucleova te damos una calurosa bienvenida '.$userData['nombre'].'<h5>
                                    <h5>Disfruta de todos nuestros servicios</h5>
                                </div>
                                <hr>
                                <div class="col-12">
                                    <h5>¿Necesitas ayuda? Contacta con nosotros o a través de nuestras redes sociales:</h5>
                                    <div class="row justify-content-center" style="text-align: center;"> 
                                                <div class="single-footer-widget ">
                                                    <h5 style="color:#ffffff">Encuentranos en:</h5>
                                                    <div class="footer-social d-flex align-items-center">
                                                        <a class="btn btn-outline-primary border-0" title="Facebook" style="padding: 15px;" target="_blank" href="https://www.facebook.com/nucleova">
                                                        <img src="https://app.nucleova.com/public/assets/rrss/facebook.png" class="img-fluid hoverAzul"></a>	
                                                        <a class="btn btn-outline-info border-0" title="Linkedin" style="padding: 15px;" target="_blank" href="https://www.linkedin.com/company/nucleova/">
                                                        <img src="https://app.nucleova.com/public/assets/rrss/linkedin.png" class="img-fluid hoverAzul"></a>											
                                                        <a class="btn btn-outline-info border-0" title="Instagram" style="padding: 15px;" target="_blank" href="https://www.instagram.com/nucleova/">
                                                        <img src="https://app.nucleova.com/public/assets/rrss/instagram.png" class="img-fluid hoverAzul"></a>											
                                                    </div>								
                                                </div>
                                            </div>
                                </div>
                            </div>
                            <br>
                        </div>
                    </div>
                </body>
            </html>
        ');
		
       // $succes = $email->send();
		if($email->send()){
			return true;
		}
		else{
            $error = $email->printDebugger();
            session()->set('errorEmail',$error);
			return false;
		}
    }

}
