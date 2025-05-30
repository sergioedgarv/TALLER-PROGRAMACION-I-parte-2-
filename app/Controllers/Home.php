<?php
namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data['title'] = 'Mi Página Personalizada';
        return view('home', $data);
    }
}



