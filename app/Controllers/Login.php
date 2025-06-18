<?php namespace App\Controllers;
use App\Models\UsuarioModel;
class Login extends BaseController{

    public function index()
    {
        return view('Login',$this->data);
    }

    public function authenticate()
    {

        $session = session();
        $model = new UsuarioModel();
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

       $usuario = $model->where('email', $email)->first();


        if($usuario && password_verify($password,$usuario['password']))
        {
            $session->set([
                'id' => $usuario['id'],
                'nombre' => $usuario['nombre'],
                'email' => $usuario['email'],
                'rol' => $usuario['rol'],
                'logged_in' => true,
            ]);
        if($usuario['rol']==='admin')
        {
             return redirect()->to('/admin');
        }else
        {
            return redirect()->to('/');
        }
        }
    }
    public function logout()
    {
        session()->destroy();
        return redirect()->to("/");
    }
}
