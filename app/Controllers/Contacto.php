<?php namespace App\Controllers;

class Contacto extends BaseController
{
    public function index()
    {
        return view('contacto');
    }
    public function enviar()
    {
        // Procesar el formulario: recibir datos, validar, etc.
        $nombre = $this->request->getPost('nombre');
        $email = $this->request->getPost('email');
        $mensaje = $this->request->getPost('mensaje');

        // Acá podrías hacer más cosas (guardar en base de datos, enviar email, etc.)

        // Guardar mensaje flash
        session()->setFlashdata('success', '¡Gracias ' . esc($nombre) . '! Tu mensaje fue enviado correctamente.');

        // Redirigir de vuelta al formulario
        return redirect()->to(base_url('contacto'));
    }
    
}

