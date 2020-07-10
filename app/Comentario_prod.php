<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model;

class Comentario_prod extends Model
{
    protected $fillable = [
        'Comen_texto',
    ];

    public function User(){
        return $this->belongsTo('App\User');
    }

    public function Producto(){
        return $this->belongsTo('App\Producto');
    }
}
