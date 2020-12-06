<?php namespace App\Models;

use CodeIgniter\Model;

class Resturant extends Model
{
    protected $table      = 'resturant';
    protected $primaryKey = 'resid';

    protected $allowedFields = ['resname', 'email', 'phone', 'openh', 'closeh', 'openday', 'image'];

    public function getRes($id = false)
{
    if ($id === false)
    {
        return false;
    }

    return $this->asArray()
                ->where(['resid' => $id])
                ->first();
}
}