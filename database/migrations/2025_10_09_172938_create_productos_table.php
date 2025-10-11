<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('productos', function (Blueprint $table) {
        $table->id();
        $table->string('nombre')->unique();
        $table->text('descripcion')->nullable();
        $table->decimal('precio', 10, 2);
        $table->unsignedBigInteger('proveedor_id'); // Relación con proveedor
        $table->timestamps();

        $table->foreign('proveedor_id')->references('id')->on('proveedores')->onDelete('cascade');
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
