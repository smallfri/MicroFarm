<?php

namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Userseed extends Model
{
//     use SoftDeletes;
     public $table="userseed";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       'user_id','variety_id','status','deleted_at, density'
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
         return $this->hasMany('App\Seeds','id','variety_id')->where('status','active');
    }

    public function userseedDetail(){
         return $this->hasMany('App\SeedsDetail','seed_id','variety_id')->with('germinationDays','maturityDays');
    }

    public function seedsupplierName(){
         return $this->hasMany('App\Seedsupplier','supplier_seed_id','variety_id')
         ->join('supplier','supplier.id','=','seed_supplier.supplier_id')
         ;
    }

    
    

}
