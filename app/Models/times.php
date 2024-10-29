<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class times extends Model
{
    use HasFactory;

    protected $fillable = [
        'treinador_id',
        'nome',
        'cidade',
    ];

    public function treinador()
    {
        return $this->belongsTo(Treinador::class, 'treinador_id');
    }

    public function jogadores()
    {
        return $this->hasMany(Jogador::class);
    }
}
