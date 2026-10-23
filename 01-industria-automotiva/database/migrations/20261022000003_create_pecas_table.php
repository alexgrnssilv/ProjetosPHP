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
        Schema::create('pecas', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('codigo')->unique();
            $table->string('numero_serie')->unique();
            $table->foreignId('fornecedor_id')->constrained('fornecedors')->cascadeOnDelete();
            $table->foreignId('robo_id')->constrained('robos')->cascadeOnDelete();
            $table->decimal('preco', 10, 2);
            $table->integer('quantidade');
            $table->integer('vida_util_horas');
            $table->string('localizacao_almoxarifado');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pecas');
    }
};