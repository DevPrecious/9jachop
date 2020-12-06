<?php namespace App\Models;

use CodeIgniter\Model;

class Menu extends Model
{
    protected $table      = 'menu';
    protected $primaryKey = 'id';

    protected $allowedFields = ['menu_name', 'res_id'];

    public function getMenu($id = false)
{
    if ($id === false)
    {
        return false;
    }

    return $this->asArray()
                ->where(['id' => $id])
                ->first();
}
}