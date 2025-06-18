<?php // app/Controllers/Admin.php

namespace App\Controllers;

use App\Models\UsuarioModel;
use CodeIgniter\Controller;

class Admin extends BaseController
{
    protected $usuarioModel;

    public function __construct()
    {
        $this->usuarioModel = new UsuarioModel();
    }


    public function create()
    {
        return view('admin_create');
    }

    public function store()
    {
        $data = [
            'nombre' => $this->request->getPost('nombre'),
            'apellido' => $this->request->getPost('apellido'),
            'email' => $this->request->getPost('email'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'rol' => $this->request->getPost('rol')
        ];

        $this->usuarioModel->insert($data);
        return redirect()->to('/admin')->with('success', 'Usuario creado');
    }

    public function edit($id)
    {
        $data['usuario'] = $this->usuarioModel->find($id);
        return view('admin_edit', $data);
    }

    public function update($id)
    {
        $data = [
            'nombre' => $this->request->getPost('nombre'),
            'apellido' => $this->request->getPost('apellido'),
            'email' => $this->request->getPost('email'),
            'rol' => $this->request->getPost('rol')
        ];

        if ($this->request->getPost('password')) {
            $data['password'] = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);
        }

        $this->usuarioModel->update($id, $data);
        return redirect()->to('/admin')->with('success', 'Usuario actualizado');
    }

    public function delete($id)
    {
        $this->usuarioModel->delete($id);
        return redirect()->to('/admin')->with('success', 'Usuario eliminado');
    }

    public function view($id)
    {
        $data['usuario'] = $this->usuarioModel->find($id);
        return view('admin_view', $data);
    }
}
