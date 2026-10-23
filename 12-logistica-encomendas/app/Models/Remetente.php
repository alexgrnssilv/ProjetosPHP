<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Remetente extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'telefone',
        'cidade'
    ];

    public function pacotes(): HasMany
    {
        return $this->hasMany(Pacote::class);
    }
}