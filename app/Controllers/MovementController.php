<?php namespace App\Controllers;

use App\Models\ProductModel;
use App\Libraries\StockService;

class MovementController extends BaseController
{
    public function in()
    {
        $productModel = new ProductModel();
        $data['products'] = $productModel->findAll();
        return view('movements/in', $data);
    }

    public function processIn()
    {
        $service = new StockService();
        $productId = $this->request->getPost('product_id');
        $qty       = (int) $this->request->getPost('qty');
        $dest      = $this->request->getPost('destination');
        $status    = $this->request->getPost('status');

        $success = $service->updateStock($productId, $qty, 'IN', $dest, $status);

        if ($success) {
            return redirect()->to('/movements/logs')->with('success', 'Barang masuk berhasil dicatat!');
        }
        return redirect()->back()->with('error', 'Gagal mencatat stok.');
    }

    public function logs()
    {
        $db = \Config\Database::connect();
        $builder = $db->table('stock_movements');
        
        $data['logs'] = $builder->select('stock_movements.*, products.name as product_name, users.name as user_name')
                                ->join('products', 'products.id = stock_movements.product_id')
                                ->join('users', 'users.id = stock_movements.user_id')
                                ->orderBy('stock_movements.created_at', 'DESC')
                                ->get()
                                ->getResultArray();

        return view('movements/logs', $data);
    }

    public function out()
    {
        $productModel = new ProductModel();
        $data['products'] = $productModel->findAll();
        return view('movements/out', $data);
    }

    public function processOut()
    {
        $service = new \App\Libraries\StockService();
        $productId = $this->request->getPost('product_id');
        $qty       = (int) $this->request->getPost('qty');
        $dest      = $this->request->getPost('destination');
        $status    = $this->request->getPost('status');

        $productModel = new ProductModel();
        $product = $productModel->find($productId);

        if ($product['stock'] < $qty) {
            return redirect()->back()->with('error', 'Stok tidak mencukupi! Sisa stok: ' . $product['stock']);
        }

        $success = $service->updateStock($productId, $qty, 'OUT', $dest, $status);

        if ($success) {
            return redirect()->to('/movements/logs')->with('success', 'Barang keluar berhasil dicatat!');
        }
        return redirect()->back()->with('error', 'Gagal mencatat transaksi.');
    }
}