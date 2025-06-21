<?php namespace App\Controllers;

class Compras extends BaseController
{
    public function index()
    {
        return view('compras', $this->data);//retorna la vista
    }
}

