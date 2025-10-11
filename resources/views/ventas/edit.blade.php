@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-black py-8 px-4 sm:px-6 lg:px-8">
    <div class="max-w-2xl mx-auto">

        <!-- Header -->
        <h2 class="text-3xl font-bold text-white mb-6 text-center">
            Editar Venta
        </h2>

        <!-- Mostrar errores -->
        @if ($errors->any())
            <div class="bg-red-600/20 border border-red-600 text-red-400 rounded-xl p-4 mb-6">
                <ul class="list-disc pl-6 space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Form Card -->
        <div class="bg-black rounded-xl border border-gray-700 p-8 shadow-lg">
            <form action="{{ route('ventas.update', $venta->id) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')

                <!-- Producto -->
                <div>
                    <label class="block text-sm font-semibold text-red-500 mb-2">Producto</label>
                    <input type="text" 
                           name="producto" 
                           value="{{ old('producto', $venta->producto) }}" 
                           required
                           class="w-full bg-black border border-gray-600 text-white px-4 py-3 rounded-lg focus:ring-0 focus:border-red-500 transition-all duration-200 placeholder-gray-500 appearance-none">
                </div>

                <!-- Proveedor -->
                <div>
                    <label class="block text-sm font-semibold text-red-500 mb-2">Proveedor</label>
                    <select name="proveedor_id" required
                            class="w-full bg-black border border-gray-600 text-white px-4 py-3 rounded-lg focus:ring-0 focus:border-red-500 transition-all duration-200">
                        <option value="">-- Selecciona un proveedor --</option>
                        @foreach($proveedores as $proveedor)
                            <option value="{{ $proveedor->id }}" 
                                {{ old('proveedor_id', $venta->proveedor_id) == $proveedor->id ? 'selected' : '' }}>
                                {{ $proveedor->nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Cantidad y Precio Unitario en grid -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <div>
                        <label class="block text-sm font-semibold text-red-500 mb-2">Cantidad</label>
                        <input type="number" 
                               name="cantidad" 
                               value="{{ old('cantidad', $venta->cantidad) }}" 
                               required
                               class="w-full bg-black border border-gray-600 text-white px-4 py-3 rounded-lg focus:ring-0 focus:border-red-500 transition-all duration-200 placeholder-gray-500 appearance-none">
                    </div>
                    <div>
                        <label class="block text-sm font-semibold text-red-500 mb-2">Precio Unitario (RD$)</label>
                        <input type="number" step="0.01" 
                               name="precio_unitario" 
                               value="{{ old('precio_unitario', $venta->precio_unitario) }}" 
                               required
                               class="w-full bg-black border border-gray-600 text-white px-4 py-3 rounded-lg focus:ring-0 focus:border-red-500 transition-all duration-200 placeholder-gray-500 appearance-none">
                    </div>
                </div>

                <!-- Total -->
                <div>
                    <label class="block text-sm font-semibold text-red-500 mb-2">Total (RD$)</label>
                    <input type="number" step="0.01" 
                           name="total" 
                           value="{{ old('total', $venta->total) }}" 
                           required
                           class="w-full bg-black border border-gray-600 text-white px-4 py-3 rounded-lg focus:ring-0 focus:border-red-500 transition-all duration-200 placeholder-gray-500 appearance-none" readonly>
                </div>

                <!-- Fecha -->
                <div>
                    <label class="block text-sm font-semibold text-red-500 mb-2">Fecha</label>
                    <input type="date" 
                           name="fecha" 
                           value="{{ old('fecha', \Carbon\Carbon::parse($venta->fecha)->format('Y-m-d')) }}" 
                           required
                           class="w-full bg-black border border-gray-600 text-white px-4 py-3 rounded-lg focus:ring-0 focus:border-red-500 transition-all duration-200 placeholder-gray-500 appearance-none">
                </div>

                <!-- Buttons -->
                <div class="flex justify-end pt-4 gap-3">
                    <a href="{{ route('ventas.index') }}" 
                       class="border border-gray-600 text-white px-6 py-3 rounded-lg hover:border-red-500 hover:text-red-500 transition-all duration-200 font-semibold">
                        Cancelar
                    </a>

                    <button type="submit" 
                            class="bg-red-600 text-white px-6 py-3 rounded-lg hover:bg-red-700 transition-all duration-200 font-semibold">
                        Actualizar
                    </button>
                </div>

            </form>
        </div>

    </div>
</div>
@endsection
