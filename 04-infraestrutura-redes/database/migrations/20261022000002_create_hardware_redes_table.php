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
        Schema::create('hardware_redes', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('codigo')->unique();
            $table->foreignId('fabricante_id')->constrained('fabricantes')->cascadeOnDelete();
            $table->string('mac_address');
            $table->string('ip_address');
            $table->string('voltagem');
            $table->date('data_ultima_manutencao');
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
        Schema::dropIfExists('hardware_redes');
    }
};