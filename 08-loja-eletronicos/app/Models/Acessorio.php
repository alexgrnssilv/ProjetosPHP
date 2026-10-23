<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Acessorio extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'codigo',
        'fabricante_id',
        'compatibilidade',
        'cor',
        'material',
        'garantia_estendida',
        'preco',
        'quantidade'
    ];

    public function fabricante(): BelongsTo
    {
        return $this->belongsTo(Fabricante::class);
    }
}