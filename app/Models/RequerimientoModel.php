<?php namespace App\Models;

use CodeIgniter\Database\ConnectionInterface;
use CodeIgniter\Model;


class RequerimientoModel extends Model{
    protected $table      = 'tabrequerimiento';
    protected $primaryKey = 'idR';

    protected $allowedFields = ['idR','idM','titulo','descripcion', 'subCat','estado','fechaPublicado','fechaInicio', 'fechaTentativa',
                                'fechaFinalizado','created_at','updated_at','deleted_at'];

}
// estado 0 = cancelado
// estado 1 = enviado
// estado 2 = agendado
// estadp 3 = reagendado
// estadp 4 = finalizado
// estado 5 = problemas