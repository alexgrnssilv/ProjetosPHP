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
        'licenca_quimica'
    ];

    public function reagentesQuimicos(): HasMany
    {
        return $this->hasMany(ReagenteQuimico::class);
    }
}