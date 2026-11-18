<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\UserModel;

class UsersController extends BaseController
{
    protected $model;

    public function __construct()
    {
        $this->model = new UserModel();
    }

    public function index()
    {
        $search = $this->request->getGet('search');

        if ($search) {
            $this->model->like('name', $search)
                        ->orLike('email', $search);
        }

        $data['users'] = $this->model->findAll();
        return view('users/index', $data);
    }

    public function edit($id)
    {
        $data['users'] = $this->model->find($id);
        return view('users/edit', $data);
    }

    public function create()
    {
        return view('users/create');
    }

    public function store()
    {
        $this->model->save([
            'name' => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'role' => $this->request->getPost('role'),
        ]);
        return redirect()->to('/users')->with('success', 'Pengguna berhasil ditambahkan.');
    }

    public function update($id)
    {
        $updateData = [
            'name'  => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
            'role'  => $this->request->getPost('role'),
        ];

        $password = $this->request->getPost('password');
        if (!empty($password)) {
            $updateData['password'] = password_hash($password, PASSWORD_DEFAULT);
        }

        if (!$this->model->update($id, $updateData)) {
            return redirect()->back()->withInput()->with('errors', $this->model->errors());
        }

        return redirect()->to('/users')->with('success', 'Data pengguna berhasil diperbarui.');
    }

    public function delete($id)
    {
        $this->model->delete($id);
        return redirect()->to('/users')->with('success', 'Pengguna berhasil dihapus dari sistem.');
    }
}
