<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use Illuminate\Http\Request;
use App\Models\User;

class ProveedorController extends Controller
{
    public function index()
    {
        // Los administradores ven todos los proveedores
        // Los usuarios solo ven los suyos
        $user = auth()->user();
        if ($user->rol === 'admin') {
            $proveedores = Proveedor::all();
        } else {
            $proveedores = Proveedor::where('user_id', $user->id)->get();
        }

        return view('proveedores.index', compact('proveedores'));
    }

    public function create()
    {
        return view('proveedores.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'telefono' => 'required',
            'direccion' => 'required',
            'correo' => 'required|email',
        ]);

        $proveedor = new Proveedor();
        $proveedor->nombre = $request->nombre;
        $proveedor->telefono = $request->telefono;
        $proveedor->direccion = $request->direccion;
        $proveedor->correo = $request->correo;
        $proveedor->user_id = auth()->id(); // Asigna el usuario actual
        $proveedor->save();

        return redirect()->route('proveedores.index')->with('success', 'Proveedor creado correctamente.');
    }

    public function edit($id)
    {
        $proveedor = Proveedor::findOrFail($id);
        return view('proveedores.edit', compact('proveedor'));
    }

    public function update(Request $request, $id)
    {
        $proveedor = Proveedor::findOrFail($id);

        $proveedor->update([
            'nombre' => $request->nombre,
            'telefono' => $request->telefono,
            'direccion' => $request->direccion,
            'correo' => $request->correo,
        ]);

        return redirect()->route('proveedores.index')->with('success', 'Proveedor actualizado.');
    }

    public function destroy($id)
    {
        $proveedor = Proveedor::findOrFail($id);
        $proveedor->delete();

        return redirect()->route('proveedores.index')->with('success', 'Proveedor eliminado correctamente.');
    }

    // ---------- ASIGNACIÓN DE USUARIO A PROVEEDOR ----------

    public function mostrarAsignarForm($proveedorId)
    {
        $proveedor = Proveedor::findOrFail($proveedorId);
        $usuarios = User::all();

        return view('proveedores.asignar', compact('proveedor', 'usuarios'));
    }

    public function asignarUsuario(Request $request, $proveedorId)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
        ]);

        $proveedor = Proveedor::findOrFail($proveedorId);
        $proveedor->user_id = $request->user_id;
        $proveedor->save();

        return redirect()->route('proveedores.index')
            ->with('success', 'Usuario asignado correctamente al proveedor.');
    }
}
