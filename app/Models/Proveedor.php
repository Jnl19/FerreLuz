<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    use HasFactory;
     protected $table = 'proveedores'; // <- Aquí ponemos el nombre correcto de la tabla

    protected $fillable = [
        'nombre',
        'telefono',
        'direccion',
        'correo',
    ];

    public function index()
{
    // Conteo de proveedores
    $totalProveedores = Proveedor::count();

    return view('dashboard', compact('totalProveedores'));
}

public function user()
{
    return $this->belongsTo(User::class);
}

}

