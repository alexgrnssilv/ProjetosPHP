<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pacote extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'codigo',
        'codigo_rastreio',
        'remetente_id',
        'destinatario',
        'peso_kg',
        'status_entrega',
        'preco',
        'quantidade'
    ];

    public function remetente(): BelongsTo
    {
        return $this->belongsTo(Remetente::class);
    }
}