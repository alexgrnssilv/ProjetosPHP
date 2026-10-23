<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ItemMercearia extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'codigo',
        'fornecedor_id',
        'marca',
        'unidade_medida',
        'codigo_barras_ean',
        'preco',
        'quantidade',
        'estoque_minimo'
    ];

    public function fornecedor(): BelongsTo
    {
        return $this->belongsTo(Fornecedor::class);
    }
}