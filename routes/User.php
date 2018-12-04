<?php

namespace App;


use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\HasRoles;
use App\Traits\BaseModelTrait;
use DB;
class User extends Authenticatable
{


    //only for user model
    public $is_user = true;

    use Notifiable, HasRoles;


    use  BaseModelTrait;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','email','password','is_active','activation_token','activation_time'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'created_at', 'updated_at', 'created_by'
    ];

    public function role()
    {
        return $this->belongsToMany('App\Role','role_user','user_id','role_id');
    }


    public function checkrole()
    {
        return $this->belongsToMany('App\Role','role_user','user_id','role_id');
    }
    
    public function session(){
        return $this->hasOne('App\Session','user_id','id');
    }

    public function isAdmin()
{
    return  true ; // this looks for an admin column in your users table
}

}
