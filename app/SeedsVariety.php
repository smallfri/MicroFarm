<?php

namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class SeedsVariety extends Model
{
    use SoftDeletes;
    public $table="seeds_variety";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'seed_id','name','supplier_id','deleted_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at', 'updated_at'
    ];

    public function seedname(){
        return $this->hasMany('App\Model\Seeds','id','supplier_seed_id')->where('status',1);
    }
}
