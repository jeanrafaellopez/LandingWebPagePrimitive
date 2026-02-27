<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Nuestros Servicios</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>
<body class="bg-white dark:bg-neutral-950">
    <!-- Navbar -->
    <nav class="fixed w-full bg-white/95 dark:bg-neutral-950/95 backdrop-blur-md z-50 border-b border-neutral-200 dark:border-neutral-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
            <div class="flex items-center justify-between">
                <div class="text-2xl font-bold bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">
                    Tu Empresa
                </div>
                <div class="flex gap-4">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
                            Admin
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="px-6 py-2 text-gray-700 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white transition-colors">
                            Ingresar
                        </a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="pt-32 pb-20 px-4 sm:px-6 lg:px-8 bg-gradient-to-br from-slate-50 to-slate-100 dark:from-neutral-900 dark:to-neutral-800">
        <div class="max-w-4xl mx-auto">
            <div class="text-center">
                <h1 class="text-5xl sm:text-6xl font-bold text-gray-900 dark:text-white mb-6">
                    Bienvenido
                </h1>
                <div class="prose prose-lg dark:prose-invert max-w-3xl mx-auto">
                    <div class="text-xl text-gray-700 dark:text-gray-300 leading-relaxed">
                        @if($presentation)
                            {!! $presentation->contenido !!}
                        @else
                            <p>Descubre nuestros servicios y soluciones profesionales.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Servicios Section -->
    <section class="py-20 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-16">
                <h2 class="text-4xl sm:text-5xl font-bold text-gray-900 dark:text-white mb-4">
                    Nuestros Servicios
                </h2>
                <p class="text-xl text-gray-600 dark:text-gray-400">
                    Soluciones profesionales adaptadas a tus necesidades
                </p>
            </div>

            @if($servicios->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($servicios as $servicio)
                        <a href="{{ route('servicio.show', $servicio) }}" class="group bg-white dark:bg-neutral-900 rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 hover:scale-105 flex flex-col h-full">
                            <!-- Contenedor de contenido y imagen -->
                            <div class="p-6 flex flex-col flex-1">
                                <!-- Título -->
                                <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-4 group-hover:text-blue-600 dark:group-hover:text-blue-400 transition-colors">
                                    {{ $servicio->titulo }}
                                </h3>

                                <!-- Imagen (50% más pequeña) -->
                                @if($servicio->imagen)
                                    <div class="relative h-24 overflow-hidden bg-gradient-to-br from-blue-400 to-purple-600 rounded-xl mb-4">
                                        <img 
                                            src="{{ asset('storage/' . $servicio->imagen) }}" 
                                            alt="{{ $servicio->titulo }}"
                                            class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300"
                                        >
                                    </div>
                                @else
                                    <div class="relative h-24 overflow-hidden bg-gradient-to-br from-blue-400 to-purple-600 rounded-xl mb-4 flex items-center justify-center">
                                        <svg class="w-12 h-12 text-white opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                    </div>
                                @endif

                                <!-- Descripción -->
                                @if($servicio->descripcion)
                                    <p class="text-gray-600 dark:text-gray-400 line-clamp-2 mb-4 flex-1">
                                        {{ strip_tags($servicio->descripcion) }}
                                    </p>
                                @endif
                                
                                <!-- Botón -->
                                <div class="mt-auto pt-4 border-t border-gray-200 dark:border-neutral-800">
                                    <div class="w-full bg-gradient-to-r from-blue-600 to-purple-600 text-white font-semibold py-3 rounded-lg text-center group-hover:opacity-90 transition-opacity">
                                        Ver Detalles →
                                    </div>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            @else
                <div class="text-center py-12">
                    <p class="text-xl text-gray-600 dark:text-gray-400">
                        No hay servicios disponibles en este momento.
                    </p>
                </div>
            @endif
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 dark:bg-black text-white py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto text-center">
            <p class="text-gray-400 mb-2">© 2026 Tu Empresa. Todos los derechos reservados.</p>
            <p class="text-sm text-gray-500">Diseñado con ❤️ para tu negocio</p>
        </div>
    </footer>
</body>
</html>
