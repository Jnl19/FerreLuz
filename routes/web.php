<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\VentaController;
use App\Http\Controllers\ProductoController; 

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {

    // 🔹 Perfil del usuario
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // 🔹 Proveedores
    Route::get('/proveedores/{proveedor}/asignar', [ProveedorController::class, 'mostrarAsignarForm'])
        ->name('proveedores.asignarForm');
    Route::post('/proveedores/{proveedor}/asignar', [ProveedorController::class, 'asignarUsuario'])
        ->name('proveedores.asignar');
    Route::resource('proveedores', ProveedorController::class);

    // 🔹 Productos (solo admin debería ver esto en vistas)
    Route::resource('productos', ProductoController::class);

    // 🔹 Ventas
    Route::resource('ventas', VentaController::class);

    // 🔹 Comprar productos (para usuarios)
    Route::get('/comprar/{id}', [VentaController::class, 'comprar'])->name('ventas.comprar');
    Route::post('/comprar', [VentaController::class, 'comprarStore'])->name('ventas.comprar.store');
});

require __DIR__ . '/auth.php';
