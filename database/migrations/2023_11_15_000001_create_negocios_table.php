<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('negocios', function (Blueprint $table) {
            $table->id();
            $table->string('nombreNegocio');
            $table->string('numeroNegocio');
            $table->string('correoNegocio');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('negocios');
    }
};