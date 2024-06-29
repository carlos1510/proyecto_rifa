<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NumeroRifa extends Model
{
    use HasFactory;

    protected $table = 'numeros_rifa';

    public function rifas(){
        return $this->hasMany('App\Models\Rifa');
    }

    public function participantes(){
        return $this->hasMany('App\Models\Participante');
    }
}
