<?php
namespace App\Controllers;

use CodeIgniter\I18n\Time;
use App\Models\RegionesModel;
use App\Models\ComunasModel;
use App\Models\CategoriasModel;
use App\Models\UssersModel;
use App\Models\SubCategoriasModel;
use App\Models\PagosModel;
use App\Models\PersonaModel;
use App\Models\MatchModel;
use App\Models\ImagenesModel;
use App\Models\CategoriasListModel;
use App\Models\ComunasListModel;

use App\Models\RequerimientoModel;
use App\Models\ImagenesrModel;

class proController extends BaseController
{
    public function proPerfil(){
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
                
                if(session()->has("isLoggedIn") && session()->get("tipo") == 1 ){ //Buscador
                    return redirect()->to('/dashborEmpresa');
                }
                elseif(session()->has("isLoggedIn") && session()->get("tipo") == 2){//P Persona Natural
                    return redirect()->to('/');
                }
                elseif(session()->has("isLoggedIn") && session()->get("tipo") == 3){//P Empresa
                    return redirect()->to('/');
                }
                else{
                    return redirect()->to('/');
                }

            }else{
                return redirect()->to('/perfil');
            }
        }
            
        return redirect()->to('/perfil');
    
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
        echo view('newViews/subscription');
        echo view('limites/Fother',$data);
    }
    public function verPlanes(){   
        $modelR = new RegionesModel();
		$modelCo = new ComunasModel();
        $modelCategoria = new CategoriasModel();
        $modelSubCategoria = new SubCategoriasModel();
        $modelPagos = new PagosModel();
        $data['pagos'] = $modelPagos->findAll();
        $data['region'] = $modelR->findAll();
		$data['comuna'] = $modelCo->orderBy('comuna', 'ASC')->findAll();
        $data['categoria'] = $modelCategoria->findAll();
        $data['subCategoria'] = $modelSubCategoria->findAll();
        echo view('newViews/plans',$data);
        echo view('limites/Fother');
    }
    public function search(){
        $modelR = new RegionesModel();
		$modelCo = new ComunasModel();
        $modelCategoria = new CategoriasModel();
        $modelSubCategoria = new SubCategoriasModel();
        $modelPagos = new PagosModel();
        $data['pagos'] = $modelPagos->findAll();
        $data['region'] = $modelR->findAll();
		$data['comuna'] = $modelCo->orderBy('comuna', 'ASC')->findAll();
        $data['categoria'] = $modelCategoria->findAll();
        $data['subCategoria'] = $modelSubCategoria->findAll();
        if(session()->get('tipo')==1){
            echo view('newViews/ClientViews/baseLoggedClient',$data);
        }
        elseif(session()->get('tipo')==2){
            echo view('newViews/UserViews/baseLoggedUser',$data);
        }
        elseif(session()->get('tipo')==3){
            echo view('newViews/UserViews/baseLoggedUser',$data);
        }else{
            return redirect()->to('/');
        }
        echo view('newViews/search',$data);
        //echo view('newViews/inicio',$data);
        echo view('limites/Fother');
    }

    public function historial(){
        $modelR = new RegionesModel();
		$modelCo = new ComunasModel();
        $modelCategoria = new CategoriasModel();
        $modelSubCategoria = new SubCategoriasModel();
        $modelPagos = new PagosModel();
        $data['pagos'] = $modelPagos->findAll();
        $data['region'] = $modelR->findAll();
		$data['comuna'] = $modelCo->orderBy('comuna', 'ASC')->findAll();
        $data['categoria'] = $modelCategoria->findAll();
        $data['subCategoria'] = $modelSubCategoria->findAll();
        echo view('newViews/ClientViews/baseLoggedClient',$data);
        //echo view('newViews/inicio',$data);
        echo view('limites/Fother');
    }


    public function proveedorProo($numProveedor){
        $modelR = new RegionesModel();
		$modelCo = new ComunasModel();
        $modelCategoria = new CategoriasModel();
        $modelSubCategoria = new SubCategoriasModel();
        $modelPagos = new PagosModel();
        $data['pagos'] = $modelPagos->findAll();
        $data['region'] = $modelR->findAll();
		$data['comuna'] = $modelCo->orderBy('comuna', 'ASC')->findAll();
        $data['categoria'] = $modelCategoria->findAll();
        $data['subCategoria'] = $modelSubCategoria->findAll();
        echo view('newViews/providerProfile',$data);
        //echo view('newViews/inicio',$data);
        echo view('limites/Fother');
    }
    
    /* Cliente que es la empresa  */
    public function dashborEmpresa(){
        $modelR = new RegionesModel();
		$modelCo = new ComunasModel();
        $modelCategoria = new CategoriasModel();
        $modelSubCategoria = new SubCategoriasModel();
        $modelPagos = new PagosModel();
        $data['pagos'] = $modelPagos->findAll();
        $data['region'] = $modelR->findAll();
		$data['comuna'] = $modelCo->orderBy('comuna', 'ASC')->findAll();
        $data['categoria'] = $modelCategoria->findAll();
        $data['subCategoria'] = $modelSubCategoria->findAll();
        echo view('newViews/ClientViews/baseLoggedClient',$data);
        echo view('newViews/ClientViews/Empresa');
        //echo view('newViews/inicio',$data);
        echo view('limites/Fother');
    }

    public function requerimientos(){
        $modelR = new RegionesModel();
		$modelCo = new ComunasModel();
        $modelCategoria = new CategoriasModel();
        $modelSubCategoria = new SubCategoriasModel();
        $modelPagos = new PagosModel();
        $data['pagos'] = $modelPagos->findAll();
        $data['region'] = $modelR->findAll();
		$data['comuna'] = $modelCo->orderBy('comuna', 'ASC')->findAll();
        $data['categoria'] = $modelCategoria->findAll();
        $data['subCategoria'] = $modelSubCategoria->findAll();
        /* Busco las match del proveedor */
        $data['proveedores'] = $this->searchProveedores();
        /* Se obtienen los requerimientos*/
        $data['requerimientos'] = $this->requerimientosEmpresa();
        //die(json_encode($data['requerimientos']));
        echo view('newViews/ClientViews/baseLoggedClient',$data);
        echo view('newViews/ClientViews/requirementsClient');
        //echo view('newViews/inicio',$data);
        echo view('limites/Fother');
    }

    public function nuevoRequerimiento(){
        helper(['form']);
        $modelM = new MatchModel();
        $model = new RequerimientoModel();
        $modelI = new ImagenesrModel();
        $session = session();

       /*falta verificar que el correo sea unico*/      
		if($this-> request -> getMethod() == 'post' ){
            $data['prestadores'] = $this->request->getVar('prestadores');
            $imageFile1 = $this->request->getFile('filePhoto0');
            $imageFile2 = $this->request->getFile('filePhoto1');
            $imageFile3 = $this->request->getFile('filePhoto2');
            $imageFile4 = $this->request->getFile('filePhoto3');
            $imageFile5 = $this->request->getFile('filePhoto4');

            /* Encuentro la relacino de match */
            $match = $modelM->where('idEmpresa', session()->get('id'))->where('idProveedor',$data['prestadores'])->first();
           $requerimiento['idM'] = $match['idM'];
           $requerimiento['titulo'] = $this->request->getVar('inputTitleReq');
           $requerimiento['descripcion'] = $this->request->getVar('textDescriptionReq');
           $requerimiento['subCat'] = $this->request->getVar('subCategoriaSelect');
           $requerimiento['estado'] = 1;
           $requerimiento['fechaPublicado'] = new Time('now');
           
           /* Se inserta el nuevo requerimiento */
           if($model->insert($requerimiento)){
                $req = $model->where('idM', $requerimiento['idM'])
                             ->where('fechaPublicado', $requerimiento['fechaPublicado'])
                             ->where('titulo', $requerimiento['titulo'])->first();
                $idReq = $req['idR'];
                if($req != null){
                    $nombre_fichero = './public/imgsReq/'.$idReq;
                    if(!file_exists($nombre_fichero)){
                       //Si no existe, lo crea
                        mkdir($nombre_fichero, 0777, true);                    
                    }
                    $dataFile['idR'] = $idReq;
                    $dataFile['estado'] = 1;

                    if($imageFile1 != null){
                        $dataFile['imagen1'] = $imageFile1->getRandomName();
                    }if($imageFile2 != null){
                        $dataFile['imagen2'] = $imageFile2->getRandomName();
                    }if($imageFile3 != null){
                        $dataFile['imagen3'] = $imageFile3->getRandomName();
                    }if($imageFile4 != null){
                        $dataFile['imagen4'] = $imageFile4->getRandomName();
                    }if($imageFile5 != null){
                        $dataFile['imagen5'] = $imageFile5->getRandomName();
                    }
                    if($modelI->insert($dataFile)){
                        //Si se agrega a la BD, se mueven las imagenes
                        if($imageFile1 != null){
                            $imageFile1->move($nombre_fichero, $dataFile['imagen1']);
                        }if($imageFile2 != null){
                            $imageFile2->move($nombre_fichero, $dataFile['imagen2']);
                        }if($imageFile3 != null){
                            $imageFile3->move($nombre_fichero, $dataFile['imagen3']);
                        }if($imageFile4 != null){
                            $imageFile4->move($nombre_fichero, $dataFile['imagen4']);
                        }if($imageFile5 != null){
                            $imageFile5->move($nombre_fichero, $dataFile['imagen5']);
                        }
                        return redirect()->to('/requerimientos');
    
                    }else{
                        rmdir($nombre_fichero);
                        return redirect()->to('/perfil');
                        die('No redirecciona, true');
                    }

                }else{
                    die('error al obtener el requerimiento');
                }
                /* Tengo que copiar las imagenes a la carpeta  */
           }else{
                die('error al crear el requerimiento');
           }

        }
        else{
            die('error en el post');
        }
        return redirect()->to('/perfil');
    }
    public function mis_proveedores(){
        $modelR = new RegionesModel();
		$modelCo = new ComunasModel();
        $modelCategoria = new CategoriasModel();
        $modelSubCategoria = new SubCategoriasModel();
        $modelPagos = new PagosModel();
        $data['pagos'] = $modelPagos->findAll();
        $data['region'] = $modelR->findAll();
		$data['comuna'] = $modelCo->orderBy('comuna', 'ASC')->findAll();
        $data['categoria'] = $modelCategoria->findAll();
        $data['subCategoria'] = $modelSubCategoria->findAll();
        $aux = $this->solicitudesEmpresa(2);
        if($aux != null){
            $data['proveedor'] = 1;
            $data['solicitudes'] =  $aux;
            $data['solicitudes'] = $this->encontrarImagenes($data['solicitudes']);
        }else{
            $data['proveedor'] = 0;
        }
        echo view('newViews/ClientViews/myClients',$data);
        //echo view('newViews/inicio',$data);
        echo view('limites/Fother');
    }


    /* Usser que son los proveedores */
    public function mis_clientes(){
        $modelR = new RegionesModel();
		$modelCo = new ComunasModel();
        $modelCategoria = new CategoriasModel();
        $modelSubCategoria = new SubCategoriasModel();
        $modelPagos = new PagosModel();
        $data['pagos'] = $modelPagos->findAll();
        $data['region'] = $modelR->findAll();
		$data['comuna'] = $modelCo->orderBy('comuna', 'ASC')->findAll();
        $data['categoria'] = $modelCategoria->findAll();
        $data['subCategoria'] = $modelSubCategoria->findAll();
        $aux = $this->solicitudesProveedor(2);
        if($aux != null){
            $data['clientes'] = 1;
            $data['solicitudes'] =  $aux;
            $data['solicitudes'] = $this->encontrarImagenes($data['solicitudes']);
        }else{
            $data['clientes'] = 0;
        }
        /* Debo encontrar los clientes de la persona */
        echo view('newViews/UserViews/myClients',$data);
        //echo view('newViews/inicio',$data);
        echo view('limites/Fother');
    }
    
    public function solicitudes(){
        /* Al proveedor le llegan solicitudes*/
        $modelR = new RegionesModel();
		$modelCo = new ComunasModel();
        $modelCategoria = new CategoriasModel();
        $modelSubCategoria = new SubCategoriasModel();
        $modelPagos = new PagosModel();
        $data['pagos'] = $modelPagos->findAll();
        $data['region'] = $modelR->findAll();
		$data['comuna'] = $modelCo->orderBy('comuna', 'ASC')->findAll();
        $data['categoria'] = $modelCategoria->findAll();
        $data['subCategoria'] = $modelSubCategoria->findAll();
        $aux = $this->solicitudesProveedor(1);
        if($aux != null){
            $data['solicitud'] = 1;
            $data['solicitudes'] =  $aux;
            $data['solicitudes'] = $this->encontrarImagenes($data['solicitudes']);
        }else{
            $data['solicitud'] = 0;
        }
        echo view('newViews/UserViews/myClients',$data);
        //echo view('newViews/inicio',$data);
        echo view('limites/Fother');
    }
    public function mis_requerimientos(){
        $modelR = new RegionesModel();
		$modelCo = new ComunasModel();
        $modelCategoria = new CategoriasModel();
        $modelSubCategoria = new SubCategoriasModel();
        $modelPagos = new PagosModel();
        $data['pagos'] = $modelPagos->findAll();
        $data['region'] = $modelR->findAll();
		$data['comuna'] = $modelCo->orderBy('comuna', 'ASC')->findAll();
        $data['categoria'] = $modelCategoria->findAll();
        $data['subCategoria'] = $modelSubCategoria->findAll();
        $data['requerimientos'] = $this->requerimientosProveedor();
        echo view('newViews/UserViews/requirementsUser',$data);
        //echo view('newViews/inicio',$data);
        echo view('limites/Fother');
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
    private function solicitudesProveedor($buscar){
        $modelM = new MatchModel();
        $modelP = new PersonaModel();
        $ModelU = new UssersModel();
        $solicitudes = $modelM->where('idProveedor', session()->get('id'))
                              ->where('estado', $buscar)
                            ->select('idEmpresa')->findAll();
       if($solicitudes != null){
            $myArray = array();
            foreach($solicitudes as $sol){
                array_push($myArray, $sol['idEmpresa']);
            }
            $personas = $modelP->where('idPersona', $myArray)->select('otraID')->findAll();
            //die(json_encode($personas)); //aqui se tienen a todas las personas
            $myArray1 = array();
            foreach($personas as $per){
                array_push($myArray1, $per['otraID']);
            }
            $usser = $ModelU->where('idUssers', $myArray1)->findAll();
            return $usser;
       }
       return null;

    }
    private function solicitudesEmpresa($buscar){
        $modelM = new MatchModel();
        $modelP = new PersonaModel();
        $ModelU = new UssersModel();
        $solicitudes = $modelM->where('idEmpresa', session()->get('id'))
                              ->where('estado', $buscar)
                            ->select('idProveedor')->findAll();
       if($solicitudes != null){
            $myArray = array();
            foreach($solicitudes as $sol){
                array_push($myArray, $sol['idProveedor']);
            }
            $personas = $modelP->where('idPersona', $myArray)->select('otraID')->findAll();
            //die(json_encode($personas)); //aqui se tienen a todas las personas
            $myArray1 = array();
            foreach($personas as $per){
                array_push($myArray1, $per['otraID']);
            }
            $usser = $ModelU->where('idUssers', $myArray1)->findAll();
            return $usser;
       }
       return null;

    }
    private function encontrarImagenes($array){
        $modelCL = new ImagenesModel();
        $data = array(); 
        foreach($array as $row){
            $row['imagenes']= $modelCL->where('idUsers', $row['idUssers'])->findAll();
            array_push($data, $row);
        }
        return $data;
    }
    private function requerimientosEmpresa(){
        $modelreq = new RequerimientoModel();
        $modelI = new ImagenesrModel();
        $modelM = new MatchModel(); 
        /* Obtengo todos los matchs */
        $matchs = $modelM->where('estado', 2)->where('idEmpresa', session()->get('id'))->findAll();
        $arrayRequerimientos = array();
        /* Recorro los match para buscar los requerimientos */
        foreach($matchs as $match){
            $req = $modelreq->where('idM',$match['idM'])->findAll();
            //$req['imgR'] = $modelI->where('idR',$req['idR'])->first();
            array_push($arrayRequerimientos, $req);
        }
        return $arrayRequerimientos;
    }
    private function requerimientosProveedor(){
        $modelreq = new RequerimientoModel();
        $modelI = new ImagenesrModel();
        $modelM = new MatchModel(); 
        /* Obtengo todos los matchs */
        $matchs = $modelM->where('estado', 2)->where('idProveedor', session()->get('id'))->findAll();
        $arrayRequerimientos = array();
        /* Recorro los match para buscar los requerimientos */
        foreach($matchs as $match){
            //$req = $modelreq->where('idM',$match['idM'])->where('estado !=',0)->findAll();
            $req = $modelreq->where('idM',$match['idM'])->findAll();
            //$req['imgR'] = $modelI->where('idR',$req['idR'])->first();
            array_push($arrayRequerimientos, $req);
        }
        return $arrayRequerimientos;
    }
    public function eliminarRequerimiento($idRequerimiento){
        $model = new RequerimientoModel();
        $modelIR = new ImagenesrModel();
        $model->where('idR',$idRequerimiento);                
        if($model->delete()){
            $modelIR->where('idR',$idRequerimiento);
            if($modelIR->delete()){
                $dirname = './public/imgsReq/'.$idRequerimiento;
                $this->borrar_directorio($dirname);
                $data['requerimientos'] = $this->requerimientosEmpresa();
                return $data;
            }
            else{
                return json_encode(2);
            }
        }
        return json_encode(3);
    }
    public function cancelarRequerimiento($idRequerimiento){
        $model = new RequerimientoModel();
        $estado['estado'] = 0;
        $model->where('idR',$idRequerimiento);                      
        if($model->set($estado)->update()){            
            $data['requerimientos'] = $this->requerimientosProveedor();
            return $data;            
        }
        return json_encode(3);
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

    /*********** Inicio Seccion de MATCH ***********/
    public function enviarSolicitud($idProveedor){
        $modelM = new MatchModel(); 
        $modelU = new UssersModel();        
        $modelP = new PersonaModel();
        $data['idEmpresa'] = session()->get('id');
        /*  idProveedor es el id de usser no de la persona */
        $usser = $modelU->where('idUssers',$idProveedor)->first();
        if($usser != null){
            $persona = $modelP->where('otraID',$idProveedor)->first();
            if($persona != null){
                $idPersona = $persona['idPersona'];
                $data['idProveedor'] = $idPersona;
                $data['estado'] = 1;
                if($modelM->insert($data)){
                    /* Correo enviar solicitud*/
                    //Empresa envia solicitud a proveedor
                    //$this->enviarSolicitudCorreo($usser, $persona);
                    return json_encode(1);
                }else{
                    return json_encode(2);
                }
            }
        }
        return json_encode(3);
    }
    public function cancelarSolicitud($idProveedor){
        $modelM = new MatchModel(); 
        $modelU = new UssersModel();        
        $modelP = new PersonaModel();
        $data['idEmpresa'] = session()->get('id');
        /*  idProveedor es el id de usser no de la persona */
        $usser = $modelU->where('idUssers',$idProveedor)->first();
        if($usser != null){
            $persona = $modelP->where('otraID',$idProveedor)->first();
            if($persona != null){
                $idPersona = $persona['idPersona'];
                $verificar =  $modelM->where('idEmpresa', session()->get('id'))->where('idProveedor', $persona['idPersona'])->first();
                if($verificar != null && $verificar['estado'] == 1){
                    $modelM->where('idM',$verificar['idM']);
                    $modelM->delete();
                    return json_encode(1);
                }else{
                    return json_encode(2);
                }
            }
        }
        return json_encode(3);
    }
    public function aceptarSolicitud($idEmpresa){
        $modelM = new MatchModel(); 
        $modelU = new UssersModel();        
        $modelP = new PersonaModel();
        /*  idProveedor es el id de usser no de la persona */
            $persona = $modelP->where('otraID',$idEmpresa)->first();
            if($persona != null){
                $idPersona = $persona['idPersona'];// que es el id de la persona que tiene la empresa
                $modelM->where('idEmpresa', $idPersona)->where('idProveedor', session()->get('id'))->first();
                $data['estado'] = 2;
                if($modelM->set($data)->update()){
                    return json_encode(1);
                }else{
                    return json_encode(2);
                }
            }
        
        return json_encode(3);
    }
    public function eliminarSolicitud($idEmpresa){
        $modelM = new MatchModel(); 
        $modelU = new UssersModel();        
        $modelP = new PersonaModel();

            $persona = $modelP->where('otraID',$idEmpresa)->first();
            if($persona != null){
                $idPersona = $persona['idPersona'];
                $verificar = $modelM->where('idEmpresa', $idPersona)->where('idProveedor', session()->get('id'))->first();
                if($verificar != null){
                    $modelM->where('idM',$verificar['idM']);
                    $modelM->delete();
                    return json_encode(1);
                }else{
                    return json_encode(2);
                }
            }
        return json_encode(3);
    }
    public function eliminarProveedor($idProveedor){
        $modelM = new MatchModel(); 
        $modelU = new UssersModel();        
        $modelP = new PersonaModel();
        $usser = $modelU->where('idUssers',$idProveedor)->first();
        if($usser != null){
            $persona = $modelP->where('otraID',$idProveedor)->first();
            if($persona != null){
                $idPersona = $persona['idPersona'];
                $verificar = $modelM->where('estado', 2)->where('idEmpresa', session()->get('id'))->where('idProveedor',$persona['idPersona'])->first();
                if($verificar != null){
                    $modelM->where('idM',$verificar['idM']);
                    $modelM->delete();
                    return json_encode(1);
                }else{
                    return json_encode(2);
                }
            }
        }
        return json_encode(3);
    }
    private function searchProveedores(){
        $modelM = new MatchModel(); 
        $modelU = new UssersModel();        
        $modelP = new PersonaModel();
        $modelCatList = new CategoriasListModel();
        $proveedores = $modelM->where('idEmpresa', session()->get('id'))->findAll();
        $arrayPersonas = array();/* Array con todos los proveedores (despues del for)*/
        foreach($proveedores as $prov){
            $persona = $modelP->where('idPersona', $prov['idProveedor'])
                              ->select('idPersona , otraID, nombre')->first();
            /* Se busca las subcategorias en las que trabaja un proveedor */
            $persona['subCats'] = $modelCatList->where('idUsser', $persona['otraID'])->select('idSubCat')->findAll();
            array_push($arrayPersonas, $persona);
        }

        return $arrayPersonas;
    }
    /*********** Fin Seccion de MATCH ***********/
    /*********** Inicio Correos MATCH ***********/
    private function enviarSolicitudCorreo($usser, $persona){
		$email = \Config\Services::email();
        
        $modelPersona = new PersonaModel();        
    
		$email->setFrom('Contacto@nucleova.com', 'Equipo Nucleova');
		//$email->setTo($persona['email']);
        $email->setTo('cristobal.henriquez.g@gmail.com');
		$email->setSubject('Solicitud de servicios');
        $parte1 = ('');
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
                                    <h5>'.$persona["nombre"].' Tienes una nueva solicitud de servicios <h5>
                                    <h5>'.session()->get("nombreEM").' te a enviado una solicitud de servicios para que trabajes con ellos.</h5>
                                    <h5> Correo: '.session()->get("email").'.</h5>
                                    <h5> Telefono: '.session()->get("telefonoEM").'.</h5>
                                    <h5> Telefono: '.session()->get("telefonoEM").'.</h5>
                                    <h5> Para mas detalles: 
                                    <a style="background-color: white; color:#314a9a!important" href="http://localhost/git/appnucleova/empresa/'.session()->get("idEM").'" class="btn btn-primary"><i class="fa fa-eye" aria-hidden="true"></i> Ver más</a>
                                    <h5>
                                    
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

    private function cancelarSolicitudCorreo($correo){
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
    /*********** Fin Correos MATCH ***********/

}
