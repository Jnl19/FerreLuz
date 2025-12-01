<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro FerreLuz</title>
    <!-- Carga de Tailwind CSS desde CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-black min-h-screen flex items-center justify-center px-4">
    <div class="w-full max-w-md">
        <!-- Sección del logo y encabezado -->
        <div class="text-center mb-8">
            <div class="flex items-center justify-center mb-4">
                <img src="{{ asset('images/FerreLuz.png') }}" alt="FerreLuz" class="h-12">
            </div>
            <h1 class="text-3xl font-bold text-white mb-2">Crear cuenta</h1>
            <p class="text-gray-400">Únete a FerreLuz</p>
        </div>

        <!-- Tarjeta del formulario -->
        <div class="border border-neutral-800 rounded-xl p-8">
            <form method="POST" action="{{ route('register') }}" class="space-y-5">
                <!--     Token de seguridad obligatorio -->
                @csrf

                <!-- Campo: Nombre completo -->
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-300 mb-2">
                        Nombre completo
                    </label>
                    <input 
                        id="name" 
                        type="text" 
                        name="name" 
                        required 
                        autofocus 
                        autocomplete="name"
                        class="w-full bg-transparent border border-neutral-700 text-white px-4 py-3 rounded-lg focus:ring-2 focus:ring-red-600 focus:border-transparent transition-all duration-200 placeholder-gray-500"
                        placeholder="Juan Pérez">
                </div>

                <!-- Campo: Correo electrónico -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-300 mb-2">
                        Email
                    </label>
                    <input 
                        id="email" 
                        type="email" 
                        name="email" 
                        required 
                        autocomplete="username"
                        class="w-full bg-transparent border border-neutral-700 text-white px-4 py-3 rounded-lg focus:ring-2 focus:ring-red-600 focus:border-transparent transition-all duration-200 placeholder-gray-500"
                        placeholder="tu@email.com">
                </div>

                <!-- Campo: Contraseña -->
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-300 mb-2">
                        Contraseña
                    </label>
                    <input 
                        id="password" 
                        type="password" 
                        name="password" 
                        required 
                        autocomplete="new-password"
                        class="w-full bg-transparent border border-neutral-700 text-white px-4 py-3 rounded-lg focus:ring-2 focus:ring-red-600 focus:border-transparent transition-all duration-200 placeholder-gray-500"
                        placeholder="••••••••">
                    <p class="text-gray-500 text-xs mt-1">Mínimo 8 caracteres</p>
                </div>

                <!-- Campo: Confirmar contraseña -->
                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-300 mb-2">
                        Confirmar contraseña
                    </label>
                    <input 
                        id="password_confirmation" 
                        type="password" 
                        name="password_confirmation" 
                        required 
                        autocomplete="new-password"
                        class="w-full bg-transparent border border-neutral-700 text-white px-4 py-3 rounded-lg focus:ring-2 focus:ring-red-600 focus:border-transparent transition-all duration-200 placeholder-gray-500"
                        placeholder="••••••••">
                </div>

                <!-- Botón para enviar el formulario -->
                <button 
                    type="submit"
                    class="w-full bg-red-600 hover:bg-red-700 text-white font-medium px-6 py-3 rounded-lg transition-all duration-200 transform hover:scale-[1.02] flex items-center justify-center gap-2 mt-6">
                    <span>  Crear cuenta</span>
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                    </svg>
                </button>

                <!-- Enlace hacia el inicio de sesión -->
                <div class="text-center pt-4">
                    <a href="{{ route('login') }}" class="text-sm text-gray-400 hover:text-gray-300 transition-colors">
                        ¿Ya tienes cuenta? 
                        <span class="text-red-500 hover:text-red-400 font-medium">Inicia sesión</span>
                    </a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
