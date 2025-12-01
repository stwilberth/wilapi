<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Servicios informáticos y de publicidad para empresas de todos los sectores: desarrollo web, hosting, correo corporativo, diseño gráfico y soluciones digitales">

        <title>anuncielo.com - Nuestros Servicios</title>

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
                            En anuncielo.com ofrecemos servicios informáticos y de publicidad para empresas de todos los sectores. Desde desarrollo web hasta diseño gráfico, pasando por hospedaje, correo corporativo y soluciones digitales personalizadas, tenemos todo lo que su negocio necesita para tener presencia digital profesional.
                        </p>
                        
                        <!-- Desarrollo Web y Diseño -->
                        <div class="mb-16">
                            <div class="flex items-center mb-4">
                                <div class="h-12 w-12 bg-blue-100 dark:bg-blue-900 rounded-full flex items-center justify-center mr-4">
                                    <i class="fas fa-laptop-code text-xl text-blue-600 dark:text-blue-400"></i>
                                </div>
                                <h2 class="text-2xl font-semibold text-gray-900 dark:text-white">Desarrollo Web y Diseño</h2>
                            </div>
                            
                            <div class="ml-16">
                                <p class="text-gray-700 dark:text-gray-300 mb-4">
                                    Creamos páginas web profesionales y atractivas que representan perfectamente su negocio. Desde sitios corporativos hasta landing pages y portafolios, desarrollamos soluciones web modernas, responsivas y optimizadas para conversión.
                                </p>
                                
                                <h3 class="text-xl font-medium text-gray-900 dark:text-white mt-6 mb-3">Características principales:</h3>
                                <ul class="list-disc pl-6 text-gray-700 dark:text-gray-300 space-y-2 mb-6">
                                    <li>Diseño web personalizado y responsive, adaptado a todos los dispositivos.</li>
                                    <li>Desarrollo con tecnologías modernas (HTML5, CSS3, JavaScript, PHP, Laravel).</li>
                                    <li>Optimización SEO para mejorar su posicionamiento en buscadores.</li>
                                    <li>Integración con redes sociales y herramientas de marketing.</li>
                                    <li>Panel de administración fácil de usar para gestionar contenido.</li>
                                    <li>Certificados SSL para seguridad y confianza.</li>
                                </ul>
                                
                                <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-6 mb-6">
                                    <h4 class="text-lg font-medium text-gray-900 dark:text-white mb-3">Caso de éxito:</h4>
                                    <p class="text-gray-700 dark:text-gray-300 italic">
                                        "Nuestra nueva página web desarrollada por anuncielo.com ha transformado completamente nuestra presencia digital. El diseño profesional y la facilidad de navegación han aumentado las consultas de clientes en un 60%. Además, el panel de administración nos permite actualizar contenido sin necesidad de conocimientos técnicos." - Constructora Soluciones CR
                                    </p>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Hospedaje Web y Correo Corporativo -->
                        <div class="mb-16">
                            <div class="flex items-center mb-4">
                                <div class="h-12 w-12 bg-blue-100 dark:bg-blue-900 rounded-full flex items-center justify-center mr-4">
                                    <i class="fas fa-server text-xl text-blue-600 dark:text-blue-400"></i>
                                </div>
                                <h2 class="text-2xl font-semibold text-gray-900 dark:text-white">Hospedaje Web y Correo Corporativo</h2>
                            </div>
                            
                            <div class="ml-16">
                                <p class="text-gray-700 dark:text-gray-300 mb-4">
                                    Ofrecemos servicios de hospedaje web confiables y seguros, con servidores de alta disponibilidad. Además, proporcionamos cuentas de correo corporativo profesionales con su propio dominio para proyectar una imagen empresarial sólida.
                                </p>
                                
                                <h3 class="text-xl font-medium text-gray-900 dark:text-white mt-6 mb-3">Características principales:</h3>
                                <ul class="list-disc pl-6 text-gray-700 dark:text-gray-300 space-y-2 mb-6">
                                    <li>Hosting web con alta disponibilidad (99.9% uptime garantizado).</li>
                                    <li>Servidores rápidos con tecnología SSD para mejor rendimiento.</li>
                                    <li>Copias de seguridad automáticas diarias.</li>
                                    <li>Certificados SSL incluidos para seguridad.</li>
                                    <li>Cuentas de correo corporativo ilimitadas con su dominio (@suempresa.com).</li>
                                    <li>Panel de control cPanel/DirectAdmin para gestión fácil.</li>
                                    <li>Soporte técnico 24/7 en español.</li>
                                </ul>
                                
                                <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-6 mb-6">
                                    <h4 class="text-lg font-medium text-gray-900 dark:text-white mb-3">Caso de éxito:</h4>
                                    <p class="text-gray-700 dark:text-gray-300 italic">
                                        "Desde que migramos nuestro sitio web al hospedaje de anuncielo.com, no hemos tenido ni un solo problema. La velocidad de carga mejoró notablemente y el correo corporativo funciona perfecto. El soporte técnico siempre responde rápido cuando lo necesitamos." - Bufete Jurídico Asociados
                                    </p>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Aplicaciones Web Personalizadas -->
                        <div class="mb-16">
                            <div class="flex items-center mb-4">
                                <div class="h-12 w-12 bg-blue-100 dark:bg-blue-900 rounded-full flex items-center justify-center mr-4">
                                    <i class="fas fa-cogs text-xl text-blue-600 dark:text-blue-400"></i>
                                </div>
                                <h2 class="text-2xl font-semibold text-gray-900 dark:text-white">Aplicaciones Web Personalizadas</h2>
                            </div>
                            
                            <div class="ml-16">
                                <p class="text-gray-700 dark:text-gray-300 mb-4">
                                    Desarrollamos soluciones web adaptadas a las necesidades específicas de su negocio. Sistemas de gestión, catálogos de productos, plataformas de reservas, CRMs personalizados y cualquier herramienta digital que su empresa necesite para optimizar procesos.
                                </p>
                                
                                <h3 class="text-xl font-medium text-gray-900 dark:text-white mt-6 mb-3">Características principales:</h3>
                                <ul class="list-disc pl-6 text-gray-700 dark:text-gray-300 space-y-2 mb-6">
                                    <li>Desarrollo a medida según los requerimientos de su negocio.</li>
                                    <li>Sistemas de gestión de inventarios, clientes, ventas y más.</li>
                                    <li>Integración con sistemas existentes y APIs de terceros.</li>
                                    <li>Bases de datos optimizadas y seguras.</li>
                                    <li>Interfaz intuitiva y fácil de usar para sus empleados.</li>
                                    <li>Reportes y dashboards personalizados con métricas relevantes.</li>
                                    <li>Capacitación y soporte continuo.</li>
                                </ul>
                                
                                <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-6 mb-6">
                                    <h4 class="text-lg font-medium text-gray-900 dark:text-white mb-3">Caso de éxito:</h4>
                                    <p class="text-gray-700 dark:text-gray-300 italic">
                                        "El sistema de gestión de inventarios desarrollado por anuncielo.com ha optimizado completamente nuestro control de stock. Ahora podemos rastrear productos en tiempo real, generar reportes automáticos y reducir pérdidas. La inversión se pagó sola en menos de 6 meses." - Ferretería El Martillo
                                    </p>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Diseño Gráfico y Branding -->
                        <div class="mb-16">
                            <div class="flex items-center mb-4">
                                <div class="h-12 w-12 bg-blue-100 dark:bg-blue-900 rounded-full flex items-center justify-center mr-4">
                                    <i class="fas fa-palette text-xl text-blue-600 dark:text-blue-400"></i>
                                </div>
                                <h2 class="text-2xl font-semibold text-gray-900 dark:text-white">Diseño Gráfico y Branding</h2>
                            </div>
                            
                            <div class="ml-16">
                                <p class="text-gray-700 dark:text-gray-300 mb-4">
                                    Creamos diseños gráficos profesionales que comunican efectivamente su mensaje de marca. Desde logotipos y tarjetas de presentación hasta material publicitario y branding completo, desarrollamos identidades visuales memorables.
                                </p>
                                
                                <h3 class="text-xl font-medium text-gray-900 dark:text-white mt-6 mb-3">Características principales:</h3>
                                <ul class="list-disc pl-6 text-gray-700 dark:text-gray-300 space-y-2 mb-6">
                                    <li>Diseño de logotipos e identidad corporativa completa.</li>
                                    <li>Tarjetas de presentación profesionales con diseño moderno.</li>
                                    <li>Material publicitario: flyers, brochures, banners digitales.</li>
                                    <li>Imágenes para redes sociales optimizadas por plataforma.</li>
                                    <li>Manual de marca con lineamientos de uso.</li>
                                    <li>Diseño de packaging y etiquetas para productos.</li>
                                    <li>Archivos en formatos profesionales (AI, PSD, PDF, PNG, JPG).</li>
                                </ul>
                                
                                <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-6 mb-6">
                                    <h4 class="text-lg font-medium text-gray-900 dark:text-white mb-3">Caso de éxito:</h4>
                                    <p class="text-gray-700 dark:text-gray-300 italic">
                                        "El nuevo diseño de marca que nos creó anuncielo.com ha elevado completamente la percepción de nuestro negocio. Las tarjetas de presentación son elegantes y profesionales, y nuestro nuevo logo transmite exactamente lo que queríamos comunicar. Hemos notado un aumento en el reconocimiento de marca y confianza de clientes." - Clínica Dental Sonrisas
                                    </p>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Soluciones para Restaurantes -->
                        <div class="mb-16">
                            <div class="flex items-center mb-4">
                                <div class="h-12 w-12 bg-blue-100 dark:bg-blue-900 rounded-full flex items-center justify-center mr-4">
                                    <i class="fas fa-utensils text-xl text-blue-600 dark:text-blue-400"></i>
                                </div>
                                <h2 class="text-2xl font-semibold text-gray-900 dark:text-white">Soluciones para Restaurantes</h2>
                            </div>
                            
                            <div class="ml-16">
                                <p class="text-gray-700 dark:text-gray-300 mb-4">
                                    Ofrecemos soluciones integrales para el sector gastronómico: desde menús digitales interactivos con códigos QR hasta menús físicos impresos profesionales y sistemas de toma de pedidos que agilizan la operación de su restaurante.
                                </p>
                                
                                <h3 class="text-xl font-medium text-gray-900 dark:text-white mt-6 mb-3">Características principales:</h3>
                                <ul class="list-disc pl-6 text-gray-700 dark:text-gray-300 space-y-2 mb-6">
                                    <li>Menús digitales con códigos QR, sin contacto y fáciles de actualizar.</li>
                                    <li>Diseño e impresión de menús físicos profesionales y atractivos.</li>
                                    <li>Sistemas de toma de pedidos digitales para meseros.</li>
                                    <li>Integración con cocina para envío de pedidos en tiempo real.</li>
                                    <li>Catálogo de platos con imágenes, descripciones y precios.</li>
                                    <li>Actualización rápida de disponibilidad de platillos.</li>
                                    <li>Múltiples idiomas para clientes internacionales.</li>
                                </ul>
                                
                                <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-6 mb-6">
                                    <h4 class="text-lg font-medium text-gray-900 dark:text-white mb-3">Caso de éxito:</h4>
                                    <p class="text-gray-700 dark:text-gray-300 italic">
                                        "El sistema de menú digital con QR y toma de pedidos de anuncielo.com ha revolucionado nuestro servicio. Los meseros ahora toman pedidos más rápido, los errores han disminuido casi a cero y podemos actualizar precios y disponibilidad al instante. Nuestros clientes también aprecian la facilidad de ver el menú en sus teléfonos." - Restaurante Sabor Tico
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
                                                <span class="text-gray-700 dark:text-gray-300">1 sitio web</span>
                                            </li>
                                            <li class="flex items-start">
                                                <svg class="h-5 w-5 text-green-500 mr-2 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                                </svg>
                                                <span class="text-gray-700 dark:text-gray-300">Hasta 5 páginas</span>
                                            </li>
                                            <li class="flex items-start">
                                                <svg class="h-5 w-5 text-green-500 mr-2 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                                </svg>
                                                <span class="text-gray-700 dark:text-gray-300">5 GB hospedaje web</span>
                                            </li>
                                            <li class="flex items-start">
                                                <svg class="h-5 w-5 text-green-500 mr-2 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                                </svg>
                                                <span class="text-gray-700 dark:text-gray-300">3 cuentas de correo</span>
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
                                                <span class="text-gray-700 dark:text-gray-300">Hasta 3 sitios web</span>
                                            </li>
                                            <li class="flex items-start">
                                                <svg class="h-5 w-5 text-green-500 mr-2 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                                </svg>
                                                <span class="text-gray-700 dark:text-gray-300">Páginas ilimitadas</span>
                                            </li>
                                            <li class="flex items-start">
                                                <svg class="h-5 w-5 text-green-500 mr-2 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                                </svg>
                                                <span class="text-gray-700 dark:text-gray-300">50 GB hospedaje web</span>
                                            </li>
                                            <li class="flex items-start">
                                                <svg class="h-5 w-5 text-green-500 mr-2 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                                </svg>
                                                <span class="text-gray-700 dark:text-gray-300">Correos ilimitados</span>
                                            </li>
                                            <li class="flex items-start">
                                                <svg class="h-5 w-5 text-green-500 mr-2 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                                </svg>
                                                <span class="text-gray-700 dark:text-gray-300">Diseño gráfico incluido</span>
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