<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ReagenteQuimico extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'codigo',
        'fabricante_id',
        'nivel_periculosidade',
        'temperatura_conservacao',
        'volume_restante_ml',
        'preco',
        'quantidade'
    ];

    public function fabricante(): BelongsTo
    {
        return $this->belongsTo(Fabricante::class);
    }
}