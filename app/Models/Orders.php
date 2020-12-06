<?php namespace App\Models;

use CodeIgniter\Model;

class Orders extends Model
{
    protected $table      = 'orders';
    protected $primaryKey = 'id';

    protected $allowedFields = ['product_name', 'product_price', 'user_email', 'user_id', 'pending'];
}