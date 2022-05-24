<?php namespace App\Models;

use CodeIgniter\Model;

class UssersModel extends Model{
    protected $table = 'ussers';
    protected $primaryKey = 'idUssers';
    protected $allowedFields = ['idUssers','firstname', 'fech_nac','genero', 'refRegion', 'refComuna',
                                'calle','numero','optional','rf','rl','ri',
                                'telefono','email', 'clave','rz','rut','tipo','aux','text'];
    protected $beforeInsert = ['beforeInsert'];
    protected $beforeUpdate = ['beforeUpdate'];

    protected function beforeInsert(array $data){
        $data = $this -> passwordHash($data);
        return $data;
    }
    protected function beforeUpdate(array $data){
        $data = $this -> passwordHash($data);
        return $data;
    } 
    protected function passwordHash(array $data){
        if(isset($data['data']['clave']))
            $data['data']['clave'] = password_hash($data['data']['clave'], PASSWORD_DEFAULT,[15]);
        return $data;
    }

    public function noticeTable(){
        $builder = $this->db->table('ussers')->where('tipo !=', '0');
        return $builder;
    }
    public function buttons(){
        $acction_button = function($row){
            return '<button type="button" name="editUsser" class="btn btn-warning btn-sm editUsser"
                     data-id="'.$row['idUssers'].'"><i class="fas fa-edit"></i></button>
                     <button type="button" name="deleteUsser" class="btn btn-danger btn-sm deleteUsser"
                     data-id="'.$row['idUssers'].'"><i class="fas fa-times-circle"></i></button>';
        };
        return $acction_button;
    }  
}