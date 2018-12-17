<?php

namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Seedsdetail extends Model
{
    // use SoftDeletes;
  public $table="seeds_detail";
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'seed_id','soak_status','germination','situation','medium','maturity','yield','seeds_measurement','notes','status','deleted_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
      'created_at', 'updated_at'
    ];

    public function germinationDays(){
       return $this->hasMany('App\Days','id','germination');
    }

     public function maturityDays(){
       return $this->hasMany('App\Days','id','maturity');
    }

     public function userseedName(){
         return $this->hasMany('App\Seeds','id','seed_id')->where('status','active');
    }

    public function seedsupplierName(){
         return $this->hasMany('App\Seedsupplier','supplier_seed_id','seed_id')
         ->join('supplier','supplier.id','=','seed_supplier.supplier_id')
         ;
    }

    protected $casts = [
        'deleted_at' => 'datetime'
    ];

}
