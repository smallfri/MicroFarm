<?php namespace App\Http\Controllers\Admin;
use App\Http\Requests;
use Illuminate\Http\Request;
use DB;
use App\Http\Controllers\Controller;

class APIController extends Controller
{
    
    public function getStateList(Request $request)
    {
		$states = DB::table("states")
                    ->where("country_id",$request->country_id)
                    ->pluck("name","id");
					//->prepend('Select State');
        return response()->json($states);
    }
    public function getCityList(Request $request)
    {
        $cities = DB::table("cities")
                    ->where("state_id",$request->state_id)
                    ->pluck("name","id");
					//->prepend('Select City');
					
        return response()->json($cities);
    }
}
?>