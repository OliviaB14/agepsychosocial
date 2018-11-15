<?php

namespace AgePsychoSocial;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function articles()
    {
        return $this->hasMany('AgePsychoSocial\Article');
    }

    public function role()
    {
        return $this->belongsTo('AgePsychoSocial\Role');
    }

    public function getRoleTitleAttribute()
    {
        return "{$this->role->title}";
    }
}
