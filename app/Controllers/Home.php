<?php
namespace App\Controllers;

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
        echo view('limites/Header',$data);
        echo view('filtros/Filtros');
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
            }else{
                $user=null;
            }
            
            if($user != null){
                $this-> setPersonaSessionRegister($user); // aqui tenemos ya al usuario que corresponde
                $this->correoRegistroPersona($this->request->getVar('nombre'),$this->request->getVar('emailRegister'),$this->request->getVar('passwordr1'));
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
        $user = $model->where('idPersona ', session()->get('id'))->first();
        
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

        if(session()->has("isLoggedIn") && session()->get("tipo") == 1 ){ //Buscador
            echo view('limites/Header',$data);
            echo view('dashbord/Empresa');
            echo view('limites/Fother');
        }
        elseif(session()->has("isLoggedIn") && session()->get("tipo") == 2){//P Persona Natural
            echo view('limites/Header',$data);
            echo view('dashbord/Proveedor');            
            echo view('limites/Fother');
        }
        elseif(session()->has("isLoggedIn") && session()->get("tipo") == 3){//P Empresa
            echo view('limites/Header',$data);
            echo view('dashbord/Proveedor');  
            echo view('limites/Fother');
        }
        else{
            return redirect()->to('/');
        }
            
    }
    
    private function correoRegistroPersona($nombre, $correo, $clave){

        $email = \Config\Services::email();

        $email->setFrom('Contacto@nucleova.com', 'No responder este correo');
        //$email->setTo($userData['email']);
        $email->setTo('Contacto@nucleova.com');
        $email->setSubject('Se a registrado en la aplicaicon web de Nucleova');
        $email->setMessage('
            <p>Estimad@, '.$nombre.' se a registrado con exito.<p>
            <p>Credenciales de acceso:</p>
            <p><b>Usuario:</b> '.$correo.'</p>
            <p><b>Contraseña:</b> '.$clave.'</p>
            <hn>
            <p>Gracias por registrarse con nosotros.</p>

            <h3>Atentamente: EQUIPO NUCLEOVA</h3>'
        );

        $val = 0;
        if($email->send()){
            $val= 1;
        }
        else{
            $val = 2;
        }
        return $val;
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
		];
		session()->set($data);
		
		return true;
	}
    public function verVistas(){
        session()->set("verModal", "1");
        $modelR = new RegionesModel();
		$modelCo = new ComunasModel();
        $modelCategoria = new CategoriasModel();
        $modelSubCategoria = new SubCategoriasModel();
        $data['region'] = $modelR->findAll();
		$data['comuna'] = $modelCo->orderBy('comuna', 'ASC')->findAll();
        $data['categoria'] = $modelCategoria->findAll();
        $data['subCategoria'] = $modelSubCategoria->findAll();
        //echo view('newViews/baseGuest',$data);
        echo view('newViews/subscription');
        
        //echo view('newViews/myprofile');
        
        echo view('limites/Fother');

    }
    public function suscripcion(){   
        $modelR = new RegionesModel();
		$modelCo = new ComunasModel();
        $modelCategoria = new CategoriasModel();
        $modelSubCategoria = new SubCategoriasModel();
        $data['region'] = $modelR->findAll();
		$data['comuna'] = $modelCo->orderBy('comuna', 'ASC')->findAll();
        $data['categoria'] = $modelCategoria->findAll();
        $data['subCategoria'] = $modelSubCategoria->findAll();
        echo view('limites/Header',$data);
        echo view('categorias/subscription');
        echo view('limites/Fother');
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
                session()->set("msj_correo", "Error, verifique la direccion de correo o intente más tarde."); 
            }
            
        }else{
            session()->set("msj_correo", "Error, verifique la direccion de correo o intente más tarde."); 
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

    public function dateToDate($date){
        $input_date=$date;
        $date=date("Y-m-d H:i:s",strtotime($input_date));
        return $date;
    }

	private function correoUsuarioCreado($userData){
		$email = \Config\Services::email();
		
		$email->setFrom('contacto@valchem.cl', 'Equipo Valchem');
		$email->setTo('cristobal.henriquez.g@gmail.com');
		$email->setSubject('Usuario creado con exito');
		$email->setMessage('
				<p>Estimado '.$userData['firstname'].', se a creado su usuario con exito.<p>
				<p><b>Usuario:</b> '.$userData['email'].'.<p>
				<p><b>Contraseña:</b> '.$userData['password'].'.<p>
				<p>Al hacer ingreso a la pagina, dirigirse a configuracion de cuenta, seleccione editar usuario, y cambie su contraseña.<p>
				<h3>Atentamente: EQUIPO VALCHEM</h3>
				<div align="center"><img  src="https://valchem.cl/public/assets/empresa/mail2.png" heigth="400" class="d-block"></div>
		');
		

		if($email->send()){
			//echo "<script>alert('Se envio el correo');</script>";
		}
		else{
			//echo "<script>alert('No se envio el correo');</script>";
		}
	}
    private function enviarCorreoRegister($userData){
       /*
        $email = \Config\Services::email();
        $rutaImagen = 'http://localhost/pega/appnucleova/public/assets/Logos/LogoPequeno2.png';
        $email->setFrom('Contacto@nucleova.com', 'Nucleova');
        //$email->setTo($userData['email']);
        $email->setTo('cristobal.henriquez.g@gmail.com');
        $email->setSubject('Usuario creado con exito');
        $email->setMessage('
            <p>Estimado '.$userData['firstname'].', se a creado su usuario con exito.<p>
            <p><b>Usuario:</b> '.$userData['email'].'.<p>
            <p><b>Contraseña:</b> '.$userData['clave'].'.<p>
            
            <h3>Atentamente: EQUIPO NUCLEOVA</h3>
            <div align="center">
                <img  src="'.$rutaImagen.'" class="d-block">
            </div>'
        );
        if($email->send()){
            //echo "<script>alert('Se envio el correo');</script>";
        }
        else{
            //echo "<script>alert('No se envio el correo');</script>";
        }
        */
    }
    public function enviarCorreo(){
        $nombre = $this->request->getVar('name');
        $correo = $this->request->getVar('email');
        $mensaje = $this->request->getVar('mensaje');

        $email = \Config\Services::email();

        $email->setFrom('Contacto@nucleova.com', 'No responder este correo');
        //$email->setTo($userData['email']);
        $email->setTo('Contacto@nucleova.com');
        $email->setSubject('Formulario pie de pagina');
        $email->setMessage('
            <p>Estimado, '.$nombre.' a enviado el siguiente mensaje.<p>
            <p>'.$mensaje.'.<p>
            <p><b>Correo del emisor:</b> '.$correo.'.<p>
            <hn>
            <p>Recuerde que para responder este correo, debe enviar la respuesta al emisor.</p>
            <p><b>No</b> debe responder directamente.</p>
            <h3>Atentamente: EQUIPO NUCLEOVA</h3>'
        );

        $val = 0;
        if($email->send()){
            $val= 1;
        }
        else{
            $val = 2;
        }
        return json_encode($val);
    }

    /* Seccion de correos desde el HOME */


	private function correoLostPass($correo, $pass){
		$email = \Config\Services::email();
        
        //$modelPersona = new PersonaModel();
        //$userData = $modelPersona->where("email", $correo)->first();

		$email->setFrom('Contacto@nucleova.com', 'Equipo Nucleova');
		//$email->setTo($correo);
        $email->setTo('cristobal.henriquez.g@gmail.com');
		$email->setSubject('Cambio de credenciales de acceso');
		$email->setMessage('Mensaje de prueba');
		
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
