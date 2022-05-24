<?php namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;


class ImagenesModel extends Model{
    protected $table      = 'imagenes';
    protected $primaryKey = 'id';

    protected $allowedFields = ['id','idUsers', 'imagen1','imagen2','imagen3','imagen4','imagen5'];

}