<?php
namespace App\Controllers;

use Config\Database;
use Exception;
use App\Models\ProductoModel;
use App\Models\CategoriaModel;

class ProductosController extends BaseController
{
    public function index()
    {
        try {
            $productoModel = new ProductoModel();
            $categoriaModel = new CategoriaModel();

            $productos = $productoModel->obtenerProductosStock();
            $categorias = $categoriaModel->findAll();

            $data = [
                'conexion' => 'si',
                'productos' => $productos,
                'categorias' => $categorias,
                'categoria' => 'Todos'
            ];
        } catch (Exception $e) {
            $data = [
                'conexion' => 'error!!',
                'error_message' => $e->getMessage(),
                'productos' => [],
                'categorias' => [],
                'categoria' => 'Todos'
            ];
        }

        return view('productos', $data);
    }
}
