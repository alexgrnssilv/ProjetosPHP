<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Conteiner extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'codigo',
        'numero_conteiner',
        'armador_id',
        'tamanho',
        'tipo_carga',
        'nome_navio',
        'preco',
        'quantidade'
    ];

    public function armador(): BelongsTo
    {
        return $this->belongsTo(Armador::class);
    }
}