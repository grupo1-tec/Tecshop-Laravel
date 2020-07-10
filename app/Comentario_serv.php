<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model;

class Comentario_serv extends Model
{
    protected $fillable = [
        'Comen_texto',
    ];

    public function User(){
        return $this->belongsTo('App\User');
    }
    public function Servicio(){
        return $this->belongsTo('App\Servicio');
    }
}
