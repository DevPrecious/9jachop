<?php
namespace App\Validation;

use App\Models\Admin;

class AdminRules{

    public function validateAdmin(string $str, string $fields, array $data){
        $model = new Admin();
        $user = $model->where('email', $data['email'])
                      ->first();

        if(!$user)
            return false;

        return password_verify($data['password'], $user['password']);
    }

}
