<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $servicio->titulo }} | Precimak Industries</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700,800" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
        .gradient-text {
            background: linear-gradient(135deg, #b45309 0%, #d97706 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        .animate-fade-up {
            animation: fadeInUp 0.6s ease-out;
        }
    </style>
</head>
<body class="bg-white dark:bg-neutral-950">
    <!-- Navbar -->
    <nav class="fixed w-full bg-white/95 dark:bg-neutral-950/95 backdrop-blur-md z-50 border-b border-neutral-200 dark:border-neutral-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
            <div class="flex items-center justify-between">
                <a href="{{ route('home') }}" class="text-2xl font-bold gradient-text hover:opacity-80 transition-opacity">
                    Precimak Industries
                </a>
                <div class="flex gap-4">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="px-6 py-2 bg-amber-600 text-white rounded-lg hover:bg-amber-700 transition-colors font-medium">
                            Admin
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="px-6 py-2 text-gray-700 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white transition-colors font-medium">
                            Ingresar
                        </a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <!-- Breadcrumb -->
    <div class="pt-24 pb-6 px-4 sm:px-6 lg:px-8 bg-gradient-to-r from-amber-50 to-orange-50 dark:from-neutral-900 dark:to-neutral-900 border-b border-amber-100 dark:border-neutral-800">
        <div class="max-w-7xl mx-auto">
            <div class="flex items-center gap-2 text-sm">
                <a href="{{ route('home') }}" class="text-amber-700 hover:text-amber-800 dark:text-amber-400 dark:hover:text-amber-300 font-medium transition-colors flex items-center gap-1">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                    Servicios
                </a>
                <span class="text-gray-400 dark:text-gray-600">/</span>
                <span class="text-gray-700 dark:text-gray-300 font-medium">{{ $servicio->titulo }}</span>
            </div>
        </div>
    </div>

    <!-- Hero Section with Image -->
    <section class="relative pt-8 pb-16 px-4 sm:px-6 lg:px-8 overflow-hidden">
        <div class="absolute top-0 right-0 w-96 h-96 bg-amber-300 dark:bg-amber-900/20 rounded-full mix-blend-multiply filter blur-3xl opacity-20"></div>
        <div class="absolute bottom-0 left-0 w-96 h-96 bg-orange-300 dark:bg-orange-900/20 rounded-full mix-blend-multiply filter blur-3xl opacity-20"></div>
        
        <div class="max-w-7xl mx-auto relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <!-- Content -->
                <div class="animate-fade-up">
                    <!-- Título -->
                    <h1 class="text-5xl sm:text-6xl lg:text-7xl font-bold text-gray-900 dark:text-white mb-6 leading-tight">
                        {{ $servicio->titulo }}
                    </h1>
                    
                    <!-- Descripción -->
                    <div class="prose prose-lg dark:prose-invert max-w-none">
                        <div class="text-lg text-gray-700 dark:text-gray-300 leading-relaxed mb-8 text-justify">
                            @if($servicio->descripcion)
                                {!! $servicio->descripcion !!}
                            @else
                                <p class="text-gray-500 dark:text-gray-400">No hay descripción disponible para este servicio.</p>
                            @endif
                        </div>
                    </div>

                    <!-- CTAs -->
                    <div class="flex flex-col sm:flex-row gap-4">
                        <a href="mailto:contacto@ejemplo.com" class="group relative px-8 py-4 bg-gradient-to-r from-amber-600 to-orange-600 text-white font-semibold rounded-xl hover:shadow-2xl transition-all duration-300 hover:scale-105">
                            <span class="relative z-10 flex items-center justify-center gap-2">
                                Solicitar Información
                                <svg class="w-5 h-5 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                                </svg>
                            </span>
                        </a>
                        <a href="{{ route('home') }}" class="px-8 py-4 border-2 border-amber-600 dark:border-amber-400 text-amber-700 dark:text-amber-400 font-semibold rounded-xl hover:bg-amber-50 dark:hover:bg-amber-950/20 transition-colors duration-300 flex items-center justify-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 15l6-6m0 0l-6-6m6 6h-12" />
                            </svg>
                            Ver Más Servicios
                        </a>
                    </div>
                </div>

                <!-- Image -->
                <div class="animate-fade-up" style="animation-delay: 0.1s;">
                    @if($servicio->imagen)
                        <div class="relative group">
                            <div class="absolute -inset-1 bg-gradient-to-r from-amber-600 to-orange-600 rounded-3xl blur-xl opacity-75 group-hover:opacity-100 transition duration-500"></div>
                            <div class="relative h-96 md:h-full overflow-hidden rounded-3xl bg-gradient-to-br from-amber-400 to-orange-500">
                                <img 
                                    src="{{ asset('storage/' . $servicio->imagen) }}" 
                                    alt="{{ $servicio->titulo }}"
                                    class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                                >
                            </div>
                        </div>
                    @else
                        <div class="relative group">
                            <div class="absolute -inset-1 bg-gradient-to-r from-amber-600 to-orange-600 rounded-3xl blur-xl opacity-75 group-hover:opacity-100 transition duration-500"></div>
                            <div class="relative h-96 md:h-full overflow-hidden rounded-3xl bg-gradient-to-br from-amber-400 to-orange-500 flex items-center justify-center">
                                <svg class="w-40 h-40 text-white opacity-40 group-hover:opacity-60 transition-opacity" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>

    <!-- Key Features Section -->
    <section class="py-20 px-4 sm:px-6 lg:px-8 bg-gradient-to-br from-gray-50 to-gray-100 dark:from-neutral-900 dark:to-neutral-900 border-y border-gray-200 dark:border-neutral-800">
        <div class="max-w-7xl mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Feature 1 -->
                <div class="bg-white dark:bg-neutral-800 rounded-2xl p-8 shadow-lg hover:shadow-xl transition-shadow duration-300">
                    <div class="w-14 h-14 bg-gradient-to-br from-amber-400 to-orange-500 rounded-xl flex items-center justify-center mb-4">
                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2">Eficiencia</h3>
                    <p class="text-gray-600 dark:text-gray-400">Optimización de procesos para máximo rendimiento.</p>
                </div>

                <!-- Feature 2 -->
                <div class="bg-white dark:bg-neutral-800 rounded-2xl p-8 shadow-lg hover:shadow-xl transition-shadow duration-300">
                    <div class="w-14 h-14 bg-gradient-to-br from-amber-400 to-orange-500 rounded-xl flex items-center justify-center mb-4">
                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2">Calidad</h3>
                    <p class="text-gray-600 dark:text-gray-400">Estándares superiores en cada aspecto del servicio.</p>
                </div>

                <!-- Feature 3 -->
                <div class="bg-white dark:bg-neutral-800 rounded-2xl p-8 shadow-lg hover:shadow-xl transition-shadow duration-300">
                    <div class="w-14 h-14 bg-gradient-to-br from-amber-400 to-orange-500 rounded-xl flex items-center justify-center mb-4">
                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10l-2 1m0 0l-2-1m2 1v2.5M20 7l-2 1m2-1l-2-1m2 1v2.5M14 4l-2-1-2 1m2-1v2.5M2 7l2-1m-2 1l2 1m-2-1v2.5" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2">Innovación</h3>
                    <p class="text-gray-600 dark:text-gray-400">Tecnología de punta aplicada constantemente.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-20 px-4 sm:px-6 lg:px-8">
        <div class="max-w-4xl mx-auto text-center">
            <h2 class="text-4xl sm:text-5xl font-bold text-gray-900 dark:text-white mb-6">
                ¿Listo para transformar tu negocio?
            </h2>
            <p class="text-xl text-gray-600 dark:text-gray-400 mb-10">
                Ponte en contacto con nosotros hoy y descubre cómo {{ strtolower($servicio->titulo) }} puede hacer la diferencia.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="mailto:contacto@ejemplo.com" class="group relative px-10 py-4 bg-gradient-to-r from-amber-600 to-orange-600 text-white font-bold rounded-xl hover:shadow-2xl transition-all duration-300 hover:scale-105">
                    <span class="relative z-10">Contáctanos Ahora</span>
                </a>
                <a href="{{ route('home') }}" class="px-10 py-4 border-2 border-amber-600 dark:border-amber-400 text-amber-700 dark:text-amber-400 font-bold rounded-xl hover:bg-amber-50 dark:hover:bg-amber-950/20 transition-colors duration-300">
                    Explorar Otros Servicios
                </a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 dark:bg-black text-white py-16 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-12 mb-12">
                <!-- Brand -->
                <div>
                    <h3 class="text-2xl font-bold gradient-text mb-2">Precimak Industries</h3>
                    <p class="text-gray-400">Precisión que impulsa la innovación.</p>
                </div>

                <!-- Links -->
                <div>
                    <h4 class="text-white font-bold mb-4">Enlaces Rápidos</h4>
                    <ul class="space-y-2 text-gray-400">
                        <li><a href="{{ route('home') }}" class="hover:text-white transition-colors">Inicio</a></li>
                        <li><a href="{{ route('home') }}" class="hover:text-white transition-colors">Servicios</a></li>
                        <li><a href="mailto:contacto@ejemplo.com" class="hover:text-white transition-colors">Contacto</a></li>
                    </ul>
                </div>

                <!-- Contact -->
                <div>
                    <h4 class="text-white font-bold mb-4">Contacto</h4>
                    <ul class="space-y-2 text-gray-400">
                        <li>Email: <a href="mailto:contacto@ejemplo.com" class="hover:text-white transition-colors">contacto@ejemplo.com</a></li>
                        <li>Teléfono: <a href="tel:+34000000000" class="hover:text-white transition-colors">+34 (000) 000-000</a></li>
                    </ul>
                </div>
            </div>

            <!-- Divider -->
            <div class="border-t border-gray-800 pt-8">
                <div class="flex flex-col sm:flex-row justify-between items-center">
                    <p class="text-gray-400 mb-4 sm:mb-0">© 2026 Precimak Industries. Todos los derechos reservados.</p>
                    <p class="text-sm text-gray-500">Diseñado con ❤️ para tu éxito</p>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>
