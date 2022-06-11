<?php namespace App\Models;

use CodeIgniter\Model;

class PersonaModel extends Model{
    protected $table = 'persona';
    protected $primaryKey = 'idPersona';
    protected $allowedFields = ['idPersona','otraID', 'nombre','apellidos','clave','tipo','email', 'actualizado', 'creado'];
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
        $builder = $this->db->table('persona')->where('tipo !=', '0');
        return $builder;
    }
    public function buttons(){
        $acction_button = function($row){
            return '<button type="button" name="editPersona" class="btn btn-warning btn-sm editPersona"
                     data-id="'.$row['idPersona'].'"><i class="fas fa-edit"></i></button>
                     <button type="button" name="deletePersona" class="btn btn-danger btn-sm deletePersona"
                     data-id="'.$row['idPersona'].'"><i class="fas fa-times-circle"></i></button>';
        };
        return $acction_button;
    }  
}