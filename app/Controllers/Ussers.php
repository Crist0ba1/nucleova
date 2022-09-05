<?php
namespace App\Controllers;

require_once './vendor/autoload.php';
use Transbank\Webpay\WebpayPlus\Transaction;
/*
\Transbank\Webpay\WebpayPlus::setIntegrationType("");
\Transbank\Webpay\WebpayPlus::setCommerceCode("");
\Transbank\Webpay\WebpayPlus::setApiKey("");
*/


use App\Models\RegionesModel;
use App\Models\ComunasModel;
use App\Models\CategoriasModel;
use App\Models\UssersModel;
use App\Models\ImagenesModel;
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
                    session()->set('errorLogin',"Error, al iniciar sesion, intentelo otra vez");
                    return redirect()->to('/login');
                }
                
                
            }
 
		}
            return redirect()->to('/login')->with('mensaje','Error, intente mas tarde');


            
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

       /*falta verificar que el correo sea unico*/      
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
        else{
            die('Borra el correo de ejemplo');
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
            $url= '/pasareladepago'.'/'.$valor;
            return redirect()->to($url);
        }else{
            return redirect()->to('/verplanes');
        }
    }
    public function crearTransaccion2($num){
        if(is_numeric($num)){    
            $modelPagos = new PagosModel();
            $pagos = $modelPagos->where('meses', '3')->first();
            $valor = $pagos['precio']*$num;
            $url= '/pasareladepago'.'/'.$valor;
            return redirect()->to($url);
        }else{
            return redirect()->to('/verplanes');
        }
    }
    public function crearTransaccion3($num){
        if(is_numeric($num)){    
            $modelPagos = new PagosModel();
            $pagos = $modelPagos->where('meses', '6')->first();
            $valor = $pagos['precio']*$num;
            $this->crearTransaccion($valor);
        }else{
            return redirect()->to('/verplanes');
        }
    }
    public function crearTransaccion4($num){
        if(is_numeric($num)){    
            $modelPagos = new PagosModel();
            $pagos = $modelPagos->where('meses', '12')->first();
            $valor = $pagos['precio']*$num;
            $this->crearTransaccion($valor);
        }else{
            return redirect()->to('/verplanes');
        }
    }

    public function crearTransaccion($valor){
        /* $aux1, $aux2, $aux3 */
        $order = random_int(0, 999);
		$buy_order = $order; // Este valor se obtendra de la BD, ya que sera el numero del carro
		$session_id = 4;
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

        die(json_encode($data));
        
        session()->remove('token');
        session()->remove('url');
        session()->remove('auxTDK');
        $mensajeControlador =[
            'titulo' => "Por la mismisima csm",
            'mensaje' => "Por que chicha la wea no funciona",
            ];
        session()->set('mensajeControlador',$mensajeControlador);	
        if(!session()->has('mensajeControlador')){
            
        }
        $aux = false; //Es para el else
		if($this->request->getVar('token_ws')){
			$token = $this->request->getVar('token_ws');
        
            $response = (new Transaction)->commit($token);
			//$response = Transaction::commit($token);
            /*
            $value = substr ( $value, 9, 72);
            $token = strtok($value, " \n\t");   
            $response = (new Transaction)->status($token);
            */
            
		}

		if($this->request->getVar('TBK_TOKEN')){
			//echo "<script>alert('TBK_token');</script>";
			$token = $_POST['TBK_TOKEN'];
			
			$mensajeControlador =[
			'titulo' => "Compra anulada",
			'mensaje' => "A anulado la compra y a vuelto al comercio",
			];
			session()->set('mensajeControlador',$mensajeControlador);	
			return redirect()->to('/verplanes');
			
		}

		if(isset($response)){
			$status = $response->getStatus();
		 	 session()->remove('token');
             session()->remove('url');
             session()->remove('auxTDK');

            if($response->isApproved()){
				$aux = $this->sendEmailTDK();
                
                if(!$aux){
                    $mensajeControlador =[
                        'titulo' => "Compra realizada con exito",
                        'mensaje' => "La compra fue realizada con exito, pero no se pudo enviar el correo de confirmacion <br> Verifique su correo en configuracion de cuenta",
                        ];
                }
                else{
                    $mensajeControlador =[
                        'titulo' => "Compra realizada con exito",
                        'mensaje' => "La compra fue realizada con exito, pero no se pudo enviar el correo de confirmacion <br> Verifique su correo en configuracion de cuenta",
                        ];
                }    
                
                session()->set('mensajeControlador',$mensajeControlador);	
                if(!session()->has('mensajeControlador')){
                    die($mensajeControlador['titulo']);
                }

                return redirect()->to('/verplanes');

			}
			else{
                $mensajeControlador =[
                    'titulo' => "LA compra a fallado",
                    'mensaje' => "La compra NO pudo ser realizada con exito",
                    ];
                session()->set('mensajeControlador',$mensajeControlador);	
                return redirect()->to('/verplanes');
			} 
				/* falta diferenciar el status
				 y almacenarlo en la BD pero */
		}
		else{
            
			/* A ocurrido un error, por favor intentelo de nuevo */
			 if(!$aux){
				$mensajeControlador =[
					'titulo' => "Todo fallo",
					'mensaje' => "Todo mal",
					];
			 }
			//$status ='FAILED';
			//$flag = $this->statePedido($status, $pedido);/* Cambiar estado en BD*/ //siempre true
			session()->set('mensajeControlador',$mensajeControlador);	
			return redirect()->to('/verplanes');
		}




	}
	
    private function sendEmailTDK(){
		$email = \Config\Services::email();

		$email->setFrom('Contacto@nucleova.com', 'Equipo de ventas Nucleova');
		$email->setTo('cristobal.henriquez.g@gmail.com'); //session()->get('email')
		$email->setSubject('Membresia pagada con exito');
		$nombre = "Cristobal Henriquez";//session()->get('nombre');
		$pedido = "0001";//session()->get('numeroAux');
		$email->setMessage('
				<h3><b>¡Felicidades '.$nombre.'!</b>, hemos recibido correctamente tu pago. Nuestro equipo se encuentra preparando tu pedido y próximamente lo tendrás disponible.</h3>
				<h3>El identificador del pado de la membresia es: <b>Nuc'.$pedido.'</b></h3>
				<br>					
				<h3>Atentamente: EQUIPO NUCLEOVA</h3>
				<div align="center"><img  src="http://app.nucleova.com/public/assets/Logos/LogoHSF.png" heigth="415" width="160" class="mx-auto d-block"></div>
		');

		if($email->send()){
			return true;
		}
		else{
			return false;
		}

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


    /*Cliente */
    public function dashbordCliente1(){
        $modelR = new RegionesModel();
		$modelCo = new ComunasModel();
        $modelCategoria = new CategoriasModel();
        $modelSubCategoria = new SubCategoriasModel();
        $data['region'] = $modelR->findAll();
		$data['comuna'] = $modelCo->orderBy('comuna', 'ASC')->findAll();
        $data['categoria'] = $modelCategoria->findAll();
        $data['subCategoria'] = $modelSubCategoria->findAll();
        echo view('newViews/inicio',$data);
        //echo view('limites/Fother');
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
}
