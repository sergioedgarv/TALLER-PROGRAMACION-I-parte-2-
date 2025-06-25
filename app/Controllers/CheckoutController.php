<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\ProductoModel;

class CheckoutController extends Controller
{
    //si el carrito esta vacio mostrará un msj caso contrario te lleva al formulario!
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
            $mensaje = "
        <html>
        <head>
        <style>
            body { font-family: Arial, sans-serif; color: #333; }
            h2 { color: #2c3e50; }
            table { border-collapse: collapse; width: 100%; margin-top: 15px; }
            th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
            th { background-color: #f2f2f2; }
            tfoot td { font-weight: bold; }
        </style>
        </head>
        <body>
        <h2>Nuevo pedido de: " . htmlspecialchars($nombre) . "</h2>
        <p><strong>Email:</strong> " . htmlspecialchars($emailCliente) . "</p>
        <p><strong>Teléfono:</strong> " . htmlspecialchars($telefono) . "</p>
        <p><strong>Dirección:</strong> " . nl2br(htmlspecialchars($direccion)) . "</p>

        <h3>Detalle del pedido:</h3>
        <table>
            <thead>
            <tr>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Subtotal</th>
            </tr>
            </thead>
            <tbody>";
        foreach ($carritoCompleto as $producto) {
            $mensaje .= "
            <tr>
                <td>" . htmlspecialchars($producto['nombre']) . "</td>
                <td>" . intval($producto['cantidad']) . "</td>
                <td>$" . number_format($producto['subtotal'], 2, ',', '.') . "</td>
            </tr>";
        }
        $mensaje .= "
            </tbody>
            <tfoot>
            <tr>
                <td colspan='2'>Total</td>
                <td>$" . number_format($total, 2, ',', '.') . "</td>
            </tr>
            </tfoot>
        </table>
        </body>
        </html>";

        // Enviar correo
        $email = \Config\Services::email();

        // Configura aquí el correo remitente y destinatarios
        $email->setFrom('sergioedgarv@gmail.com', 'Tu Tienda');
        $email->setTo($emailCliente); // Cliente
        $email->setCc('sergioedgarv@gmail.com'); // Admin recibe copia
        $email->setReplyTo($emailCliente, $nombre); // Para responder al cliente
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
