<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    protected $fillable = ['name','slug','image'];
    
    public function posts()
    {
        return $this->belongsToMany('App\Post')->withTimestamps();
    }
}
