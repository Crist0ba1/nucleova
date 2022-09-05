<?php namespace App\Models;

use CodeIgniter\Model;

class ContratacionesModel extends Model{
    protected $table = 'contrataciones';
    protected $primaryKey = 'idContratacion ';
    protected $allowedFields = ['idContratacion ','idPersona', 'idCompra','meses','meses_regalo','fecha_compra'];
    protected $beforeInsert = ['beforeInsert'];
    protected $beforeUpdate = ['beforeUpdate'];

    protected function beforeInsert(array $data){
        // Aqui se debe agregar el tiempo a la persona directamente
    }
    protected function beforeUpdate(array $data){
        $data = $this -> passwordHash($data);
        return $data;
    } 
 
}