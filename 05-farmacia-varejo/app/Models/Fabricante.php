<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Fabricante extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'cnpj',
        'registro_anvisa'
    ];

    public function medicamentos(): HasMany
    {
        return $this->hasMany(Medicamento::class);
    }
}