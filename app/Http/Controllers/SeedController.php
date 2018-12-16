<?php

namespace App\Http\Controllers;

use App\SeedsVariety;
use Illuminate\Http\Request;
use App\Seeds;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Userseed;
use App\Supplier;
use App\UserseedDetail;
use App\Days;
use App\GrowNotes;

class SeedController extends Controller
{
    public function index(Request $request)
    {
        if (!Auth::check()) {
            return redirect('login');
        }

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
                'userseeds_detail.maturity',
                'userseeds_detail.measurement',
                'userseeds_detail.soak_status',
                'userseeds_detail.germination',
                'userseeds_detail.medium',
                'userseeds_detail.yield',
                'userseeds_detail.seeds_measurement',
                DB::raw('CONCAT(seeds.name," ",seeds_variety.name) as seed_name'))
                ->where('userseed.user_id', $user_id)
                ->where('userseeds_detail.deleted_at', NULL)
                ->join('seeds_variety', 'seeds_variety.id', '=', 'userseed.variety_id')
                ->join('seeds', 'seeds.id', '=', 'seeds_variety.seed_id')
                ->leftJoin('userseeds_detail', 'userseeds_detail.variety_id', '=', 'seeds_variety.id')
                ->orderBy('seeds_variety.id', 'ASC')
                ->get();

//            dd($userseedlist);

            $suppliers = Supplier::pluck('name', 'id')->prepend('Select One', '0');

            $notes = GrowNotes::select('grow_notes.*', DB::raw("DATEDIFF('" . date('Y-m-d') . "' ,DATE(created_at)) AS days"))->where('user_id', $user_id)->where('variety_id', $userfirstseed->variety_id)->orderby('id', 'desc')->get();

            return view('layouts.seed.index', compact('userseedlist', 'days', 'suppliers', 'notes'));
        }

    }

    public function create(Request $request)
    {
        if (!Auth::check()) {
            return redirect('login');
        }
        $user_id = Auth::user()->id;
        $userseedlist = Userseed::select('variety_id')->where('user_id', $user_id)->get();

        $supplier = Supplier::pluck('name', 'id')->prepend('Select One', '0');
        $seed = Seeds::select('seeds_variety.id', 'seeds.name', 'seeds_variety.name as vname')->where('status', 'active')->join('seeds_variety', 'seeds_variety.seed_id', '=', 'seeds.id')->get();

        $count = count($seed);

        return view('layouts.seed.create', compact('seed', 'userseedlist', 'supplier', 'count'));
    }

    public function supplierseed(Request $request, $id)
    {
        if (!Auth::check()) {
            return redirect('login');
        }
        $user_id = Auth::user()->id;
        $supplier = Supplier::where('status', 'active')->pluck('name', 'id')->prepend('All', '0');
        if ($id > 0) {

            $seed = Seeds::select(
                'seeds_variety.id',
                'seeds.name',
                'seeds_variety.name as vname',
                'seeds_variety.supplier_id as supplier_id'
            )->where([['status', '=', 'active'], ['supplier_id', '=', $id]])
                ->join('seeds_variety', 'seeds_variety.seed_id', '=', 'seeds.id')
                ->get();

        } else {
            $seed = Seeds::select(
                'seeds_variety.id',
                'seeds.name',
                'seeds_variety.name as vname',
                'seeds_variety.supplier_id as supplier_id'
            )->where([['status', '=', 'active']])->join('seeds_variety', 'seeds_variety.seed_id', '=', 'seeds.id')->get();
        }
        $allseed = SeedsVariety::with('seedname')->get();
        return response()->json(['seed' => $seed, 'allseed' => $allseed, 'count' => count($seed)], 200);
    }

    public function store(Request $request)
    {
        if (!Auth::check()) {
            return redirect('login');
        }

        $rules = [
            'variety_id' => 'required|min:1'
        ];

        $customMessages = [
            'variety_id.required' => 'Please Select At least 1 Checkbox',
        ];

        $this->validate($request, $rules, $customMessages);
        $user_id = Auth::user()->id;
        if (!empty($request->input('variety_id'))) {

            $userseed = DB::raw('
                DELETE userseed
                FROM userseed
                INNER JOIN seeds_variety ON seeds_variety.id = userseed.variety_id
                WHERE userseed.user_id = ' . $user_id . ' AND seeds_variety.supplier_id = ?'
            );
            $status = \DB::delete($userseed, array($request->input("supplier")));


            foreach ($request->input('variety_id') as $variety_id) {

                $userseed = Userseed::firstOrCreate(['user_id' => $user_id, 'variety_id' => $variety_id]);

            }

            Session::flash('flash_message', 'Seed added!');

            return redirect('/seed');
        }
    }


    public function seedupdate(Request $request)
    {
        if (!Auth::check()) {
            return redirect('login');
        }

//        $validatedData = $request->validate([
//            'seed_name' => 'required|max:255',
//            'supplier_id' => 'required',
//            'measurement' => 'required',
//            'tray_size' => 'required',
//            'soak_status' => 'required',
//            'germination' => 'required',
//            'situation' => 'required',
//            'medium' => 'required',
//            'maturity' => 'required',
//            'seeds_measurement' => 'required',
//        ]);
        $user_id = Auth::user()->id;
        $seedsexist = UserseedDetail::where('user_id', $user_id)->where('variety_id', $request->variety_id)->first();

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

            if ($request->notes != null) {
                $growNotes = new GrowNotes();
                $growNotes->variety_id = $request->variety_id;
                $growNotes->user_id = $user_id;
                $growNotes->notes = $request->notes;
                $growNotes->save();
            }
            return redirect()->back()->with('message-success', 'Seed(s) updated!');

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

            if ($request->notes != null) {
                $growNotes = new GrowNotes();
                $growNotes->variety_id = $request->variety_id;
                $growNotes->user_id = $user_id;
                $growNotes->notes = $request->notes;
                $growNotes->save();
            }
            return redirect()->back()->with('message-success', 'Seed(s) added!');
        }
    }

    public function seedDetail(Request $request)
    {
        if (!Auth::check()) {
            return redirect('login');
        }

//        $validatedData = $request->validate([
//            'seed_name' => 'required|max:255',
//            'supplier_id' => 'required',
//            'measurement' => 'required',
//            'tray_size' => 'required',
//            'soak_status' => 'required',
//            'germination' => 'required',
//            'situation' => 'required',
//            'medium' => 'required',
//            'maturity' => 'required',
//            'seeds_measurement' => 'required',
//        ]);
        $user_id = Auth::user()->id;
        $seedsexist = UserseedDetail::where('user_id', $user_id)->where('variety_id', $request->variety_id)->first();

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

            if ($request->notes != null) {
                $growNotes = new GrowNotes();
                $growNotes->variety_id = $request->variety_id;
                $growNotes->user_id = $user_id;
                $growNotes->notes = $request->notes;
                $growNotes->save();
            }
            return redirect()->back()->with('message-success', 'Seed(s) updated!');

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

            if ($request->notes != null) {
                $growNotes = new GrowNotes();
                $growNotes->variety_id = $request->variety_id;
                $growNotes->user_id = $user_id;
                $growNotes->notes = $request->notes;
                $growNotes->save();
            }
            return redirect()->back()->with('message-success', 'Seed(s) added!');
        }
    }

    public function seedSummary()
    {
        if (!Auth::check()) {
            return redirect('login');
        }

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
                'userseeds_detail.maturity',
                'userseeds_detail.measurement',
                'userseeds_detail.soak_status',
                'userseeds_detail.germination',
                'userseeds_detail.medium',
                'userseeds_detail.yield',
                'userseeds_detail.seeds_measurement',
                DB::raw('CONCAT(seeds.name," ",seeds_variety.name) as seed_name'))
                ->where('userseed.user_id', $user_id)
                ->where('userseeds_detail.deleted_at', NULL)
                ->join('seeds_variety', 'seeds_variety.id', '=', 'userseed.variety_id')
                ->join('seeds', 'seeds.id', '=', 'seeds_variety.seed_id')
                ->leftJoin('userseeds_detail', 'userseeds_detail.variety_id', '=', 'seeds_variety.id')
                ->orderBy('seeds_variety.id', 'ASC')
                ->get();

//            dd($userseedlist);

            $suppliers = Supplier::pluck('name', 'id')->prepend('Select One', '0');

            $notes = GrowNotes::select('grow_notes.*', DB::raw("DATEDIFF('" . date('Y-m-d') . "' ,DATE(created_at)) AS days"))->where('user_id', $user_id)->where('variety_id', $userfirstseed->variety_id)->orderby('id', 'desc')->get();

            return view('layouts.seed.summary', compact('userseedlist', 'days', 'suppliers', 'notes'));
        }
    }

    public function summaryUpdate(Request $request)
    {

        if (!Auth::check()) {
            return redirect('login');
        }

        $user_id = Auth::user()->id;
        $seedsexist = UserseedDetail::where('user_id', $user_id)->where('variety_id', $request->variety_id)->first();


        if ($seedsexist) {
            $seedsexist->density = $request->density;
            $seedsexist->seeds_measurement = $request->seeds_measurement;
            $seedsexist->maturity = $request->maturity;
            $seedsexist->yield = $request->yield;
            $seedsexist->measurement = $request->measurement;
            $seedsexist->supplier_id = $request->supplier_id;
            $seedsexist->update();

            return '{"status":"success"}';
        } else {
            $seedsdetail = new UserseedDetail();
            $seedsdetail->density = $request->density;
            $seedsdetail->seeds_measurement = $request->seeds_measurement;
            $seedsdetail->variety_id = $request->variety_id;
            $seedsdetail->maturity = $request->maturity;
            $seedsdetail->yield = $request->yield;
            $seedsdetail->measurement = $request->measurement;
            $seedsdetail->supplier_id = $request->supplier_id;
            $seedsdetail->user_id = $user_id;
            $seedsdetail->save();

            if ($seedsdetail->id < 0) {
                return '{"status":"failed"}';
            }

            return '{"status":"success"}';
        }

    }

    public function summaryDelete(Request $request)
    {
        if (!Auth::check()) {
            return redirect('login');
        }

        $user_id = Auth::user()->id;
        $seedsexist = UserseedDetail::where('user_id', $user_id)->where('variety_id', $request->variety_id)->where('deleted_at', NULL)->first();

        if ($seedsexist) {
            $seedsexist->deleted_at = date("Y-m-d H:i:s");
            $seedsexist->update();

            return '{"status":"success"}';

        }
        return '{"status":"failed"}';

    }

    public function summaryDeleteAll(Request $request)
    {
        if (!Auth::check()) {
            return redirect('login');
        }

        $user_id = Auth::user()->id;
        $seedsDetailExist = UserseedDetail::where('user_id', $user_id)->where('variety_id', $request->variety_id)->where('deleted_at', NULL)->first();
        $seedsExist = Userseed::where('user_id', $user_id)->where('variety_id', $request->variety_id)->where('deleted_at', NULL)->first();

        if ($user_id) {

            if ($seedsDetailExist) {
                $seedsDetailExist->deleted_at = date("Y-m-d H:i:s");
                $seedsDetailExist->update();
            }

            if ($seedsExist) {
                $seedsExist->deleted_at = date("Y-m-d H:i:s");
                $seedsExist->update();
            }

            return '{"status":"success"}';

        }
        return '{"status":"failed"}';

    }

    public function rules()
    {
        return [
            'variety_id' => 'required',
        ];
    }

}