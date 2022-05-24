<?php
namespace App\Controllers;

use App\Models\RegionesModel;
use App\Models\ComunasModel;
use App\Models\CategoriasModel;
use App\Models\UssersModel;


class InvitadoController extends BaseController
{
    public function invitado()
    {   
        session()->set("verModal", "2");
        $data =[
			'nombre' => "Invitado",
			'isLoggedIn' => true,
		];
		session()->set($data);
        $modelR = new RegionesModel();
		$modelCo = new ComunasModel();
        $modelCategoria = new CategoriasModel();
        $data['region'] = $modelR->findAll();
		$data['comuna'] = $modelCo->orderBy('comuna', 'ASC')->findAll();
        $data['categoria'] = $modelCategoria->findAll();
        echo view('limites/Header',$data);
        echo view('filtros/Filtros');
        echo view('categorias/categorias');
        echo view('limites/Fother');
    }
    
}
