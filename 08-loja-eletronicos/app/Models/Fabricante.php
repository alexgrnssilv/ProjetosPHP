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
        'contato',
        'termos_garantia'
    ];

    public function acessorios(): HasMany
    {
        return $this->hasMany(Acessorio::class);
    }
}