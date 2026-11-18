<?php namespace App\Controllers;

use App\Models\ProductModel;
use App\Models\CategoryModel;

class DashboardController extends BaseController
{
    public function index()
    {
        $productModel = new ProductModel();
        $categoryModel = new CategoryModel();

        $categories = $categoryModel->select('categories.*, COUNT(products.id) as total_products')
            ->join('products', 'products.category_id = categories.id', 'left')
            ->groupBy('categories.id')
            ->findAll();

        return view('dashboard/index', [
            'totalProducts' => $productModel->countAllResults(),
            'categories'    => $categories
        ]);
    }
}