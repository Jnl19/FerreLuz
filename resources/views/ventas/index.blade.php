@extends('layouts.app')

@section('title', 'Ventas')

@section('content')
<div class="p-6">
    <!-- Header -->
    <div class="mb-6">
        <h2 class="text-2xl font-bold text-white mb-1">Ventas</h2>
        <p class="text-gray-400">Gestiona tus ventas registradas</p>
    </div>

    <!-- Stats y Botón -->
    <div class="flex justify-between items-center mb-6">
        <div class="text-gray-400">
            Total de ventas: <span class="text-white font-semibold">{{ $ventas->count() }}</span>
        </div>

        @if(auth()->user()->rol === 'admin')
        <a href="{{ route('ventas.create') }}" 
           class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg transition-colors duration-200 flex items-center gap-2">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
            </svg>
            Registrar Venta
        </a>
        @endif
    </div>

    <!-- Tabla -->
    <div class="bg-neutral-900 rounded-lg border border-neutral-800 overflow-hidden">
        <div class="p-4 border-b border-neutral-800">
            <h3 class="text-lg font-semibold text-white">Listado de Ventas</h3>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-neutral-800 text-sm">
                <thead class="bg-neutral-950">
                    <tr>
                        <th class="px-3 py-2 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">ID</th>
                        <th class="px-3 py-2 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Producto</th>
                        <th class="px-3 py-2 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Cantidad</th>
                        <th class="px-3 py-2 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Precio Unitario</th>
                        <th class="px-3 py-2 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Total</th>
                        <th class="px-3 py-2 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Fecha</th>
                        @if(auth()->user()->rol === 'admin')
                        <th class="px-3 py-2 text-center text-xs font-medium text-gray-400 uppercase tracking-wider">Acciones</th>
                        @endif
                    </tr>
                </thead>

                <tbody class="bg-neutral-900 divide-y divide-neutral-800">
                    @forelse($ventas as $venta)
                    <tr class="hover:bg-neutral-850 transition-colors duration-150">
                        <td class="px-3 py-2 whitespace-nowrap text-white">#{{ $venta->id }}</td>
                        <td class="px-3 py-2 text-gray-300">{{ $venta->producto }}</td>
                        <td class="px-3 py-2 text-gray-300">{{ $venta->cantidad }}</td>
                        <td class="px-3 py-2 text-gray-300">RD$ {{ number_format($venta->precio_unitario, 2) }}</td>
                        <td class="px-3 py-2 text-green-400 font-medium">RD$ {{ number_format($venta->total, 2) }}</td>
                        <td class="px-3 py-2 text-gray-400">{{ $venta->created_at->format('d/m/Y') }}</td>
                        
                        @if(auth()->user()->rol === 'admin')
                        <td class="px-3 py-2 whitespace-nowrap">
                            <div class="flex justify-center gap-3">
                                <!-- Ver -->
                                <a href="{{ route('ventas.show', $venta->id) }}" 
                                   class="text-white hover:text-gray-300 transition duration-200" 
                                   title="Ver Detalles">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                              d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                              d="M2.458 12C3.732 7.943 7.523 5 12 5s8.268 2.943 9.542 7
                                                 c-1.274 4.057-5.065 7-9.542 7s-8.268-2.943-9.542-7z" />
                                    </svg>
                                </a>

                                <!-- Editar -->
                                <a href="{{ route('ventas.edit', $venta->id) }}" 
                                   class="text-blue-400 hover:text-blue-300 transition duration-200" 
                                   title="Editar">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                              d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 
                                                 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 
                                                 15H9v-2.828l8.586-8.586z"/>
                                    </svg>
                                </a>

                                <!-- Eliminar -->
                                <form action="{{ route('ventas.destroy', $venta->id) }}" method="POST" onsubmit="return confirm('¿Seguro que deseas eliminar esta venta?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="text-red-400 hover:text-red-300 transition duration-200" 
                                            title="Eliminar">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                                  d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 
                                                     0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 
                                                     0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                        @endif
                    </tr>
                    @empty
                    <tr>
                        <td colspan="@if(auth()->user()->rol === 'admin') 7 @else 6 @endif" class="px-3 py-8 text-center">
                            <div class="flex flex-col items-center justify-center text-gray-500">
                                <svg class="w-10 h-10 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" 
                                          d="M20 13V6a2 2 0 00-2-2H6a2 2 
                                             0 00-2 2v7m16 0v5a2 2 0 01-2 
                                             2H6a2 2 0 01-2-2v-5m16 0h-2.586
                                             a1 1 0 00-.707.293l-2.414 2.414a1 
                                             1 0 01-.707.293h-3.172a1 1 
                                             0 01-.707-.293l-2.414-2.414A1 1 
                                             0 006.586 13H4"/>
                                </svg>
                                <p class="text-sm font-medium text-gray-400 mb-1">No hay ventas registradas</p>
                                <p class="text-xs text-gray-500">Comienza registrando tu primera venta</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
