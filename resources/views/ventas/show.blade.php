@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-black py-8 px-4 sm:px-6 lg:px-8">
    <div class="max-w-2xl mx-auto">

        <!-- Header -->
        <h2 class="text-3xl font-bold text-white mb-6 text-center">
            Detalle de la Venta
        </h2>

        <!-- Card -->
        <div class="bg-black rounded-xl border border-gray-700 p-8 shadow-lg">
            <div class="space-y-4 text-white text-lg">
                <p><span class="font-semibold text-red-500">Producto:</span> {{ $venta->producto }}</p>
                <p><span class="font-semibold text-red-500">Cantidad:</span> {{ $venta->cantidad }}</p>
                <p><span class="font-semibold text-red-500">Precio Unitario:</span> ${{ number_format($venta->precio_unitario, 2) }}</p>
                <p><span class="font-semibold text-red-500">Total:</span> ${{ number_format($venta->total, 2) }}</p>
                <p><span class="font-semibold text-red-500">Proveedor:</span> {{ $venta->proveedor->nombre ?? 'Sin proveedor' }}</p>
                <p><span class="font-semibold text-red-500">Fecha:</span> {{ \Carbon\Carbon::parse($venta->fecha)->format('d/m/Y') }}</p>
            </div>
        </div>

        <!-- Button Volver -->
        <div class="flex justify-center mt-8">
            <a href="{{ route('ventas.index') }}" 
               class="inline-flex items-center gap-2 border border-gray-600 text-white px-6 py-3 rounded-lg hover:border-red-500 hover:text-red-500 transition-all duration-200 font-semibold">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
                Volver a la lista
            </a>
        </div>

    </div>
</div>
@endsection
