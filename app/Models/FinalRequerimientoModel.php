<?php namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;


class FinalRequerimientoModel extends Model{
    protected $table      = 'tabfinalr';
    protected $primaryKey = 'idFR';

    protected $allowedFields = ['idR','refImagen','refEvaluacion','Seleccion', 'Descripcion','created_at','updated_at','deleted_at','idE','idP'];

}
/*
    si refImagen tiene un valor = Termino bien
    si refImagen NO tiene un valor Termino MAL


*/
