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
        $data['users'] = $this->model->findAll();
        return view('users/index', $data);
    }

    public function edit($id)
    {
        $data['users'] = $this->model->find($id);
        return view('users/edit', $data);
    }

    public function create() {
        return view('users/create');
    }
}
