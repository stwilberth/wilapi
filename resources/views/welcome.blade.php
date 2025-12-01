<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="anuncielo.com - Servicios informáticos y de publicidad para empresas de todos los sectores: desarrollo web, hospedaje, correo corporativo, diseño gráfico y soluciones digitales personalizadas.">

        <title>anuncielo.com - Servicios Informáticos y Publicidad</title>

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
                                <a href="/" class="inline-flex items-center px-1 pt-1 border-b-2 border-blue-500 text-sm font-medium leading-5 text-gray-900 dark:text-white transition duration-150 ease-in-out">
                                    Inicio
                                </a>
                                <a href="/about" class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300 hover:border-gray-300 dark:hover:border-gray-700 transition duration-150 ease-in-out">
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

            <!-- Hero Section -->
            <div class="relative bg-gradient-to-r from-blue-600 to-blue-800 dark:from-blue-900 dark:to-blue-950">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24 md:py-32">
                    <div class="md:flex md:items-center md:justify-between">
                        <div class="md:w-1/2 mb-12 md:mb-0">
                            <h1 class="text-4xl md:text-5xl font-bold text-white leading-tight mb-6">
                                Soluciones digitales para empresas de todos los sectores
                            </h1>
                            <p class="text-xl text-blue-100 max-w-2xl mb-8">
                                Desde desarrollo web hasta diseño gráfico, ofrecemos servicios informáticos y de publicidad para impulsar su negocio en el mundo digital.
                            </p>
                            <div class="flex flex-col sm:flex-row gap-4">
                                <a href="/services" class="px-8 py-4 bg-white text-blue-700 font-semibold rounded-lg shadow-md hover:bg-blue-50 transition duration-300 ease-in-out flex items-center justify-center">
                                    <i class="fas fa-info-circle mr-2"></i> Conocer más
                                </a>
                                <a href="/contact" class="px-8 py-4 bg-blue-500 text-white font-semibold rounded-lg shadow-md hover:bg-blue-600 transition duration-300 ease-in-out flex items-center justify-center">
                                    <i class="fas fa-headset mr-2"></i> Solicitar demo
                                </a>
                            </div>
                        </div>
                        <div class="md:w-1/2 flex justify-center">
                            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-2xl p-6 w-full max-w-md">
                                <div class="text-center mb-6">
                                    <i class="fas fa-laptop-code text-5xl text-blue-600 dark:text-blue-400 mb-4"></i>
                                    <h2 class="text-2xl font-bold text-gray-900 dark:text-white">Acceso rápido</h2>
                                    <p class="text-gray-600 dark:text-gray-300 mt-2">Inicie sesión en su cuenta o contáctenos para comenzar</p>
                                </div>
                                <div class="space-y-4">
                                    <a href="/panel/login" class="w-full block text-center px-6 py-3 bg-blue-600 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 transition duration-300 ease-in-out">
                                        <i class="fas fa-sign-in-alt mr-2"></i> Iniciar Sesión
                                    </a>
                                    <a href="https://wa.me/50685008393" target="_blank" class="w-full block text-center px-6 py-3 bg-green-600 text-white font-semibold rounded-lg shadow-md hover:bg-green-700 transition duration-300 ease-in-out">
                                        <i class="fab fa-whatsapp mr-2"></i> Contactar por WhatsApp
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Características principales -->
            <div class="py-16 bg-white dark:bg-gray-900">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="text-center mb-16">
                        <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-4">Servicios para empresas de todos los sectores</h2>
                        <p class="text-xl text-gray-600 dark:text-gray-400 max-w-3xl mx-auto">
                            Ofrecemos soluciones informáticas y de publicidad completas para negocios de cualquier industria que busquen destacar en el mundo digital.
                        </p>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                        <div class="bg-blue-50 dark:bg-gray-800 rounded-lg shadow-lg p-8 flex flex-col items-center text-center transition-transform duration-300 hover:scale-105">
                            <div class="h-20 w-20 bg-blue-100 dark:bg-blue-900 rounded-full flex items-center justify-center mb-6">
                                <i class="fas fa-laptop-code text-3xl text-blue-600 dark:text-blue-400"></i>
                            </div>
                            <h3 class="text-2xl font-semibold text-gray-900 dark:text-white mb-4">Desarrollo Web</h3>
                            <p class="text-gray-600 dark:text-gray-300 mb-6">
                                Creamos páginas web profesionales y atractivas para su negocio. Diseños modernos, responsivos y optimizados para conversión.
                            </p>
                            <a href="/services" class="text-blue-600 dark:text-blue-400 font-medium hover:text-blue-800 dark:hover:text-blue-300 inline-flex items-center">
                                Conocer más <i class="fas fa-arrow-right ml-2"></i>
                            </a>
                        </div>
                        
                        <div class="bg-blue-50 dark:bg-gray-800 rounded-lg shadow-lg p-8 flex flex-col items-center text-center transition-transform duration-300 hover:scale-105">
                            <div class="h-20 w-20 bg-blue-100 dark:bg-blue-900 rounded-full flex items-center justify-center mb-6">
                                <i class="fas fa-server text-3xl text-blue-600 dark:text-blue-400"></i>
                            </div>
                            <h3 class="text-2xl font-semibold text-gray-900 dark:text-white mb-4">Hospedaje y Correo Corporativo</h3>
                            <p class="text-gray-600 dark:text-gray-300 mb-6">
                                Servicios de hosting confiables y cuentas de correo profesionales con su propio dominio para proyectar una imagen empresarial sólida.
                            </p>
                            <a href="/services" class="text-blue-600 dark:text-blue-400 font-medium hover:text-blue-800 dark:hover:text-blue-300 inline-flex items-center">
                                Conocer más <i class="fas fa-arrow-right ml-2"></i>
                            </a>
                        </div>
                        
                        <div class="bg-blue-50 dark:bg-gray-800 rounded-lg shadow-lg p-8 flex flex-col items-center text-center transition-transform duration-300 hover:scale-105">
                            <div class="h-20 w-20 bg-blue-100 dark:bg-blue-900 rounded-full flex items-center justify-center mb-6">
                                <i class="fas fa-palette text-3xl text-blue-600 dark:text-blue-400"></i>
                            </div>
                            <h3 class="text-2xl font-semibold text-gray-900 dark:text-white mb-4">Diseño Gráfico</h3>
                            <p class="text-gray-600 dark:text-gray-300 mb-6">
                                Logos, tarjetas de presentación, material publicitario y branding completo. Diseños profesionales que comunican su mensaje de marca.
                            </p>
                            <a href="/services" class="text-blue-600 dark:text-blue-400 font-medium hover:text-blue-800 dark:hover:text-blue-300 inline-flex items-center">
                                Conocer más <i class="fas fa-arrow-right ml-2"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Beneficios -->
            <div class="py-16 bg-gray-50 dark:bg-gray-800">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="text-center mb-16">
                        <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-4">¿Por qué elegir anuncielo.com?</h2>
                        <p class="text-xl text-gray-600 dark:text-gray-400 max-w-3xl mx-auto">
                            Ofrecemos soluciones digitales completas con tecnología moderna y soporte personalizado.
                        </p>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                        <div class="bg-white dark:bg-gray-700 rounded-lg shadow-md p-6">
                            <div class="h-12 w-12 bg-blue-100 dark:bg-blue-900 rounded-full flex items-center justify-center mb-4">
                                <i class="fas fa-chart-line text-xl text-blue-600 dark:text-blue-400"></i>
                            </div>
                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">Soluciones Personalizadas</h3>
                            <p class="text-gray-600 dark:text-gray-300">Cada proyecto es único. Adaptamos nuestros servicios a las necesidades específicas de su negocio.</p>
                        </div>
                        
                        <div class="bg-white dark:bg-gray-700 rounded-lg shadow-md p-6">
                            <div class="h-12 w-12 bg-blue-100 dark:bg-blue-900 rounded-full flex items-center justify-center mb-4">
                                <i class="fas fa-mobile-alt text-xl text-blue-600 dark:text-blue-400"></i>
                            </div>
                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">Tecnología Moderna</h3>
                            <p class="text-gray-600 dark:text-gray-300">Utilizamos las últimas tecnologías en desarrollo web y diseño para crear soluciones robustas y escalables.</p>
                        </div>
                        
                        <div class="bg-white dark:bg-gray-700 rounded-lg shadow-md p-6">
                            <div class="h-12 w-12 bg-blue-100 dark:bg-blue-900 rounded-full flex items-center justify-center mb-4">
                                <i class="fas fa-shield-alt text-xl text-blue-600 dark:text-blue-400"></i>
                            </div>
                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">Seguridad Garantizada</h3>
                            <p class="text-gray-600 dark:text-gray-300">Sus datos están protegidos con los más altos estándares de seguridad y cumplimiento normativo.</p>
                        </div>
                        
                        <div class="bg-white dark:bg-gray-700 rounded-lg shadow-md p-6">
                            <div class="h-12 w-12 bg-blue-100 dark:bg-blue-900 rounded-full flex items-center justify-center mb-4">
                                <i class="fas fa-headset text-xl text-blue-600 dark:text-blue-400"></i>
                            </div>
                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-2">Soporte Dedicado</h3>
                            <p class="text-gray-600 dark:text-gray-300">Equipo de soporte local en español disponible para ayudarle cuando lo necesite.</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Testimonios -->
            <div class="py-16 bg-white dark:bg-gray-900">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="text-center mb-16">
                        <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-4">Lo que dicen nuestros clientes</h2>
                        <p class="text-xl text-gray-600 dark:text-gray-400 max-w-3xl mx-auto">
                            Empresas de diversos sectores confían en anuncielo.com para su presencia digital.
                        </p>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                        <div class="bg-blue-50 dark:bg-gray-800 rounded-lg shadow-lg p-8">
                            <div class="flex items-center mb-4">
                                <div class="text-yellow-400 flex">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                            </div>
                            <p class="text-gray-700 dark:text-gray-300 mb-6 italic">
                                "La nueva página web que nos desarrolló anuncielo.com ha superado nuestras expectativas. El diseño es moderno y profesional, y hemos visto un aumento del 45% en consultas. El equipo siempre estuvo disponible para nuestras dudas."
                            </p>
                            <div class="flex items-center">
                                <div class="h-12 w-12 bg-blue-200 dark:bg-blue-800 rounded-full flex items-center justify-center mr-4">
                                    <i class="fas fa-user text-blue-600 dark:text-blue-400"></i>
                                </div>
                                <div>
                                    <h4 class="text-lg font-semibold text-gray-900 dark:text-white">Ana María Gómez</h4>
                                    <p class="text-gray-600 dark:text-gray-400">Clínica Dental Sonrisas</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="bg-blue-50 dark:bg-gray-800 rounded-lg shadow-lg p-8">
                            <div class="flex items-center mb-4">
                                <div class="text-yellow-400 flex">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </div>
                            </div>
                            <p class="text-gray-700 dark:text-gray-300 mb-6 italic">
                                "El servicio de hospedaje web es excelente. Llevamos 2 años sin ningún problema y la velocidad de nuestro sitio mejoró notablemente. El correo corporativo funciona perfecto y da una imagen muy profesional a nuestra empresa."
                            </p>
                            <div class="flex items-center">
                                <div class="h-12 w-12 bg-blue-200 dark:bg-blue-800 rounded-full flex items-center justify-center mr-4">
                                    <i class="fas fa-user text-blue-600 dark:text-blue-400"></i>
                                </div>
                                <div>
                                    <h4 class="text-lg font-semibold text-gray-900 dark:text-white">Luis Hernández</h4>
                                    <p class="text-gray-600 dark:text-gray-400">Bufete Jurídico Asociados</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="bg-blue-50 dark:bg-gray-800 rounded-lg shadow-lg p-8">
                            <div class="flex items-center mb-4">
                                <div class="text-yellow-400 flex">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                </div>
                            </div>
                            <p class="text-gray-700 dark:text-gray-300 mb-6 italic">
                                "El diseño de nuestro logo y material gráfico ha transformado la imagen de nuestro negocio. Las tarjetas de presentación son elegantes y recibimos muchos cumplidos. Definitivamente mejoró nuestra percepción de marca."
                            </p>
                            <div class="flex items-center">
                                <div class="h-12 w-12 bg-blue-200 dark:bg-blue-800 rounded-full flex items-center justify-center mr-4">
                                    <i class="fas fa-user text-blue-600 dark:text-blue-400"></i>
                                </div>
                                <div>
                                    <h4 class="text-lg font-semibold text-gray-900 dark:text-white">Patricia Morales</h4>
                                    <p class="text-gray-600 dark:text-gray-400">Restaurante Sabor Tico</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- CTA -->
            <div class="py-16 bg-blue-600 dark:bg-blue-800">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                    <h2 class="text-3xl font-bold text-white mb-6">¿Listo para llevar su negocio al siguiente nivel?</h2>
                    <p class="text-xl text-blue-100 max-w-3xl mx-auto mb-8">
                        Únase a las empresas que ya están mejorando su presencia digital con anuncielo.com.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center">
                        <a href="/contact" class="px-8 py-4 bg-white text-blue-700 font-semibold rounded-lg shadow-md hover:bg-blue-50 transition duration-300 ease-in-out inline-flex items-center justify-center">
                            <i class="fas fa-headset mr-2"></i> Solicitar una demostración
                        </a>
                        <a href="/services" class="px-8 py-4 bg-blue-500 text-white font-semibold rounded-lg shadow-md hover:bg-blue-400 transition duration-300 ease-in-out inline-flex items-center justify-center">
                            <i class="fas fa-info-circle mr-2"></i> Conocer nuestros servicios
                        </a>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            @include('components.footer')
            <footer
