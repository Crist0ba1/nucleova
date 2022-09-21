<?php namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;

class ContratacionesModel extends Model{
    protected $table = 'contrataciones';
    protected $primaryKey = 'idContratacion';
    protected $allowedFields = ['idPersona', 'idCompra','meses','meses_regalo','fecha_compra'];
    
 
}