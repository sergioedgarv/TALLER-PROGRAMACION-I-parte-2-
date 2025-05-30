<?php

namespace App\Controllers;
use Config\Database;
use Exception;
use App\Models\ProductoModel;

class ProductosController extends BaseController
{
    public function index()
    {
        try {
            $db = Database::connect();
            $productoModel = new ProductoModel();

            if ($db->connect()) {
                // Obtener solo productos activos
                $productos = $productoModel->obtenerProductosActivos();

                $data = [
                    'conexion' => 'si',
                    'productos' => $productos
                ];
            } else {
                $data = [
                    'conexion' => 'no',
                    'productos' => []
                ];
            }
        } catch (Exception $e) {
            $data = [
                'conexion' => 'error!!',
                'error_message' => $e->getMessage(),
                'productos' => []
            ];
        }

        return view('productos', $data);
    }
}
