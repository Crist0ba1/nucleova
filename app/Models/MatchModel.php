<?php namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;


class MatchModel extends Model{
    protected $table      = 'tabmatch';
    protected $primaryKey = 'idM';

    protected $allowedFields = ['idEmpresa','idProveedor', 'estado','created_at','updated_at','deleted_at'];

}