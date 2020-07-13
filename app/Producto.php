<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model;

class Producto extends Model
{
    protected $fillable = [
        'prod_nombre', 'prod_img', 'prod_stock', 'prod_precio', 
        'prod_activo', 'categoria_id',
    ];

    public function Categorias(){
        return $this->belongsTo('App\Categorias');
    }

    public function User(){
        return $this->belongsTo('App\User');
    }

    public function Comentarios(){
        return $this->embedsMany('App\Comentario_prod');
    }

}
