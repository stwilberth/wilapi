<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Conozca más sobre anuncielo.com, su aliado en servicios informáticos y publicidad para empresas de todos los sectores en Costa Rica">

        <title>anuncielo.com - Sobre Nosotros</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

        @vite('resources/css/app.css')
    </head>
    <body class="antialiased">
        <div class="relative min-h-screen bg-gradient-to-br from-blue-100 to-blue-50 dark:from-gray-900 dark:to-gray-800 selection:bg-blue-500 selection:text-white">
            <!-- Navegación -->
            <nav class="bg-white dark:bg-gray-900 shadow-md">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-between h-16">
                        <div class="flex">
                            <div class="flex-shrink-0 flex items-center">
                                <a href="/" class="text-2xl font-bold text-blue-600 dark:text-blue-400">anuncielo.com</a>
                            </div>
                            <div class="hidden sm:ml-6 sm:flex sm:space-x-8">
                                <a href="/" class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300 hover:border-gray-300 dark:hover:border-gray-700 transition duration-150 ease-in-out">
                                    Inicio
                                </a>
                                <a href="/about" class="inline-flex items-center px-1 pt-1 border-b-2 border-blue-500 text-sm font-medium leading-5 text-gray-900 dark:text-white transition duration-150 ease-in-out">
                                    Sobre Nosotros
                                </a>
                                <a href="/services" class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300 hover:border-gray-300 dark:hover:border-gray-700 transition duration-150 ease-in-out">
                                    Servicios
                                </a>
                                <a href="/contact" class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300 hover:border-gray-300 dark:hover:border-gray-700 transition duration-150 ease-in-out">
                                    Contacto
                                </a>
                            </div>
                        </div>
                        <div class="hidden sm:ml-6 sm:flex sm:items-center">
                            <a href="/panel/login" class="px-4 py-2 bg-blue-600 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 transition duration-300 ease-in-out flex items-center justify-center">
                                <i class="fas fa-sign-in-alt mr-2"></i> Iniciar Sesión
                            </a>
                        </div>
                    </div>
                </div>
            </nav>

            <!-- Contenido principal -->
            <!-- Footer -->
            <footer class="bg-white dark:bg-gray-900 mt-12">
                <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                        <div class="col-span-1 md:col-span-2">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">anuncielo.com</h3>
                            <p class="text-gray-600 dark:text-gray-400 mb-4">Servicios informáticos y de publicidad para empresas de todos los sectores.</p>
                            <div class="flex space-x-4">
                                <a href="#" class="text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-300">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                                <a href="#" class="text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-300">
                                    <i class="fab fa-instagram"></i>
                                </a>
                                <a href="#" class="text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-300">
                                    <i class="fab fa-twitter"></i>
                                </a>
                                <a href="#" class="text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-300">
                                    <i class="fab fa-linkedin-in"></i>
                                </a>
                            </div>
                        </div>
                        <div>
                            <h3 class="text-sm font-semibold text-gray-900 dark:text-white uppercase tracking-wider mb-4">Enlaces</h3>
                            <ul class="space-y-2">
                                <li>
                                    <a href="/" class="text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white">Inicio</a>
                                </li>
                                <li>
                                    <a href="/about" class="text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white">Sobre Nosotros</a>
                                </li>
                                <li>
                                    <a href="/services" class="text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white">Servicios</a>
                                </li>
                                <li>
                                    <a href="/contact" class="text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-white">Contacto</a>
                                </li>
                            </ul>
                        </div>
                        <div>
                            <h3 class="text-sm font-semibold text-gray-900 dark:text-white uppercase tracking-wider mb-4">Contacto</h3>
                            <ul class="space-y-2">
                                <li class="flex items-start">
                                    <i class="fas fa-map-marker-alt text-gray-500 dark:text-gray-400 mt-1 mr-2"></i>
                                    <span class="text-gray-600 dark:text-gray-400">San José, Costa Rica</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-phone text-gray-500 dark:text-gray-400 mt-1 mr-2"></i>
                                    <span class="text-gray-600 dark:text-gray-400">+506 8500 8393</span>
                                </li>
                                <li class="flex items-start">
                                    <i class="fas fa-envelope text-gray-500 dark:text-gray-400 mt-1 mr-2"></i>
                                    <span class="text-gray-600 dark:text-gray-400">info@anuncielo.com</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="mt-8 pt-8 border-t border-gray-200 dark:border-gray-700">
                        <p class="text-gray-500 dark:text-gray-400 text-sm text-center">
                            &copy; {{ date('Y') }} anuncielo.com. Todos los derechos reservados.
                        </p>
                    </div>
                </div>
            </footer>
        </div>
    </body>
</html>