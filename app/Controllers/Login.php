<?php namespace App\Controllers;
use App\Models\UsuarioModel;
class Login extends BaseController{

    public function index()
    {
        return view('Login',$this->data);
    }


// Obtiene el email y la contraseña enviados por el formulario de login.

// Busca en la base de datos un usuario con el email proporcionado.
    
// Si no se encuentra un usuario con ese email, redirige al login con un mensaje de error indicando que el usuario no existe.

// Verifica que la contraseña ingresada coincida con la almacenada (en formato hash).

// Si la contraseña no es correcta, redirige al login mostrando un mensaje de error.

// Si las credenciales son válidas, inicia la sesión cargando los datos del usuario en la variable de sesión.

// Finalmente, redirige al usuario a una vista distinta según su rol (admin o usuario común).

  public function authenticate(){
    $email = $this->request->getPost('email');
    $password = $this->request->getPost('password');

    $usuario = $this->obtenerUsuarioPorEmail($email);

    if (!$usuario) {
        return $this->redirigirConError('El usuario no existe');
    }

    if (!$this->verificarPassword($password, $usuario['password'])) {
        return $this->redirigirConError('La contraseña es incorrecta');
    }

    $this->iniciarSesion($usuario);

    return $this->redirigirSegunRol($usuario['rol']);
}


// obtenerUsuarioPorEmail(): Encapsula la lógica para consultar la base de datos 
// y obtener un usuario a partir de su email.
    private function obtenerUsuarioPorEmail($email){
    $model = new UsuarioModel();
    return $model->where('email', $email)->first();
    }

// verificarPassword($passwordPlano, $passwordHash):
//  Verifica si la contraseña ingresada por el usuario coincide con el hash almacenado en la base de datos.
    private function verificarPassword($passwordPlano, $passwordHash){
    return password_verify($passwordPlano, $passwordHash);
    }

// Guarda en la sesión los datos relevantes del usuario una vez autenticado, 
// incluyendo su rol y estado de inicio de sesión.
    private function iniciarSesion($usuario){
    session()->set([
        'id' => $usuario['id'],
        'nombre' => $usuario['nombre'],
        'email' => $usuario['email'],
        'rol' => $usuario['rol'],
        'logged_in' => true,
    ]);
    }
// Define un mensaje flash para mostrar un error en la próxima }
// carga de la página y redirige al formulario de login.
    private function redirigirConError($mensaje)
    {
    session()->setFlashdata('error', $mensaje);
    return redirect()->to('/Login');
    }
// Define un mensaje flash para mostrar un error en la próxima 
//  carga de la página y redirige al formulario de login.
    private function redirigirSegunRol($rol){
        if ($rol === 'admin') {
        return redirect()->to('/admin');
        }

    return redirect()->to('/');
    }   
 

    public function logout()
    {
        session()->destroy();
        return redirect()->to("/");
    }
}
