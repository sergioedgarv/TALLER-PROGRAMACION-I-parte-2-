<?php namespace App\Controllers;

use CodeIgniter\Controller;

class Contacto extends Controller
{
    /**
     * Muestra el formulario de contacto
     */
    public function index()
    {
        echo view('templates/header');
        echo view('contacto');  // Vista del formulario
        echo view('templates/footer');
    }

    /**
     * Procesa el envío del formulario de contacto
     */
    public function enviar()
    {
        helper(['form', 'url']);

        // Definir reglas de validación para los campos
        $validation = \Config\Services::validation();

        $validation->setRules([
            'nombre'    => 'required|min_length[3]|max_length[100]',
            'email'     => 'required|valid_email',
            'motivo'    => 'required',
            'mensaje'   => 'required|max_length[500]',
            'politicas' => 'required' // Checkbox obligatorio
        ], [
            'politicas' => [
                'required' => 'Debes aceptar la política de privacidad.'
            ]
        ]);

        // Validar los datos recibidos
        if (!$validation->withRequest($this->request)->run()) {
            // Si hay errores, redirigir atrás con errores y datos previos
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        // Obtener datos del formulario
        $nombre     = $this->request->getPost('nombre');
        $email      = $this->request->getPost('email');
        $telefono   = $this->request->getPost('telefono');
        $motivo     = $this->request->getPost('motivo');
        $pedido     = $this->request->getPost('pedido');
        $mensaje    = $this->request->getPost('mensaje');
        $metodo     = $this->request->getPost('metodo'); // Puede ser array o null
        $newsletter = $this->request->getPost('newsletter') ? 'Sí' : 'No';

        // Manejo del archivo adjunto (opcional)
        $archivoAdjunto = $this->request->getFile('archivo');
        $adjuntoPath = null;

        if ($archivoAdjunto && $archivoAdjunto->isValid() && !$archivoAdjunto->hasMoved()) {
            // Guardar archivo temporalmente en writable/uploads
            $adjuntoPath = WRITEPATH . 'uploads/' . $archivoAdjunto->getRandomName();
            $archivoAdjunto->move(WRITEPATH . 'uploads', $adjuntoPath);
        }

        // Preparar servicio de email
        $emailService = \Config\Services::email();

        // Configurar remitente y destinatario
        $emailService->setFrom('sergioedgarv@gmail.com', 'Formulario de Contacto'); // Cambia según tu configuración
        $emailService->setTo('sergioedgarv@gmail.com'); // Cambia por tu email receptor

        // Asunto del correo
        $emailService->setSubject("Nuevo mensaje de contacto: " . esc($motivo));

        // Construir cuerpo del mensaje con datos escapados para seguridad
        $cuerpo = "
        <h2>Nuevo mensaje de contacto</h2>
        <p><strong>Nombre:</strong> " . esc($nombre) . "</p>
        <p><strong>Email:</strong> " . esc($email) . "</p>
        <p><strong>Teléfono:</strong> " . esc($telefono) . "</p>
        <p><strong>Motivo:</strong> " . esc($motivo) . "</p>
        <p><strong>Número de pedido:</strong> " . esc($pedido) . "</p>
        <p><strong>Mensaje:</strong><br>" . nl2br(esc($mensaje)) . "</p>
        <p><strong>Métodos de contacto preferidos:</strong> " . ($metodo ? esc(implode(', ', $metodo)) : 'No especificado') . "</p>
        <p><strong>Desea recibir novedades:</strong> " . esc($newsletter) . "</p>
        ";

        $emailService->setMessage($cuerpo);

        // Adjuntar archivo si existe
        if ($adjuntoPath) {
            $emailService->attach($adjuntoPath);
        }

        // Intentar enviar el correo
        if ($emailService->send()) {
            // Borrar archivo temporal para no acumular basura
            if ($adjuntoPath && file_exists($adjuntoPath)) {
                unlink($adjuntoPath);
            }

            // Redirigir con mensaje de éxito
            return redirect()->to('/contacto')->with('success', '¡Mensaje enviado exitosamente!');
        } else {
            // En caso de error, borrar archivo temporal si existe
            if ($adjuntoPath && file_exists($adjuntoPath)) {
                unlink($adjuntoPath);
            }

            // Redirigir con mensaje de error y mantener datos ingresados
            return redirect()->back()->withInput()->with('error', 'Error al enviar el mensaje. Por favor, intente nuevamente.');
        }
    }
}
