<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Medicamento extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'codigo',
        'fabricante_id',
        'principio_ativo',
        'controlado_tarja_preta',
        'lote',
        'data_validade',
        'preco',
        'quantidade'
    ];

    public function fabricante(): BelongsTo
    {
        return $this->belongsTo(Fabricante::class);
    }
}