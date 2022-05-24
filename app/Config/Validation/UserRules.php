<?php
namespace App\Validation;
use App\Models\UssersModel;

class UserRules{
    public function validateUser(string $srt, String $fields, array $data){
        $model = new UssersModel();
        $user = $model-> where('email', $data['emailrL'])
            ->first();
        if(!$user)
            return false;

        return password_verify($data['passwordrL'],$user['password']);

    }
}