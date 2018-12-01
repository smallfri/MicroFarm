<?php

namespace App\Http\Controllers;

use App\SeedsVariety;
use Illuminate\Http\Request;
use App\Seeds;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Userseed;
use App\Supplier;
use App\SeedSupplier;
use App\SeedsDetail;
use App\UserseedDetail;
use App\Days;
use App\GrowNotes;
use Auth;

class SeedController extends Controller
{
    public function index(Request $request)
    {
        $user_id = Auth::user()->id;
        $days = Days::pluck('name', 'id');

        $userfirstseed = Userseed::where('user_id', $user_id)->first();

        if (!$userfirstseed) {
            return redirect('/seed/create');

        } else {
            $userseedlist = Userseed::select(
                'userseed.variety_id',
                'userseed.user_id',
                'userseed.variety_id as variety_id',
                'seeds_variety.id as id',
                'userseed.status',
                'userseeds_detail.seed_id',
                'seeds_variety.supplier_id as supplier_id',
                'url',
                'userseeds_detail.density',
                'userseeds_detail.tray_size',
                'userseeds_detail.measurement',
                'userseeds_detail.soak_status',
                'userseeds_detail.germination',
                'userseeds_detail.medium',
                'userseeds_detail.yield',
                'userseeds_detail.seeds_measurement',
                DB::raw('CONCAT(seeds.name," ",seeds_variety.name) as seed_name'))
                ->where('userseed.user_id', $user_id)
                ->join('seeds_variety','seeds_variety.id','=','userseed.variety_id')
                ->join('seeds', 'seeds.id','=','seeds_variety.seed_id')
                ->leftJoin('userseeds_detail', 'userseeds_detail.variety_id','=','seeds_variety.id')
                ->get();

            $suppliers = Supplier::pluck('name','id')->prepend('Select One', '0');

            $notes = GrowNotes::select('grow_notes.*', DB::raw("DATEDIFF('" . date('Y-m-d') . "' ,DATE(created_at)) AS days"))->where('user_id', $user_id)->where('variety_id', $userfirstseed->variety_id)->orderby('id', 'desc')->get();

            return view('user-backend.seed.index', compact('userseedlist', 'days', 'suppliers', 'notes'));
        }

    }


    public function create(Request $request)
    {
        $user_id = Auth::user()->id;
        $userseedlist= Userseed::select('variety_id')->where('user_id', $user_id)->get();

        $supplier = Supplier::where('status', 'active')->pluck('name', 'id')->prepend('Select One', '0');
        $seed = Seeds::select('seeds_variety.id', 'seeds.name', 'seeds_variety.name as vname')->where('status', 'active')->join('seeds_variety','seeds_variety.seed_id','=','seeds.id')->get();

        $count =  count($seed);

        return view('user-backend.seed.create', compact('seed','userseedlist', 'supplier', 'count'));
    }

    public function supplierseed(Request $request, $id)
    {
        $user_id = Auth::user()->id;
        $supplier = Supplier::where('status', 'active')->pluck('name', 'id')->prepend('All', '0');
        if ($id > 0) {

            $seed = Seeds::select(
                'seeds_variety.id',
                'seeds.name',
                'seeds_variety.name as vname',
                'seeds_variety.supplier_id as supplier_id'
            )->where([['status', '=', 'active'], ['supplier_id', '=', $id]])
                ->join('seeds_variety','seeds_variety.seed_id','=','seeds.id')
                ->get();

        } else {
            $seed = Seeds::select(
                'seeds_variety.id',
                'seeds.name',
                'seeds_variety.name as vname',
                'seeds_variety.supplier_id as supplier_id'
            )->where([['status', '=', 'active']])->join('seeds_variety','seeds_variety.seed_id','=','seeds.id')->get();
        }
        $allseed = SeedsVariety::with('seedname')->get();
        return response()->json(['seed' => $seed, 'allseed' => $allseed, 'count'=> count($seed)], 200);
    }

    public function store(Request $request)
    {
        $rules = [
            'variety_id' => 'required|min:1'
        ];

        $customMessages = [
            'variety_id.required' => 'Please Select At least 1 Checkbox',
        ];
        $this->validate($request, $rules, $customMessages);
        $data = $request->all();
        $user_id = Auth::user()->id;
        if (!empty($request->input('variety_id'))) {
            $userseed = Userseed::where('user_id', $user_id)->delete();

            foreach ($request->input('variety_id') as $variety_id) {
                $userseed = new Userseed();
                $userseed->user_id = $user_id;
                $userseed->variety_id = $variety_id;
                $userseed->status = 'active';
                $userseed->save();
            }

            Session::flash('flash_message', 'Seed(s) added!');

            return redirect('/seed');
        }
    }

//    public function edit(Request $request, $id)
//    {
//        $user_id = Auth::user()->id;
//        $days = Days::pluck('name', 'id');
//        $userseedlist = Userseed::where('user_id', $user_id)->get();
//        $checkuserseedexist = UserseedDetail::where('variety_id', '=', $id)->where('user_id', '=', $user_id)->with('germinationDays', 'maturityDays')->first();
//        if ($checkuserseedexist) {
//            $userseeddetail = UserseedDetail::where('variety_id', $id)->where('user_id', $user_id)->with('germinationDays', 'maturityDays', 'seedsupplierName')->first();
//        } else {
//            $userseeddetail = SeedsDetail::where('variety_id', $id)->with('germinationDays', 'maturityDays', 'userseedName', 'seedsupplierName')->first();
//        }
//
//        $checkuserseedexist = Userseed::where('user_id', $user_id)->where('user_id', $id)->first();
//        $notes = GrowNotes::select('grow_notes.*', DB::raw("DATEDIFF('" . date('Y-m-d') . "' ,DATE(created_at)) AS days"))->where('user_id', $user_id)->where('variety_id', $id)->orderby('id', 'desc')->get();
//        echo '<pre style="border:solid 1px red">';
//        print_r($userseeddetail);
//        echo '</pre>';
////exit;
//
//        if ($checkuserseedexist) {
//
//            return view('user-backend.seed.editseed', compact('userseeddetail', 'days', 'userseedlist', 'id', 'notes'));
//        } else {
//            return redirect('/seed');
//        }
//
//    }

    public function update(Request $request, $id)
    {
        echo '<pre style="border:solid 1px red">';
        print_r($request->all());
        echo '</pre>';

        exit;
        $this->validate($request, [
            'seed_name' => 'required|numeric',
            'supplier_name' => 'required',
            'density' => 'required',
            'measurement' => 'required',
            'tray_size' => 'required',
            'soak_status' => 'required',
            'germination' => 'required',
            'situation' => 'required',
            'medium' => 'required',
            'maturity' => 'required',
            'yield' => 'required|numeric',
            'seeds_measurement' => 'required',

        ]);
        $user_id = Auth::user()->id;

        $seedsexist = UserseedDetail::where('variety_id', $id)->where('user_id', $user_id)->first();
        $seed = Seeds::where('name', $request->seed_name)->first();
        if ($seedsexist) {

            $seedsexist->seed_name = $request->seed_name;
            $seedsexist->seed_id = $seed->id;
            $seedsexist->supplier_name = $request->supplier_id;
            $seedsexist->density = $request->density;
            $seedsexist->user_id = $user_id;
            $seedsexist->measurement = $request->measurement;
            $seedsexist->tray_size = $request->tray_size;
            $seedsexist->soak_status = $request->soak_status;
            $seedsexist->germination = $request->germination;
            $seedsexist->situation = $request->situation;
            $seedsexist->medium = $request->medium;
            $seedsexist->maturity = $request->maturity;
            $seedsexist->yield = $request->yield;
            $seedsexist->seeds_measurement = $request->seeds_measurement;
            $seedsexist->notes = $request->notes;
            $seedsexist->update();
        } else {
            $seedsdetail = new UserseedDetail();
            $seedsdetail->seed_name = $request->seed_name;
            $seedsdetail->seed_id = $seed->id;
            $seedsdetail->supplier_name = $request->supplier_id;
            $seedsdetail->density = $request->density;
            $seedsdetail->user_id = $user_id;
            $seedsdetail->measurement = $request->measurement;
            $seedsdetail->tray_size = $request->tray_size;
            $seedsdetail->soak_status = $request->soak_status;
            $seedsdetail->germination = $request->germination;
            $seedsdetail->situation = $request->situation;
            $seedsdetail->medium = $request->medium;
            $seedsdetail->maturity = $request->maturity;
            $seedsdetail->yield = $request->yield;
            $seedsdetail->seeds_measurement = $request->seeds_measurement;
            $seedsdetail->notes = $request->notes;
            $seedsdetail->save();
        }

        if ($request->notes != null) {
            $growNotes = new GrowNotes();
            $growNotes->seed_id = $seed->id;
            $growNotes->user_id = $user_id;
            $growNotes->notes = $request->notes;
            $growNotes->save();
        }
        Session::flash('flash_message', 'Seed(s) updated!');
        return redirect('/seed/edit/' . $id);

    }

    public function seedupdate(Request $request)
    {

        echo '<pre style="border:solid 1px red">';
        print_r($_POST);
        echo '</pre>';
exit;
        $this->validate($request, [
            'seed_name' => 'required',
            'supplier_id' => 'required',
            'density' => 'required',
            'measurement' => 'required',
            'tray_size' => 'required',
            'soak_status' => 'required',
            'germination' => 'required',
            'situation' => 'required',
            'medium' => 'required',
            'maturity' => 'required',
            'yield' => 'required|numeric',
            'seeds_measurement' => 'required',

        ]);

        $user_id = Auth::user()->id;
        $seedsexist = UserseedDetail::where('user_id', $user_id)->where('variety_id',$request->variety_id)->first();


        if ($seedsexist) {
            $seedsexist->seed_name = $request->seed_name;
            $seedsexist->variety_id = $request->variety_id;
            $seedsexist->supplier_id = $request->supplier_id;
            $seedsexist->density = $request->density;
            $seedsexist->user_id = $user_id;
            $seedsexist->measurement = $request->measurement;
            $seedsexist->tray_size = $request->tray_size;
            $seedsexist->soak_status = $request->soak_status;
            $seedsexist->germination = $request->germination;
            $seedsexist->situation = $request->situation;
            $seedsexist->medium = $request->medium;
            $seedsexist->maturity = $request->maturity;
            $seedsexist->yield = $request->yield;
            $seedsexist->seeds_measurement = $request->seeds_measurement;
            $seedsexist->notes = $request->notes;
            $seedsexist->update();
        } else {
            $seedsdetail = new UserseedDetail();
            $seedsdetail->seed_name = $request->seed_name;
            $seedsdetail->variety_id = $request->variety_id;
            $seedsdetail->supplier_id = $request->supplier_id;
            $seedsdetail->density = $request->density;
            $seedsdetail->user_id = $user_id;
            $seedsdetail->measurement = $request->measurement;
            $seedsdetail->tray_size = $request->tray_size;
            $seedsdetail->soak_status = $request->soak_status;
            $seedsdetail->germination = $request->germination;
            $seedsdetail->situation = $request->situation;
            $seedsdetail->medium = $request->medium;
            $seedsdetail->maturity = $request->maturity;
            $seedsdetail->yield = $request->yield;
            $seedsdetail->seeds_measurement = $request->seeds_measurement;
            $seedsdetail->notes = $request->notes;
            $seedsdetail->save();
        }

        if ($request->notes != null) {
            $growNotes = new GrowNotes();
            $growNotes->variety_id = $request->variety_id;
            $growNotes->user_id = $user_id;
            $growNotes->notes = $request->notes;
            $growNotes->save();
        }
        Session::flash('flash_message', 'Seed(s) added!');

        return redirect('/seed');

    }
}