<?php namespace App\Controllers;

use App\Models\ProductModel;

class DashboardController extends BaseController
{
    public function index()
    {
        $productModel = new ProductModel();

        $totalAllProducts = $productModel->countAllResults();
        $totalProductPJ = $productModel->where('category_id', 1)->countAllResults();
        $totalProductKA = $productModel->where('category_id', 2)->countAllResults();
        $totalProductPK = $productModel->where('category_id', 3)->countAllResults();

        return view('dashboard/index', [
            'totalProducts' => $totalAllProducts,
            'totalProductPJ' => $totalProductPJ,
            'totalProductKA' => $totalProductKA,
            'totalProductPK' => $totalProductPK
        ]);
    }
}