@extends('layouts.app')
@section('title', isset($proveedor) ? 'Editar Proveedor' : 'Agregar Proveedor')
@section('content')
<div class="min-h-screen bg-black py-8 px-4 sm:px-6 lg:px-8">
    <div class="max-w-2xl mx-auto">
        <!-- Header -->
        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold text-white mb-3">
                {{ isset($proveedor) ? 'Editar Proveedor' : 'Agregar Proveedor' }}
            </h1>
            <p class="text-gray-300 text-lg">
                {{ isset($proveedor) ? 'Actualiza la información del proveedor' : 'Completa los datos del nuevo proveedor' }}
            </p>
        </div>

        <!-- Form Card -->
        <div class="bg-black rounded-xl border border-gray-700 p-8">
            <form action="{{ isset($proveedor) ? route('proveedores.update', $proveedor->id) : route('proveedores.store') }}" 
                  method="POST" 
                  class="space-y-6">
                @csrf
                @if(isset($proveedor))
                    @method('PUT')
                @endif

                <!-- Nombre -->
                <div class="space-y-3">
                    <label class="block text-sm font-semibold text-white">
                        Nombre del Proveedor
                    </label>
                    <input type="text" 
                           name="nombre" 
                           value="{{ $proveedor->nombre ?? old('nombre') }}" 
                           class="w-full bg-black border border-gray-600 text-white px-4 py-3 rounded-lg 
                                  focus:ring-0 focus:border-red-500 transition-all duration-200 
                                  placeholder-gray-500 appearance-none"
                           placeholder="Distribuidora XYZ"
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
                           value="{{ $proveedor->telefono ?? old('telefono') }}" 
                           class="w-full bg-black border border-gray-600 text-white px-4 py-3 rounded-lg 
                                  focus:ring-0 focus:border-red-500 transition-all duration-200 
                                  placeholder-gray-500 appearance-none"
                           placeholder="+34 123 456 789"
                           required
                           autocomplete="tel">
                </div>

                <!-- Dirección -->
                <div class="space-y-3">
                    <label class="block text-sm font-semibold text-white">
                        Dirección
                    </label>
                    <input type="text" 
                           name="direccion" 
                           value="{{ $proveedor->direccion ?? old('direccion') }}" 
                           class="w-full bg-black border border-gray-600 text-white px-4 py-3 rounded-lg 
                                  focus:ring-0 focus:border-red-500 transition-all duration-200 
                                  placeholder-gray-500 appearance-none"
                           placeholder="Calle Principal 123, Ciudad"
                           required
                           autocomplete="street-address">
                </div>

                <!-- Correo -->
                <div class="space-y-3">
                    <label class="block text-sm font-semibold text-white">
                        Correo Electrónico
                    </label>
                    <input type="email" 
                           name="correo" 
                           value="{{ $proveedor->correo ?? old('correo') }}" 
                           class="w-full bg-black border border-gray-600 text-white px-4 py-3 rounded-lg 
                                  focus:ring-0 focus:border-red-500 transition-all duration-200 
                                  placeholder-gray-500 appearance-none"
                           placeholder="correo@ejemplo.com"
                           required
                           autocomplete="email">
                </div>

                <!-- Buttons -->
                <div class="flex flex-col sm:flex-row gap-4 pt-6">
                    <a href="{{ route('proveedores.index') }}" 
                       class="flex-1 border border-gray-600 text-white px-6 py-3 rounded-lg 
                              hover:border-red-500 hover:text-red-500 transition-all duration-200 
                              font-semibold flex items-center justify-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                        Cancelar
                    </a>
                    
                    <button type="submit" 
                            class="flex-1 bg-red-600 text-white px-6 py-3 rounded-lg hover:bg-red-700 
                                   transition-all duration-200 font-semibold flex items-center 
                                   justify-center gap-2 border border-red-500">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        {{ isset($proveedor) ? 'Actualizar Proveedor' : 'Agregar Proveedor' }}
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
                Todos los campos son obligatorios
            </p>
        </div>
    </div>
</div>

<!-- Optional CSS to prevent autofill background from flashing -->
<style>
input:-webkit-autofill,
textarea:-webkit-autofill {
    background-color: #000 !important;
    color: #fff !important;
    -webkit-box-shadow: 0 0 0px 1000px #000 inset;
    transition: background-color 5000s ease-in-out 0s;
}
</style>
@endsection
