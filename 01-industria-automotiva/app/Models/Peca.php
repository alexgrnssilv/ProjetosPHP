<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Peca extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'codigo',
        'numero_serie',
        'fornecedor_id',
        'robo_id',
        'preco',
        'quantidade',
        'vida_util_horas',
        'localizacao_almoxarifado'
    ];

    public function fornecedor(): BelongsTo
    {
        return $this->belongsTo(Fornecedor::class);
    }

    public function robo(): BelongsTo
    {
        return $this->belongsTo(Robo::class);
    }
}