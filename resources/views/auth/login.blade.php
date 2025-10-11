<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - FerreLuz</title>
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
            <p class="text-gray-400">Inicia sesión en tu cuenta</p>
        </div>

        <!-- Session Status -->
        <div id="session-status" class="mb-4 hidden">
            <div class="bg-green-900/50 border border-green-700 text-green-300 px-4 py-3 rounded-lg">
                <p class="text-sm">Status message here</p>
            </div>
        </div>

        <!-- Form Card -->
        <div class="border border-neutral-800 rounded-xl p-8 bg-gray-900/50">
            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf
                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-300 mb-2">
                        Correo electrónico
                    </label>
                    <input 
                        id="email" 
                        type="email" 
                        name="email" 
                        required 
                        autofocus 
                        autocomplete="username"
                        class="w-full bg-transparent border border-neutral-700 text-white px-4 py-3 rounded-lg focus:ring-2 focus:ring-red-600 focus:border-transparent transition-all duration-200 placeholder-gray-500"
                        placeholder="tu@email.com">
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-300 mb-2">
                        Contraseña
                    </label>
                    <div class="relative">
                        <input 
                            id="password" 
                            type="password" 
                            name="password" 
                            required 
                            autocomplete="current-password"
                            class="w-full bg-transparent border border-neutral-700 text-white px-4 py-3 rounded-lg focus:ring-2 focus:ring-red-600 focus:border-transparent transition-all duration-200 placeholder-gray-500"
                            placeholder="••••••••">
                        <button 
                            type="button" 
                            onclick="togglePassword()"
                            class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 hover:text-white transition-colors">
                            <svg id="eye-icon" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Remember Me & Forgot Password -->
                <div class="flex items-center justify-between">
                    <label class="flex items-center cursor-pointer group">
                        <input 
                            id="remember_me" 
                            type="checkbox" 
                            name="remember"
                            class="w-4 h-4 bg-transparent border-neutral-700 rounded text-red-600 focus:ring-2 focus:ring-red-600 focus:ring-offset-0 transition-colors">
                        <span class="ml-2 text-sm text-gray-400 group-hover:text-gray-300 transition-colors">
                            Recordarme
                        </span>
                    </label>

                    <a href="{{ route('password.request') }}" class="text-sm text-red-500 hover:text-red-400 transition-colors">
                        ¿Olvidaste tu contraseña?
                    </a>
                </div>

                <!-- Submit Button -->
                <button 
                    type="submit"
                    class="w-full bg-red-600 hover:bg-red-700 text-white font-medium px-6 py-3 rounded-lg transition-all duration-200 transform hover:scale-[1.02] flex items-center justify-center gap-2">
                    <span>Iniciar Sesión</span>
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                    </svg>
                </button>
            </form>
        </div>
        <br><br>
     
        
    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const eyeIcon = document.getElementById('eye-icon');
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeIcon.innerHTML = `
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21"></path>
                `;
            } else {
                passwordInput.type = 'password';
                eyeIcon.innerHTML = `
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                `;
            }
        }
    </script>
</body>
</html>
