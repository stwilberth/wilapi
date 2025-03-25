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
    'paths' => ['api/*', '/', 'storage/*', 'sanctum/csrf-cookie'], // Incluye tours-company

    'allowed_methods' => ['*'],

    'allowed_origins' => [
        'http://localhost:3001',
        'http://localhost:3000',
        'http://wilapi.test',
        'https://osanaturetours.com/',
        'https://ecoexpeditionscr.com',
        'https://rioverdeecolodge.com',
        // Capacitor schemes
        'capacitor://localhost',
        'http://localhost',
        'ionic://localhost',
        'com.rioverdeecolodge.app',
        // Add these additional schemes for better compatibility
        'file://',
        'https://localhost',
        'capacitor://com.rioverdeecolodge.app'
    ],

    'allowed_origins_patterns' => [],

    'allowed_headers' => ['*'],

    'exposed_headers' => [],

    'max_age' => 0,

    'supports_credentials' => false,

];