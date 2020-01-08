<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tag extends Model
{
    protected $fillable = [
        'name', 'slug',
    ];
    
    public function posts()
    {
        return $this->belongsToMany('App\Post')->withTimestamps();
    }
    
}
