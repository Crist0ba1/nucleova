<?php
namespace App\Controllers;

use App\Models\RegionesModel;
use App\Models\ComunasModel;
use App\Models\CategoriasModel;
use App\Models\UssersModel;
use App\Models\PersonaModel;
use App\Models\SubCategoriasModel;
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

    public function registerUsser2(){
        helper(['form']);
        $model = new UssersModel();
        $session = session();
		if($this-> request -> getMethod() == 'post') {
            $data['firstname'] = $this->request->getVar('nombreCompleto');
            $data['genero'] = $this->request->getVar('genero');
            $data['refRegion'] = $this->request->getVar('regionRegister');
            $data['refComuna'] = $this->request->getVar('comunaRegister');
            $data['email'] = $this->request->getVar('emailRegister');
            $data['telefono'] = $this->request->getVar('celular');
            $data['clave'] = $this->request->getVar('passwordr1');
            if($this->request->getVar('tipoDeCuenta')== "1"){
                $data['tipo'] = $this->request->getVar('tipoDeCuenta');
                $data['rz'] = $this->request->getVar('');
                $data['rut'] = $this->request->getVar('');
                $model->save($data);
            }
            if($this->request->getVar('tipoDeCuenta')== "2"){
                $data['tipo'] = $this->request->getVar('tipoDeCuenta');
                $data['rz'] = $this->request->getVar('rz');
                $data['rut'] = $this->request->getVar('rut');
                $model->save($data);
            }

            $user = $model->where('email', $this->request->getVar('emailRegister'))->first();
            if($user != null){
                $this-> setUserSession($user); // aqui tenemos ya al usuario que corresponde

                $modelR = new RegionesModel();
                $modelCo = new ComunasModel();
                $modelCategoria = new CategoriasModel();
                $data['region'] = $modelR->findAll();
                $data['comuna'] = $modelCo->orderBy('comuna', 'ASC')->findAll();
                $data['categoria'] = $modelCategoria->findAll();
                echo view('limites/Header',$data);
                echo view('filtros/filtros');
                echo view('categorias/categorias');
                echo view('limites/Fother');
            }
            else{
                $modelR = new RegionesModel();
                $modelCo = new ComunasModel();
                $session->set("errorRegister", "yes");
                $modelCategoria = new CategoriasModel();
                $data['region'] = $modelR->findAll();
                $data['comuna'] = $modelCo->orderBy('comuna', 'ASC')->findAll();
                $data['categoria'] = $modelCategoria->findAll();
                echo view('limites/Header',$data);
                echo view('ussers/register');
                echo view('limites/Fother');
            }
            
        }
        else{    
            $modelR = new RegionesModel();
            $modelCo = new ComunasModel();
            $session->set("errorRegister", "yes");
            $modelCategoria = new CategoriasModel();
            $data['region'] = $modelR->findAll();
            $data['comuna'] = $modelCo->orderBy('comuna', 'ASC')->findAll();
            $data['categoria'] = $modelCategoria->findAll();
            echo view('limites/Header',$data);
            echo view('ussers/register');
            echo view('limites/Fother');
        }
    }
    public function registerUsser(){
        helper(['form']);
        $model = new UssersModel();
        $session = session();
        $aux = $this->verifiarCorreo( $this->request->getVar('emailRegister'));


		if($this-> request -> getMethod() == 'post' && !$aux){
            $data['firstname'] = $this->request->getVar('nombreCompleto');
            $data['fech_nac'] = $this->dateToDate($this->request->getVar('fech_nac'));
            $data['genero'] = $this->request->getVar('genero');
            $data['refRegion'] = $this->request->getVar('regionRegister');
            $data['refComuna'] = $this->request->getVar('comunaRegister');
            $data['email'] = $this->request->getVar('emailRegister');
            $data['telefono'] = $this->request->getVar('celular');
            $data['clave'] = $this->request->getVar('passwordr1');
            $data['tipo'] = $this->request->getVar('tipoDeCuenta');
            if($this->request->getVar('tipoDeCuenta')== "1" || $this->request->getVar('tipoDeCuenta')== "2"){
                $data['rz'] = '';
                $data['rut'] = '';
                $model->insert($data);
                $user = $model->where('email', $this->request->getVar('emailRegister'))->first();
                $this->enviarCorreoRegister($data);
            }
            if($this->request->getVar('tipoDeCuenta')== "3"){
                $data['rz'] = $this->request->getVar('rz');
                $data['rut'] = $this->request->getVar('rut');
                $model->insert($data);
                $this->enviarCorreoRegister($this->request->getVar('emailRegister'));
                $user = $model->where('email', $this->request->getVar('emailRegister'))->first();
            }

        
                if($user != null){
                    $this-> setUserSession($user); // aqui tenemos ya al usuario que corresponde
                    $modelR = new RegionesModel();
                    $modelCo = new ComunasModel();
                    $modelCategoria = new CategoriasModel();
                    $data['region'] = $modelR->findAll();
                    $data['comuna'] = $modelCo->orderBy('comuna', 'ASC')->findAll();
                    $data['categoria'] = $modelCategoria->findAll();
                    echo view('limites/Header',$data);
                    echo view('filtros/filtros');
                    echo view('categorias/categorias');
                    echo view('limites/Fother');
                }
                else{
                    $this->registerError();
                }
        
        }
        else{
            $this->registerError();
        }

    }
    public function dateToDate($date){
        $input_date=$date;
        $date=date("Y-m-d H:i:s",strtotime($input_date));
        return $date;
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
    public function iniciarSession2(){
        if($this->request->getVar('action')){
            helper(['form']);
            $email_error_error = "";
            $passwordrL_error = "";
            $error = "NO";
            if($this-> request -> getMethod() == 'post') {
                //validation rules
                $rules = [
                    'emailrL' => 'required|min_length[6]|max_length[99]|valid_email',
                    'passwordrL' => 'required|min_length[5]|max_length[255]|validateUSer[email, password]',
                ];
                $errors = [
                    'emailrL' => [				    
                        'required' => 'Este campo es obligatorio',
                        'min_length[6]'=> 'Minimo 5 caracteres',
                        'max_length[99]' => 'Maximo de caracteres exedido',
                        'valid_email' => 'Email no valido',
                    ],
                    'passwordrL' => [				    
                        'required' => 'Este campo es obligatorio',
                        'min_length[5]'=> 'Minimo 5 caracteres',
                        'max_length[255]' => 'Maximo de caracteres exedido',
                        'validateUSer' => 'Email y contraseña no coinciden',
                    ]
                ];
                $validation = \Config\Services::validation();
                if(! $this->validate($rules, $errors)){
                    
                    $data['validation'] = $this->validator;
                    $error = "yes";
                    if($validation->getError('emailrL')){
                        $email_error_error = $validation->getError('emailrL');
                    }
                    if($validation->getError('passwordrL')){
                        $passwordrL = $validation->getError('passwordrL');
                    }
                    $output = array(
                        'email_error_error' => $email_error_error,
                        'passwordrL_error' => $passwordrL_error,
                        'error' => $error,
    
                    );
                    $modelR = new RegionesModel();
                    $modelCo = new ComunasModel();
                    $modelCategoria = new CategoriasModel();
                    $data['region'] = $modelR->findAll();
                    $data['comuna'] = $modelCo->orderBy('comuna', 'ASC')->findAll();
                    $data['categoria'] = $modelCategoria->findAll();
                    echo view('limites/Header',$data);
                    echo view('ussers/login');
                    echo view('limites/Fother');
                    
                } else{
                    $model = new UssersModel();
                    $user = $model->where('emailrL', $this->request->getVar('email'))->first();
    
                    $this-> setUserSession($user); // aqui tenemos ya al usuario que corresponde
    
                    if($user['tipo']==0){//admin
                        return redirect()->to('/dashbordAdmin');
                    }
                    if($user['tipo']==1){//vendedor
                        return redirect()->to('/dashbordAdmin');
                    }
                    $modelR = new RegionesModel();
                    $modelCo = new ComunasModel();
                    $modelCategoria = new CategoriasModel();
                    $data['region'] = $modelR->findAll();
                    $data['comuna'] = $modelCo->orderBy('comuna', 'ASC')->findAll();
                    $data['categoria'] = $modelCategoria->findAll();
                    echo view('limites/Header',$data);
                    //echo view('ussers/login');
                    echo view('limites/Fother');
                }
            }
        }
    }

    private function setUserSession($user){
		$data =[
			'id' => $user['idUssers'],
			'nombre' => $user['firstname'],
            'fech_nac' => $user['fech_nac'],
            'genero' => $user['genero'],			
			'userRegion' =>$user['refRegion'],
            'userComuna' =>$user['refComuna'],
            'telefono'=>$user['telefono'],
            'email' => $user['email'],
			'tipo' => $user['tipo'],
            'rz' => $user['rz'],
            'rut' => $user['rut'],
            'text' => $user['aux'],
			'isLoggedIn' => true,
		];
		session()->set($data);
		
		return true;
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
    
    private function verifiarCorreo($correo){
        $model = new UssersModel();
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
    public function lostPassword(){
        $modelR = new RegionesModel();
		$modelCo = new ComunasModel();
        $data['region'] = $modelR->findAll();
		$data['comuna'] = $modelCo->orderBy('comuna', 'ASC')->findAll();
        echo view('limites/Header',$data);
        echo view('ussers/forgotPass');
        echo view('limites/Fother');
    }
    public function generatePass($longitud){
		$str = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
		$pass = "";
		//Reconstruimos la contraseña segun la longitud que se quiera
		for($i=0;$i<$longitud;$i++) {
		   //obtenemos un caracter aleatorio escogido de la cadena de caracteres
		   $pass .= substr($str,rand(0,61),1);
		}

		return $pass;
	}
    public function lostPasswordForm(){
        helper(['form']);
        $correo = $this->request->getVar('emailFP');
        echo $correo;
        echo "\n";
        $aux = $this->verifiarCorreo($correo);
        echo "\n";
        echo "puta la wea";
        if($aux){
            session()->set("msj_correo", "Verifique su correo"); 
        }else{
            session()->set("msj_correo", "El correo <b>no</b> se encuenta registrado en nuestros sistemas"); 
        }
        $this->lostPassword();
    }
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


    /* Persona */
    public function registrarPersona(){
        helper(['form']);

        $model = new PersonaModel();
        $session = session();
        $correo = $this->request->getVar('emailRegister');
        $aux = $this->verifiarCorreoPersona( $correo);

		if($this-> request -> getMethod() == 'post' && !$aux){
            $data['nombre'] = $this->request->getVar('nombre');
            $data['apellidos'] = $this->dateToDate($this->request->getVar('apellidos'));
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
                $this->perfil();
                /*$modelR = new RegionesModel();
                    $modelCo = new ComunasModel();
                    $modelCategoria = new CategoriasModel();
                    $modelSubCategoria = new SubCategoriasModel();
                    $data['region'] = $modelR->findAll();
                    $data['comuna'] = $modelCo->orderBy('comuna', 'ASC')->findAll();
                    $data['categoria'] = $modelCategoria->findAll();
                    $data['subCategoria'] = $modelSubCategoria->findAll();
                    if($this->request->getVar('tipoDeCuenta')== 1){ //Buscador
                        
                        echo view('limites/Header',$data);
                        echo view('dashbord/Empresa');
                        echo view('limites/Fother');
                    }
                    elseif($this->request->getVar('tipoDeCuenta')== 2){//P Persona Natural
                        echo view('limites/Header',$data);
                        echo view('dashbord/Proveedor');
                        echo view('limites/Fother');
                    }
                    elseif($this->request->getVar('tipoDeCuenta')== 3){//P Empresa
                        echo view('limites/Header',$data);
                        echo view('dashbord/ProveedorE');
                        echo view('limites/Fother');
                    }
                    else{
                        die('Murio en el else ');
                        return redirect()->to('/registerError');
                        //$this->registerError();
                    }  
                */
            }
            else{
                //return redirect()->to('/registerError');
                die('Murio en el else de usuario');
                $this->registerError();
                   
            }
        
        }
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
        if(session()->get("isComplete") == true){
           $valor = 0;
        }
        else{
            $valor = 1;
        }
        $data['verModal'] = $valor;
        if(session()->has("isLoggedIn") && session()->get("tipo") == 1 ){ //Buscador
            echo view('limites/Header',$data);
            echo view('dashbord/Empresa');
            echo view('limites/Fother');
        }
        elseif(session()->has("isLoggedIn") && session()->get("tipo") == 2){//P Persona Natural
            //echo view('limites/Header',$data);
            //echo view('dashbord/Proveedor');
            echo view('newViews/userProfile',$data);
            echo view('limites/Fother');
        }
        elseif(session()->has("isLoggedIn") && session()->get("tipo") == 3){//P Empresa
            //echo view('limites/Header',$data);
            //echo view('dashbord/ProveedorE');
            echo view('newViews/userProfile',$data);
            echo view('limites/Fother');
        }
        else{
            return redirect()->to('/');
        }
            
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
			'nombre' => $user['nombre'],
            'apellidos' => $user['apellidos'],
            'tipo' => $user['tipo'],			
            'email' => $user['email'],
			'isLoggedIn' => true,
            'isComplete' => true,
		];
		session()->set($data);
		
		return true;
	}
    private function setPersonaSessionRegister($user){
		$data =[
			'id' => $user['idPersona'],
			'nombre' => $user['nombre'],
            'apellidos' => $user['apellidos'],
            'tipo' => $user['tipo'],			
            'email' => $user['email'],
			'isLoggedIn' => true,
            'isComplete' => false,
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
}
