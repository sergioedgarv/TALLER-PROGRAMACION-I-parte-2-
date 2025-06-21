<?php
namespace App\Controllers;

use App\Models\ProductoModel;
use App\Models\CategoriaModel;

class CatalogoController extends BaseController
{
    // Muestra todos los productos con stock y todas las categorías
    public function index()
    {
        $productoModel = new ProductoModel();
        $categoriaModel = new CategoriaModel();

        // Obtiene productos con stock
        $productos = $productoModel->obtenerProductosStock();
        // Obtiene todas las categorías
        $categorias = $categoriaModel->findAll();

        // Pasa los datos a la vista 'productos' junto con datos adicionales de $this->data
        return view('productos', $this->data + [
            'productos' => $productos,
            'categoria' => 'Todos',
            'categorias' => $categorias
        ]);
    }

    // Muestra productos filtrados por categoría específica
    public function categoria($id_categoria = null)
    {
        // Si no se especifica categoría, lanza error 404
        if (!$id_categoria) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Categoría no especificada");
        }

        $productoModel = new ProductoModel();
        $categoriaModel = new CategoriaModel();

        // Busca la categoría por ID
        $categoria = $categoriaModel->find($id_categoria);

        // Si no existe la categoría, lanza error 404
        if (!$categoria) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Categoría no encontrada");
        }

        // Obtiene productos de la categoría especificada
        $productos = $productoModel->obtenerPorCategoria($id_categoria);
        // Obtiene todas las categorías
        $categorias = $categoriaModel->findAll();

        // Pasa los datos a la vista 'productos' junto con datos adicionales de $this->data
        return view('productos', $this->data + [
            'productos' => $productos,
            'categoria' => $categoria['nombre'],
            'categorias' => $categorias
        ]);
    }
}
