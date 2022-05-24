<?php
namespace App\Controllers;

use App\Models\RegionesModel;
use App\Models\ComunasModel;
use App\Models\CategoriasModel;
use App\Models\UssersModel;
use App\Models\ImagenesModel;
use App\Models\SubCategoriasModel;
use App\Models\CategoriasListModel;
use App\Models\ComunasListModel;
use monken\TablesIgniter;
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

            $bool = $this->validarUSuario($this->request->getVar('emailrL'),$this->request->getVar('passwordrL'));

			if(!$bool){
                session()->set('errorLogin',"Error, credenciales de acceso erroneas");
			} else{
				$model = new UssersModel();
				$user = $model->where('email', $this->request->getVar('emailrL'))->first();

				$this-> setUserSession($user); // aqui tenemos ya al usuario que corresponde

				if($user['tipo']==0){//admin
					return redirect()->to('/dashbordAdmin');
				}
				if($user['tipo']==1){//Proveedor
					return redirect()->to('/dashbordCliente');
				}
				if($user['tipo']==2){//cliente
					return redirect()->to('/dashbordProveedor');
				}
                session()->set('errorLogin',"Error, al iniciar sesion, intentelo otra vez");
                return redirect()->to('/login');
			}

		}
        
            return redirect()->to('/login');
        
            
    }
    private function validarUSuario($correo,$clave){
        $model = new UssersModel();
        $user = $model-> where('email', $correo)
            ->first();
        if(!$user)
            return false;
        
        return password_verify($clave,$user['clave']);

    }
    public function register()
    {
        $modelR = new RegionesModel();
		$modelCo = new ComunasModel();
        $modelCategoria = new CategoriasModel();
        $data['region'] = $modelR->findAll();
		$data['comuna'] = $modelCo->orderBy('comuna', 'ASC')->findAll();
        $data['categoria'] = $modelCategoria->findAll();
        echo view('limites/Header3',$data);
        echo view('ussers/register');
        echo view('limites/Fother');
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
        echo view('filtros/filtros');
        echo view('categorias/categorias');
        echo view('limites/Fother');
    }
    public function dashbordInvitado()
    {
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
		session()->set($data);
		
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
        $model->where('id', $usser['idUssers']);
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
        $model->where('id', $usser['idUssers']);
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

}
