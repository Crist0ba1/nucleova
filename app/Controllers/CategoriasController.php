<?php
namespace App\Controllers;

use App\Models\RegionesModel;
use App\Models\ComunasModel;
use App\Models\CategoriasModel;
use App\Models\UssersModel;
use App\Models\SubCategoriasModel;
use App\Models\CategoriasListModel;
use App\Models\ComunasListModel;
use App\Models\ImagenesModel;


use monken\TablesIgniter;
class CategoriasController extends BaseController
{
    
    public function subCategoria($subCat){
        $modelCL = new CategoriasListModel();
        $modelR = new RegionesModel();
		$modelCo = new ComunasModel();
        $modelCategoria = new CategoriasModel();
        $modelSubCategoria = new SubCategoriasModel();
        $data['region'] = $modelR->findAll();
		$data['comuna'] = $modelCo->orderBy('comuna', 'DESC')->findAll();
        $data['categoria'] = $modelCategoria->findAll();
        $data['subCategoria'] = $modelSubCategoria->findAll();
        echo view('limites/Header',$data);
        echo view('filtros/Filtros');
        $data2['proveedores'] = $modelCL->join('ussers','idUsser = idUssers','left')->where('idSubCat', $subCat)->select('idUsser, firstname')->findAll();
        $data2['proveedores'] = $this->encontrarLugar($data2['proveedores']);
        $data2['proveedores'] = $this->encontrarSubCat($data2['proveedores']);
        //die(json_encode($data2));
        $data2['proveedores'] = $this->encontrarImagenes1($data2['proveedores']);
        
        echo view('categorias/postFiltros',$data2);
        echo view('limites/Fother');
        //return json_encode($usserSubCat);
    }

    private function encontrarSubCat($array){
        $modelCL = new CategoriasListModel();
        $data = array();
        foreach($array as $row){
            $row['listaCat']= $modelCL->join('subcategorias','categoriaslist.idSubCat = subcategorias.idSubCat','left')->where('idUsser', $row['idUsser'])->findAll();
            array_push($data, $row);
        }
        return $data;
    }
    private function encontrarLugar($array){
        $modelCL = new ComunasListModel();
        $data = array(); 
        foreach($array as $row){
            $row['listaLug']= $modelCL->join('comunas','idComuna = comunas.id','left')->where('idUsser', $row['idUsser'])->findAll();
            //die(json_encode($row['listaLug']));
            array_push($data, $row);
        }
        return $data;
    }
    public function proveedor($id){
        $modelR = new RegionesModel();
		$modelCo = new ComunasModel();
        $modelCategoria = new CategoriasModel();
        $modelSubCategoria = new SubCategoriasModel();
        $musser = new UssersModel();
        $data['region'] = $modelR->findAll();
		$data['comuna'] = $modelCo->orderBy('comuna', 'ASC')->findAll();
        $data['categoria'] = $modelCategoria->findAll();
        $data['subCategoria'] = $modelSubCategoria->findAll();
        $data['proveedores'] = $musser->select('idUssers,firstname,genero, refRegion,refComuna,
        calle,numero,optional,rf,rl,ri,telefono,email,rz,rut,text')->where('idUssers', $id)->findAll();
        $data['proveedores'] = $this->encontrarLugar2($data['proveedores']);
        $data['proveedores'] = $this->encontrarSubCat2($data['proveedores']);
        $data['proveedores'] = $this->encontrarImagenes($data['proveedores']);
        //die(json_encode($data2));
        echo view('limites/Header',$data);
        echo view('filtros/Filtros');
        echo view('filtros/Proveedor');
        echo view('limites/Fother');
    }
    private function encontrarSubCat2($array){
        $modelCL = new CategoriasListModel();
        $data = array();
        foreach($array as $row){
            $row['listaCat']= $modelCL->join('subcategorias','categoriaslist.idSubCat = subcategorias.idSubCat','left')->where('idUsser', $row['idUssers'])->findAll();
            array_push($data, $row);
        }
        return $data; 
    }
    private function encontrarLugar2($array){
        $modelCL = new ComunasListModel();
        $data = array(); 
        foreach($array as $row){
            $row['listaLug']= $modelCL->join('comunas','idComuna = comunas.id','left')
            ->where('idUsser', $row['idUssers'])
            ->findAll();
            array_push($data, $row);
        }
        return $data;
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
    private function encontrarImagenes1($array){
        $modelCL = new ImagenesModel();
        $data = array(); 
        foreach($array as $row){
            $row['imagenes']= $modelCL->where('idUsers', $row['idUsser'])->findAll();
            array_push($data, $row);
        }
        return $data;
    }

    public function filtro(){
        
        $reg = $this->request->getVar('region');
        $com = $this->request->getVar('comuna');
        if($this->request->getVar('listCategorias')){
            $cat2 = $this->request->getVar('listCategorias');
        }
        if($this->request->getVar('listSubCategorias')){
            $sub2 = $this->request->getVar('listSubCategorias');       
        }

        $modelCL = new CategoriasListModel();
        $modelR = new RegionesModel();
		$modelCo = new ComunasModel();
        $modelCategoria = new CategoriasModel();
        $modelSubCategoria = new SubCategoriasModel();
        $modelCoList = new ComunasListModel();
        $musser = new UssersModel();

        if($reg != 0){
            $comunas = $modelCo->where('region_id', $reg)->findAll();
        }
        if($com != 0){
            $comunas = $modelCo->where('id', $com)->findAll();
                  
        }
        if(isset($cat2)){
            $categorias = $this->stringToarray($cat2);
        }
        if(isset($sub2)){
            $subcategorias = $this->stringToarray($sub2);
        }       
        if(isset($categorias)){ /*Obtengo todas las subcategorias de las categorias seleccionadas*/
            $listSubCategorias = $modelSubCategoria->whereIn('refCat',$categorias)->findAll();
        }
        if(isset($subcategorias)){
            $listSubCategorias = $modelSubCategoria->whereIn('idSubCat',$subcategorias)->findAll();
        }

        if(isset($comunas) && isset($listSubCategorias)){
            $comunas = array_column($comunas, 'id');   
            $listSubCategorias = array_column($listSubCategorias, 'idSubCat');            
            $data2['proveedores'] = $modelCL->join('ussers','idUsser = idUssers','left')
                                            ->join('comunaslist','comunaslist.idUsser = idUssers','left')
                                            ->whereIn('idSubCat', $listSubCategorias)
                                            ->whereIn('idComuna', $comunas)
                                            ->select('comunaslist.idUsser, firstname')
                                            ->groupBy("comunaslist.idUsser")->findAll();
            $data2['proveedores'] = $this->encontrarLugar($data2['proveedores']);
            $data2['proveedores'] = $this->encontrarSubCat($data2['proveedores']);
            $data2['proveedores'] = $this->encontrarImagenes1($data2['proveedores']);
            
        }elseif(isset($comunas)){
            $comunas = array_column($comunas, 'id');   
            $data2['proveedores'] = $modelCoList->join('ussers','idUsser = idUssers','left')->whereIn('idComuna', $comunas)->select('idUsser, firstname')->groupBy("idUsser")->findAll();
            $data2['proveedores'] = $this->encontrarLugar($data2['proveedores']);
            $data2['proveedores'] = $this->encontrarSubCat($data2['proveedores']);
            $data2['proveedores'] = $this->encontrarImagenes1($data2['proveedores']);
        }elseif(isset($listSubCategorias)){
            $listSubCategorias = array_column($listSubCategorias, 'idSubCat');            
            $data2['proveedores'] = $modelCL->join('ussers','idUsser = idUssers','left')->whereIn('idSubCat', $listSubCategorias)->select('idUsser, firstname')->groupBy("idUsser")->findAll();
            $data2['proveedores'] = $this->encontrarLugar($data2['proveedores']);
            $data2['proveedores'] = $this->encontrarSubCat($data2['proveedores']);
            $data2['proveedores'] = $this->encontrarImagenes1($data2['proveedores']);
        }else{ /* Ningun filtro */
            $data2['proveedores'] = $modelCL->join('ussers','idUsser = idUssers','left')->select('idUsser, firstname')->groupBy("idUsser")->findAll();
            $data2['proveedores'] = $this->encontrarLugar($data2['proveedores']);
            $data2['proveedores'] = $this->encontrarSubCat($data2['proveedores']);
            $data2['proveedores'] = $this->encontrarImagenes1($data2['proveedores']);
        }

        $data['region'] = $modelR->findAll();
		$data['comuna'] = $modelCo->orderBy('comuna', 'ASC')->findAll();
        $data['categoria'] = $modelCategoria->findAll();
        $data['subCategoria'] = $modelSubCategoria->findAll();
        echo view('limites/Header',$data);
        echo view('filtros/Filtros');
        echo view('categorias/postFiltros',$data2);
        echo view('limites/Fother');

    }
    private function stringToarray($cadena){
        $cadena = rtrim($cadena);
        $array = explode(" ",$cadena);
        return $array;
    }
}
