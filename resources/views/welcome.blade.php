<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>WilAPI - Bienvenido</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

        @vite('resources/css/app.css')
    </head>
    <body class="antialiased">
        <div class="relative min-h-screen bg-gradient-to-br from-blue-100 to-blue-50 dark:from-gray-900 dark:to-gray-800 selection:bg-blue-500 selection:text-white">

            <div class="max-w-7xl mx-auto p-6 lg:p-8 flex flex-col items-center justify-center min-h-screen">
                <div class="text-center">
                    <h1 class="text-5xl font-bold text-gray-900 dark:text-white mb-6">WilAPI</h1>
                    <p class="text-xl text-gray-600 dark:text-gray-300 max-w-3xl mx-auto mb-12">
                        Sistema de gestión integral para su empresa. Optimice sus operaciones, mejore la productividad y tome decisiones basadas en datos en tiempo real.
                    </p>
                    
                    <div class="flex flex-col sm:flex-row gap-6 justify-center mt-8">
                        <a href="/panel/login" class="w-48 px-8 py-4 bg-blue-600 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 transition duration-300 ease-in-out flex items-center justify-center">
                            <i class="fas fa-sign-in-alt mr-2"></i> Iniciar Sesión
                        </a>
                        
                        <a href="https://wa.me/50685008393" target="_blank" class="w-48 px-8 py-4 bg-green-600 text-white font-semibold rounded-lg shadow-md hover:bg-green-700 transition duration-300 ease-in-out flex items-center justify-center">
                            <i class="fab fa-whatsapp mr-2"></i> Contactar
                        </a>
                    </div>
                </div>
                
                <div class="mt-16 grid grid-cols-1 md:grid-cols-3 gap-8 w-full max-w-5xl">
                    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6 flex flex-col items-center text-center">
                        <div class="h-16 w-16 bg-blue-100 dark:bg-blue-900 rounded-full flex items-center justify-center mb-4">
                            <i class="fas fa-chart-line text-2xl text-blue-600 dark:text-blue-400"></i>
                        </div>
                        <h2 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">Análisis Avanzado</h2>
                        <p class="text-gray-600 dark:text-gray-300">Obtenga información valiosa con nuestras herramientas de análisis de datos.</p>
                    </div>
                    
                    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6 flex flex-col items-center text-center">
                        <div class="h-16 w-16 bg-blue-100 dark:bg-blue-900 rounded-full flex items-center justify-center mb-4">
                            <i class="fas fa-mobile-alt text-2xl text-blue-600 dark:text-blue-400"></i>
                        </div>
                        <h2 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">Acceso Móvil</h2>
                        <p class="text-gray-600 dark:text-gray-300">Gestione su negocio desde cualquier lugar con nuestra aplicación móvil.</p>
                    </div>
                    
                    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6 flex flex-col items-center text-center">
                        <div class="h-16 w-16 bg-blue-100 dark:bg-blue-900 rounded-full flex items-center justify-center mb-4">
                            <i class="fas fa-shield-alt text-2xl text-blue-600 dark:text-blue-400"></i>
                        </div>
                        <h2 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">Seguridad Garantizada</h2>
                        <p class="text-gray-600 dark:text-gray-300">Sus datos están protegidos con los más altos estándares de seguridad.</p>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
