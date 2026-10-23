<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Carga extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'codigo',
        'fornecedor_id',
        'tipo_embalagem',
        'peso_kg',
        'dimensoes',
        'destino',
        'status',
        'preco',
        'quantidade'
    ];

    public function fornecedor(): BelongsTo
    {
        return $this->belongsTo(Fornecedor::class);
    }
}