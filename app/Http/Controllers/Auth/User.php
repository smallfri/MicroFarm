<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use TCG\Voyager\Traits\VoyagerUser;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends \TCG\Voyager\Models\User
{
    use Notifiable;
    use VoyagerUser;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role', 'server',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

//    public function role()
//    {
//        return $this->belongsToMany('App\Role','role_user','user_id','role_id');
//    }


//    public function checkrole()
//    {
//        return $this->belongsToMany('App\Role','role_user','user_id','role_id');
//    }
//
    public function session(){
        return $this->hasOne('App\Session','user_id','id');
    }

//    public function isAdmin()
//    {
//        return  true ; // this looks for an admin column in your users table
//    }

}
