<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\ProductoModel;

class CarritoController extends Controller
{
    // Agrega un producto al carrito o incrementa su cantidad si ya existe
    public function agregar($id_producto)
    {
        $session = session();

        // Obtiene el carrito actual de la sesión o un array vacío
        $carrito = $session->get('carrito') ?? [];

        if (isset($carrito[$id_producto])) {
            // Si el producto ya está en el carrito, aumenta la cantidad
            $carrito[$id_producto]['cantidad']++;
            $cantidad = $carrito[$id_producto]['cantidad'];
            $mensaje = "¡Genial! Ahora tienes $cantidad unidades de este producto en tu carrito.";
        } else {
            // Si no está, lo agrega con cantidad 1
            $carrito[$id_producto] = [
                'id_producto' => $id_producto,
                'cantidad' => 1
            ];
            $mensaje = 'Producto agregado al carrito.';
        }

        // Actualiza el carrito en la sesión
        $session->set('carrito', $carrito);

        // Redirige al catálogo con mensaje flash
        return redirect()->to('/catalogo')->with('mensaje', $mensaje);
    }

    // Muestra el contenido completo del carrito con detalles y total
    public function ver()
    {
        $session = session();
        $carrito = $session->get('carrito') ?? [];

        $productosModel = new ProductoModel();

        $carritoCompleto = [];

        if (!empty($carrito)) {
            // Para cada producto en el carrito, obtiene detalles y calcula subtotal
            foreach ($carrito as $item) {
                $producto = $productosModel->find($item['id_producto']);
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

        if (isset($carrito[$id_producto])) {
            $carrito[$id_producto]['cantidad']++;
            $session->set('carrito', $carrito);
            $cantidad = $carrito[$id_producto]['cantidad'];
            $mensaje = "¡Cantidad aumentada! Ahora tienes $cantidad unidades de este producto.";
        } else {
            $mensaje = 'Producto no encontrado en el carrito.';
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
