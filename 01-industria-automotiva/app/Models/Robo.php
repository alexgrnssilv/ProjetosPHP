<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Robo extends Model
{
    use HasFactory;

    protected $fillable = [
        'modelo',
        'linha_montagem',
        'status'
    ];

    public function pecas(): HasMany
    {
        return $this->hasMany(Peca::class);
    }
}