<?php namespace App\Controllers;

use App\Models\UsuarioModel;

class Register extends BaseController
{

        //con esto guardamos el nuevo usuario edgar!!!
        public function save()
        {
            $model = new UsuarioModel();
            $data= [
                'nombre' => $this->request->getPost('nombre'),
                'apellido'=>$this->request ->getPost('apellido'),
                'email'=>$this->request->getPost('email'),

// Toma el valor del campo 'password' enviado por POST, lo encripta utilizando el algoritmo por defecto (actualmente BCRYPT),
// y lo almacena en el arreglo con la clave 'password'. Esto sirve para guardar contraseñas de forma segura en la base de datos.
                'password'=>password_hash($this->request->getPost('password'),PASSWORD_DEFAULT),
            ];

            if($model->save($data))
            {
               return redirect()->to('/')->with('success', '¡Registro exitoso! Ya podés iniciar sesión');

            }else
            {
                return redirect()->back()->with('error','hubo un error al registrar!');
            }
        }
}


