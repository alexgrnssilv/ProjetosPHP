<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Armador extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'pais',
        'contato'
    ];

    public function conteineres(): HasMany
    {
        return $this->hasMany(Conteiner::class);
    }
}