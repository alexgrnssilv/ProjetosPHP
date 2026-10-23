<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Consulta extends Model
{
    use HasFactory;

    protected $fillable = [
        'genitora_id',
        'bebe_id',
        'data_consulta',
        'observacoes'
    ];

    public function genitora(): BelongsTo
    {
        return $this->belongsTo(Genitora::class);
    }

    public function bebe(): BelongsTo
    {
        return $this->belongsTo(Bebe::class);
    }
}