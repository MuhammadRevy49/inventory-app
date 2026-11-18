<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\CategoryModel;

class CategoriesController extends BaseController
{
    protected $model;

    public function __construct()
    {
        $this->model = new CategoryModel();
    }

    public function index()
    {
        $search = $this->request->getGet('search');
        if ($search) {
            $this->model->like('name', $search);
        }

        $data['categories'] = $this->model->findAll();
        return view('categories/index', $data);
    }

    public function store()
    {
        $this->model->save([
            'name' => $this->request->getPost('nama_kategori'),
        ]);
        return redirect()->to('/categories')->with('success', 'Kategori berhasil ditambahkan.');
    }

    public function create()
    {
        return view('categories/create');
    }

    public function edit($id)
    {
        $data['categories'] = $this->model->find($id);
        return view('categories/edit', $data);
    }

    public function update($id)
    {
        $updateData = [
            'name' => $this->request->getPost('name'),
        ];

        if (!$this->model->update($id, $updateData)) {
            return redirect()->back()->withInput()->with('errors', $model->errors());
        }

        return redirect()->to('/categories')->with('success', 'Data Kategori berhasil diperbarui.');
    }

    public function delete($id)
    {
        $this->model->delete($id);
        return redirect()->to('/categories')->with('success', 'Kategori berhasil dihapus dari sistem.');
    }
}
