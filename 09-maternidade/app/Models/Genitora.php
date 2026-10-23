<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Genitora extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'cpf',
        'telefone'
    ];

    public function bebes(): HasMany
    {
        return $this->hasMany(Bebe::class);
    }

    public function consultas(): HasMany
    {
        return $this->hasMany(Consulta::class);
    }
}