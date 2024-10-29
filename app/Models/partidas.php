<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class partidas extends Model
{
    use HasFactory;

    protected $fillable = [
        'time_casa_id',
        'time_fora_id',
        'data_jogo',
        'local',
        'placar_jogo',
    ];

    public function timeCasa()
    {
        return $this->belongsTo(Time::class, 'time_casa_id');
    }

    public function timeFora()
    {
        return $this->belongsTo(Time::class, 'time_fora_id');
    }
}
