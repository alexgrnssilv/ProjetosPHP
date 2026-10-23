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
        'cnpj',
        'contato'
    ];

    public function materiasPrimas(): HasMany
    {
        return $this->hasMany(MateriaPrima::class);
    }

    public function epis(): HasMany
    {
        return $this->hasMany(Epi::class);
    }
}