<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Bebe extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'genitora_id',
        'data_nascimento'
    ];

    public function genitora(): BelongsTo
    {
        return $this->belongsTo(Genitora::class);
    }

    public function consultas(): HasMany
    {
        return $this->hasMany(Consulta::class);
    }
}