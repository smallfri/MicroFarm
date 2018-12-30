<?php
/**
 * Created by PhpStorm.
 * User: russellhudson
 * Date: 2018-12-28
 * Time: 09:00
 */

namespace App;


use Illuminate\Support\Facades\Auth;

class Feature extends \AlexGodbehere\LaravelFeatures\Feature
{


    public static function canAdmin()
    {
        $User = User::find(Auth::user()->id);

        if($User->role_id == 4 or $User->role_id == 5)
        {
            return true;
        }

        return false;
    }


}