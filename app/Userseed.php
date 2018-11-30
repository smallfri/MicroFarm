<?php

namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Userseed extends Model
{
     use SoftDeletes;
     public $table="userseed";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       'user_id','user_seed_id','status','deleted_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
      'created_at', 'updated_at'
    ];

     public function userseedName(){
         return $this->hasMany('App\Seeds','id','user_seed_id')->where('status','active');
    }

    public function userseedDetail(){
         return $this->hasMany('App\SeedsDetail','seed_id','user_seed_id')->with('germinationDays','maturityDays');
    }

    public function seedsupplierName(){
         return $this->hasMany('App\SeedSupplier','supplier_seed_id','user_seed_id')
         ->join('supplier','supplier.id','=','seed_supplier.supplier_id')
         ;
    }

    
    

}