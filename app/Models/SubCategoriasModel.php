<?php namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;


class SubCategoriasModel extends Model{
    protected $table      = 'subcategorias';
    protected $primaryKey = 'idSubCat';

    protected $allowedFields = ['idSubCat','refCat', 'nombreSub'];

}