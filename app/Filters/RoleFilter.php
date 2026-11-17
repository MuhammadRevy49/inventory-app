<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class RoleFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $session = session();
        
        if (!$session->get('logged_in')) {
            return redirect()->to('/login');
        }

        // Cek apakah role pengguna sesuai dengan yang diizinkan di route
        if (!empty($arguments)) {
            $userRole = $session->get('role');
            if (!in_array($userRole, $arguments)) {
                // Jika tidak punya hak akses, lempar ke halaman unauthorized / dashboard
                return redirect()->to('/dashboard')->with('error', 'Anda tidak memiliki hak akses ke halaman tersebut.');
            }
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        //
    }
}