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
        Schema::create('item_mercearias', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('codigo')->unique();
            $table->foreignId('fornecedor_id')->constrained('fornecedors')->cascadeOnDelete();
            $table->string('marca');
            $table->string('unidade_medida');
            $table->string('codigo_barras_ean');
            $table->decimal('preco', 10, 2);
            $table->integer('quantidade');
            $table->integer('estoque_minimo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('item_mercearias');
    }
};