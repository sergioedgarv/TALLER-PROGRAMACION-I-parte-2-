<?php namespace App\Controllers;

class Terminos extends BaseController
{
    public function index()
    {
        return view('terminos', $this->data);
    }
}
/* 
En BaseController
/$this->data['categorias'] = [...]; // categorías cargadas, OSEA CARGAMOS EN EL CONTROLADOR

En Home Controller
return view('home', $this->data); // paso categorías a la vista (las que fueron cargadas en el cotrolador)

En home.php y header.php
foreach ($categorias as $cat) {
    echo $cat['nombre']; // funciona porque $categorias está disponible
}
*/