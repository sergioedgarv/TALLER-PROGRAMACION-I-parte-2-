<?php
namespace App\Controllers;

use Config\Database;
use Exception;
use App\Models\ProductoModel;
use App\Models\CategoriaModel;

class ProductosController extends BaseController
{
    // Muestra la lista de productos con stock y todas las categorías
    public function index()
    {
        try {
            $productoModel = new ProductoModel();
            $categoriaModel = new CategoriaModel();

            // Obtiene productos con stock y todas las categorías
            $productos = $productoModel->obtenerProductosStock();
            $categorias = $categoriaModel->findAll();

            // Datos para la vista
            $data = [
                'conexion' => 'si',
                'productos' => $productos,
                'categorias' => $categorias,
                'categoria' => 'Todos'
            ];
        } catch (Exception $e) {
            // En caso de error, prepara datos con mensaje de error
            $data = [
                'conexion' => 'error!!',
                'error_message' => $e->getMessage(),
                'productos' => [],
                'categorias' => [],
                'categoria' => 'Todos'
            ];
        }

        // Renderiza la vista 'productos' con los datos
        return view('productos', $data);
    }

    // Busca productos según el término recibido en GET 'q'
    public function buscar()
    {
        $query = trim($this->request->getGet('q'));

        // Si no hay término, redirige al catálogo general
        if (!$query) {
            return redirect()->to(base_url('catalogo'));
        }

        try {
            $productoModel = new ProductoModel();
            $categoriaModel = new CategoriaModel();

            if (is_numeric($query)) {
                // Si es número, busca productos por id_faraon (categoría) con stock
                $productos = $productoModel
                    ->where('id_faraon', $query)
                    ->where('stock >', 0)
                    ->findAll();
                $categoriaNombre = $categoriaModel->find($query);
                $categoriaTexto = $categoriaNombre ? 'Categoría: ' . esc($categoriaNombre['nombre']) : 'Resultados';
            } else {
                // Si es texto, busca productos cuyo nombre o descripción contenga el término, con stock
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

            // Datos para la vista
            $data = [
                'productos' => $productos,
                'categorias' => $categorias,
                'categoria' => $categoriaTexto,
                'query' => esc($query)
            ];

            // Si no hay resultados, muestra mensaje flash
            if (empty($productos)) {
                session()->setFlashdata('mensaje', 'No se encontraron productos para "' . esc($query) . '"');
            }
        } catch (Exception $e) {
            // En caso de error, prepara datos con mensaje de error
            $data = [
                'conexion' => 'error!!',
                'error_message' => $e->getMessage(),
                'productos' => [],
                'categorias' => [],
                'categoria' => 'Resultados',
                'query' => esc($query)
            ];
        }

        // Renderiza la vista 'productos' con los datos
        return view('productos', $data);
    }
}
