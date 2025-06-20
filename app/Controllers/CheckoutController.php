<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\ProductoModel;

class CheckoutController extends Controller
{
    public function index()
    {
        $session = session();
        $carrito = $session->get('carrito') ?? [];

        if (empty($carrito)) {
            return redirect()->to('/catalogo')->with('mensaje', 'Tu carrito está vacío. Agrega productos antes de comprar.');
        }

        return view('checkout_form');
    }

    public function procesar()
    {
        $session = session();

        // Reglas de validación
        $reglas = [
            'nombre' => 'required|min_length[3]',
            'email' => 'required|valid_email',
            'direccion' => 'required|min_length[5]',
            'telefono' => 'required|min_length[7]'
        ];

        if (!$this->validate($reglas)) {
            // Redirige con errores y mantiene datos antiguos
            return redirect()->back()->withInput()->with('validation', $this->validator);
        }

        // Obtener datos del formulario
        $nombre = $this->request->getPost('nombre');
        $emailCliente = $this->request->getPost('email');
        $direccion = $this->request->getPost('direccion');
        $telefono = $this->request->getPost('telefono');

        // Obtener carrito completo con detalles
        $carritoSession = $session->get('carrito') ?? [];
        if (empty($carritoSession)) {
            return redirect()->to('/catalogo')->with('mensaje', 'Tu carrito está vacío.');
        }

        $productosModel = new ProductoModel();
        $carritoCompleto = [];
        $total = 0;
        foreach ($carritoSession as $item) {
            $producto = $productosModel->find($item['id_producto']);
            if ($producto) {
                $producto['cantidad'] = $item['cantidad'];
                $producto['subtotal'] = $producto['precio'] * $item['cantidad'];
                $carritoCompleto[] = $producto;
                $total += $producto['subtotal'];
            }
        }

        // Armar mensaje del correo
        $mensaje = "Nuevo pedido del cliente $nombre\n";
        $mensaje .= "Email: $emailCliente\n";
        $mensaje .= "Teléfono: $telefono\n";
        $mensaje .= "Dirección: $direccion\n\n";
        $mensaje .= "Detalle del pedido:\n";

        foreach ($carritoCompleto as $producto) {
            $mensaje .= "- {$producto['nombre']} x {$producto['cantidad']} = $" . number_format($producto['subtotal'], 2, ',', '.') . "\n";
        }

        $mensaje .= "\nTotal: $" . number_format($total, 2, ',', '.') . "\n";

        // Enviar correo
        $email = \Config\Services::email();

        // Configura aquí el correo remitente y destinatarios
        $email->setFrom('tuemail@tudominio.com', 'Tu Tienda');
        $email->setTo($emailCliente); // Cliente
        $email->setCc('admin@tudominio.com'); // Admin o quien reciba copia
        $email->setSubject('Confirmación de pedido');
        $email->setMessage($mensaje);

        if ($email->send()) {
            // Vaciar carrito
            $session->remove('carrito');

            // Mensaje flash para la vista gracias
            $session->setFlashdata('mensaje', 'Se ha enviado un correo de confirmación.');

            return redirect()->to('/gracias');
        } else {
            // Error al enviar correo
            return redirect()->back()->withInput()->with('validation', $this->validator)->with('errorCorreo', 'Error al enviar el correo. Intenta nuevamente.');
        }
    }

    public function gracias()
    {
        $session = session();
        $mensaje = $session->getFlashdata('mensaje');

        return view('gracias', ['mensaje' => $mensaje]);
    }
}
