<?php namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;


class CategoriasModel extends Model{
    protected $table      = 'categorias';
    protected $primaryKey = 'id';

    protected $allowedFields = ['id','nombre', 'nombreImagen'];

}