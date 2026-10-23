<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MateriaPrima extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'codigo',
        'fornecedor_id',
        'tipo_liga',
        'ponto_fusao_celsius',
        'peso_toneladas',
        'preco',
        'quantidade'
    ];

    public function fornecedor(): BelongsTo
    {
        return $this->belongsTo(Fornecedor::class);
    }
}