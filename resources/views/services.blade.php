<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Descubra los servicios y soluciones que WilAPI ofrece para empresas turísticas y hoteleras en Costa Rica">

        <title>WilAPI - Nuestros Servicios</title>

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
                                <a href="/about" class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300 hover:border-gray-300 dark:hover:border-gray-700 transition duration-150 ease-in-out">
                                    Sobre Nosotros
                                </a>
                                <a href="/services" class="inline-flex items-center px-1 pt-1 border-b-2 border-blue-500 text-sm font-medium leading-5 text-gray-900 dark:text-white transition duration-150 ease-in-out">
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
                        <h1 class="text-3xl font-bold text-gray-900 dark:text-white mb-6">Nuestros Servicios</h1>
                        
                        <p class="text-lg text-gray-700 dark:text-gray-300 mb-10">
                            En WilAPI ofrecemos soluciones tecnológicas integrales diseñadas específicamente para empresas del sector turístico y hotelero en Costa Rica. Nuestros servicios están orientados a optimizar sus operaciones, mejorar la experiencia de sus clientes y aumentar su visibilidad en línea.
                        </p>
                        
                        <!-- Gestión de Tours -->
                        <div class="mb-16">
                            <div class="flex items-center mb-4">
                                <div class="h-12 w-12 bg-blue-100 dark:bg-blue-900 rounded-full flex items-center justify-center mr-4">
                                    <i class="fas fa-route text-xl text-blue-600 dark:text-blue-400"></i>
                                </div>
                                <h2 class="text-2xl font-semibold text-gray-900 dark:text-white">Gestión de Tours</h2>
                            </div>
                            
                            <div class="ml-16">
                                <p class="text-gray-700 dark:text-gray-300 mb-4">
                                    Nuestra plataforma le permite gestionar de manera eficiente todos los aspectos relacionados con sus tours y excursiones. Desde la creación y actualización de información detallada hasta la gestión de reservas y disponibilidad.
                                </p>
                                
                                <h3 class="text-xl font-medium text-gray-900 dark:text-white mt-6 mb-3">Características principales:</h3>
                                <ul class="list-disc pl-6 text-gray-700 dark:text-gray-300 space-y-2 mb-6">
                                    <li>Creación de fichas detalladas para cada tour con información completa: descripción, duración, precio, nivel de dificultad, itinerario, etc.</li>
                                    <li>Gestión de imágenes de alta calidad para mostrar la experiencia de sus tours.</li>
                                    <li>Categorización por ubicación y tipo de actividad para facilitar la búsqueda.</li>
                                    <li>Integración con sistemas de reservas online.</li>
                                    <li>Análisis de rendimiento y popularidad de cada tour.</li>
                                </ul>
                                
                                <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-6 mb-6">
                                    <h4 class="text-lg font-medium text-gray-900 dark:text-white mb-3">Caso de éxito:</h4>
                                    <p class="text-gray-700 dark:text-gray-300 italic">
                                        "Gracias al sistema de gestión de tours de WilAPI, hemos aumentado nuestras reservas en un 35% en los últimos seis meses. La plataforma nos permite mostrar información detallada y atractiva de nuestras excursiones, lo que ha mejorado significativamente la conversión de visitantes a clientes." - Aventuras Tropicales, Guanacaste
                                    </p>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Gestión de Alojamientos -->
                        <div class="mb-16">
                            <div class="flex items-center mb-4">
                                <div class="h-12 w-12 bg-blue-100 dark:bg-blue-900 rounded-full flex items-center justify-center mr-4">
                                    <i class="fas fa-hotel text-xl text-blue-600 dark:text-blue-400"></i>
                                </div>
                                <h2 class="text-2xl font-semibold text-gray-900 dark:text-white">Gestión de Alojamientos</h2>
                            </div>
                            
                            <div class="ml-16">
                                <p class="text-gray-700 dark:text-gray-300 mb-4">
                                    Administre eficientemente sus habitaciones, cabañas o apartamentos con nuestro sistema integral de gestión de alojamientos. Optimice la ocupación, gestione tarifas y mejore la experiencia de sus huéspedes.
                                </p>
                                
                                <h3 class="text-xl font-medium text-gray-900 dark:text-white mt-6 mb-3">Características principales:</h3>
                                <ul class="list-disc pl-6 text-gray-700 dark:text-gray-300 space-y-2 mb-6">
                                    <li>Creación de fichas detalladas para cada tipo de habitación con información completa: capacidad, comodidades, tarifas, etc.</li>
                                    <li>Gestión de imágenes de alta calidad para mostrar sus instalaciones.</li>
                                    <li>Sistema de calendario de disponibilidad y reservas.</li>
                                    <li>Gestión de tarifas dinámicas según temporada y ocupación.</li>
                                    <li>Integración con plataformas como Booking, Airbnb y Expedia.</li>
                                    <li>Generación de reportes de ocupación y rendimiento.</li>
                                </ul>
                                
                                <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-6 mb-6">
                                    <h4 class="text-lg font-medium text-gray-900 dark:text-white mb-3">Caso de éxito:</h4>
                                    <p class="text-gray-700 dark:text-gray-300 italic">
                                        "La implementación del sistema de gestión de alojamientos de WilAPI ha revolucionado nuestra operación diaria. Hemos reducido los errores de reserva en un 90% y aumentado nuestra tasa de ocupación en un 25%. La integración con plataformas como Booking y Airbnb nos ha permitido centralizar todas nuestras reservas en un solo sistema." - Hotel Vista Paraíso, Manuel Antonio
                                    </p>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Catálogo de Productos -->
                        <div class="mb-16">
                            <div class="flex items-center mb-4">
                                <div class="h-12 w-12 bg-blue-100 dark:bg-blue-900 rounded-full flex items-center justify-center mr-4">
                                    <i class="fas fa-shopping-cart text-xl text-blue-600 dark:text-blue-400"></i>
                                </div>
                                <h2 class="text-2xl font-semibold text-gray-900 dark:text-white">Catálogo de Productos</h2>
                            </div>
                            
                            <div class="ml-16">
                                <p class="text-gray-700 dark:text-gray-300 mb-4">
                                    Presente sus productos y servicios de manera atractiva y organizada con nuestro sistema de catálogo digital. Ideal para tiendas de souvenirs, equipamiento para actividades al aire libre, artesanías locales y más.
                                </p>
                                
                                <h3 class="text-xl font-medium text-gray-900 dark:text-white mt-6 mb-3">Características principales:</h3>
                                <ul class="list-disc pl-6 text-gray-700 dark:text-gray-300 space-y-2 mb-6">
                                    <li>Creación de fichas detalladas para cada producto con información completa: descripción, precio, características, etc.</li>
                                    <li>Organización por categorías y marcas para facilitar la navegación.</li>
                                    <li>Gestión de imágenes de alta calidad para mostrar sus productos desde diferentes ángulos.</li>
                                    <li>Sistema de búsqueda avanzada para que sus clientes encuentren rápidamente lo que buscan.</li>
                                    <li>Integración con sistemas de inventario y punto de venta.</li>
                                    <li>Análisis de productos más populares y tendencias de compra.</li>
                                </ul>
                                
                                <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-6 mb-6">
                                    <h4 class="text-lg font-medium text-gray-900 dark:text-white mb-3">Caso de éxito:</h4>
                                    <p class="text-gray-700 dark:text-gray-300 italic">
                                        "Desde que implementamos el catálogo digital de WilAPI, nuestras ventas en línea han aumentado un 40%. La presentación profesional de nuestros productos artesanales ha mejorado significativamente la percepción de nuestra marca y ha atraído a clientes de todo el mundo." - Artesanías Costarricenses, San José
                                    </p>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Presencia Digital Integrada -->
                        <div class="mb-16">
                            <div class="flex items-center mb-4">
                                <div class="h-12 w-12 bg-blue-100 dark:bg-blue-900 rounded-full flex items-center justify-center mr-4">
                                    <i class="fas fa-globe text-xl text-blue-600 dark:text-blue-400"></i>
                                </div>
                                <h2 class="text-2xl font-semibold text-gray-900 dark:text-white">Presencia Digital Integrada</h2>
                            </div>
                            
                            <div class="ml-16">
                                <p class="text-gray-700 dark:text-gray-300 mb-4">
                                    Mejore su visibilidad en línea con nuestra solución de presencia digital integrada. Conecte todas sus plataformas y canales digitales para ofrecer una experiencia coherente a sus clientes y optimizar su estrategia de marketing.
                                </p>
                                
                                <h3 class="text-xl font-medium text-gray-900 dark:text-white mt-6 mb-3">Características principales:</h3>
                                <ul class="list-disc pl-6 text-gray-700 dark:text-gray-300 space-y-2 mb-6">
                                    <li>Gestión centralizada de información de contacto y perfiles en redes sociales.</li>
                                    <li>Integración con plataformas de reseñas como TripAdvisor.</li>
                                    <li>Herramientas de SEO para mejorar su posicionamiento en buscadores.</li>
                                    <li>Sistema de gestión de contenidos para mantener su sitio web actualizado.</li>
                                    <li>Análisis de tráfico y comportamiento de usuarios.</li>
                                    <li>Estrategias de marketing digital adaptadas al sector turístico.</li>
                                </ul>
                                
                                <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-6 mb-6">
                                    <h4 class="text-lg font-medium text-gray-900 dark:text-white mb-3">Caso de éxito:</h4>
                                    <p class="text-gray-700 dark:text-gray-300 italic">
                                        "La solución de presencia digital de WilAPI ha transformado nuestra estrategia de marketing. Hemos aumentado nuestro tráfico orgánico en un 60% y mejorado nuestra puntuación en TripAdvisor gracias a la gestión eficiente de reseñas. La coherencia en todos nuestros canales digitales ha fortalecido nuestra marca y aumentado la confianza de nuestros clientes." - Ecoaventuras, Monteverde
                                    </p>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Análisis y Reportes -->
                        <div class="mb-16">
                            <div class="flex items-center mb-4">
                                <div class="h-12 w-12 bg-blue-100 dark:bg-blue-900 rounded-full flex items-center justify-center mr-4">
                                    <i class="fas fa-chart-bar text-xl text-blue-600 dark:text-blue-400"></i>
                                </div>
                                <h2 class="text-2xl font-semibold text-gray-900 dark:text-white">Análisis y Reportes</h2>
                            </div>
                            
                            <div class="ml-16">
                                <p class="text-gray-700 dark:text-gray-300 mb-4">
                                    Tome decisiones basadas en datos con nuestro sistema avanzado de análisis y reportes. Obtenga información valiosa sobre el rendimiento de su negocio, tendencias de mercado y comportamiento de clientes.
                                </p>
                                
                                <h3 class="text-xl font-medium text-gray-900 dark:text-white mt-6 mb-3">Características principales:</h3>
                                <ul class="list-disc pl-6 text-gray-700 dark:text-gray-300 space-y-2 mb-6">
                                    <li>Dashboards personalizables con métricas clave de su negocio.</li>
                                    <li>Reportes detallados de ventas, reservas y ocupación.</li>
                                    <li>Análisis de tendencias estacionales y patrones de demanda.</li>
                                    <li>Segmentación de clientes y análisis de comportamiento.</li>
                                    <li>Comparativas de rendimiento con períodos anteriores.</li>
                                    <li>Alertas y notificaciones para métricas importantes.</li>
                                </ul>
                                
                                <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-6 mb-6">
                                    <h4 class="text-lg font-medium text-gray-900 dark:text-white mb-3">Caso de éxito:</h4>
                                    <p class="text-gray-700 dark:text-gray-300 italic">
                                        "Los reportes y análisis de WilAPI nos han permitido identificar oportunidades de negocio que antes pasábamos por alto. Hemos optimizado nuestras tarifas según la demanda estacional, lo que ha aumentado nuestros ingresos en un 30%. La capacidad de tomar decisiones basadas en datos ha transformado completamente nuestra estrategia de negocio." - Cabinas El Mirador, Puerto Viejo
                                    </p>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Planes y Precios -->
                        <div class="mt-12">
                            <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-8 text-center">Planes y Precios</h2>
                            
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                                <!-- Plan Básico -->
                                <div class="bg-white dark:bg-gray-700 rounded-lg shadow-lg overflow-hidden border border-gray-200 dark:border-gray-600 flex flex-col">
                                    <div class="p-6 bg-gray-50 dark:bg-gray-800 border-b border-gray-200 dark:border-gray-600">
                                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white text-center">Plan Básico</h3>
                                        <div class="mt-4 text-center">
                                            <span class="text-3xl font-bold text-gray-900 dark:text-white">$49</span>
                                            <span class="text-gray-600 dark:text-gray-400">/mes</span>
                                        </div>
                                    </div>
                                    <div class="p-6 flex-grow">
                                        <ul class="space-y-3">
                                            <li class="flex items-start">
                                                <svg class="h-5 w-5 text-green-500 mr-2 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                                </svg>
                                                <span class="text-gray-700 dark:text-gray-300">Gestión de 1 empresa</span>
                                            </li>
                                            <li class="flex items-start">
                                                <svg class="h-5 w-5 text-green-500 mr-2 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                                </svg>
                                                <span class="text-gray-700 dark:text-gray-300">Hasta 10 tours o habitaciones</span>
                                            </li>
                                            <li class="flex items-start">
                                                <svg class="h-5 w-5 text-green-500 mr-2 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                                </svg>
                                                <span class="text-gray-700 dark:text-gray-300">Hasta 50 productos</span>
                                            </li>
                                            <li class="flex items-start">
                                                <svg class="h-5 w-5 text-green-500 mr-2 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                                </svg>
                                                <span class="text-gray-700 dark:text-gray-300">Reportes básicos</span>
                                            </li>
                                            <li class="flex items-start">
                                                <svg class="h-5 w-5 text-green-500 mr-2 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                                </svg>
                                                <span class="text-gray-700 dark:text-gray-300">Soporte por email</span>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="p-6 border-t border-gray-200 dark:border-gray-600">
                                        <a href="/contact" class="w-full block text-center px-4 py-2 bg-blue-600 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 transition duration-300 ease-in-out">
                                            Comenzar
                                        </a>
                                    </div>
                                </div>
                                
                                <!-- Plan Profesional -->
                                <div class="bg-white dark:bg-gray-700 rounded-lg shadow-lg overflow-hidden border border-blue-500 flex flex-col transform scale-105">
                                    <div class="p-6 bg-blue-600 border-b border-blue-700">
                                        <h3 class="text-xl font-semibold text-white text-center">Plan Profesional</h3>
                                        <div class="mt-4 text-center">
                                            <span class="text-3xl font-bold text-white">$99</span>
                                            <span class="text-blue-200">/mes</span>
                                        </div>
                                        <div class="mt-2 text-center">
                                            <span class="inline-block bg-blue-700 text-blue-100 text-xs font-semibold px-3 py-1 rounded-full">Más popular</span>
                                        </div>
                                    </div>
                                    <div class="p-6 flex-grow">
                                        <ul class="space-y-3">
                                            <li class="flex items-start">
                                                <svg class="h-5 w-5 text-green-500 mr-2 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                                </svg>
                                                <span class="text-gray-700 dark:text-gray-300">Gestión de 1 empresa</span>
                                            </li>
                                            <li class="flex items-start">
                                                <svg class="h-5 w-5 text-green-500 mr-2 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                                </svg>
                                                <span class="text-gray-700 dark:text-gray-300">Tours y habitaciones ilimitados</span>
                                            </li>
                                            <li class="flex items-start">
                                                <svg class="h-5 w-5 text-green-500 mr-2 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                                </svg>
                                                <span class="text-gray-700 dark:text-gray-300">Productos ilimitados</span>
                                            </li>
                                            <li class="flex items-start">
                                                <svg class="h-5 w-5 text-green-500 mr-2 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                                </svg>
                                                <span class="text-gray-700 dark:text-gray-300">Reportes avanzados</span>
                                            </li>
                                            <li class="flex items-start">
                                                <svg class="h-5 w-5 text-green-500 mr-2 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                                </svg>
                                                <span class="text-gray-700 dark:text-gray-300">Integración con plataformas externas</span>
                                            </li>
                                            <li class="flex items-start">
                                                <svg class="h-5 w-5 text-green-500 mr-2 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                                </svg>
                                                <span class="text-gray-700 dark:text-gray-300">Soporte prioritario</span>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="p-6 border-t border-gray-200 dark:border-gray-600">
                                        <a href="/contact" class="w-full block text-center px-4 py-2 bg-blue-600 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 transition duration-300 ease-in-out"