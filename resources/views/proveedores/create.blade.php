@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-black py-8 px-4 sm:px-6 lg:px-8">
    <div class="max-w-2xl mx-auto">
        <!-- Header -->
        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold text-white mb-3">
                Nuevo Proveedor
            </h1>
            <p class="text-gray-300 text-lg">
                Completa los datos del nuevo proveedor
            </p>
        </div>

        <!-- Form Card -->
        <div class="bg-black rounded-xl border border-gray-700 p-8">
            <form action="{{ route('proveedores.store') }}" method="POST" class="space-y-6">
                @csrf

                <!-- Persona de Contacto -->
                <div class="space-y-3">
                    <label class="block text-sm font-semibold text-white">
                        Persona de Contacto
                    </label>
                    <input type="text" 
                        name="contacto" 
                        value="{{ old('contacto') }}" 
                        class="w-full bg-black border border-gray-600 text-white px-4 py-3 rounded-lg focus:ring-0 focus:border-red-500 transition-all duration-200 placeholder-gray-500 appearance-none autofill:bg-black"
                        placeholder="Juan Pérez"
                        required
                        autocomplete="name">
                </div>

                <!-- Teléfono -->
                <div class="space-y-3">
                    <label class="block text-sm font-semibold text-white">
                        Teléfono
                    </label>
                    <input type="text" 
                        name="telefono" 
                        value="{{ old('telefono') }}" 
                        class="w-full bg-black border border-gray-600 text-white px-4 py-3 rounded-lg focus:ring-0 focus:border-red-500 transition-all duration-200 placeholder-gray-500 appearance-none"
                        placeholder="+34 123 456 789"
                        required
                        autocomplete="tel">
                </div>

                <!-- Email -->
                <div class="space-y-3">
                    <label class="block text-sm font-semibold text-white">
                        Email
                    </label>
                    <input type="email" 
                        name="correo" 
                        value="{{ old('correo') }}" 
                        class="w-full bg-black border border-gray-600 text-white px-4 py-3 rounded-lg focus:ring-0 focus:border-red-500 transition-all duration-200 placeholder-gray-500 appearance-none"
                        placeholder="contacto@empresa.com"
                        required
                        autocomplete="email">
                </div>

                <!-- Dirección -->
                <div class="space-y-3">
                    <label class="block text-sm font-semibold text-white">
                        Dirección
                    </label>
                    <textarea name="direccion" 
                              rows="3"
                              class="w-full bg-black border border-gray-600 text-white px-4 py-3 rounded-lg focus:ring-0 focus:border-red-500 transition-all duration-200 placeholder-gray-500 resize-none appearance-none"
                              placeholder="Calle Principal 123, Ciudad"
                              required
                              autocomplete="street-address">{{ old('direccion') }}</textarea>
                </div>

                <!-- Buttons -->
                <div class="flex flex-col sm:flex-row gap-4 pt-6">
                    <a href="{{ route('proveedores.index') }}" 
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
                Todos los campos son obligatorios para registrar un proveedor
            </p>
        </div>
    </div>
</div>
@endsection
