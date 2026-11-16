<?php namespace App\Models;
use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table = 'products';
    protected $primaryKey = 'id';
    protected $allowedFields = ['category_id', 'supplier_id', 'sku', 'name', 'description', 'stock', 'purchase_price', 'selling_price'];
    protected $useTimestamps = true;

    protected $validationRules = [
        'sku'            => 'required|is_unique[products.sku,id,{id}]',
        'name'           => 'required|min_length[3]',
        'category_id'    => 'required|integer',
        'supplier_id'    => 'required|integer',
        'stock'          => 'required|integer',
        'purchase_price' => 'required|decimal',
        'selling_price'  => 'required|decimal',
    ];
}