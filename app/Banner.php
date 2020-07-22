<?php

namespace App;

// use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model;

class Banner extends Model
{
    protected $fillable = [
        'banner_img','title','subtitle',
    ];
}
