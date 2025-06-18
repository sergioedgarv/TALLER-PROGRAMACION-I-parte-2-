<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use MercadoPago\SDK;

class MercadoPagoController extends Controller
{
    public function __construct()
    {
        // Configura tu access token de Mercado Pago
        SDK::setAccessToken('TU_ACCESS_TOKEN_AQUI');
    }

    public function crearPreferencia()
    {
        // Carga la librería de Mercado Pago
        $preference = new \MercadoPago\Preference();

        // Crear un ítem de ejemplo (en real, obtén datos del carrito o base de datos)
        $item = new \MercadoPago\Item();
        $item->title = "Producto de prueba";
        $item->quantity = 1;
        $item->unit_price = 100.00;

        $preference->items = array($item);

        // Guardar preferencia
        $preference->save();

        // Pasar la preferencia a la vista para mostrar el botón de pago
        return view('mercadopago_checkout', ['preferenceId' => $preference->id]);
    }
}
