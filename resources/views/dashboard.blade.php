@extends('layouts.app')

@section('content')
<div class="p-6 bg-black min-h-screen">
    <div class="max-w-7xl mx-auto">

<!-- Header -->
<div class="mb-6 text-center">
    <h1 class="text-4xl font-extrabold text-white mb-1 tracking-tight">Dashboard</h1>

    @if(auth()->user()->rol === 'admin')
        <p class="text-gray-400">Resumen general del sistema</p>
    @else
        <p class="text-gray-400">
            Resumen de tu cuenta en <span class="text-red-500 font-semibold">FerreLuz</span>
        </p>
    @endif
</div>



        @if(auth()->user()->rol === 'admin')
            <!-- Estadísticas Admin -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 mb-8">
                <div class="rounded-lg border border-neutral-800 bg-neutral-900 p-6 text-center">
                    <h2 class="text-lg font-semibold text-white mb-2">Total Usuarios</h2>
                    <p class="text-3xl font-bold text-white">{{ $totalUsuarios }}</p>
                </div>
                <div class="rounded-lg border border-neutral-800 bg-neutral-900 p-6 text-center">
                    <h2 class="text-lg font-semibold text-white mb-2">Total Proveedores</h2>
                    <p class="text-3xl font-bold text-white">{{ $totalProveedores }}</p>
                </div>
                <div class="rounded-lg border border-neutral-800 bg-neutral-900 p-6 text-center">
                    <h2 class="text-lg font-semibold text-white mb-2">Total Ventas</h2>
                    <p class="text-3xl font-bold text-white">{{ $totalVentas }}</p>
                </div>
                <div class="rounded-lg border border-neutral-800 bg-neutral-900 p-6 text-center">
                    <h2 class="text-lg font-semibold text-white mb-2">Ganancias Totales (RD$)</h2>
                    <p class="text-3xl font-bold text-green-400">{{ number_format($totalGanancias, 2) }}</p>
                </div>
                <div class="rounded-lg border border-neutral-800 bg-neutral-900 p-6 text-center">
                    <h2 class="text-lg font-semibold text-white mb-2">Total Productos</h2>
                    <p class="text-3xl font-bold text-white">{{ $totalProductos }}</p>
                </div>
            </div>
        @else
            <!-- Vista para el Usuario -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                <div class="rounded-lg border border-neutral-800 bg-neutral-900 p-6">
                    <h2 class="text-2xl font-semibold text-white mb-4 text-center">Total Gastado</h2>
                    <p class="text-center text-4xl font-extrabold text-red-500">
                        RD$ {{ number_format($totalGastado, 2) }}
                    </p>
                </div>

                <div class="rounded-lg border border-neutral-800 bg-neutral-900 p-6">
                    <h2 class="text-2xl font-semibold text-white mb-4 text-center">Tus Proveedores</h2>
                    <ul class="text-white list-disc list-inside space-y-2 text-lg">
                        @forelse($proveedores as $proveedor)
                            <li>
                                <span class="font-semibold">{{ $proveedor->nombre }}</span> - 
                                <span class="text-gray-400">{{ $proveedor->correo }}</span>
                            </li>
                        @empty
                            <li class="text-gray-500 italic">No tienes proveedores asignados.</li>
                        @endforelse
                    </ul>
                </div>
            </div>

            <!-- Tabla de Compras -->
            <div class="rounded-lg border border-neutral-800 bg-neutral-900 overflow-hidden">
                <div class="p-4 border-b border-neutral-800">
                    <h2 class="text-lg font-semibold text-white">Mis Compras Recientes</h2>
                </div>

                @if($compras->isEmpty())
                    <p class="text-gray-400 p-6 text-center">Aún no has realizado compras.</p>
                @else
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-neutral-800 text-sm">
                            <thead class="bg-neutral-950">
                                <tr>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-400 uppercase">Producto</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-400 uppercase">Cantidad</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-400 uppercase">Total</th>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-400 uppercase">Fecha</th>
                                </tr>
                            </thead>
                            <tbody class="bg-neutral-900 divide-y divide-neutral-800">
                                @foreach($compras as $compra)
                                    <tr class="hover:bg-neutral-850 transition-colors duration-150">
                                        <td class="px-4 py-3 text-white">{{ $compra->producto }}</td>
                                        <td class="px-4 py-3 text-gray-300">{{ $compra->cantidad }}</td>
                                        <td class="px-4 py-3 text-green-400">RD$ {{ number_format($compra->total, 2) }}</td>
                                        <td class="px-4 py-3 text-gray-400">{{ $compra->created_at->format('d/m/Y') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        @endif

        <!-- Tabla de Proveedores (solo admin) -->
        @if(auth()->user()->rol === 'admin')
        <div class="rounded-lg border border-neutral-800 bg-neutral-900 overflow-hidden mt-8">
            <div class="p-4 border-b border-neutral-800">
                <h2 class="text-lg font-semibold text-white">Proveedores Recientes</h2>
            </div>

            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-neutral-800 text-sm">
                    <thead class="bg-neutral-950">
                        <tr>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Nombre</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Teléfono</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Correo</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Dirección</th>
                        </tr>
                    </thead>
                    <tbody class="bg-neutral-900 divide-y divide-neutral-800">
                        @foreach($proveedoresRecientes as $proveedor)
                            <tr class="hover:bg-neutral-850 transition-colors duration-150">
                                <td class="px-4 py-3 text-white">{{ $proveedor->nombre }}</td>
                                <td class="px-4 py-3 text-gray-300">{{ $proveedor->telefono }}</td>
                                <td class="px-4 py-3 text-gray-300">{{ $proveedor->correo }}</td>
                                <td class="px-4 py-3 text-gray-400">{{ $proveedor->direccion }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @endif

    </div>
</div>
@endsection
