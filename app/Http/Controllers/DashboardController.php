<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Proveedor;
use App\Models\Venta;
use App\Models\Producto;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        if ($user->rol === 'admin') {
            // Datos para el administrador
            $totalUsuarios = User::count();
            $totalProveedores = Proveedor::count();
            $totalVentas = Venta::count();
            $totalGanancias = Venta::sum('total');
            $totalProductos = Producto::count();
            $proveedoresRecientes = Proveedor::latest()->take(5)->get();

            return view('dashboard', compact(
                'totalUsuarios',
                'totalProveedores',
                'totalVentas',
                'totalGanancias',
                'totalProductos',
                'proveedoresRecientes'
            ));
        } else {
            // Datos para el usuario normal
            $proveedores = $user->proveedores ?? Proveedor::where('user_id', $user->id)->get();

            // Compras del usuario
            $compras = Venta::where('user_id', $user->id)->get();

            // Total gastado
            $totalGastado = $compras->sum('total');

            return view('dashboard', compact('proveedores', 'compras', 'totalGastado'));
        }
    }
}
