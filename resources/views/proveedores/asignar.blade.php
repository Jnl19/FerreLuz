@extends('layouts.app')

@section('title', 'Asignar Proveedor')

@section('content')
<div class="p-6 max-w-xl mx-auto">
    <!-- Header -->
    <div class="mb-8 text-center">
        <h2 class="text-2xl font-bold text-white mb-2">Asignar Proveedor a Usuario</h2>
        <p class="text-gray-400 text-sm">Selecciona un usuario del sistema para vincularlo al proveedor.</p>
    </div>

    <!-- Formulario -->
    <form action="{{ route('proveedores.asignar', $proveedor->id) }}" method="POST" class="space-y-6">
        @csrf

        <!-- Campo: Usuario -->
        <div>
            <label for="user_id" class="block text-sm font-medium text-white mb-2">
                Usuario
            </label>
            <select name="user_id" id="user_id"
                    class="w-full bg-neutral-900 border border-neutral-700 text-white px-4 py-3 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-red-500 transition duration-200">
                @foreach($usuarios as $usuario)
                    <option value="{{ $usuario->id }}">{{ $usuario->name }}</option>
                @endforeach
            </select>
        </div>

        <!-- Botón -->
        <div>
            <button type="submit"
                    class="w-full flex items-center justify-center gap-2 bg-red-600 hover:bg-red-700 text-white font-semibold py-3 px-6 rounded-lg transition-all duration-300">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Asignar Proveedor
            </button>
        </div>
    </form>
</div>
@endsection
