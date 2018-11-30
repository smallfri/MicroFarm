<?php

namespace App;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class SeedsVariety extends Model
{
  use SoftDeletes;
  public $table="seed_variety";
   /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'seed_id','variety_id','deleted_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
      'created_at', 'updated_at'
    ];
}
