@extends('layouts.app')

@section('title', 'Proveedores')

@section('content')
<div class="p-6">
    <!-- Header -->
    <div class="mb-6">
        <h2 class="text-2xl font-bold text-white mb-1">Proveedores</h2>
        <p class="text-gray-400">Gestiona tus proveedores</p>
    </div>

    <!-- Stats y Botón -->
    <div class="flex justify-between items-center mb-6">
        <div class="text-gray-400">
            Total de proveedores: <span class="text-white font-semibold">{{ $proveedores->count() }}</span>
        </div>

        @if(Auth::user()->rol === 'admin')
        <a href="{{ route('proveedores.create') }}" 
           class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg transition-colors duration-200 flex items-center gap-2">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
            </svg>
            Agregar Proveedor
        </a>
        @endif
    </div>

    <!-- Tabla -->
    <div class="bg-neutral-900 rounded-lg border border-neutral-800 overflow-hidden">
        <div class="p-4 border-b border-neutral-800">
            <h3 class="text-lg font-semibold text-white">Lista de Proveedores</h3>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-neutral-800 text-sm">
                <thead class="bg-neutral-950">
                    <tr>
                        <th class="px-3 py-2 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Empresa</th>
                        <th class="px-3 py-2 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Teléfono</th>
                        <th class="px-3 py-2 text-left text-xs font-medium text-gray-400 uppercase tracking-wider">Email</th>
                        @if(Auth::user()->rol === 'admin')
                        <th class="px-3 py-2 text-center text-xs font-medium text-gray-400 uppercase tracking-wider">Acciones</th>
                        @endif
                    </tr>
                </thead>
                <tbody class="bg-neutral-900 divide-y divide-neutral-800">
                    @forelse($proveedores as $proveedor)
                    <tr class="hover:bg-neutral-850 transition-colors duration-150">
                        <td class="px-3 py-2 whitespace-nowrap text-white">
                            {{ $proveedor->nombre }}
                        </td>
                        <td class="px-3 py-2 whitespace-nowrap text-gray-300">
                            {{ $proveedor->telefono }}
                        </td>
                        <td class="px-3 py-2 whitespace-nowrap text-gray-300">
                            {{ $proveedor->correo }}
                        </td>
                        @if(Auth::user()->rol === 'admin')
                        <td class="px-3 py-2 whitespace-nowrap">
                            <div class="flex justify-center gap-3">

                                <!-- Editar -->
                                <a href="{{ route('proveedores.edit', $proveedor->id) }}" 
                                   class="text-blue-400 hover:text-blue-300 transition-colors duration-200" 
                                   title="Editar">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                              d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414
                                                 a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                    </svg>
                                </a>

                                <!-- Eliminar -->
                                <form action="{{ route('proveedores.destroy', $proveedor->id) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="text-red-400 hover:text-red-300 transition-colors duration-200" 
                                            onclick="return confirm('¿Seguro que quieres eliminar este proveedor?')" 
                                            title="Eliminar">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                                  d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 
                                                     4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                        </svg>
                                    </button>
                                </form>

                                <!-- Asignar Usuario -->
                                <a href="{{ route('proveedores.asignarForm', $proveedor->id) }}" 
                                   class="text-green-400 hover:text-green-300 transition-colors duration-200" 
                                   title="Asignar Usuario">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M18 9a3 3 0 11-6 0 3 3 0 016 0zM13 16h5m-2.5-3v6m-6-6H5a2 2 0 00-2 2v1a2 
                                                 2 0 002 2h5a2 2 0 002-2v-1a2 2 0 00-2-2z"/>
                                    </svg>
                                </a>

                            </div>
                        </td>
                        @endif
                    </tr>
                    @empty
                    <tr>
                        <td colspan="{{ Auth::user()->rol === 'admin' ? 4 : 3 }}" class="px-3 py-8 text-center">
                            <div class="flex flex-col items-center justify-center text-gray-500">
                                <svg class="w-10 h-10 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" 
                                          d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 
                                             0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 
                                             01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 
                                             0 006.586 13H4"></path>
                                </svg>
                                <p class="text-sm font-medium text-gray-400 mb-1">No hay proveedores registrados</p>
                                <p class="text-xs text-gray-500">Comienza agregando tu primer proveedor</p>
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
