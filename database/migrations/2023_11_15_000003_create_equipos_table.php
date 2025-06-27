<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('equipos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tecnico_id')->constrained('tecnicos');
            $table->unsignedBigInteger('negocio_id');
            $table->foreign('negocio_id')->references('id')->on('negocios');
            $table->string('estadoEquipo');
            $table->string('tipoDeEquipo');
            $table->string('marcaEquipo');
            $table->text('danioEquipo');
            $table->text('accesoriosEquipo');
            $table->string('imagenesEquipo');
            $table->string('modeloEquipo');
            $table->text('observacionesEquipo');
            $table->string('numeroDeSerieEquipo');
            $table->dateTime('fechaLlegada');
            $table->dateTime('fechaSalida')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('equipos');
    }
};