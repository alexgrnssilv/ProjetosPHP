<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Epi extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'codigo',
        'fornecedor_id',
        'numero_ca',
        'validade_ca',
        'preco',
        'quantidade'
    ];

    public function fornecedor(): BelongsTo
    {
        return $this->belongsTo(Fornecedor::class);
    }
}