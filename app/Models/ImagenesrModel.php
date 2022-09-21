<?php namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;


class ImagenesrModel extends Model{
    protected $table      = 'imagenesr';
    protected $primaryKey = 'idImagReque';

    protected $allowedFields = ['idR', 'estado', 'imagen1','imagen2','imagen3','imagen4','imagen5'];
    // Estado 1 = requerimiento creado
    // Estado 2 = requerimiento finaliazdo
    // Estado 3 = reclamo
}