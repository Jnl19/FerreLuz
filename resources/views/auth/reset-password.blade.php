<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restablecer Contraseña - Ferretería Pro</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-black min-h-screen flex items-center justify-center px-4">
    <div class="w-full max-w-md">
        <!-- Logo y Header -->
        <div class="text-center mb-8">
            <div class="flex items-center justify-center mb-4">
                <div class="bg-red-600 p-3 rounded-xl">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"></path>
                    </svg>
                </div>
            </div>
            <h1 class="text-3xl font-bold text-white mb-2">Ferreteria Pro</h1>
            <p class="text-gray-400">Restablecer contraseña</p>
        </div>

        <!-- Form Card -->
        <div class="border border-neutral-800 rounded-xl p-8">
            <form method="POST" action="/password/store" class="space-y-6">
                <!-- Password Reset Token (hidden) -->
                <input type="hidden" name="token" value="token-value">

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
                        autocomplete="username"
                        class="w-full bg-transparent border border-neutral-700 text-white px-4 py-3 rounded-lg focus:ring-2 focus:ring-red-600 focus:border-transparent transition-all duration-200 placeholder-gray-500"
                        placeholder="tu@email.com">
                    <p class="text-red-400 text-sm mt-1 hidden">Error message</p>
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-300 mb-2">
                        Password
                    </label>
                    <input 
                        id="password" 
                        type="password" 
                        name="password" 
                        required 
                        autocomplete="new-password"
                        class="w-full bg-transparent border border-neutral-700 text-white px-4 py-3 rounded-lg focus:ring-2 focus:ring-red-600 focus:border-transparent transition-all duration-200 placeholder-gray-500"
                        placeholder="••••••••">
                    <p class="text-red-400 text-sm mt-1 hidden">Error message</p>
                </div>

                <!-- Confirm Password -->
                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-300 mb-2">
                        Confirm Password
                    </label>
                    <input 
                        id="password_confirmation" 
                        type="password" 
                        name="password_confirmation" 
                        required 
                        autocomplete="new-password"
                        class="w-full bg-transparent border border-neutral-700 text-white px-4 py-3 rounded-lg focus:ring-2 focus:ring-red-600 focus:border-transparent transition-all duration-200 placeholder-gray-500"
                        placeholder="••••••••">
                    <p class="text-red-400 text-sm mt-1 hidden">Error message</p>
                </div>

                <!-- Submit Button -->
                <div class="flex items-center justify-end pt-2">
                    <button 
                        type="submit"
                        class="bg-red-600 hover:bg-red-700 text-white font-medium px-6 py-3 rounded-lg transition-colors duration-200">
                        Reset Password
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>