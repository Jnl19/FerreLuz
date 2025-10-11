<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperar Contraseña - Ferretería Pro</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-black min-h-screen flex items-center justify-center px-4">
    <div class="w-full max-w-md">
        <!-- Logo y Header -->
       <div class="text-center mb-8">
            <div class="flex items-center justify-center mb-4">
                <a href="{{ url('/') }}">
                    <img src="{{ asset('images/FerreLuz.png') }}" alt="FerreLuz Logo" class="w-24 h-24 object-contain">
                </a>
            </div>
            <h1 class="text-3xl font-bold text-white mb-2">FerreLuz</h1>
            <p class="text-gray-400">Recuperar Contraseña</p>
        </div>

       

        <!-- Session Status (si existe) -->
        <div id="session-status" class="mb-4 hidden">
            <div class="bg-green-900/50 border border-green-700 text-green-300 px-4 py-3 rounded-lg text-sm">
                <p>Status message here</p>
            </div>
        </div>

        <!-- Form Card -->
        <div class="border border-neutral-800 rounded-xl p-8">
            <form method="POST" action="/password/email" class="space-y-6">
                <!-- Email Address -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-300 mb-2">
                        Email
                    </label>
                    <input 
                        id="email" 
                        type="email" 
                        name="email" 
                        required 
                        autofocus
                        class="w-full bg-transparent border border-neutral-700 text-white px-4 py-3 rounded-lg focus:ring-2 focus:ring-red-600 focus:border-transparent transition-all duration-200 placeholder-gray-500"
                        placeholder="tu@email.com">
                    <p class="text-red-400 text-sm mt-1 hidden">Error message</p>
                </div>

                <!-- Submit Button -->
                <div class="flex items-center justify-end">
                    <button 
                        type="submit"
                        class="bg-red-600 hover:bg-red-700 text-white font-medium px-6 py-3 rounded-lg transition-colors duration-200 flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                        Enviar enlace
                    </button>
                </div>
            </form>
        </div>

        <!-- Footer con link de regreso -->
        <div class="mt-6 text-center">
            <a href="/login" class="text-sm text-gray-400 hover:text-gray-300 transition-colors inline-flex items-center gap-1">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
                Volver al inicio de sesión
            </a>
        </div>
    </div>
</body>
</html>