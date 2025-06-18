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



    public function buscar()
    {
        $query = trim($this->request->getGet('q'));

        if (!$query) {
            return redirect()->to(base_url('catalogo'));
        }

        try {
            $productoModel = new ProductoModel();
            $categoriaModel = new CategoriaModel();

            if (is_numeric($query)) {
                // Buscar por categoría (id_faraon) (funciona de diez)
                $productos = $productoModel
                    ->where('id_faraon', $query)
                    ->where('stock >', 0)
                    ->findAll();
                $categoriaNombre = $categoriaModel->find($query);
                $categoriaTexto = $categoriaNombre ? 'Categoría: ' . esc($categoriaNombre['nombre']) : 'Resultados';
            } else {

                // Buscar por nombre o descripción (funciona de diez)
                $productos = $productoModel
                    ->groupStart()
                        ->like('nombre', $query)
                        ->orLike('descripcion', $query)
                    ->groupEnd()
                    ->where('stock >', 0)
                    ->findAll();
                $categoriaTexto = 'Resultados para: ' . esc($query);
            }

            $categorias = $categoriaModel->findAll();

            $data = [
                'productos' => $productos,
                'categorias' => $categorias,
                'categoria' => $categoriaTexto,
                'query' => esc($query)
            ];

            if (empty($productos)) {
                session()->setFlashdata('mensaje', 'No se encontraron productos para "' . esc($query) . '"');
            }
        } catch (Exception $e) {
            $data = [
                'conexion' => 'error!!',
                'error_message' => $e->getMessage(),
                'productos' => [],
                'categorias' => [],
                'categoria' => 'Resultados',
                'query' => esc($query)
            ];
        }

        return view('productos', $data);

        
    }
}
