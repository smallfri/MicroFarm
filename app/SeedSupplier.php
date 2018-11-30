<?php

namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class SeedSupplier extends Model
{
     use SoftDeletes;
    public $table="seed_supplier";
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'supplier_seed_id','supplier_id','deleted_at'
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
         return $this->hasMany('App\Seeds','id','supplier_seed_id')->where('status','active');
    }
}
