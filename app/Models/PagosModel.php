<?php namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;


class PagosModel extends Model{
    protected $table      = 'pagos';
    protected $primaryKey = 'id';

    protected $allowedFields = ['meses','agregados', 'descuento','descuentoPorc','precio','texto1','mejorPrecio'];

}