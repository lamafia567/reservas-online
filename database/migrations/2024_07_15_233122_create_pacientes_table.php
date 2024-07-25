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
        Schema::create('pacientes', function (Blueprint $table) {
            $table->id();
            $table->string('nombres',100);
            $table->string('apellidos',100);
            $table->string('run',11)->unique();
            $table->string('fecha_nacimiento',100);
            $table->string('genero',10);
            $table->string('fono',20);
            $table->string('email',100)->unique();
            $table->string('direccion',255);
            $table->string('estado_civil',100);
            $table->string('observaciones')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pacientes');
    }
};
