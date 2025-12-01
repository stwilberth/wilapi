<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Póngase en contacto con anuncielo.com para obtener más información sobre nuestros servicios de gestión para empresas turísticas y hoteleras en Costa Rica">

        <title>anuncielo.com - Contacto</title>

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
                                <a href="/services" class="inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300 hover:border-gray-300 dark:hover:border-gray-700 transition duration-150 ease-in-out">
                                    Servicios
                                </a>
                                <a href="/contact" class="inline-flex items-center px-1 pt-1 border-b-2 border-blue-500 text-sm font-medium leading-5 text-gray-900 dark:text-white transition duration-150 ease-in-out">
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
                        <h1 class="text-3xl font-bold text-gray-900 dark:text-white mb-6">Contacto</h1>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
                            <!-- Información de contacto -->
                            <div>
                                <p class="text-lg text-gray-700 dark:text-gray-300 mb-8">
                                    Estamos aquí para ayudarle. Si tiene alguna pregunta sobre nuestros servicios o desea solicitar una demostración personalizada, no dude en ponerse en contacto con nosotros.
                                </p>
                                
                                <div class="space-y-6">
                                    <div class="flex items-start">
                                        <div class="h-12 w-12 bg-blue-100 dark:bg-blue-900 rounded-full flex items-center justify-center mr-4">
                                            <i class="fas fa-map-marker-alt text-xl text-blue-600 dark:text-blue-400"></i>
                                        </div>
                                        <div>
                                            <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-1">Dirección</h3>
                                            <p class="text-gray-700 dark:text-gray-300">
                                                Avenida Central, Calle 5<br>
                                                San José, Costa Rica
                                            </p>
                                        </div>
                                    </div>
                                    
                                    <div class="flex items-start">
                                        <div class="h-12 w-12 bg-blue-100 dark:bg-blue-900 rounded-full flex items-center justify-center mr-4">
                                            <i class="fas fa-phone text-xl text-blue-600 dark:text-blue-400"></i>
                                        </div>
                                        <div>
                                            <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-1">Teléfono</h3>
                                            <p class="text-gray-700 dark:text-gray-300">
                                                +506 8500 8393
                                            </p>
                                        </div>
                                    </div>
                                    
                                    <div class="flex items-start">
                                        <div class="h-12 w-12 bg-blue-100 dark:bg-blue-900 rounded-full flex items-center justify-center mr-4">
                                            <i class="fas fa-envelope text-xl text-blue-600 dark:text-blue-400"></i>
                                        </div>
                                        <div>
                                            <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-1">Email</h3>
                                            <p class="text-gray-700 dark:text-gray-300">
                                                info@anuncielo.com
                                            </p>
                                        </div>
                                    </div>
                                    
                                    <div class="flex items-start">
                                        <div class="h-12 w-12 bg-blue-100 dark:bg-blue-900 rounded-full flex items-center justify-center mr-4">
                                            <i class="fas fa-clock text-xl text-blue-600 dark:text-blue-400"></i>
                                        </div>
                                        <div>
                                            <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-1">Horario de atención</h3>
                                            <p class="text-gray-700 dark:text-gray-300">
                                                Lunes a Viernes: 8:00 AM - 6:00 PM<br>
                                                Sábado: 9:00 AM - 1:00 PM
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="mt-10">
                                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">Síguenos en redes sociales</h3>
                                    <div class="flex space-x-4">
                                        <a href="#" class="h-12 w-12 bg-blue-100 dark:bg-blue-900 rounded-full flex items-center justify-center text-blue-600 dark:text-blue-400 hover:bg-blue-200 dark:hover:bg-blue-800 transition duration-300">
                                            <i class="fab fa-facebook-f text-xl"></i>
                                        </a>
                                        <a href="#" class="h-12 w-12 bg-blue-100 dark:bg-blue-900 rounded-full flex items-center justify-center text-blue-600 dark:text-blue-400 hover:bg-blue-200 dark:hover:bg-blue-800 transition duration-300">
                                            <i class="fab fa-instagram text-xl"></i>
                                        </a>
                                        <a href="#" class="h-12 w-12 bg-blue-100 dark:bg-blue-900 rounded-full flex items-center justify-center text-blue-600 dark:text-blue-400 hover:bg-blue-200 dark:hover:bg-blue-800 transition duration-300">
                                            <i class="fab fa-twitter text-xl"></i>
                                        </a>
                                        <a href="#" class="h-12 w-12 bg-blue-100 dark:bg-blue-900 rounded-full flex items-center justify-center text-blue-600 dark:text-blue-400 hover:bg-blue-200 dark:hover:bg-blue-800 transition duration-300">
                                            <i class="fab fa-linkedin-in text-xl"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Formulario de contacto -->
                            <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-8">
                                <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-6">Envíenos un mensaje</h2>
                                
                                <form class="space-y-6">
                                    <div>
                                        <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Nombre completo</label>
                                        <input type="text" id="name" name="name" class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:text-white" placeholder="Su nombre completo">
                                    </div>
                                    
                                    <div>
                                        <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Correo electrónico</label>
                                        <input type="email" id="email" name="email" class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:text-white" placeholder="Su correo electrónico">
                                    </div>
                                    
                                    <div>
                                        <label for="phone" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Teléfono</label>
                                        <input type="tel" id="phone" name="phone" class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:text-white" placeholder="Su número de teléfono">
                                    </div>
                                    
                                    <div>
                                        <label for="subject" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Asunto</label>
                                        <input type="text" id="subject" name="subject" class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:text-white" placeholder="Asunto de su mensaje">
                                    </div>
                                    
                                    <div>
                                        <label for="message" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Mensaje</label>
                                        <textarea id="message" name="message" rows="5" class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:text-white" placeholder="Escriba su mensaje aquí"></textarea>
                                    </div>
                                    
                                    <div>
                                        <button type="submit" class="w-full px-6 py-3 bg-blue-600 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 transition duration-300 ease-in-out flex items-center justify-center">
                                            <i class="fas fa-paper-plane mr-2"></i> Enviar mensaje
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        
                        <!-- Mapa -->
                        <div class="mt-12">
                            <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-6">Nuestra ubicación</h2>
                            <div class="bg-gray-200 dark:bg-gray-700 rounded-lg overflow-hidden h-96">
                                <!-- Aquí iría un mapa real, pero para este ejemplo usamos un placeholder -->
                                <div class="w-full h-full flex items-center justify-center bg-gray-300 dark:bg-gray-600">
                                    <p class="text-gray-600 dark:text-gray-300 text-center">
                                        <i class="fas fa-map-marked-alt text-4xl mb-4 block"></i>
                                        Mapa de ubicación<br>
                                        <span class="text-sm">San José, Costa Rica</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Preguntas frecuentes -->
                        <div class="mt-16">
                            <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-8">Preguntas frecuentes</h2>
                            
                            <div class="space-y-6">
                                <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-6">
                                    <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-2">¿Cómo puedo solicitar una demostración de la plataforma?</h3>
                                    <p class="text-gray-700 dark:text-gray-300">
                                        Puede solicitar una demostración personalizada completando el formulario de contacto en esta página o llamándonos directamente al +506 8500 8393. Uno de nuestros especialistas se pondrá en contacto con usted para programar una sesión según su disponibilidad.
                                    </p>
                                </div>
                                
                                <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-6">
                                    <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-2">¿Ofrecen capacitación para usar la plataforma?</h3>
                                    <p class="text-gray-700 dark:text-gray-300">
                                        Sí, todos nuestros planes incluyen capacitación inicial para que usted y su equipo puedan aprovechar al máximo todas las funcionalidades de la plataforma. Además, ofrecemos sesiones de capacitación adicionales según sea necesario.
                                    </p>
                                </div>
                                
                                <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-6">
                                    <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-2">¿Puedo migrar mis datos existentes a la plataforma anuncielo.com?</h3>
                                    <p class="text-gray-700 dark:text-gray-300">
                                        Absolutamente. Ofrecemos servicios de migración de datos para facilitar la transición desde su sistema actual a anuncielo.com. Nuestro equipo técnico trabajará con usted para asegurar que todos sus datos importantes se transfieran correctamente.
                                    </p>
                                </div>
                                
                                <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-6">
                                    <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-2">¿Qué tipo de soporte técnico ofrecen?</h3>
                                    <p class="text-gray-700 dark:text-gray-300">
                                        Ofrecemos soporte técnico por email, chat y teléfono. Los clientes con planes Profesional y Empresarial disfrutan de soporte prioritario con tiempos de respuesta garantizados. Además, contamos con una base de conocimientos completa con tutoriales y guías de uso.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>

            <!-- Footer -->
            <footer class="bg-white dark:bg-gray-900 mt-12">
                <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                        <div class="col-span-1 md:col-span-2">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">anuncielo.com</h3>
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