<?php namespace App\Controllers;

class Quienes extends BaseController
{
    public function index()
    {
        return view('quienes_somos', $this->data); //retorna la vista
    }
}
//Se agrega $this->data para que aparezca las categorias en catalogo