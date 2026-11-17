<?php

namespace App\Controllers;

use App\Models\UserModel;

class AuthController extends BaseController
{
    public function login()
    {
        if (session()->get('logged_in')) {
            return redirect()->to('/dashboard');
        }
        
        return view('auth/login');
    }
    
    public function loginProcess()
    {
        $session = session();
        $model = new UserModel();
        
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
        
        $user = $model->where('email', $email)->first();

        if ($user) {
            if (password_verify($password, $user['password'])) {
                // Simpan data session termasuk role
                $sessionData = [
                    'id'         => $user['id'],
                    'name'       => $user['name'],
                    'email'      => $user['email'],
                    'role'       => $user['role'],
                    'logged_in'  => TRUE
                ];
                $session->set($sessionData);
                return redirect()->to('/dashboard');
            } else {
                $session->setFlashdata('error', 'Password salah.');
                return redirect()->back()->withInput();
            }
        } else {
            $session->setFlashdata('error', 'Email tidak ditemukan.');
            return redirect()->back()->withInput();
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}