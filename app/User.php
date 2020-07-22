<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
//use Illuminate\Foundation\Auth\User as Authenticatable;
use Jenssegers\Mongodb\Auth\User as Authenticatable;
//use Illuminate\Notifications\Notifiable;
use Jenssegers\Mongodb\Eloquent\Model;
use Boytunghc\LaravelMongoNotifiable\Notifiable;
class User extends Authenticatable
{
    use Notifiable;
    protected $fillable = [
        'name', 'fechaNac','email',
        'telefono','img','password',
        'activo','admin','documento_tipo',
        'documento_nro','user_img'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function servicios(){
        return $this->hasMany('App\Servicios');
    }

    public function productos(){
        return $this->hasMany('App\Producto');
    }

    public function comentarios_prod(){
        return $this->hasMany('App\Comentario_prod');
    }

    public function comentarios_serv(){
        return $this->hasMany('App\Comentario_serv');
    }
    
}
