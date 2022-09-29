<?php
namespace App\Controllers;

require_once './vendor/autoload.php';

use Transbank\Webpay\WebpayPlus\Transaction;
/*
\Transbank\Webpay\WebpayPlus::configureForProduction('597045748126', 'e71e6af466966215bd025163ec7a1ad0');
*/
use CodeIgniter\I18n\Time;

use App\Models\RegionesModel;
use App\Models\ComunasModel;
use App\Models\CategoriasModel;
use App\Models\UssersModel;
use App\Models\ImagenesModel;
use App\Models\ContratacionesModel;
use App\Models\SubCategoriasModel;
use App\Models\CategoriasListModel;
use App\Models\ComunasListModel;
use App\Models\PersonaModel;
use monken\TablesIgniter;
use App\Models\PagosModel;
class Ussers extends BaseController
{
    public function login()
    {
        
        $modelR = new RegionesModel();
		$modelCo = new ComunasModel();
        $modelCategoria = new CategoriasModel();
        $data['region'] = $modelR->findAll();
		$data['comuna'] = $modelCo->orderBy('comuna', 'ASC')->findAll();
        $data['categoria'] = $modelCategoria->findAll();
        if(session()->has('errorLogin')){
            $data['errorLogin']= session()->get('errorLogin');
        }
        echo view('limites/Header',$data);
        echo view('ussers/login');
        echo view('limites/Fother');
    }
    public function iniciarSession()
    {
		helper(['form']);

        if($this-> request -> getMethod() == 'post') {

            if(isset($_POST)){
                $secretKey 	= '6Le0NLgaAAAAAMlFINKKtjzLLGVz9iI5E9BoDMnl';
                $token 		= $_POST["g-token"];
                
                $url = "https://www.google.com/recaptcha/api/siteverify";
                $data = array('secret' => $secretKey, 'response' => $token);
            
                // use key 'http' even if you send the request to https://...
                $options = array('http' => array(
                    'method'  => 'POST',
                    'header' => 'Content-Type: application/x-www-form-urlencoded',
                    'content' => http_build_query($data)
                ));
                $context  = stream_context_create($options);
                $result = file_get_contents($url, false, $context);
                $response = json_decode($result);
                if($response->success){
                  
                    $bool = $this->validarUSuario($this->request->getVar('emailrL'),$this->request->getVar('passwordrL'));
                    $bool = $this->validarUSuarioEmpresa($this->request->getVar('emailrL'),$this->request->getVar('passwordrL'));

                    if(!$bool){
                        session()->set('errorLogin',"Error, credenciales de acceso erroneas");
                    } else{
                        $model = new PersonaModel();
                        //$model = new UssersModel();
                        $user = $model->where('email', $this->request->getVar('emailrL'))->first();
                        $this-> setPersonaSession($user);
                        //$this-> setUserSession($user); // aqui tenemos ya al usuario que corresponde
                        
                        if($user['tipo']==0){//admin
                            return redirect()->to('/perfil');
                        }
                        if($user['tipo']==1){//Proveedor
                            //return redirect()->to('/dashbordCliente');
                            return redirect()->to('/perfil');
                        }
                        if($user['tipo']==2){//cliente
                            return redirect()->to('/perfil');
                        }
                        if($user['tipo']==3){//cliente
                            return redirect()->to('/perfil');
                        }
                        session()->destroy();
                        session()->set('errorLogin',"Error, al iniciar sesion, intentelo otra vez");
                        return redirect()->to('/login');
                    }
        
                }
                else{
                    session()->set('errorLogin',"Error, al iniciar sesion, intentelo otra vez ");
                    return redirect()->to('/login');
                }
                
                
            }
 
		}
            return redirect()->to('/login')->with('mensaje','Error, intente mas tarde 3');


            
    }
    private function validarUSuario($correo,$clave){
        $model = new UssersModel();
        $user = $model-> where('email', $correo)
            ->first();
        if(!$user)
            return false;
        
        return password_verify($clave,$user['clave']);

    }
    private function validarUSuarioEmpresa($correo,$clave){
        $model = new PersonaModel();
        $user = $model-> where('email', $correo)
            ->first();
        if(!$user)
            return false;
        
        return password_verify($clave,$user['clave']);

    }

    public function dashbordAdmin()
    {
        $modelR = new RegionesModel();
		$modelCo = new ComunasModel();
        $modelCategoria = new CategoriasModel();
        $data['region'] = $modelR->findAll();
		$data['comuna'] = $modelCo->orderBy('comuna', 'ASC')->findAll();
        $data['categoria'] = $modelCategoria->findAll();
        echo view('limites/Header',$data);
        echo view('dashbord/Admin');
        echo view('limites/Fother');
    }
    public function dashbordProveedor()
    {
        $modelR = new RegionesModel();
		$modelCo = new ComunasModel();
        $modelCategoria = new CategoriasModel();
        $data['region'] = $modelR->findAll();
		$data['comuna'] = $modelCo->orderBy('comuna', 'ASC')->findAll();
        $data['categoria'] = $modelCategoria->findAll();
        $model = new UssersModel();
		$user = $model->where('email', session()->get('isLoggedIn'))->first();
        echo view('limites/Header',$data);
        echo view('dashbord/Proveedor');
        echo view('limites/Fother');
    }
    public function dashbordCliente()
    {
        $modelR = new RegionesModel();
		$modelCo = new ComunasModel();
        $modelCategoria = new CategoriasModel();
        $data['region'] = $modelR->findAll();
		$data['comuna'] = $modelCo->orderBy('comuna', 'ASC')->findAll();
        $data['categoria'] = $modelCategoria->findAll();
        echo view('limites/Header',$data);
        echo view('dashbord/Empresa');
        echo view('limites/Fother');
    }
    public function logout(){
		if(!session()->get('isLoggedIn'))
			redirect()->to('/');
			
		session()->destroy();
		return redirect()->to('/');
	}

    public function cambiar_ubicacion(){
        $model = new UssersModel();

            $data =[
                'refRegion' =>  $this->request->getVar('regionRegister'),
                'refComuna' => $this->request->getVar('comunaRegister')
            ];
            $Valor = $model->where("idUssers",session()->get('id'))->set($data)->update();
        

            if($Valor){
                session()->set('userRegion', $this->request->getVar('regionRegister'));
                session()->set('userComuna', $this->request->getVar('comunaRegister'));

                return json_encode("Lo logro");
            }
            return json_encode("es post");

    }
    public function cambiar_texto(){
        $model = new UssersModel();

            $data =[
                'aux' =>  $this->request->getVar('texto')
            ];
            $Valor = $model->where("idUssers",session()->get('id'))->set($data)->update();
        

            if($Valor){
                session()->set('text', $this->request->getVar('texto'));

                return json_encode("Lo logro");
            }
            return json_encode("es post");

    }  
    public function cambiar_contacto(){
        $model = new UssersModel();

            $data =[
                'telefono' => $this->request->getVar('celular'),
                'email' => $this->request->getVar('emailRegister'),
                'fech_nac' => $this->dateToDate($this->request->getVar('fech_nac'))
            ];
            $Valor = $model->where("idUssers",session()->get('id'))->set($data)->update();
        

            if($Valor){
                session()->set('telefono', $this->request->getVar('celular'));
                session()->set('email', $this->request->getVar('emailRegister'));
                session()->set('fech_nac', $this->request->getVar('fech_nac'));
                return json_encode("Lo logro");
            }
            return json_encode("es post");

    }
    public function dateToDate($date){
        $input_date=$date;
        $date=date("Y-m-d H:i:s",strtotime($input_date));
        return $date;
    }
    
    public function agregarUsuario(){
        $modelR = new RegionesModel();
		$modelCo = new ComunasModel();
        $modelCategoria = new CategoriasModel();
        $modelSubCategoria = new SubCategoriasModel();
        $data['region'] = $modelR->findAll();
		$data['comuna'] = $modelCo->orderBy('comuna', 'ASC')->findAll();
        $data['categoria'] = $modelCategoria->findAll();
        $data['subCategoria'] = $modelSubCategoria->findAll();
        echo view('limites/Header',$data);
        echo view('dashbord/AddUsser');
        echo view('limites/Fother');
    }
    public function registerUsserAdmin(){
        helper(['form']);
        $model = new UssersModel();
        $modelI = new ImagenesModel();
        $session = session();
        $aux = $this->verifiarCorreo( $this->request->getVar('emailRegister'));
        $aux = false;
        //$comunasUsser = $this->request->getVar('selectpickerValue2');
        //die('$comunasUsser = '.$comunasUsser.' No redirecciona:'.$val);
       /*falta verificar que el correo sea unico*/
		if($this-> request -> getMethod() == 'post' && !$aux){
            $data['firstname'] = $this->request->getVar('nombreCompleto');
            $data['fech_nac'] = $this->dateToDate($this->request->getVar('fech_nac'));
            $data['genero'] = $this->request->getVar('genero');
            $data['refRegion'] = $this->request->getVar('regionRegister');
            $data['refComuna'] = $this->request->getVar('comunaRegister');
            $data['calle'] = $this->request->getVar('calle');
            $data['numero'] = $this->request->getVar('numero');
            $data['optional'] = $this->request->getVar('optional');
            $data['email'] = $this->request->getVar('emailRegister');
            $data['telefono'] = $this->request->getVar('celular');
            $data['clave'] = $this->request->getVar('emailRegister');
            $data['tipo'] = $this->request->getVar('tipoDeCuenta');
            $data['text'] = $this->request->getVar('editordata');
            $imageFile1 = $this->request->getFile('file1');
            $imageFile2 = $this->request->getFile('file2');
            $imageFile3 = $this->request->getFile('file3');
            $imageFile4 = $this->request->getFile('file4');
            $imageFile5 = $this->request->getFile('file5');
            //id de las subcategorias en las que se desembuelve un proveedor
            $subCatUsser = $this->request->getVar('selectpickerValue');
            //id de las comunas en las que puede trabajar un proveedor
            $comunasUsser = $this->request->getVar('selectpickerValue2');

            $data['rf'] = $this->request->getVar('face');
            $data['rl'] = $this->request->getVar('linkedin');
            $data['ri'] = $this->request->getVar('instagram');


            if($this->request->getVar('tipoDeCuenta')== "2"){
                $data['rz'] = '';
                $data['rut'] = '';
                $model->insert($data);
                //$this->enviarCorreoRegister($data);
            }
            if($this->request->getVar('tipoDeCuenta')== "3"){
                $data['rz'] = $this->request->getVar('rz');
                $data['rut'] = $this->request->getVar('rut');
                $model->insert($data);
                //$this->enviarCorreoRegister($this->request->getVar('emailRegister'));
            }
            $user = $model->where('email', $this->request->getVar('emailRegister'))->first();

            if($user != null){       
                /* Asocio la empresa al usuario creado*/
                

                //id de las comunas en las que puede trabajar un proveedor
                $val = $this->insertCategoriasList($user, $subCatUsser);            
                //id de las comunas en las que puede trabajar un proveedor
                $val2 = $this->insertComunasList($user, $comunasUsser);   
                //Si val o val2 son false, es por que exitio un error en alguno de los insert

                $nombre_fichero = './public/imgs/'.$user['idUssers'];
                if(!file_exists($nombre_fichero)){
                   //Si no existe, lo crea
                    mkdir($nombre_fichero, 0777, true);
                    /*
                        if(!file_exists($nombre_fichero)) {
                            die('Fallo al crear las carpetas...'.$nombre_fichero);                           
                        }else{
                            die('Creo las carpetas'.$nombre_fichero);
                        }
                    */
                }
                
                $dataFile['idUsers'] = $user['idUssers'];
                $dataFile['imagen1'] = $imageFile1->getRandomName();
                $dataFile['imagen2'] = $imageFile1->getRandomName();
                $dataFile['imagen3'] = $imageFile1->getRandomName();
                $dataFile['imagen4'] = $imageFile1->getRandomName();
                $dataFile['imagen5'] = $imageFile1->getRandomName();

                if($modelI->insert($dataFile)){
                    //Si se agrega a la BD, se mueven las imagenes
                    $imageFile1->move($nombre_fichero, $dataFile['imagen1']);
                    $imageFile2->move($nombre_fichero, $dataFile['imagen2']);
                    $imageFile3->move($nombre_fichero, $dataFile['imagen3']);
                    $imageFile4->move($nombre_fichero, $dataFile['imagen4']);
                    $imageFile5->move($nombre_fichero, $dataFile['imagen5']);
                    
                    return redirect()->to('/agregarUsuario')->with('status',true);
                    die('No redirecciona, true');

                }else{
                    rmdir($nombre_fichero);
                    //Falta eliminar al usuario que se agrego
                    return redirect()->to('/agregarUsuario')->with('status',false);
                    die('No redirecciona, false');
                }
                

            }           
        
        }
        else{
            die('Borra el correo de ejemplo');
        }
        return redirect()->to('/agregarUsuario');

    }

    /* Para registrar los datos de los usuarios */
    public function registerUsserEmpresa(){
        helper(['form']);
        $model = new UssersModel();
        $modelI = new ImagenesModel();
        $session = session();
        //$aux = $this->verifiarCorreo( $this->request->getVar('emailRegister'));
        //$aux = false;
                
		if($this-> request -> getMethod() == 'post' ){
            $data['firstname'] = $this->request->getVar('nombreCompleto');
            $data['fech_nac'] = $this->dateToDate($this->request->getVar('fech_nac'));
            $data['genero'] = $this->request->getVar('genero');
            $data['refRegion'] = $this->request->getVar('regionRegister');
            $data['refComuna'] = $this->request->getVar('comunaRegister');
            $data['calle'] = $this->request->getVar('calle');
            $data['numero'] = $this->request->getVar('numero');
            $data['optional'] = $this->request->getVar('optional');
            $data['email'] = $this->request->getVar('emailRegister');
            $data['telefono'] = $this->request->getVar('celular');
            $data['clave'] = $this->request->getVar('emailRegister');
            $data['tipo'] = 1; //Es una empresa que busca proveedores de servicio
            $data['text'] = $this->request->getVar('editordata');
            $imageFile1 = $this->request->getFile('file1');

            $data['rf'] = $this->request->getVar('face');
            $data['rl'] = $this->request->getVar('linkedin');
            $data['ri'] = $this->request->getVar('instagram');

            $model->insert($data);
            $user = $model->where('email', $this->request->getVar('emailRegister'))->first();
            
            $idEmpresa = $user['idUssers'];
            if($user != null){       
                
                /* Asocio la empresa al usuario creado*/
                $modelPersona = new PersonaModel();
                $data2['otraID'] = $idEmpresa;
                $modelPersona->where("idPersona",session()->get('id'))->set($data2)->update();
                $data = [
                    'otroID' => $idEmpresa,
                    'isComplete' => 0,
                ];
                session()->set($data);

                $nombre_fichero = './public/imgs/'.$idEmpresa;
                if(!file_exists($nombre_fichero)){
                   //Si no existe, lo crea
                    mkdir($nombre_fichero, 0777, true);
                    /*
                        if(!file_exists($nombre_fichero)) {
                            die('Fallo al crear las carpetas...'.$nombre_fichero);                           
                        }else{
                            die('Creo las carpetas'.$nombre_fichero);
                        }
                    */
                }
                
                $dataFile['idUsers'] = $idEmpresa;
                $dataFile['imagen1'] = $imageFile1->getRandomName();
                $this->setUserSessionEmpresa($user);
                if($modelI->insert($dataFile)){
                    //Si se agrega a la BD, se mueven las imagenes
                    $imageFile1->move($nombre_fichero, $dataFile['imagen1']);

                    return redirect()->to('/perfil');
                    //return redirect()->to('/agregarUsuario')->with('status',true);
                    die('No redirecciona, true');

                }else{
                    rmdir($nombre_fichero);
                    //Falta eliminar al usuario que se agrego
                    return redirect()->to('/perfil');
                    die('No redirecciona, false');
                }
                

            }           
        
        }
        else{
            die('Borra el correo de ejemplo');
        }
        return redirect()->to('/perfil');

    }
    public function editarUsserEmpresa(){
        helper(['form']);
        $model = new UssersModel();
        $session = session();
        //$aux = $this->verifiarCorreo( $this->request->getVar('emailRegister'));
        //$aux = false;
                
		if($this-> request -> getMethod() == 'post' ){
            $data['firstname'] = $this->request->getVar('nombreCompleto');
            $data['fech_nac'] = $this->dateToDate($this->request->getVar('fech_nac'));
            $data['genero'] = $this->request->getVar('genero');
            $data['refRegion'] = $this->request->getVar('regionRegister');
            $data['refComuna'] = $this->request->getVar('comunaRegister');
            $data['calle'] = $this->request->getVar('calle');
            $data['numero'] = $this->request->getVar('numero');
            $data['optional'] = $this->request->getVar('optional');
            $data['email'] = $this->request->getVar('emailRegister');
            $data['telefono'] = $this->request->getVar('celular');
            $data['clave'] = $this->request->getVar('emailRegister');
            $data['tipo'] = 1; //Es una empresa que busca proveedores de servicio
            $data['text'] = $this->request->getVar('editordata');

            $data['rf'] = $this->request->getVar('face');
            $data['rl'] = $this->request->getVar('linkedin');
            $data['ri'] = $this->request->getVar('instagram');

            $model->where("idUssers",session()->get('idEM'))->set($data)->update();
            return redirect()->to('/perfil');
                
        
        }

        return redirect()->to('/perfil');

    }

    public function cambiar_imagen_empresa(){
        $modelI = new ImagenesModel();
        $model = new UssersModel();
        if($this-> request -> getMethod() == 'post' ){
            $imageFile1 = $this->request->getFile('filePhoto');
            $idEmpresa = session()->get('idEM');
            $nombre_fichero = './public/imgs/'.$idEmpresa;

            $this->borrar_directorio($nombre_fichero);

            if(!file_exists($nombre_fichero)){
                mkdir($nombre_fichero, 0777, true);
            }

            $dataFile['idUsers'] = $idEmpresa;
            $dataFile['imagen1'] = $imageFile1->getRandomName();
            if($modelI->where("idUsers",$idEmpresa)->set($dataFile)->update()){
                //Si se agrega a la BD, se mueven las imagenes
                $imageFile1->move($nombre_fichero, $dataFile['imagen1']);
                $user = $model->where("idUssers",$idEmpresa)->first();
                $this->setUserSessionEmpresa($user);

                return redirect()->to('/perfil');
                //return redirect()->to('/agregarUsuario')->with('status',true);
                die('No redirecciona, true');

            }else{
                rmdir($nombre_fichero);
                //Falta eliminar al usuario que se agrego
                return redirect()->to('/perfil');
                die('No redirecciona, false');
            }
        }
    }

    public function cambiar_imagen_empresaN(){
        $modelI = new ImagenesModel();
        $model = new UssersModel();
        if($this-> request -> getMethod() == 'post' ){
            $imageFile1 = $this->request->getFile('filePhoto0');
            $imageFile2 = $this->request->getFile('filePhoto1');
            $imageFile3 = $this->request->getFile('filePhoto2');
            $imageFile4 = $this->request->getFile('filePhoto3');
            $imageFile5 = $this->request->getFile('filePhoto4');
            $idEmpresa = session()->get('idEM');
            $nombre_fichero = './public/imgs/'.$idEmpresa;

            $imagenes = $modelI->where("idUsers",$idEmpresa)->first();
            if($imageFile1->isValid()){                
                $dataFile['imagen1'] = $imageFile1->getRandomName();
                $imageFile1->move($nombre_fichero, $dataFile['imagen1']);
                $this->borrar_file($nombre_fichero, $imagenes['imagen1']);
            }else{
                $dataFile['imagen1'] = $imagenes['imagen1'];
            }
            if($imageFile2->isValid()){
                $dataFile['imagen2'] = $imageFile2->getRandomName();
                $imageFile2->move($nombre_fichero, $dataFile['imagen2']);
                $this->borrar_file($nombre_fichero, $imagenes['imagen2']);
            }else{
                $dataFile['imagen2'] = $imagenes['imagen2'];
            }                                                
            if($imageFile3->isValid()){                
                $dataFile['imagen3'] = $imageFile3->getRandomName();
                $imageFile3->move($nombre_fichero, $dataFile['imagen3']);
                $this->borrar_file($nombre_fichero, $imagenes['imagen3']);
            }else{
                $dataFile['imagen3'] = $imagenes['imagen3'];
            }
            if($imageFile4->isValid()){                
                $dataFile['imagen4'] = $imageFile4->getRandomName();
                $imageFile4->move($nombre_fichero, $dataFile['imagen4']);
                $this->borrar_file($nombre_fichero, $imagenes['imagen4']);
            }else{
                $dataFile['imagen4'] = $imagenes['imagen4'];
            }
            if($imageFile5->isValid()){                
                $dataFile['imagen5'] = $imageFile5->getRandomName();
                $imageFile5->move($nombre_fichero, $dataFile['imagen5']);
                $this->borrar_file($nombre_fichero, $imagenes['imagen5']);
            }else{
                $dataFile['imagen5'] = $imagenes['imagen5'];
            }

            if(!file_exists($nombre_fichero)){
                mkdir($nombre_fichero, 0777, true);
            }

            $dataFile['idUsers'] = $idEmpresa;
            
            if($modelI->where("idUsers",$idEmpresa)->set($dataFile)->update()){
                //Si se agrega a la BD, se mueven las imagenes
                $user = $model->where("idUssers",$idEmpresa)->first();
                $this->setUserSessionEmpresa($user);

                return redirect()->to('/perfil');
                //return redirect()->to('/agregarUsuario')->with('status',true);
                die('No redirecciona, true');

            }else{
                rmdir($nombre_fichero);
                //Falta eliminar al usuario que se agrego
                return redirect()->to('/perfil');
                die('No redirecciona, false');
            }
        }
    }

    public function registerUsserProveedor(){
        helper(['form']);
        $model = new UssersModel();
        $modelI = new ImagenesModel();
        $session = session();
        $correo = $this->request->getVar('emailRegister');
        $aux = $this->verifiarCorreo($correo);
        if($aux){
            session()->set('CorreoNoValido', $correo);
        }
       /*falta verificar que el correo sea unico*/      
		if($this-> request -> getMethod() == 'post' && !$aux){
            session()->remove('CorreoNoValido');
            $data['firstname'] = $this->request->getVar('nombreCompleto');
            $data['fech_nac'] = $this->dateToDate($this->request->getVar('fech_nac'));
            $data['genero'] = $this->request->getVar('genero');
            $data['refRegion'] = $this->request->getVar('regionRegister');
            $data['refComuna'] = $this->request->getVar('comunaRegister');
            $data['calle'] = $this->request->getVar('calle');
            $data['numero'] = $this->request->getVar('numero');
            $data['optional'] = $this->request->getVar('optional');
            $data['email'] = $correo;
            $data['telefono'] = $this->request->getVar('celular');
            $data['clave'] = $this->request->getVar('emailRegister');
            $data['tipo'] = session()->get("tipo");
            $data['text'] = $this->request->getVar('editordata');
            $imageFile1 = $this->request->getFile('file1');
            $imageFile2 = $this->request->getFile('file2');
            $imageFile3 = $this->request->getFile('file3');
            $imageFile4 = $this->request->getFile('file4');
            $imageFile5 = $this->request->getFile('file5');
            $subCatUsser = $this->request->getVar('selectpickerValue');
            $comunasUsser = $this->request->getVar('selectpickerValue2');
            $data['rf'] = $this->request->getVar('face');
            $data['rl'] = $this->request->getVar('linkedin');
            $data['ri'] = $this->request->getVar('instagram');

            if(session()->get("tipo") == 2){
                $data['rz'] = '';
                $data['rut'] = '';
                $model->insert($data);
                //$this->enviarCorreoRegister($data);
            }
            if(session()->get("tipo") == 3){
                $data['rz'] = $this->request->getVar('rz');
                $data['rut'] = $this->request->getVar('rut');
                $model->insert($data);
                //$this->enviarCorreoRegister($this->request->getVar('emailRegister'));
            }
            $user = $model->where('email', $this->request->getVar('emailRegister'))->first();
            $idEmpresa = $user['idUssers'];
            if($user != null){       
                /* Asocio la empresa al usuario creado*/
                
                //id de las comunas en las que puede trabajar un proveedor
                $val = $this->insertCategoriasList($user, $subCatUsser);            
                //id de las comunas en las que puede trabajar un proveedor
                $val2 = $this->insertComunasList($user, $comunasUsser);   
                //Si val o val2 son false, es por que exitio un error en alguno de los insert

                $modelPersona = new PersonaModel();
                $data2['otraID'] = $idEmpresa;
                $modelPersona->where("idPersona",session()->get('id'))->set($data2)->update();
                $data = [
                    'otroID' => $idEmpresa,
                    'isComplete' => 0,
                ];
                session()->set($data);

                $nombre_fichero = './public/imgs/'.$idEmpresa;
                if(!file_exists($nombre_fichero)){
                   //Si no existe, lo crea
                    mkdir($nombre_fichero, 0777, true);
                    /*
                        if(!file_exists($nombre_fichero)) {
                            die('Fallo al crear las carpetas...'.$nombre_fichero);                           
                        }else{
                            die('Creo las carpetas'.$nombre_fichero);
                        }
                    */
                }

                $dataFile['idUsers'] = $idEmpresa;
                if($imageFile1->isValid()){    
                    $dataFile['imagen1'] = $imageFile1->getRandomName();}
                if($imageFile2->isValid()){    
                    $dataFile['imagen2'] = $imageFile2->getRandomName();}
                if($imageFile3->isValid()){    
                    $dataFile['imagen3'] = $imageFile3->getRandomName();}
                if($imageFile4->isValid()){    
                    $dataFile['imagen4'] = $imageFile4->getRandomName();}
                if($imageFile5->isValid()){    
                    $dataFile['imagen5'] = $imageFile5->getRandomName();}

                if($modelI->insert($dataFile)){
                    //Si se agrega a la BD, se mueven las imagenes
                    if($imageFile1->isValid()){    
                    $imageFile1->move($nombre_fichero, $dataFile['imagen1']);}
                    if($imageFile2->isValid()){    
                    $imageFile2->move($nombre_fichero, $dataFile['imagen2']);}
                    if($imageFile3->isValid()){    
                    $imageFile3->move($nombre_fichero, $dataFile['imagen3']);}
                    if($imageFile4->isValid()){    
                    $imageFile4->move($nombre_fichero, $dataFile['imagen4']);}
                    if($imageFile5->isValid()){    
                    $imageFile5->move($nombre_fichero, $dataFile['imagen5']);}
                    
                    return redirect()->to('/perfil');
                    //return redirect()->to('/agregarUsuario')->with('status',true);
                    die('No redirecciona, true');

                }else{
                    rmdir($nombre_fichero);
                    //Falta eliminar al usuario que se agrego
                    return redirect()->to('/perfil');
                    //return redirect()->to('/agregarUsuario')->with('status',true);
                    die('No redirecciona, true');
                }
            }           
        
        }
        return redirect()->to('/perfil');

    }
    public function editarUsserProveedor(){
        helper(['form']);
        $model = new UssersModel();
        $session = session();
        //$aux = $this->verifiarCorreo( $this->request->getVar('emailRegister'));
        //$aux = false;
                
		if($this-> request -> getMethod() == 'post' ){
            $data['firstname'] = $this->request->getVar('nombreCompleto');
            $data['fech_nac'] = $this->dateToDate($this->request->getVar('fech_nac'));
            $data['genero'] = $this->request->getVar('genero');
            $data['refRegion'] = $this->request->getVar('regionRegister');
            $data['refComuna'] = $this->request->getVar('comunaRegister');
            $data['calle'] = $this->request->getVar('calle');
            $data['numero'] = $this->request->getVar('numero');
            $data['optional'] = $this->request->getVar('optional');
            $data['email'] = $this->request->getVar('emailRegister');
            $data['telefono'] = $this->request->getVar('celular');
            $data['clave'] = $this->request->getVar('emailRegister');
            $data['tipo'] = 1; //Es una empresa que busca proveedores de servicio
            $data['text'] = $this->request->getVar('editordata');

            //id de las subcategorias en las que se desembuelve un proveedor
            $subCatUsser = $this->request->getVar('selectpickerValue');
            //id de las comunas en las que puede trabajar un proveedor
            $comunasUsser = $this->request->getVar('selectpickerValue2');

            $data['rf'] = $this->request->getVar('face');
            $data['rl'] = $this->request->getVar('linkedin');
            $data['ri'] = $this->request->getVar('instagram');
            $user = $model->where('email', $this->request->getVar('emailRegister'))->first();
            if($model->where("idUssers",session()->get('idEM'))->set($data)->update()){
                //id de las comunas en las que puede trabajar un proveedor
                $val = $this->insertCategoriasList($user, $subCatUsser);            
                //id de las comunas en las que puede trabajar un proveedor
                $val2 = $this->insertComunasList($user, $comunasUsser);   
                //Si val o val2 son false, es por que exitio un error en alguno de los insert
            }
            
            return redirect()->to('/perfil');
                
        
        }

        return redirect()->to('/perfil');

    }

    private function borrar_directorio($dirname) {
        //si es un directorio lo abro
        if (is_dir($dirname)){
            $dir_handle = opendir($dirname);
        }
        //si no es un directorio devuelvo false para avisar de que ha habido un error
        if (!$dir_handle){
            return false;
        }
        //recorro el contenido del directorio fichero a fichero
        while($file = readdir($dir_handle)) {
           if ($file != "." && $file != "..") {
                //si no es un directorio elemino el fichero con unlink()
                if (!is_dir($dirname."/".$file)){
                    unlink($dirname."/".$file);
                }
                else{ //si es un directorio hago la llamada recursiva con el nombre del directorio
                    borrar_directorio($dirname.'/'.$file);
                }
            }
         }
         closedir($dir_handle);
        //elimino el directorio que ya he vaciado
         rmdir($dirname);
         return true;
    }
    private function borrar_file($dirname, $file) {
        if($file != ""){
            //si es un directorio lo abro
            if (is_dir($dirname)){
                $dir_handle = opendir($dirname);
            }
            //si no es un directorio devuelvo false para avisar de que ha habido un error
            if (!$dir_handle){
                return false;
            }
            unlink($dirname."/".$file);

            closedir($dir_handle);

            return true;
        }
        else{
            return false;
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
		session()->set('empresa',$data);
		
		return true;
	}   
    private function setUserSessionEmpresa($user){
		//$user['idUssers']
        //$modelI = new ImagenesModel();
        //$imagen = $modelI->where()
        $data =[
			'idEM' => $user['idUssers'],
			'nombreEM' => $user['firstname'],
            'fech_nacEM' => $user['fech_nac'],
            'generoEM' => $user['genero'],			
			'userRegionEM' =>$user['refRegion'],
            'userComunaEM' =>$user['refComuna'],
            'telefonoEM'=>$user['telefono'],
            'emailEM' => $user['email'],
			'tipoEM' => $user['tipo'],
            'rzEM' => $user['rz'],
            'rutEM' => $user['rut'],
            'textEM' => $user['aux'],
			'isLoggedInEM' => true,
		];
		session()->set('empresa',$data);
		
		return true;
	}  
    public function deleteUsser(){
        $model = new UssersModel();
        $id = $this->request->getVar('id');
        if($model ->delete($id)){
            /*Elimino los ficheros*/
            //$nombre_fichero = './public/imgs/'.$id;
            //rmdir($nombre_fichero);
            /*Elimino la lista de categorias */
            $modelCaL = new CategoriasListModel();
            $modelCL->delete($id);
            /*Elimino la lista de categorias */
            $modelCoL = new ComunasListModel();
            $modelCL->delete($id);
            return '<div class="alert alert-succes">Usuario eliminado</div>';
        }
        else{
            return '<div class="alert alert-danger">Usuario no a podido ser eliminado</div>';
        }

        
    }
    private function insertCategoriasList($usser, $subCatUsser){
        $model = new CategoriasListModel();
        //subCatUsser = id de las comunas en las que puede trabajar un proveedor
        $model->where('idUsser', $usser['idUssers']);
        $model->delete();
        $aux = true;
        $array = explode(",", $subCatUsser);
        foreach($array as $catUsser){
            $data['idUsser'] = $usser['idUssers'];
            $data['idSubCat'] = $catUsser;
            if($model->insert($data)){
                //$aux = true;
            }
            else{
                $aux = false;
            }
        }
        return $aux;
    

    }
    private function insertComunasList($usser, $comunasUsser){
        //subCatUsser = id de las comunas en las que puede trabajar un proveedor
        $model = new ComunasListModel();
        $model->where('idUsser', $usser['idUssers']);
        $model->delete();
        $aux = true;
        $array = explode(",", $comunasUsser);
        foreach($array as $comUsser){
            $data['idUsser'] = $usser['idUssers'];
            $data['idComuna'] = $comUsser;
            if($model->insert($data)){
                //$aux = true;
            }
            else{
                $aux = false;
            }
        }
        return $aux;
    }
    /* Manejo de la tabla admin*/
    public function usser_fetch_all(){   
        $usserModel= new UssersModel();
        $data_table = new TablesIgniter();
        $data_table ->setTable($usserModel->noticeTable())
                    //->setDefaultOrder('id', 'DESC') No    
                    ->setSearch(['idUssers','firstname','genero','telefono','email','refComuna','calle','numero'])
                    ->setOrder(['idUssers','firstname','genero','telefono','email','refComuna','calle','numero'])
                    ->setOutput(['idUssers','firstname','genero','telefono','email','refComuna','calle','numero',$usserModel->buttons()]);

        return $data_table->getDatatable();
    } 



    /* webpay */
    public function crearTransaccion1($num){
        if(is_numeric($num)){    
            $modelPagos = new PagosModel();
            $pagos = $modelPagos->where('meses', '1')->first();
            $valor = $pagos['precio']*$num;
            $meses = 1;
            $regalo = 1;
            $this->crearTransaccion($valor ,$meses , $regalo);
        }
        return redirect()->to('/verplanes');
    }
    public function crearTransaccion2($num){
        if(is_numeric($num)){    
            $modelPagos = new PagosModel();
            $pagos = $modelPagos->where('meses', '3')->first();
            $valor = $pagos['precio']*$num;
            $meses = 3;
            $regalo = 1;
            $this->crearTransaccion($valor ,$meses , $regalo);
        }
        return redirect()->to('/verplanes');
    }
    public function crearTransaccion3($num){      
        if(is_numeric($num)){    
            $modelPagos = new PagosModel();
            $pagos = $modelPagos->where('meses', '6')->first();
            $valor = $pagos['precio']*$num;
            $meses = 6;
            $regalo = 1;
            $this->crearTransaccion($valor ,$meses , $regalo);
        }
        return redirect()->to('/verplanes');
        
    }
    public function crearTransaccion4($num){
        if(is_numeric($num)){    
            $modelPagos = new PagosModel();
            $pagos = $modelPagos->where('meses', '12')->first();
            $valor = $pagos['precio']*$num;
            $meses = 12;
            $regalo = 1;
            $this->crearTransaccion($valor ,$meses , $regalo);
        }
        return redirect()->to('/verplanes');

    }

    public function crearTransaccion($valor ,$meses ,$regalo){
        /* $aux1, $aux2, $aux3 */
        /* aqui tengo que buscar en contrataciones */
        $modelContrataciones = new ContratacionesModel();
        $order = $modelContrataciones->countAll();
		$buy_order = $order+1;
        // Este valor se obtendra de la BD, ya que sera el numero del carro
        session()->set('buy_order', $buy_order);
        session()->set('meses', $meses);
        session()->set('regalo', $regalo);
		$session_id = session()->get('id');
		$amount = $valor;
		$return_url = "http://localhost/git/appnucleova/respuesta/";// a esta ruta llega del metodo de pago
		$transaction = new Transaction();
		$response = $transaction->create($buy_order, $session_id, $amount, $return_url);
		
        
		$auxTDK=[
			'url' => $response->url,
			'token' => $response->token
		];
        session()->set('auxTDK',$auxTDK);
        session()->set('url',$response->url);
		session()->set('token',$response->token);
        return redirect()->to('/verplanes');
	}
	/*Aqui llega */
	public function respuesta1(){
		if(isset($_POST['token_ws'])){
			$token = $_POST['token_ws'];
			$response = Transaction::commit($token);
		}
		if( isset($_POST["TBK_TOKEN"]) ){
			//echo "<script>alert('TBK_token');</script>";
			$token = $_POST['TBK_TOKEN'];
			
			$mensajeControlador =[
			'titulo' => "Compra anulada",
			'mensaje' => "A anulado la compra y a vuelto al comercio",
			];
			session()->set('mensajeControlador',$mensajeControlador);	
			return redirect()->to('/realizar_compraACT');
			
		}
		if(isset($response)){
			$status = $response->getStatus();
		 	session()->remove('token');
			$pedido = session()->get('pedido');
			$flag = $this->statePedido($status, $pedido);/* Cambiar estado en BD*/ //siempre true
			$flag = $this->vars($status);/* Limpiar variables*/
			$flag =$this->modListaProductos($status,$pedido);// cambia las variables en la lista de los productos
			if($status =='AUTHORIZED'){
				
				
			}
			if($status == 'FAILED'){
				


			} 

		}
		else{
			/* A ocurrido un error, por favor intentelo de nuevo */
			 if(!$aux){
				$mensajeControlador =[
					'titulo' => "Compra realizada con exito",
					'mensaje' => "La compra fue realizada con exito, pero no se pudo enviar el correo de confirmacion <br> Verifique su correo en configuracion de cuenta",
					];
			 }
			//$status ='FAILED';
			//$flag = $this->statePedido($status, $pedido);/* Cambiar estado en BD*/ //siempre true
			session()->set('mensajeControlador',$mensajeControlador);	
			return redirect()->to('/realizar_compraACT');
		}




	}
    public function respuesta(){
        //TBK_TOKEN, cuando falla, token_ws, cuando todo va bien 
        //Cuando falla se envia igual: 
        //TBK_ID_SESION
        //TBK_ORDEN_COMRA

        if($this->request->getVar('TBK_TOKEN')){//error
            $tbk = $this->request->getVar('TBK_TOKEN');
            $data['tbk']=$tbk;
        }
        if($this->request->getVar('token_ws')){//correcto
            $ws = $this->request->getVar('token_ws');
            $data['ws']=$ws;
        }
        if($this->request->getVar('TBK_ID_SESION')){
            $tbk_id = $this->request->getVar('TBK_ID_SESION');
            $data['tbk_id']=$tbk_id;
        }
        if($this->request->getVar('TBK_ORDEN_COMRA')){
            $tbk_oc = $this->request->getVar('TBK_ORDEN_COMRA');
            $data['tbk_oc']=$tbk_oc;
        }        
        if(isset($ws)){    
            $response = (new Transaction)->commit($ws); // ó cualquiera de los métodos detallados en el ejemplo anterior del método create.
            if ($response->isApproved()) {
                $data['texto']= "Aprobado";
            } else {
            // Transacción rechazada
            $data['texto']= "rechazada";
            }
        }
        session()->remove('token');
        session()->remove('url');
        session()->remove('auxTDK');

        if($data['texto'] == "Aprobado"){
            //Se envia un correo
            if( session()->has('email')){
                $email = session()->get('email');
                $buy_order = session()->get('buy_order');
                $meses = session()->get('meses');
                $regalo = session()->get('regalo');
                $fecha = new Time('now');
                $idPersona = session()->get('id');
                

                $modelContrataciones = new ContratacionesModel();
                $aux = $modelContrataciones->where('idPersona', $idPersona)->first();
                if($aux != null){
                    $regalo = 0;
                }
                // Ingreso la contratacion
                $data1= [
                    'idPersona' => $idPersona,
                    'idCompra'  => $buy_order,
                    'meses'  => $meses,
                    'meses_regalo'  => $regalo,
                    'fecha_compra'  => $fecha,
                ];
                
                $modelContrataciones->insert($data1);

                //Sumar los meses al usuario
                $this->sumarFechaPersona($idPersona, $meses + $regalo);

                //Mensaje controler, compra realizado con exito
                if($regalo == 0){
                    if($meses == 1){
                        $mensaje = 'Felicidades por su compra, bienvenido a NUCLEOVA PRO. <br>
                        Adquirió '.$meses.' mes de servicio. <br>
                        Orden de compra: '.$buy_order.'.
                        ';
                    }
                    else{
                        $mensaje = 'Felicidades por su compra, bienvenido a NUCLEOVA PRO.<br>
                        Adquirió '.$meses.' meses de servicio. <br>
                        Orden de compra: '.$buy_order.'.
                        ';
                    }
                }
                elseif($regalo == 1){
                    if($meses=1){
                        $mensaje = 'Felicidades por su compra, bienvenido a NUCLEOVA PRO.
                        Adquirió '.$meses.' mes de servicio y por su primera compra le otorgamos 1 mes de regalo.
                        Orden de compra: '.$buy_order.'.
                        ';
                    }
                    else{
                        $mensaje = 'Felicidades por su compra, bienvenido a NUCLEOVA PRO. 
                        Adquirió '.$meses.' meses de servicio y por su primera compra le otorgamos 1 mes de regalo.
                        Orden de compra: '.$buy_order.'.
                        ';
                    }
                }
                else{
                    if($meses == 1){
                        $mensaje = 'Felicidades por su compra, bienvenido a NUCLEOVA PRO. <br>
                        Adquirió '.$meses.' mes de servicio y por su primera compra le otorgamos '.$regalo.' meses de regalo. 
                        Orden de compra: '.$buy_order.'.
                        ';
                    }
                    else{
                        $mensaje = 'Felicidades por su compra, bienvenido a NUCLEOVA PRO. <br>
                        Adquirió '.$meses.' meses de servicio y por su primera compra le otorgamos '.$regalo.' meses de regalo. 
                        Orden de compra: '.$buy_order.'.
                        ';
                    }
                }

                $mensajeControlador= [
                    'titulo' => 'Compra exitosa!',
                    'mensaje'  => $mensaje,
                ];               
                session()->set('mensajeControlador1',$mensajeControlador);


                if($order = 0){
                    //correo primera compra
                    $this->correoUsuarioPro($email, $buy_order, $meses, $regalo, $fecha);
                }else{
                    //correo compra
                    $this->correoUsuarioPro1($email, $buy_order, $meses, $fecha);
                }
                
                
            }
            else{
                $mensajeControlador =[
                    'titulo' => "Error en la compra",
                    'mensaje' => "Por favor notifique a travez del correo: contacto@nucleova.com.",
                    ];
                session()->set('mensajeControlador1',$mensajeControlador);	
            }
            //Se agrega el apartado pro a perfiles y se redirecciona
            
            //Vista usuatios pro

        }else{
            //error en la compra se debe ver a mano que fue lo que paso
            $mensajeControlador =[
                'titulo' => "Error en la compra",
                'mensaje' => "La transacción fue rechazada.",
                ];
            session()->set('mensajeControlador1',$mensajeControlador);	
        }
        
        return redirect()->to('/verplanes');
	}
	
    public function verPlanes(){   
        $modelR = new RegionesModel();
		$modelCo = new ComunasModel();
        $modelCategoria = new CategoriasModel();
        $modelSubCategoria = new SubCategoriasModel();
        $data['region'] = $modelR->findAll();
		$data['comuna'] = $modelCo->orderBy('comuna', 'ASC')->findAll();
        $data['categoria'] = $modelCategoria->findAll();
        $data['subCategoria'] = $modelSubCategoria->findAll();
        echo view('newViews/plans');
        echo view('limites/Fother',$data);
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

    /* Sumar fecha a usuario persona */
    private function sumarFechaPersona($persona, $meses){
        $model = new PersonaModel();
        $user = $model-> where('idPersona', $persona)->first();
        if($user['tiempo'] == null){
            $fecha = new Time('now');
            $fecha = $fecha->addMonths($meses);
            $data['tiempo'] = $fecha;
            $model->where("idPersona", $persona)->set($data)->update();
        }else{
            $fecha = Time::parse($user['tiempo'])->addMonths($meses);
            $data['tiempo'] = $fecha;
            $model->where("idPersona", $persona)->set($data)->update();
        }
    }
    /* correo primera compra */
	private function correoUsuarioPro($correo, $buy_order, $meses, $regalo){
		$email = \Config\Services::email();
        
        $modelPersona = new PersonaModel();
        $userData = $modelPersona->where("email", $correo)->first();
        $nombre = $userData['nombre']; 
        //$modelPersona = new UssersModel();
        //$userData = $modelPersona->where("email", $correo)->first();
        if($regalo == 1){
            $regalo = "1 mes";
        }else{
            $regalo = $regalo." meses";
        }
		$email->setFrom('Contacto@nucleova.com', 'Equipo Nucleova');
		$email->setTo($correo);
        //$email->setTo('cristobal.henriquez.g@gmail.com');
        $email->setSubject('Pago suscripción');
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
                                    <h5>Felicidades '.$nombre.' , esperando se encuentre bien, como equipo NUCLEOVA queremos darle la bienvenida a la versión PRO de nuestro sistema.  </h5>
                                    <h5><b>Orden de compra</b>: '.$buy_order.'</h5>
                                    <h5><b>Has contratado </b>: Nucleova PRO por '.$meses.' meses.</h5>                                    
                                    <h5>Por tu primera compra te regalamos '.$regalo.'.</h5>
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
    /* correo compra */
	private function correoUsuarioPro1($correo, $buy_order, $meses){
		$email = \Config\Services::email();
        
        $modelPersona = new PersonaModel();
        $userData = $modelPersona->where("email", $correo)->first();
        $nombre = $userData['nombre']; 
        //$modelPersona = new UssersModel();
        //$userData = $modelPersona->where("email", $correo)->first();
        
		$email->setFrom('Contacto@nucleova.com', 'Equipo Nucleova');
		$email->setTo($correo);
        //$email->setTo('cristobal.henriquez.g@gmail.com');
        $email->setSubject('Pago suscripción');
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
                                    <h5>Felicidades '.$nombre.' , esperando se encuentre bien, como equipo NUCLEOVA queremos darle la bienvenida a la versión PRO de nuestro sistema.  </h5>
                                    <h5><b>Orden de compra</b>: '.$buy_order.'</h5>
                                    <h5><b>Has contratado </b>: Nucleova PRO por '.$meses.' meses.</h5>                                    
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

    
}
