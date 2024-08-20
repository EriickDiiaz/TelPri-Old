<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('lineas', function (Blueprint $table) {
            $table->id();
            $table->string('linea', 10);
            $table->string('vip', 20);
            $table->string('inventario', 50);
            $table->string('serial', 50);
            $table->string('mac', 50);
            $table->string('plataforma', 20);
            $table->string('titular', 100);
            $table->string('estado', 20);
            $table->string('localidad', 50);
            $table->string('piso', 5);
            $table->string('observacion', 255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lineas');
    }
};
