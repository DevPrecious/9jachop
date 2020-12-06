<?php namespace App\Models;

use CodeIgniter\Model;

class Item extends Model
{
    protected $table      = 'item';
    protected $primaryKey = 'id';

    protected $allowedFields = ['name', 'description', 'price', 'image_show', 'menu_id', 'res_id'];

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