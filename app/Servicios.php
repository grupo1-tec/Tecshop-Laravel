<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model;

class Servicios extends Model
{
    protected $fillable = [
        'ser_nombre', 'ser_img','ser_descripcion', 'ser_precio', 'categoria_id',
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

    public function scopeNombresM($query, $nombresM) {
        if ($nombresM) {
            return $query->where('title','like',"%$nombresM%");
        }
    }

}
