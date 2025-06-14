<?php
namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        // Agregar datos específicos para esta vista
        $this->data['title'] = 'Mi Página Personalizada';

        // Pasar $this->data (que incluye 'categorias' cargadas en BaseController) a la vista
        return view('home', $this->data);
    }
}


