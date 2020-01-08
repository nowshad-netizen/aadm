<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','bname','f_name','m_name','present_address', 'permanent_address','dob', 'religion','blood','passed','hon_session','masters_session','about_job','number','fblink','spous_name','occupation','number_of_kids','interest','username','bank_name','fee_number','payment_date','approve_by','image',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function role(){
            return $this->belongsTo('App\role');
    }
    public function posts()
    {
        return $this->hasMany('App\Post');
    }
    public function favorite_posts()
    {
        return $this->belongsToMany('App\Post')->withTimestamps();
    }
    public function scopeAuthors($query)
    {
        return $query->where('role_id',2);
    }
    

}
