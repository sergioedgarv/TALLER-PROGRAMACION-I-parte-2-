<?php
namespace App\Controllers;

use App\Models\ProductoModel;
use App\Models\CategoriaModel;

class CatalogoController extends BaseController
{
    public function index()
    {
        $productoModel = new ProductoModel();
        $categoriaModel = new CategoriaModel();

        $productos = $productoModel->obtenerProductosStock();
        $categorias = $categoriaModel->findAll();

        // Pasar productos, categorías y nombre de categoría a la vista
        return view('productos', $this->data + [
            'productos' => $productos,
            'categoria' => 'Todos',
            'categorias' => $categorias
        ]);
    }

    public function categoria($id_categoria = null)
    {
        if (!$id_categoria) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Categoría no especificada");
        }

        $productoModel = new ProductoModel();
        $categoriaModel = new CategoriaModel();

        $categoria = $categoriaModel->find($id_categoria);

        if (!$categoria) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Categoría no encontrada");
        }

        $productos = $productoModel->obtenerPorCategoria($id_categoria);
        $categorias = $categoriaModel->findAll();

        return view('productos', $this->data + [
            'productos' => $productos,
            'categoria' => $categoria['nombre'],
            'categorias' => $categorias
        ]);
    }
}
