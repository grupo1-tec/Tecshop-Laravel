<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model;

class Servicios extends Model
{
    protected $fillable = [
        'ser_nombre', 'ser_descripcion', 'ser_precio'
    ];

    public function User(){
        return $this->belongsTo('App\User');
    }

    public function Comentarios(){
        return $this->embedsMany('App\Comentario_serv');
    }

    public function Categorias(){
        return $this->belongsTo('App\Categorias');
    }

}
