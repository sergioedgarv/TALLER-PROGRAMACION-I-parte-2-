<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\ProductoModel;

class CarritoController extends Controller
{
    protected $productosModel;

    public function __construct()
    {
        $this->productosModel = new ProductoModel();
    }

    // Agrega un producto al carrito o incrementa su cantidad si ya existe
    public function agregar($id_producto)
    {
        $session = session();
        $carrito = $session->get('carrito') ?? [];

        // Obtener producto para verificar stock
        $producto = $this->productosModel->find($id_producto);
        if (!$producto) {
            return redirect()->to('/catalogo')->with('mensaje', 'Producto no encontrado.');
        }

        $cantidadActual = isset($carrito[$id_producto]) ? $carrito[$id_producto]['cantidad'] : 0;

        if ($cantidadActual + 1 > $producto['stock']) {
            // No hay suficiente stock para agregar más
            $mensaje = "No puedes agregar más unidades. Solo quedan {$producto['stock']} en stock.";
        } else {
            // Se puede agregar
            if (isset($carrito[$id_producto])) {
                $carrito[$id_producto]['cantidad']++;
                $cantidad = $carrito[$id_producto]['cantidad'];
                $mensaje = "¡Genial! Ahora tienes $cantidad unidades de este producto en tu carrito.";
            } else {
                $carrito[$id_producto] = [
                    'id_producto' => $id_producto,
                    'cantidad' => 1
                ];
                $mensaje = 'Producto agregado al carrito.';
            }
            $session->set('carrito', $carrito);
        }

        return redirect()->to('/catalogo')->with('mensaje', $mensaje);
    }

    // Muestra el contenido completo del carrito con detalles y total
    public function ver()
    {
        $session = session();
        $carrito = $session->get('carrito') ?? [];

        $carritoCompleto = [];

        if (!empty($carrito)) {
            // Para cada producto en el carrito, obtiene detalles y calcula subtotal
            foreach ($carrito as $item) {
                $producto = $this->productosModel->find($item['id_producto']);
                if ($producto) {
                    $producto['cantidad'] = $item['cantidad'];
                    $producto['subtotal'] = $producto['precio'] * $item['cantidad'];
                    $carritoCompleto[] = $producto;
                }
            }
        }

        // Prepara datos para la vista
        $data['carrito'] = $carritoCompleto;
        $data['total'] = array_sum(array_column($carritoCompleto, 'subtotal'));
        $data['mensaje'] = $session->getFlashdata('mensaje');

        // Renderiza la vista del carrito
        return view('carrito_ver', $data);
    }

    // Incrementa la cantidad de un producto en el carrito
    public function aumentar($id_producto)
    {
        $session = session();
        $carrito = $session->get('carrito') ?? [];

        if (!isset($carrito[$id_producto])) {
            return redirect()->to('/carrito')->with('mensaje', 'Producto no encontrado en el carrito.');
        }

        $producto = $this->productosModel->find($id_producto);
        if (!$producto) {
            return redirect()->to('/carrito')->with('mensaje', 'Producto no encontrado.');
        }

        $cantidadActual = $carrito[$id_producto]['cantidad'];

        if ($cantidadActual + 1 > $producto['stock']) {
            $mensaje = "No puedes aumentar la cantidad. Solo quedan {$producto['stock']} unidades en stock.";
        } else {
            $carrito[$id_producto]['cantidad']++;
            $session->set('carrito', $carrito);
            $cantidad = $carrito[$id_producto]['cantidad'];
            $mensaje = "¡Cantidad aumentada! Ahora tienes $cantidad unidades de este producto.";
        }

        return redirect()->to('/carrito')->with('mensaje', $mensaje);
    }

    // Disminuye la cantidad de un producto o lo elimina si llega a cero
    public function disminuir($id_producto)
    {
        $session = session();
        $carrito = $session->get('carrito') ?? [];

        if (isset($carrito[$id_producto])) {
            if ($carrito[$id_producto]['cantidad'] > 1) {
                $carrito[$id_producto]['cantidad']--;
                $mensaje = 'Cantidad disminuida.';
            } else {
                unset($carrito[$id_producto]);
                $mensaje = 'Producto eliminado del carrito.';
            }
            $session->set('carrito', $carrito);
        } else {
            $mensaje = 'Producto no encontrado en el carrito.';
        }

        return redirect()->to('/carrito')->with('mensaje', $mensaje);
    }

    // Elimina un producto del carrito directamente
    public function eliminar($id_producto)
    {
        $session = session();
        $carrito = $session->get('carrito') ?? [];

        if (isset($carrito[$id_producto])) {
            unset($carrito[$id_producto]);
            $session->set('carrito', $carrito);
            $mensaje = 'Producto eliminado del carrito.';
        } else {
            $mensaje = 'Producto no encontrado en el carrito.';
        }

        return redirect()->to('/carrito')->with('mensaje', $mensaje);
    }
}
