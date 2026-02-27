<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Precimak Industries - Servicios Profesionales' }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700,800" rel="stylesheet" />
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
                <a href="{{ route('home') }}" class="text-2xl font-bold gradient-text hover:opacity-80 transition-opacity">
                    Precimak Industries
                </a>
                <div class="flex gap-4">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors font-medium">
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

    <!-- Main Content -->
    {{ $slot }}

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
