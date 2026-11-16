<?php namespace App\Controllers;

use App\Models\ProductModel;

class DashboardController extends BaseController
{
    public function index()
    {
        $productModel = new ProductModel();

        $totalAllProducts = $productModel->countAllResults();
        $totalProductE = $productModel->where('category_id', 1)->countAllResults();
        $totalProductPf = $productModel->where('category_id', 2)->countAllResults();
        $totalProductPrt = $productModel->where('category_id', 3)->countAllResults();

        return view('dashboard/index', [
            'totalProducts' => $totalAllProducts,
            'totalProductE' => $totalProductE,
            'totalProductPf' => $totalProductPf,
            'totalProductPrt' => $totalProductPrt
        ]);
    }
}