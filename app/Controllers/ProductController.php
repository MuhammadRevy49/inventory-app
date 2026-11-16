<?php

namespace App\Controllers;

use App\Models\ProductModel;
use App\Models\CategoryModel;
use App\Models\SupplierModel;

class ProductController extends BaseController
{
    public function index()
    {
        $productModel = new ProductModel();
        
        $data['products'] = $productModel->select('products.*, categories.name as category_name, suppliers.name as supplier_name')
                                         ->join('categories', 'categories.id = products.category_id', 'left')
                                         ->join('suppliers', 'suppliers.id = products.supplier_id', 'left')
                                         ->findAll();

        return view('products/index', $data);
    }

    public function create()
    {
        $categoryModel = new CategoryModel();
        $supplierModel = new SupplierModel();

        $data = [
            'categories' => $categoryModel->findAll(),
            'suppliers'  => $supplierModel->findAll()
        ];

        return view('products/create', $data);
    }

    public function store()
    {
        $productModel = new ProductModel();

        $saveData = [
            'sku'            => $this->request->getPost('sku'),
            'name'           => $this->request->getPost('name'),
            'category_id'    => $this->request->getPost('category_id'),
            'supplier_id'    => $this->request->getPost('supplier_id'),
            'stock'          => $this->request->getPost('stock'),
            'purchase_price' => $this->request->getPost('purchase_price'),
            'selling_price'  => $this->request->getPost('selling_price'),
            'description'    => $this->request->getPost('description'),
        ];

        if (!$productModel->save($saveData)) {
            return redirect()->back()->withInput()->with('errors', $productModel->errors());
        }

        return redirect()->to('/products')->with('success', 'Produk baru berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $productModel = new ProductModel();
        $categoryModel = new CategoryModel();
        $supplierModel = new SupplierModel();

        $data = [
            'product'    => $productModel->find($id),
            'categories' => $categoryModel->findAll(),
            'suppliers'  => $supplierModel->findAll()
        ];

        if (empty($data['product'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Produk dengan ID ' . $id . ' tidak ditemukan.');
        }

        return view('products/edit', $data);
    }

    public function update($id)
    {
        $productModel = new ProductModel();

        $updateData = [
            'sku'            => $this->request->getPost('sku'),
            'name'           => $this->request->getPost('name'),
            'category_id'    => $this->request->getPost('category_id'),
            'supplier_id'    => $this->request->getPost('supplier_id'),
            'stock'          => $this->request->getPost('stock'),
            'purchase_price' => $this->request->getPost('purchase_price'),
            'selling_price'  => $this->request->getPost('selling_price'),
            'description'    => $this->request->getPost('description'),
        ];

        if (!$productModel->update($id, $updateData)) {
            return redirect()->back()->withInput()->with('errors', $productModel->errors());
        }

        return redirect()->to('/products')->with('success', 'Data produk berhasil diperbarui.');
    }

    public function delete($id)
    {
        $productModel = new ProductModel();
        $productModel->delete($id);

        return redirect()->to('/products')->with('success', 'Produk berhasil dihapus dari sistem.');
    }
}