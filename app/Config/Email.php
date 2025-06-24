<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class Email extends BaseConfig
{
    // Dirección de correo desde la cual se enviarán los emails
    public string $fromEmail  = 'sergioedgarv@gmail.com';  
    public string $fromName   = 'Formulario de Contacto';  
    public string $recipients = '';

    /**
     * The "user agent"
     */
    public string $userAgent = 'CodeIgniter';

    /**
     * El protocolo para enviar emails: mail, sendmail, smtp
     */
    public string $protocol = 'smtp';

    /**
     * La ruta al sendmail (no se usa si usas SMTP)
     */
    public string $mailPath = '/usr/sbin/sendmail';

    /**
     * Host del servidor SMTP
     */
    public string $SMTPHost = 'smtp.gmail.com';  // Cambia según tu proveedor

    /**
     * Usuario SMTP (correo electrónico)
     */
    public string $SMTPUser = 'sergioedgarv@gmail.com';  // Cambia por tu email real

    /**
     * Contraseña SMTP o contraseña de aplicación
     */
    public string $SMTPPass = 'mrzm imfk rhpz zjif';  // CONTRASEÑA DE APP

    /**
     * Puerto SMTP
     */
    public int $SMTPPort = 587;

    /**
     * Timeout en segundos para SMTP
     */
    public int $SMTPTimeout = 5;

    /**
     * Mantener conexión SMTP persistente
     */
    public bool $SMTPKeepAlive = false;

    /**
     * Encriptación SMTP: '', 'tls' o 'ssl'
     */
    public string $SMTPCrypto = 'tls';

    /**
     * Habilitar ajuste de línea
     */
    public bool $wordWrap = true;

    /**
     * Cantidad de caracteres para el ajuste de línea
     */
    public int $wrapChars = 76;

    /**
     * Tipo de mail: 'text' o 'html'
     */
    public string $mailType = 'html';

    /**
     * Juego de caracteres
     */
    public string $charset = 'UTF-8';

    /**
     * Validar dirección de correo
     */
    public bool $validate = false;

    /**
     * Prioridad del correo: 1 = alta, 3 = normal, 5 = baja
     */
    public int $priority = 3;

    /**
     * Caracteres de nueva línea (RFC 822)
     */
    public string $CRLF = "\r\n";

    /**
     * Caracteres de nueva línea (RFC 822)
     */
    public string $newline = "\r\n";

    /**
     * Modo batch para BCC
     */
    public bool $BCCBatchMode = false;

    /**
     * Tamaño del batch para BCC
     */
    public int $BCCBatchSize = 200;

    /**
     * Notificación de entrega
     */
    public bool $DSN = false;
}
