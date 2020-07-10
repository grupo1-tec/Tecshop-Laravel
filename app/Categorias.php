<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model;

class Categorias extends Model
{
    protected $fillable = [
        'cat_nombre',
    ];

    public function Productos(){
        return $this->hasMany('App\Producto');
    }

    public function Servicios(){
        return $this->hasMany('App\Servicios');
    }
}
