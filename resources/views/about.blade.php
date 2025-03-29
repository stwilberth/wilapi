<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Conozca más sobre WilAPI, el sistema de gestión integral para empresas turísticas y hoteleras en Costa Rica">

        <title>WilAPI - Sobre Nosotros</title>

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
                                <a href="/" class="text-2xl font-bold text-blue-600 dark:text-blue-400">WilAPI</a>
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
            <main class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 shadow-xl rounded-lg overflow-hidden">
                    <div class="p-8">
                        <h1 class="text-3xl font-bold text-gray-900 dark:text-white mb-6">Sobre WilAPI</h1>
                        
                        <div class="prose prose-blue max-w-none dark:prose-invert">
                            <p class="text-lg text-gray-700 dark:text-gray-300 mb-6">
                                WilAPI es una plataforma integral de gestión diseñada específicamente para empresas del sector turístico y hotelero en Costa Rica. Nuestra misión es proporcionar herramientas tecnológicas avanzadas que permitan a nuestros clientes optimizar sus operaciones, mejorar la experiencia de sus huéspedes y aumentar su visibilidad en línea.
                            </p>
                            
                            <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mt-8 mb-4">Nuestra Historia</h2>
                            <p class="text-gray-700 dark:text-gray-300 mb-6">
                                Fundada en 2020 por un equipo de expertos en tecnología y turismo, WilAPI nació de la necesidad de digitalizar y modernizar la gestión de empresas turísticas en Costa Rica. Identificamos que muchas empresas locales carecían de herramientas tecnológicas adaptadas a sus necesidades específicas, lo que limitaba su capacidad para competir en un mercado cada vez más digital.
                            </p>
                            <p class="text-gray-700 dark:text-gray-300 mb-6">
                                Desde entonces, hemos trabajado incansablemente para desarrollar una plataforma que no solo resuelva los desafíos operativos diarios de nuestros clientes, sino que también les ayude a destacar en un mercado competitivo, ofreciendo experiencias excepcionales a sus clientes.
                            </p>
                            
                            <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mt-8 mb-4">Nuestra Visión</h2>
                            <p class="text-gray-700 dark:text-gray-300 mb-6">
                                En WilAPI, aspiramos a ser el aliado tecnológico preferido por las empresas turísticas y hoteleras en Costa Rica y Centroamérica. Nuestra visión es crear un ecosistema digital donde la tecnología potencie la autenticidad y calidad de las experiencias turísticas costarricenses, permitiendo a las empresas locales competir globalmente sin perder su esencia.
                            </p>
                            
                            <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mt-8 mb-4">Nuestros Valores</h2>
                            <ul class="list-disc pl-6 text-gray-700 dark:text-gray-300 mb-6 space-y-2">
                                <li><strong>Innovación:</strong> Buscamos constantemente nuevas formas de mejorar nuestra plataforma y ofrecer soluciones creativas a los desafíos de nuestros clientes.</li>
                                <li><strong>Excelencia:</strong> Nos comprometemos a ofrecer productos y servicios de la más alta calidad, superando las expectativas de nuestros clientes.</li>
                                <li><strong>Sostenibilidad:</strong> Promovemos prácticas empresariales sostenibles y apoyamos el turismo responsable en Costa Rica.</li>
                                <li><strong>Colaboración:</strong> Trabajamos estrechamente con nuestros clientes, entendiendo sus necesidades y adaptando nuestras soluciones a sus requerimientos específicos.</li>
                                <li><strong>Integridad:</strong> Actuamos con honestidad y transparencia en todas nuestras operaciones y relaciones comerciales.</li>
                            </ul>
                            
                            <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mt-8 mb-4">Nuestro Equipo</h2>
                            <p class="text-gray-700 dark:text-gray-300 mb-6">
                                Detrás de WilAPI hay un equipo diverso y apasionado de profesionales en tecnología, diseño, marketing y atención al cliente. Todos compartimos el compromiso de ayudar a las empresas turísticas costarricenses a prosperar en la era digital.
                            </p>
                            <p class="text-gray-700 dark:text-gray-300 mb-6">
                                Nuestro equipo combina experiencia técnica con un profundo conocimiento del sector turístico local, lo que nos permite desarrollar soluciones que realmente responden a las necesidades específicas de nuestros clientes.
                            </p>
                        </div>
                    </div>
                </div>
            </main>

            <!-- Footer -->
            <footer class="bg-white dark:bg-gray-900 mt-12">
                <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                        <div class="col-span-1 md:col-span-2">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">WilAPI</h3>
                            <p class="text-gray-600 dark:text-gray-400 mb-4">Sistema de gestión integral para empresas turísticas y hoteleras en Costa Rica.</p>
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
                                    <span class="text-gray-600 dark:text-gray-400">info@wilapi.com</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="mt-8 pt-8 border-t border-gray-200 dark:border-gray-700">
                        <p class="text-gray-500 dark:text-gray-400 text-sm text-center">
                            &copy; {{ date('Y') }} WilAPI. Todos los derechos reservados.
                        </p>
                    </div>
                </div>
            </footer>
        </div>
    </body>
</html>