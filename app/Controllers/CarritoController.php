<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\ProductoModel;

class CarritoController extends Controller
{
    public function agregar($id_producto)
    {
        $session = session();

        $carrito = $session->get('carrito') ?? [];

        if (isset($carrito[$id_producto])) {
            $carrito[$id_producto]['cantidad']++;
            $mensaje = 'Cantidad aumentada en el carrito.';
        } else {
            $carrito[$id_producto] = [
                'id_producto' => $id_producto,
                'cantidad' => 1
            ];
            $mensaje = 'Producto agregado al carrito.';
        }

        $session->set('carrito', $carrito);

        return redirect()->to('/catalogo')->with('mensaje', $mensaje);
    }

    public function ver()
    {
        $session = session();
        $carrito = $session->get('carrito') ?? [];

        $productosModel = new ProductoModel();

        $carritoCompleto = [];

        if (!empty($carrito)) {
            foreach ($carrito as $item) {
                $producto = $productosModel->find($item['id_producto']);
                if ($producto) {
                    $producto['cantidad'] = $item['cantidad'];
                    $producto['subtotal'] = $producto['precio'] * $item['cantidad'];
                    $carritoCompleto[] = $producto;
                }
            }
        }

        $data['carrito'] = $carritoCompleto;
        $data['total'] = array_sum(array_column($carritoCompleto, 'subtotal'));
        $data['mensaje'] = $session->getFlashdata('mensaje'); // obtener mensaje flash

        return view('carrito_ver', $data);
    }

    public function aumentar($id_producto)
    {
        $session = session();
        $carrito = $session->get('carrito') ?? [];

        if (isset($carrito[$id_producto])) {
            $carrito[$id_producto]['cantidad']++;
            $session->set('carrito', $carrito);
            $mensaje = 'Cantidad aumentada.';
        } else {
            $mensaje = 'Producto no encontrado en el carrito.';
        }

        return redirect()->to('/carrito')->with('mensaje', $mensaje);
    }

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
