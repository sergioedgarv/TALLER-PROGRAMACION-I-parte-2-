<?php
namespace App\Controllers;

use CodeIgniter\Controller;

<<<<<<< HEAD

=======
>>>>>>> 97f0d22ea250cdf6313eb15ade326eb1df72f349
class CarritoController extends Controller
{
    public function agregar($id_producto)
    {
        $session = session();

        // Obtener el carrito actual o crear uno vacío
        $carrito = $session->get('carrito') ?? [];

        // Si el producto ya está en el carrito, aumentar cantidad
        if (isset($carrito[$id_producto])) {
            $carrito[$id_producto]['cantidad']++;
        } else {
            // Si no está, agregar con cantidad 1
            $carrito[$id_producto] = [
                'id_producto' => $id_producto,
                'cantidad' => 1
            ];
        }

        // Guardar carrito actualizado en sesión
        $session->set('carrito', $carrito);

        // Redirigir a la página de productos con mensaje flash
        return redirect()->to('/productos')->with('mensaje', 'Producto agregado al carrito');
    }

    public function ver()
    {
        $session = session();
        $carrito = $session->get('carrito') ?? [];

        // Aquí podrías cargar los detalles completos de los productos para mostrar
        // Por simplicidad, solo mostramos el contenido del carrito

        return view('carrito_ver', ['carrito' => $carrito]);
    }
}
