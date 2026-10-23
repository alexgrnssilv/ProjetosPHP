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
        Schema::create('medicamentos', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('codigo')->unique();
            $table->foreignId('fabricante_id')->constrained('fabricantes')->cascadeOnDelete();
            $table->string('principio_ativo');
            $table->boolean('controlado_tarja_preta')->default(false);
            $table->string('lote');
            $table->date('data_validade');
            $table->decimal('preco', 10, 2);
            $table->integer('quantidade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medicamentos');
    }
};