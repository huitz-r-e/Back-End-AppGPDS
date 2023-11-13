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
        Schema::create('agremiados', function (Blueprint $table) {
            $table->id();
            $table->string('a_paterno');
            $table->string('a_materno');
            $table->string('nombre');
            $table->string('sexo');
            $table->string('NUP');
            $table->string('NUE');
            $table->foreign('NUE')->references('NUE')->on('usuarios');
            $table->string('RFC');
            $table->string('NSS');
            $table->date('f_nacimiento');
            $table->string('telefono');
            $table->float('cuota');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agremiados');
    }
};
