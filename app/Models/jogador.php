<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class jogador extends Model
{
    use HasFactory;

    protected $fillable = [
        'time_id',
        'nome',
        'data_de_nascimento',
        'posicao',
    ];

    public function time()
    {
        return $this->belongsTo(Time::class, 'time_id');
    }
}
