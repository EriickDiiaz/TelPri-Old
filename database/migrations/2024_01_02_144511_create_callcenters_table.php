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
        Schema::create('callcenters', function (Blueprint $table) {
            $table->id();
            $table->string('extension', 5)->unique();
            $table->string('nombres', 100);
            $table->string('usuario', 20)->unique();
            $table->string('contrasena', 10);
            $table->string('servicio', 15)->nullable();
            $table->string('acceso', 20)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('callcenters');
    }
};
