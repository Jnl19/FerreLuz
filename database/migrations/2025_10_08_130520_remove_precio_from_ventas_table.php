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
    Schema::table('ventas', function (Blueprint $table) {
        $table->dropColumn('precio');
    });
}

public function down()
{
    Schema::table('ventas', function (Blueprint $table) {
        $table->decimal('precio', 10, 2)->nullable();
    });
}

};
