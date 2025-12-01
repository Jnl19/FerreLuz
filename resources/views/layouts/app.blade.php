<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'FerreLuz') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased bg-black min-h-screen flex flex-col">

    <div class="flex flex-1">
        <!-- Sidebar -->
        <div class="bg-neutral-950 border-r border-neutral-800 text-white w-64 min-h-screen p-6 flex flex-col">
            <!-- Logo -->
            <div class="flex items-center space-x-3 mb-8">
                <img src="{{ asset('images/FerreLuz.png') }}" alt="FerreLuz Logo" class="w-10 h-10 object-contain">
                <h1 class="text-xl font-bold text-white">FerreLuz</h1>
            </div>

            <!-- Menú -->
            <nav class="space-y-2 flex-1">
                <!-- Dashboard -->
                <a href="{{ route('dashboard') }}" 
                   class="flex items-center space-x-3 p-3 rounded-lg {{ Request::routeIs('dashboard') ? 'bg-red-600 hover:bg-red-700' : 'hover:bg-neutral-900' }} transition-colors duration-200">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4 5a1 1 0 011-1h4a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM14 5a1 1 0 
                              011-1h4a1 1 0 011 1v2a1 1 0 01-1 1h-4a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h4a1 1 
                              0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM14 13a1 1 0 011-1h4a1 1 0 011 1v6a1 1 
                              0 01-1 1h-4a1 1 0 01-1-1v-6z"></path>
                    </svg>
                    <span>Dashboard</span>
                </a>

                @if(Auth::user()->rol === 'admin')
                    <!-- Admin: Ventas -->
                    <a href="{{ route('ventas.index') }}" 
                       class="flex items-center space-x-3 p-3 rounded-lg {{ Request::routeIs('ventas.*') ? 'bg-red-600 hover:bg-red-700' : 'hover:bg-neutral-900' }} transition-colors duration-200">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                  d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 
                                  2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 
                                  100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z">
                            </path>
                        </svg>
                        <span>Ventas</span>
                    </a>

                    <!-- Admin: Productos -->
                    <a href="{{ route('productos.index') }}" 
                       class="flex items-center space-x-3 p-3 rounded-lg {{ Request::routeIs('productos.*') ? 'bg-red-600 hover:bg-red-700' : 'hover:bg-neutral-900' }} transition-colors duration-200">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M20 13V7a2 2 0 00-2-2H6a2 2 0 00-2 2v6m16 0v6a2 2 0 
                                  01-2 2H6a2 2 0 01-2-2v-6m16 0H4"></path>
                        </svg>
                        <span>Productos</span>
                    </a>

                @else
                    <!-- Usuario: Mis Compras -->
                    <a href="{{ route('ventas.index') }}" 
                       class="flex items-center space-x-3 p-3 rounded-lg {{ Request::routeIs('ventas.*') ? 'bg-red-600 hover:bg-red-700' : 'hover:bg-neutral-900' }} transition-colors duration-200">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                  d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 
                                  2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 
                                  100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z">
                            </path>
                        </svg>
                        <span>Mis Compras</span>
                    </a>

                    <!-- Usuario: Productos -->
                    <a href="{{ route('productos.index') }}" 
                       class="flex items-center space-x-3 p-3 rounded-lg {{ Request::routeIs('productos.*') ? 'bg-red-600 hover:bg-red-700' : 'hover:bg-neutral-900' }} transition-colors duration-200">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M20 13V7a2 2 0 00-2-2H6a2 2 0 00-2 2v6m16 0v6a2 2 0 
                                  01-2 2H6a2 2 0 01-2-2v-6m16 0H4"></path>
                        </svg>
                        <span>Productos</span>
                    </a>
                @endif

                <!-- Proveedores -->
                <a href="{{ route('proveedores.index') }}" 
                   class="flex items-center space-x-3 p-3 rounded-lg {{ Request::routeIs('proveedores.*') ? 'bg-red-600 hover:bg-red-700' : 'hover:bg-neutral-900' }} transition-colors duration-200">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 
                              0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 
                              0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 
                              0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 
                              016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 
                              11-4 0 2 2 0 014 0z"></path>
                    </svg>
                    <span>Proveedores</span>
                </a>
            </nav>

            <!-- Información del usuario -->
            <div class="border-t border-neutral-800 pt-4 flex items-center space-x-3">
                <div class="flex-1">
                    <div class="text-sm text-gray-300 truncate">{{ Auth::user()->email }}</div>
                    <div class="text-xs text-gray-500 capitalize">{{ Auth::user()->rol }}</div>
                </div>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="text-gray-400 hover:text-white transition-colors duration-200">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                  d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 
                                  01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 
                                  013 3v1"></path>
                        </svg>
                    </button>
                </form>
            </div>
        </div>

        <!-- Contenido principal -->
        <div class="flex flex-col flex-1">
            <header class="bg-neutral-950 border-b border-neutral-800">
                <div class="flex justify-between items-center px-6 py-4">
                    <div>
                        <h2 class="text-2xl font-semibold text-white">@yield('title', 'Dashboard')</h2>
                        <p class="text-sm text-gray-500 mt-1">
                            @if(auth()->user()->rol === 'usuario')
                                Resumen general de tu cuenta
                            @else
                                Resumen general de tu ferretería
                            @endif
                        </p>
                    </div>
                </div>
            </header>

            <main class="p-6 flex-grow">
                @yield('content')
            </main>

            <!-- Footer -->
            <footer class="bg-neutral-950 border-t border-neutral-800 text-gray-400 text-center py-4 mt-auto">
                <p class="text-sm">&copy; {{ date('Y') }} FerreLuz. Todos los derechos reservados. Desarrollador : Janiel Montero</p>
            </footer>
        </div>
    </div>

</body>
</html>
