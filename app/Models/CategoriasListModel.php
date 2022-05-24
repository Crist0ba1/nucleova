<?php namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;


class CategoriasListModel extends Model{
    protected $table      = 'CategoriasList';
    protected $primaryKey = 'id';

    protected $allowedFields = ['id','idUsser', 'idSubCat'];

}