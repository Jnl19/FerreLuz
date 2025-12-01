<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FerreLuz</title>
    <!-- Tailwind CSS para estilos -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-black text-white">
    
    <!-- Navegación parte arriba -->
    <nav class="fixed w-full top-0 z-50 bg-black/80 backdrop-blur-sm border-b border-neutral-800">
        <div class="max-w-7xl mx-auto px-6 py-4">
            <div class="flex justify-between items-center">
                <!-- Logo -->
                <div class="flex items-center gap-3">
                    <img src="images/FerreLuz.png" alt="FerreLuz" class="h-10">
                </div>
                <!-- Links autenticación -->
                <div class="flex items-center gap-4">
                    <a href="/login" class="text-gray-300 hover:text-white transition-colors">
                        Iniciar Sesión
                    </a>
                    <a href="/register" class="bg-red-600 hover:bg-red-700 px-4 py-2 rounded-lg transition-colors">
                        Registrarse
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Parte principal -->
    <section class="pt-32 pb-20 px-6">
        <div class="max-w-4xl mx-auto text-center">
            <div class="inline-block bg-red-600/20 border border-red-600 rounded-full px-4 py-2 mb-6">
                <span class="text-red-500 text-sm font-medium">Tu ferretería de confianza</span>
            </div>
            <!-- Título principal -->
            <h1 class="text-5xl lg:text-6xl font-bold mb-6 leading-tight">
                Encuentra todo lo que necesitas en
                <span class="text-red-600">FerreLuz</span>
            </h1>
            <!-- Descripción -->
            <p class="text-xl text-gray-400 mb-8">
                Amplio catálogo de productos para construcción, reparación y mejoras del hogar. Calidad garantizada y precios competitivos.
            </p>
            <!-- Botones -->
            <div class="flex gap-4 justify-center">
                <a href="/register" class="bg-red-600 hover:bg-red-700 px-8 py-4 rounded-lg font-medium transition-colors flex items-center gap-2">
                    Comenzar a Comprar
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"></path>
                    </svg>
                </a>
                <a href="#features" class="border border-neutral-700 hover:border-neutral-600 px-8 py-4 rounded-lg font-medium transition-colors">
                    Conocer Más
                </a>
            </div>
        </div>
    </section>

    <!-- Sección funcionalidades -->
    <section id="features" class="py-20 px-6">
        <div class="max-w-7xl mx-auto">
            <!-- Encabezado -->
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold mb-4">¿Por qué elegir FerreLuz?</h2>
                <p class="text-xl text-gray-400">Beneficios de comprar con nosotros</p>
            </div>
            <!-- Grid de funcionalidades -->
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                
                <!-- Card 1: Amplio catálogo -->
                <div class="bg-neutral-900 border border-neutral-800 rounded-xl p-6 hover:border-red-600 transition-colors">
                    <div class="bg-red-600/20 w-12 h-12 rounded-lg flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-2">Amplio Catálogo</h3>
                    <p class="text-gray-400">Miles de productos disponibles para todos tus proyectos de construcción y hogar.</p>
                </div>

                <!-- Card 2: Precios competitivos -->
                <div class="bg-neutral-900 border border-neutral-800 rounded-xl p-6 hover:border-red-600 transition-colors">
                    <div class="bg-red-600/20 w-12 h-12 rounded-lg flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-2">Precios Competitivos</h3>
                    <p class="text-gray-400">Los mejores precios del mercado sin comprometer la calidad de nuestros productos.</p>
                </div>

                <!-- Card 3: Compra fácil -->
                <div class="bg-neutral-900 border border-neutral-800 rounded-xl p-6 hover:border-red-600 transition-colors">
                    <div class="bg-red-600/20 w-12 h-12 rounded-lg flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-2">Compra Fácil</h3>
                    <p class="text-gray-400">Sistema sencillo e intuitivo para realizar tus compras en pocos clics.</p>
                </div>

                <!-- Card 4: Productos de calidad -->
                <div class="bg-neutral-900 border border-neutral-800 rounded-xl p-6 hover:border-red-600 transition-colors">
                    <div class="bg-red-600/20 w-12 h-12 rounded-lg flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-2">Productos de Calidad</h3>
                    <p class="text-gray-400">Solo trabajamos con marcas reconocidas y productos de primera calidad.</p>
                </div>

                <!-- Card 5: Atención rápida -->
                <div class="bg-neutral-900 border border-neutral-800 rounded-xl p-6 hover:border-red-600 transition-colors">
                    <div class="bg-red-600/20 w-12 h-12 rounded-lg flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-2">Atención Rápida</h3>
                    <p class="text-gray-400">Procesamos tus pedidos de forma ágil para que recibas lo que necesitas pronto.</p>
                </div>

                <!-- Card 6: Asesoría -->
                <div class="bg-neutral-900 border border-neutral-800 rounded-xl p-6 hover:border-red-600 transition-colors">
                    <div class="bg-red-600/20 w-12 h-12 rounded-lg flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-2">Asesoría Personalizada</h3>
                    <p class="text-gray-400">Nuestro equipo está disponible para ayudarte a encontrar lo que buscas.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Instrucciones de uso -->
    <section class="py-20 px-6">
        <div class="max-w-4xl mx-auto">
            <div class="bg-neutral-900 border border-neutral-800 rounded-2xl p-12">
                <h2 class="text-3xl font-bold mb-8 text-center">¿Cómo comprar?</h2>
                <div class="space-y-6">
                    <!-- Paso 1 -->
                    <div class="flex gap-4 items-start">
                        <div class="bg-red-600 w-10 h-10 rounded-full flex items-center justify-center flex-shrink-0">
                            <span class="font-bold">1</span>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold mb-2">Explora el catálogo</h3>
                            <p class="text-gray-400">Navega por la sección de productos y busca lo que necesitas.</p>
                        </div>
                    </div>
                    <!-- Paso 2 -->
                    <div class="flex gap-4 items-start">
                        <div class="bg-red-600 w-10 h-10 rounded-full flex items-center justify-center flex-shrink-0">
                            <span class="font-bold">2</span>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold mb-2">Selecciona el producto</h3>
                            <p class="text-gray-400">Haz clic en "Comprar" en el producto que deseas adquirir.</p>
                        </div>
                    </div>
                    <!-- Paso 3 -->
                    <div class="flex gap-4 items-start">
                        <div class="bg-red-600 w-10 h-10 rounded-full flex items-center justify-center flex-shrink-0">
                            <span class="font-bold">3</span>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold mb-2">Define la cantidad</h3>
                            <p class="text-gray-400">Indica cuántas unidades necesitas y confirma tu compra.</p>
                        </div>
                    </div>
                    <!-- Paso 4 -->
                    <div class="flex gap-4 items-start">
                        <div class="bg-red-600 w-10 h-10 rounded-full flex items-center justify-center flex-shrink-0">
                            <span class="font-bold">4</span>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold mb-2">¡Listo!</h3>
                            <p class="text-gray-400">Tu compra queda registrada en el sistema automáticamente.</p>
                        </div>
                    </div>
                </div>ferreluz
                <!-- Botón de acción -->
                <div class="mt-10 text-center">
                    <a href="/productos" class="inline-block bg-red-600 hover:bg-red-700 px-8 py-4 rounded-lg font-medium transition-colors">
                        Entrar ahora
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="border-t border-neutral-800 py-12 px-6">
        <div class="max-w-7xl mx-auto text-center">
            <p class="text-gray-400 text-sm">&copy; 2025 FerreLuz. Todos los derechos reservados.</p>
        </div>
    </footer>

</body>
</html>