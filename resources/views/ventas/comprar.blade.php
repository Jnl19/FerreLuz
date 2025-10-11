@extends('layouts.app')

@section('title', 'Comprar Producto')

@section('content')
<div class="p-6">
    <!-- Header -->
    <div class="mb-6">
        <a href="{{ route('productos.index') }}" 
           class="text-gray-400 hover:text-white transition-colors duration-200 flex items-center gap-2 mb-4">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
            </svg>
            Volver a productos
        </a>
        <h2 class="text-2xl font-bold text-white mb-1">Comprar Producto</h2>
        <p class="text-gray-400">Completa los detalles de tu compra</p>
    </div>

    <div class="max-w-4xl">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <!-- Información del Producto -->
            <div class="bg-neutral-900 rounded-lg border border-neutral-800 p-6">
                <div class="flex items-center gap-3 mb-6">
                    <div class="bg-red-600/20 p-3 rounded-lg">
                        <svg class="w-8 h-8 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold text-white">{{ $producto->nombre }}</h3>
                        <p class="text-sm text-gray-400">Producto seleccionado</p>
                    </div>
                </div>

                <div class="space-y-4">
                    <!-- Descripción -->
                    <div class="border-t border-neutral-800 pt-4">
                        <p class="text-sm text-gray-400 mb-2">Descripción</p>
                        <p class="text-white">{{ $producto->descripcion ?: 'Sin descripción' }}</p>
                    </div>

                    <!-- Proveedor -->
                    <div class="border-t border-neutral-800 pt-4">
                        <p class="text-sm text-gray-400 mb-2">Proveedor</p>
                        <div class="flex items-center gap-2">
                            <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                            </svg>
                            <span class="text-white font-medium">{{ $producto->proveedor->nombre ?? 'Sin proveedor' }}</span>
                        </div>
                    </div>

                    <!-- Precio unitario -->
                    <div class="border-t border-neutral-800 pt-4">
                        <p class="text-sm text-gray-400 mb-2">Precio unitario</p>
                        <p class="text-3xl font-bold text-green-400">RD$ {{ number_format($producto->precio, 2) }}</p>
                    </div>
                </div>
            </div>

            <!-- Formulario de Compra -->
            <div class="bg-neutral-900 rounded-lg border border-neutral-800 p-6">
                <h3 class="text-lg font-bold text-white mb-6">Detalles de compra</h3>

                <form action="{{ route('ventas.comprar.store') }}" method="POST" class="space-y-6">
                    @csrf
                    <input type="hidden" name="producto_id" value="{{ $producto->id }}">

                    <!-- Cantidad -->
                    <div>
                        <label for="cantidad" class="block text-sm font-medium text-gray-300 mb-2">
                            Cantidad
                        </label>
                        <input type="number" 
                               name="cantidad" 
                               id="cantidad" 
                               class="w-full bg-neutral-950 border border-neutral-700 text-white px-4 py-2.5 rounded-lg focus:ring-2 focus:ring-red-600 focus:border-transparent transition-all duration-200"
                               value="1" 
                               min="1" 
                               required
                               onchange="calcularTotal()">
                        @error('cantidad')
                            <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Resumen de compra -->
                    <div class="bg-neutral-950 border border-neutral-800 rounded-lg p-4 space-y-3">
                        <p class="text-sm font-medium text-gray-400 uppercase tracking-wider">Resumen</p>
                        
                        <div class="flex justify-between items-center text-gray-300">
                            <span>Precio unitario:</span>
                            <span class="font-medium">RD$ {{ number_format($producto->precio, 2) }}</span>
                        </div>

                        <div class="flex justify-between items-center text-gray-300">
                            <span>Cantidad:</span>
                            <span class="font-medium" id="cantidad-display">1</span>
                        </div>

                        <div class="border-t border-neutral-800 pt-3 flex justify-between items-center">
                            <span class="text-lg font-bold text-white">Total:</span>
                            <span class="text-2xl font-bold text-green-400" id="total-display">RD$ {{ number_format($producto->precio, 2) }}</span>
                        </div>
                    </div>

                    <!-- Botones -->
                    <div class="flex gap-3 pt-2">
                        <a href="{{ route('productos.index') }}" 
                           class="flex-1 bg-neutral-800 hover:bg-neutral-700 text-white px-4 py-3 rounded-lg transition-colors duration-200 text-center font-medium border border-neutral-700">
                            Cancelar
                        </a>
                        <button type="submit" 
                                class="flex-1 bg-red-600 hover:bg-red-700 text-white px-4 py-3 rounded-lg transition-colors duration-200 font-medium flex items-center justify-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                            Confirmar Compra
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Nota informativa -->
        <div class="mt-6 bg-blue-900/20 border border-blue-800 rounded-lg p-4">
            <div class="flex items-start gap-3">
                <svg class="w-5 h-5 text-blue-400 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <div class="text-sm text-blue-300">
                    <p class="font-medium mb-1">Información de compra</p>
                    <p>Al confirmar la compra, se registrará la venta en el sistema. Asegúrate de verificar la cantidad antes de continuar.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function calcularTotal() {
    const precioUnitario = {{ $producto->precio }};
    const cantidad = parseInt(document.getElementById('cantidad').value) || 1;
    const total = precioUnitario * cantidad;
    
    document.getElementById('cantidad-display').textContent = cantidad;
    document.getElementById('total-display').textContent = 'RD$ ' + total.toFixed(2).replace(/\B(?=(\d{3})+(?!\d))/g, ',');
}
</script>
@endsection