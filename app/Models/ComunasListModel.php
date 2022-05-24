<?php namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;


class ComunasListModel extends Model{
    protected $table      = 'ComunasList';
    protected $primaryKey = 'id';

    protected $allowedFields = ['id','idUsser', 'idComuna'];

}