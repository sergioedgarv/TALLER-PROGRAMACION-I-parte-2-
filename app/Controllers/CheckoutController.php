<?php
namespace App\Controllers;

use CodeIgniter\Controller;

class CheckoutController extends Controller
{
    public function index()
    {
        $session = session();
        $carrito = $session->get('carrito') ?? [];

        if (empty($carrito)) {
            // Si el carrito está vacío, redirige al catálogo con mensaje
            return redirect()->to('/catalogo')->with('mensaje', 'Tu carrito está vacío. Agrega productos antes de comprar.');
        }

        // Mostrar formulario de checkout
        return view('checkout_form',);
    }

    public function procesar()
    {
        $session = session();

        // Validar datos recibidos (puedes ampliar esta validación)
        $validation = \Config\Services::validation();

        $reglas = [
            'nombre' => 'required|min_length[3]',
            'email' => 'required|valid_email',
            'direccion' => 'required|min_length[5]',
            'telefono' => 'required|min_length[7]'
        ];

        if (!$this->validate($reglas)) {
            // Si hay errores, regresar con mensajes
            return view('checkout_form', [
                'validation' => $this->validator
            ]);
        }

        // Aquí iría la lógica para guardar la orden en la base de datos
        // Por simplicidad, solo vaciamos el carrito y mostramos mensaje

        $session->remove('carrito');

        return redirect()->to('/sergioedgarv/gracias')->with('mensaje', 'Compra realizada con éxito. ¡Gracias por tu compra!');
    }

    public function gracias()
    {
        $session = session();
        $mensaje = $session->getFlashdata('mensaje');

        return view('gracias', ['mensaje' => $mensaje]);
    }
}
