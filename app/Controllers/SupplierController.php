<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\SupplierModel;

class SupplierController extends BaseController
{
    protected $model;

    public function __construct()
    {
        $this->model = new SupplierModel();
    }

    public function index()
    {
        $search = $this->request->getGet('search');

        if ($search) {
            $this->model->like('name', $search)
                        ->orLike('phone', $search)
                        ->orLike('address', $search);
        }

        $data['suppliers'] = $this->model->findAll();

        return view('suppliers/index', $data);
    }

    public function store()
    {
        $this->model->save([
            'name' => $this->request->getPost('nama_supplier'),
            'phone' => $this->request->getPost('kontak'),
            'address' => $this->request->getPost('alamat'),
        ]);
        return redirect()->to('/suppliers')->with('success', 'Supplier berhasil ditambahkan.');
    }

    public function create()
    {
        return view('suppliers/create');
    }

    public function edit($id)
    {
        $data['supplier'] = $this->model->find($id);
        return view('suppliers/edit', $data);
    }

    public function update($id)
    {
        $updateData = [
            'name' => $this->request->getPost('name'),
            'phone' => $this->request->getPost('phone'),
            'address' => $this->request->getPost('address'),
        ];

        if (!$this->model->update($id, $updateData)) {
            return redirect()->back()->withInput()->with('errors', $model->errors());
        }

        return redirect()->to('/suppliers')->with('success', 'Data supplier berhasil diperbarui.');
    }

    public function delete($id)
    {
        $this->model->delete($id);
        return redirect()->to('/suppliers')->with('success', 'Supplier berhasil dihapus dari sistem.');
    }
}
