<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    public $table="supplier";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','status','deleted_at'
    ];

    protected $hidden = [
         'created_at', 'updated_at'
    ];
    
}
