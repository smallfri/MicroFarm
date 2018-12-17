<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class UserseedDetail extends Model
{
    use SoftDeletes;
    public $table = "userseeds_detail";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'seed_name', 'supplier_name', 'density', 'tray_size', 'seed_id', 'user_userseed_id', 'soak_status', 'germination', 'situation', 'medium', 'maturity', 'yield', 'seeds_measurement', 'measurement', 'notes', 'status', 'deleted_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at', 'updated_at', 'seed_id'
    ];

    protected $casts = [
        'deleted_at' => 'datetime'
    ];

    public function germinationDays()
    {
        return $this->hasMany('App\Days', 'id', 'germination');
    }

    public function maturityDays()
    {
        return $this->hasMany('App\Days', 'id', 'maturity');
    }

    public function seedsupplierName()
    {
        return $this->hasMany('App\Supplier', 'id', 'supplier_name');
    }

}
