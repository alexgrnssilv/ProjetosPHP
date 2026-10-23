<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class HardwareRede extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'codigo',
        'fabricante_id',
        'mac_address',
        'ip_address',
        'voltagem',
        'data_ultima_manutencao',
        'preco',
        'quantidade'
    ];

    public function fabricante(): BelongsTo
    {
        return $this->belongsTo(Fabricante::class);
    }
}