<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Venta; 
use App\Models\Proveedor;

class VentaController extends Controller
{
 public function index()
{
    $user = auth()->user();

    if ($user->rol === 'admin') {
        $ventas = Venta::with('proveedor')->latest()->get(); // Admin ve todo
    } else {
        $ventas = Venta::with('proveedor')
            ->where('user_id', $user->id)
            ->latest()
            ->get(); // Usuario ve solo sus ventas
    }

    return view('ventas.index', compact('ventas'));
}


    public function create()
    {
        $proveedores = Proveedor::all();
        return view('ventas.create', compact('proveedores'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'producto' => 'required',
            'cantidad' => 'required|integer|min:1',
            'precio_unitario' => 'required|numeric|min:0',
            'proveedor_id' => 'required|exists:proveedores,id',
            'fecha' => 'required|date',
        ]);

        $total = $request->cantidad * $request->precio_unitario;

        Venta::create([
            'user_id' => auth()->id(),
            'proveedor_id' => $request->proveedor_id,
            'producto' => $request->producto,
            'cantidad' => $request->cantidad,
            'precio_unitario' => $request->precio_unitario,
            'total' => $total,
            'fecha' => $request->fecha,
        ]);

        return redirect()->route('ventas.index')->with('success', 'Venta registrada correctamente.');
    }

    public function edit(Venta $venta)
    {
        $proveedores = Proveedor::all();
        return view('ventas.edit', compact('venta', 'proveedores'));
    }

    public function update(Request $request, Venta $venta)
    {
        $request->validate([
            'producto' => 'required',
            'cantidad' => 'required|integer|min:1',
            'precio_unitario' => 'required|numeric|min:0',
            'proveedor_id' => 'required|exists:proveedores,id',
            'fecha' => 'required|date',
        ]);

        $venta->update([
            'proveedor_id' => $request->proveedor_id,
            'producto' => $request->producto,
            'cantidad' => $request->cantidad,
            'precio_unitario' => $request->precio_unitario,
            'total' => $request->cantidad * $request->precio_unitario,
            'fecha' => $request->fecha,
        ]);

        return redirect()->route('ventas.index')->with('success', 'Venta actualizada correctamente.');
    }

    public function destroy(Venta $venta)
    {
        $venta->delete();
        return redirect()->route('ventas.index')->with('success', 'Venta eliminada.');
    }

    
    public function show($id)
    {
        $venta = Venta::findOrFail($id);
        return view('ventas.show', compact('venta'));
    }

    public function comprar($id)
{
    $producto = \App\Models\Producto::with('proveedor')->findOrFail($id);
    return view('ventas.comprar', compact('producto'));
}

public function comprarStore(Request $request)
{
    $request->validate([
        'producto_id' => 'required|exists:productos,id',
        'cantidad' => 'required|integer|min:1',
    ]);

    $producto = \App\Models\Producto::findOrFail($request->producto_id);

    Venta::create([
        'user_id' => auth()->id(),
        'proveedor_id' => $producto->proveedor_id,
        'producto' => $producto->nombre,
        'cantidad' => $request->cantidad,
        'precio_unitario' => $producto->precio,
        'total' => $producto->precio * $request->cantidad,
        'fecha' => now(),
    ]);

    return redirect()->route('ventas.index')->with('success', 'Compra registrada correctamente.');
}

}
