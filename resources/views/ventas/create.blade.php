@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-black py-8 px-4 sm:px-6 lg:px-8">
    <div class="max-w-2xl mx-auto">
        <!-- Header -->
        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold text-white mb-3">
                Nueva Venta
            </h1>
            <p class="text-gray-300 text-lg">
                Completa los datos para registrar una nueva venta
            </p>
        </div>

        <!-- Form Card -->
        <div class="bg-black rounded-xl border border-gray-700 p-8">
            {{-- Mostrar errores --}}
            @if ($errors->any())
                <div class="bg-red-600/20 border border-red-600 text-red-400 rounded-xl p-4 mb-6">
                    <ul class="list-disc pl-6 space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('ventas.store') }}" method="POST" class="space-y-6">
                @csrf

                <!-- Producto -->
                <div class="space-y-3">
                    <label class="block text-sm font-semibold text-white">
                        Producto
                    </label>
                    <input type="text" 
                           name="producto" 
                           value="{{ old('producto') }}" 
                           class="w-full bg-black border border-gray-600 text-white px-4 py-3 rounded-lg focus:ring-0 focus:border-red-500 transition-all duration-200 placeholder-gray-500 appearance-none autofill:bg-black"
                           placeholder="Ej. Martillo, cemento..." 
                           required
                           autocomplete="off">
                </div>

                <!-- Proveedor -->
                <div class="space-y-3">
                    <label class="block text-sm font-semibold text-white">
                        Proveedor
                    </label>
                    <select name="proveedor_id" required
                            class="w-full bg-black border border-gray-600 text-white px-4 py-3 rounded-lg focus:ring-0 focus:border-red-500 transition-all duration-200 appearance-none">
                        <option value="">-- Selecciona un proveedor --</option>
                        @foreach($proveedores as $proveedor)
                            <option value="{{ $proveedor->id }}" {{ old('proveedor_id') == $proveedor->id ? 'selected' : '' }}>
                                {{ $proveedor->nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Cantidad y Precio Unitario -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <div class="space-y-3">
                        <label class="block text-sm font-semibold text-white">
                            Cantidad
                        </label>
                        <input type="number" 
                               name="cantidad" 
                               value="{{ old('cantidad') }}" 
                               class="w-full bg-black border border-gray-600 text-white px-4 py-3 rounded-lg focus:ring-0 focus:border-red-500 transition-all duration-200 placeholder-gray-500 appearance-none"
                               placeholder="Ej. 5" 
                               required
                               min="1"
                               autocomplete="off">
                    </div>

                    <div class="space-y-3">
                        <label class="block text-sm font-semibold text-white">
                            Precio Unitario (RD$)
                        </label>
                        <input type="number" 
                               step="0.01" 
                               name="precio_unitario" 
                               value="{{ old('precio_unitario') }}" 
                               class="w-full bg-black border border-gray-600 text-white px-4 py-3 rounded-lg focus:ring-0 focus:border-red-500 transition-all duration-200 placeholder-gray-500 appearance-none"
                               placeholder="Ej. 250.00" 
                               required
                               min="0"
                               autocomplete="off">
                    </div>
                </div>

                <!-- Fecha -->
                <div class="space-y-3">
                    <label class="block text-sm font-semibold text-white">
                        Fecha
                    </label>
                    <input type="date" 
                           name="fecha" 
                           value="{{ old('fecha') }}" 
                           class="w-full bg-black border border-gray-600 text-white px-4 py-3 rounded-lg focus:ring-0 focus:border-red-500 transition-all duration-200 appearance-none"
                           required>
                </div>

                <!-- Buttons -->
                <div class="flex flex-col sm:flex-row gap-4 pt-6">
                    <a href="{{ route('ventas.index') }}" 
                       class="flex-1 border border-gray-600 text-white px-6 py-3 rounded-lg hover:border-red-500 hover:text-red-500 transition-all duration-200 font-semibold flex items-center justify-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                        Cancelar
                    </a>
                    
                    <button type="submit" 
                            class="flex-1 bg-red-600 text-white px-6 py-3 rounded-lg hover:bg-red-700 transition-all duration-200 font-semibold flex items-center justify-center gap-2 border border-red-500">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        Guardar
                    </button>
                </div>
            </form>
        </div>

        <!-- Additional Info -->
        <div class="mt-8 text-center text-gray-400">
            <p class="flex items-center justify-center gap-2 text-sm">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                Todos los campos son obligatorios para registrar una venta
            </p>
        </div>
    </div>
</div>
@endsection
