<?php

namespace App;

//use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model;

class Servicio extends Model
{
    protected $fillale=[
        'servicio_nombre','servicio_descripcion',
        'servicio_precio','cat_id',
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }
}
