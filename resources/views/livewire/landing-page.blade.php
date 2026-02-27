<div class="space-y-0">
    <!-- Hero Section with Company Name -->
    <section class="pt-40 pb-20 px-4 sm:px-6 lg:px-8 bg-gradient-to-br from-amber-50 via-orange-50 to-yellow-50 dark:from-neutral-900 dark:via-neutral-900 dark:to-yellow-950/30 relative overflow-hidden">
        <!-- Decorative elements -->
        <div class="absolute top-20 right-10 w-72 h-72 bg-amber-300 dark:bg-amber-900/20 rounded-full mix-blend-multiply filter blur-3xl opacity-20 floating-animation"></div>
        <div class="absolute bottom-0 left-10 w-72 h-72 bg-orange-300 dark:bg-orange-900/20 rounded-full mix-blend-multiply filter blur-3xl opacity-20 floating-animation" style="animation-delay: 1s;"></div>
        
        <div class="max-w-7xl mx-auto relative z-10">
            <!-- Company Name -->
            <div class="text-center mb-16">
                <h1 class="text-7xl sm:text-8xl font-bold gradient-text mb-6 leading-tight">
                    Precimak Industries
                </h1>
                <p class="text-xl sm:text-2xl text-gray-600 dark:text-gray-400 font-medium">
                    Precisión que impulsa la innovación.
                </p>
            </div>

            <!-- Introduction Box -->
            @if($presentation)
                <div class="max-w-3xl mx-auto mb-16">
                    <div class="bg-white dark:bg-neutral-900 rounded-3xl p-8 sm:p-12 shadow-xl border border-gray-100 dark:border-neutral-800 backdrop-blur-sm bg-opacity-80 dark:bg-opacity/80 hover:shadow-2xl transition-shadow duration-300">
                        <div class="prose prose-lg dark:prose-invert max-w-none">
                            <div class="text-lg sm:text-xl text-gray-700 dark:text-gray-300 leading-relaxed text-justify">
                                {!! $presentation->contenido !!}
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </section>

    <!-- Services Section -->
    <section class="py-24 px-4 sm:px-6 lg:px-8 bg-white dark:bg-neutral-950">
        <div class="max-w-7xl mx-auto">
            <!-- Section Title -->
            <div class="text-center mb-20">
                <h2 class="text-5xl sm:text-6xl font-bold text-gray-900 dark:text-white mb-6">
                    Nuestros Servicios
                </h2>
                <div class="w-20 h-1 bg-gradient-to-r from-amber-700 to-orange-600 mx-auto rounded-full mb-6"></div>
                <p class="text-xl text-gray-600 dark:text-gray-400 max-w-2xl mx-auto">
                    Descubre las soluciones que ofrecemos para llevar tu negocio al siguiente nivel
                </p>
            </div>

            <!-- Services Grid -->
            @if($servicios->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 xl:gap-10">
                    @foreach($servicios as $servicio)
                        <div wire:key="servicio-{{ $servicio->id }}" class="group relative">
                            <!-- Glow effect background -->
                            <div class="absolute -inset-0.5 bg-gradient-to-r from-amber-700 to-orange-600 rounded-3xl blur-xl opacity-0 group-hover:opacity-75 transition duration-500"></div>
                            
                            <!-- Service Card -->
                            <a href="{{ route('servicio.show', $servicio) }}" class="relative bg-gradient-to-br from-white to-gray-50 dark:from-neutral-900 dark:to-neutral-800 rounded-3xl p-8 sm:p-10 transition duration-500 hover:scale-105 h-full flex flex-col overflow-hidden block">
                                <!-- Animated top border -->
                                <div class="absolute top-0 left-0 right-0 h-1 bg-gradient-to-r from-amber-700 via-orange-600 to-yellow-600 transform scale-x-0 group-hover:scale-x-100 transition duration-500 origin-left"></div>

                                <!-- Icon/Image Container -->
                                @if($servicio->imagen)
                                    <div class="relative h-12 sm:h-14 overflow-hidden bg-gradient-to-br from-amber-400 to-orange-500 rounded-2xl mb-8 shadow-lg">
                                        <img 
                                            src="{{ asset('storage/' . $servicio->imagen) }}" 
                                            alt="{{ $servicio->titulo }}"
                                            class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                                        >
                                        <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent"></div>
                                    </div>
                                @else
                                    <div class="relative h-12 sm:h-14 overflow-hidden bg-gradient-to-br from-amber-400 to-orange-500 rounded-2xl mb-8 flex items-center justify-center shadow-lg group-hover:shadow-xl transition-shadow">
                                        <svg class="w-20 h-20 text-white opacity-60 group-hover:opacity-80 transition-opacity" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                    </div>
                                @endif

                                <!-- Content -->
                                <div class="flex-1 flex flex-col">
                                    <!-- Title -->
                                    <h3 class="text-2xl sm:text-3xl font-bold text-gray-900 dark:text-white mb-4 group-hover:text-transparent group-hover:bg-gradient-to-r group-hover:from-amber-700 group-hover:to-orange-600 group-hover:bg-clip-text transition-all duration-300">
                                        {{ $servicio->titulo }}
                                    </h3>

                                    <!-- Description -->
                                    @if($servicio->descripcion)
                                        <p class="text-gray-600 dark:text-gray-400 leading-relaxed line-clamp-3 mb-6 flex-1">
                                            {{ strip_tags($servicio->descripcion) }}
                                        </p>
                                    @endif
                                </div>

                                <!-- Action Button -->
                                <div class="mt-8 pt-8 border-t border-gray-200 dark:border-neutral-700">
                                    <div class="flex items-center justify-between group/btn">
                                        <span class="text-sm font-semibold text-amber-700 dark:text-amber-400 uppercase tracking-wider">Ver Detalles</span>
                                        <svg class="w-5 h-5 text-amber-700 dark:text-amber-400 transform group-hover/btn:translate-x-2 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6" />
                                        </svg>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-20">
                    <div class="inline-block">
                        <svg class="w-16 h-16 text-gray-400 dark:text-gray-600 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01" />
                        </svg>
                        <p class="text-xl text-gray-600 dark:text-gray-400 font-medium">
                            No hay servicios disponibles en este momento.
                        </p>
                    </div>
                </div>
            @endif
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-20 px-4 sm:px-6 lg:px-8 bg-gradient-to-r from-amber-700 to-orange-600 relative overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-0 left-0 w-96 h-96 bg-white rounded-full mix-blend-multiply filter blur-3xl"></div>
            <div class="absolute bottom-0 right-0 w-96 h-96 bg-white rounded-full mix-blend-multiply filter blur-3xl"></div>
        </div>
        
        <div class="max-w-4xl mx-auto text-center relative z-10">
            <h2 class="text-4xl sm:text-5xl font-bold text-white mb-6">
                ¿Listo para comenzar?
            </h2>
            <p class="text-xl text-amber-100 mb-10 max-w-2xl mx-auto">
                Contáctanos hoy y descubre cómo podemos ayudarte a llevar tu negocio al siguiente nivel
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="mailto:contacto@ejemplo.com" class="px-8 py-4 bg-white text-amber-700 font-bold rounded-lg hover:bg-amber-50 transition-colors shadow-lg hover:shadow-xl">
                    Contáctanos
                </a>
                <a href="{{ route('home') }}" class="px-8 py-4 border-2 border-white text-white font-bold rounded-lg hover:bg-white/10 transition-colors">
                    Más Información
                </a>
            </div>
        </div>
    </section>

    <!-- Floating WhatsApp Widget -->
    <div class="fixed bottom-8 right-8 z-40" id="whatsappWidget">
        <!-- Muñequito Saludando -->
        <div class="animate-bounce-custom w-16 h-16 bg-gradient-to-br from-amber-100 to-orange-100 rounded-full flex items-center justify-center shadow-lg cursor-pointer hover:scale-110 transition-transform" id="waveCharacter" style="display: none;">
            <div class="text-2xl animate-wave">👋</div>
        </div>

        <!-- Cartel de Contacto -->
        <div class="mt-4 bg-white dark:bg-neutral-800 rounded-3xl p-4 shadow-xl text-center max-w-xs" id="contactCard" style="display: none;">
            <p class="text-sm font-bold text-gray-800 dark:text-white mb-3">¡Hola! ¿Necesitas ayuda?</p>
            <a href="https://wa.me/+5353238262?text=Hola%20ExampleEnterprize" target="_blank" class="inline-flex items-center gap-2 px-6 py-3 bg-gradient-to-r from-amber-700 to-orange-600 text-white font-bold rounded-full hover:shadow-lg transition-shadow">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.67-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.076 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421-7.403h-.004c-3.582 0-6.917-2.526-6.917-5.625 0-3.1 3.335-5.625 6.917-5.625 3.582 0 6.924 2.526 6.924 5.625 0 3.1-3.342 5.625-6.924 5.625zm12.21-13.8h-.003c-5.109 0-9.268 3.887-9.268 8.67 0 1.52.37 2.97 1.077 4.278L.016 24l4.609-1.42A8.62 8.62 0 0112.007 23.64c5.109 0 9.268-3.887 9.268-8.67 0-4.783-4.159-8.67-9.268-8.67"/>
                </svg>
                WhatsApp
            </a>
        </div>
    </div>

    <script>
        // Mostrar widget flotante cada 5 segundos
        let widgetVisibility = 0;
        const waveCharacter = document.getElementById('waveCharacter');
        const contactCard = document.getElementById('contactCard');

        function showWidget() {
            if (widgetVisibility === 0) {
                // Mostrar muñequito
                waveCharacter.style.display = 'flex';
                widgetVisibility = 1;
            } else if (widgetVisibility === 1) {
                // Mostrar cartel después de 2 segundos
                setTimeout(() => {
                    contactCard.style.display = 'block';
                    contactCard.classList.add('animate-bounce-custom');
                    widgetVisibility = 2;
                }, 2000);
            } else {
                // Ocultar y reiniciar
                waveCharacter.style.display = 'none';
                contactCard.style.display = 'none';
                contactCard.classList.remove('animate-bounce-custom');
                widgetVisibility = 0;
            }
        }

        // Iniciar ciclo cada 5 segundos
        setInterval(showWidget, 5000);

        // Mostrar inmediatamente la primera vez
        showWidget();
    </script>
</div>
