<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Fornecedor extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'cidade',
        'telefone'
    ];

    public function cargas(): HasMany
    {
        return $this->hasMany(Carga::class);
    }
}