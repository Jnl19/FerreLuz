@extends('layouts.app')

@section('title', isset($producto) ? 'Editar Producto' : 'Nuevo Producto')

@section('content')
<div class="flex justify-center p-6 min-h-screen bg-black">
    <div class="border border-neutral-800 rounded-lg p-6 max-w-2xl w-full">
        <!-- Header -->
        <div class="mb-6">
            <a href="{{ route('productos.index') }}" 
               class="text-gray-400 hover:text-white transition-colors duration-200 flex items-center gap-2 mb-4">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
                Volver a productos
            </a>
            <h2 class="text-2xl font-bold text-white mb-1">
                {{ isset($producto) ? 'Editar Producto: ' . $producto->nombre : 'Agregar Producto' }}
            </h2>
            <p class="text-gray-400">{{ isset($producto) ? 'Actualiza la información del producto' : 'Completa los datos del nuevo producto' }}</p>
        </div>

        <!-- Mensajes de error -->
        @if ($errors->any())
            <div class="bg-red-900/50 border border-red-700 text-red-300 px-4 py-3 rounded-lg mb-6">
                <div class="flex items-start gap-2">
                    <svg class="w-5 h-5 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke- join="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <div>
                        <p class="font-semibold mb-2">Por favor corrige los siguientes errores:</p>
                        <ul class="list-disc list-inside space-y-1">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        @endif

        <!-- Form -->
        <form action="{{ isset($producto) ? route('productos.update', $producto->id) : route('productos.store') }}" 
              method="POST" 
              class="space-y-5 bg-black p-6 rounded-lg">
            @csrf
            @if(isset($producto))
                @method('PUT')
            @endif

            <!-- Nombre -->
            <div>
                <label class="block text-sm font-medium text-gray-300 mb-2">
                    Nombre del Producto
                </label>
                <input type="text" 
                       name="nombre" 
                       id="nombre"
                       value="{{ $producto->nombre ?? old('nombre') }}" 
                       class="w-full bg-black border border-neutral-700 text-white px-4 py-2.5 rounded-lg focus:ring-2 focus:ring-red-600 focus:border-transparent transition-all duration-200 placeholder-gray-500"
                       placeholder="Ej: Martillo de acero"
                       required>
                @error('nombre')
                    <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Descripción -->
            <div>
                <label class="block text-sm font-medium text-gray-300 mb-2">
                    Descripción
                </label>
                <textarea name="descripcion" 
                          id="descripcion"
                          rows="3"
                          class="w-full bg-black border border-neutral-700 text-white px-4 py-2.5 rounded-lg focus:ring-2 focus:ring-red-600 focus:border-transparent transition-all duration-200 placeholder-gray-500"
                          placeholder="Describe las características del producto...">{{ $producto->descripcion ?? old('descripcion') }}</textarea>
                @error('descripcion')
                    <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Precio -->
            <div>
                <label class="block text-sm font-medium text-gray-300 mb-2">
                    Precio (RD$)
                </label>
                <div class="relative">
                    <span class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400">RD$</span>
                    <input type="number" 
                           step="0.01"
                           name="precio" 
                           id="precio"
                           value="{{ $producto->precio ?? old('precio') }}" 
                           class="w-full bg-black border border-neutral-700 text-white pl-14 pr-4 py-2.5 rounded-lg focus:ring-2 focus:ring-red-600 focus:border-transparent transition-all duration-200 placeholder-gray-500"
                           placeholder="0.00"
                           required>
                </div>
                @error('precio')
                    <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Proveedor -->
            <div>
                <label class="block text-sm font-medium text-gray-300 mb-2">
                    Proveedor
                </label>
                <select name="proveedor_id" 
                        id="proveedor_id"
                        class="w-full bg-black border border-neutral-700 text-white px-4 py-2.5 rounded-lg focus:ring-2 focus:ring-red-600 focus:border-transparent transition-all duration-200"
                        required>
                    <option value="" class="bg-black">Seleccione un proveedor</option>
                    @foreach($proveedores as $proveedor)
                        <option value="{{ $proveedor->id }}" 
                                class="bg-black"
                                {{ (isset($producto) && $producto->proveedor_id == $proveedor->id) || old('proveedor_id') == $proveedor->id ? 'selected' : '' }}>
                            {{ $proveedor->nombre }}
                        </option>
                    @endforeach
                </select>
                @error('proveedor_id')
                    <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Buttons -->
            <div class="flex gap-3 pt-4">
                <a href="{{ route('productos.index') }}" 
                   class="flex-1 bg-neutral-800 hover:bg-neutral-700 text-white px-4 py-2.5 rounded-lg transition-colors duration-200 text-center font-medium border border-neutral-700">
                    Cancelar
                </a>
                <button type="submit" 
                        class="flex-1 bg-red-600 hover:bg-red-700 text-white px-4 py-2.5 rounded-lg transition-colors duration-200 font-medium flex items-center justify-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    {{ isset($producto) ? 'Actualizar Producto' : 'Guardar Producto' }}
                </button>
            </div>
        </form>

        <!-- Info adicional -->
        <div class="mt-6 max-w-2xl mx-auto">
            <div class="border border-neutral-800 rounded-lg p-4">
                <div class="flex items-start gap-3 text-gray-400 text-sm">
                    <svg class="w-5 h-5 text-blue-400 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <div>
                        <p class="font-medium text-gray-300 mb-1">Información importante:</p>
                        <ul class="space-y-1">
                            <li>• Todos los campos marcados son obligatorios</li>
                            <li>• El precio debe ser un valor numérico válido</li>
                            <li>• Asegúrate de seleccionar un proveedor existente</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
c