<?php
namespace App\Controllers;

use App\Models\ProductoModel;

class CategoriaController extends BaseController
{
    public function index()
    {
        $CategoriaModel = new CategoriaModel();     // Carga el modelo
        $data['categoria'] = $categoriaModel->findAll();  // Obtiene todos los productos
        return view('categorias/index', $data);   // Carga la vista con los datos
    }
}
