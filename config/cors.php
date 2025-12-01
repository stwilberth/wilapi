<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Cross-Origin Resource Sharing (CORS) Configuration
    |--------------------------------------------------------------------------
    |
    | Here you may configure your settings for cross-origin resource sharing
    | or "CORS". This determines what cross-origin operations may execute
    | in web browsers. You are free to adjust these settings as needed.
    |
    | To learn more: https://developer.mozilla.org/en-US/docs/Web/HTTP/CORS
    |
    */
    
    // Rutas API, Sanctum y Storage (necesario para servir imágenes a frontends externos)
    'paths' => ['api/*', 'sanctum/csrf-cookie', 'storage/*'],

    // Solo los métodos HTTP que realmente necesitas
    'allowed_methods' => ['GET', 'POST', 'PUT', 'DELETE', 'PATCH', 'OPTIONS'],

    'allowed_origins' => [
        // DESARROLLO - Solo localhost (HTTP permitido solo en desarrollo)
        'http://localhost:3000',
        'http://localhost:3001',
        'http://localhost:8000',
        
        // PRODUCCIÓN - Solo HTTPS (seguridad)
        'https://osatoursandtravel.com',
        'https://anuncielo.com',
        'https://osanaturetours.com',
        'https://ecoexpeditionscr.com',
        'https://rioverdeecolodge.com',
        'https://leivatours.com',
        
        // CAPACITOR - Apps móviles
        'capacitor://localhost',
        'ionic://localhost',
        'capacitor://com.rioverdeecolodge.app',
        
        // HTTPS localhost para desarrollo con SSL
        'https://localhost',
    ],

    'allowed_origins_patterns' => [],

    // Headers específicos necesarios (más seguro que '*')
    'allowed_headers' => [
        'Content-Type',
        'X-Requested-With',
        'Authorization',
        'Accept',
        'Origin',
        'X-CSRF-TOKEN',
        'X-Socket-Id', // Para Laravel Echo/Broadcasting si lo usas
    ],

    'exposed_headers' => [],

    // Cachea las respuestas preflight por 1 hora (mejora rendimiento)
    'max_age' => 3600,

    // TRUE para permitir cookies/credenciales (necesario para Sanctum)
    'supports_credentials' => true,

];