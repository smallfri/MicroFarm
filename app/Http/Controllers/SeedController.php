<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Seeds;
use Session;
use App\Userseed;
use App\Supplier;
use App\SeedSupplier;
use App\SeedsDetail;
use App\UserseedDetail;
use App\Days;
use App\GrowNotes;
use Auth;
use DB;

class SeedController extends Controller
{
    public function index(Request $request)
    {
        $user_id=Auth::user()->id;
        $days = Days::pluck('name','id'); 
      
        $userfirstseed=Userseed::where('user_id',$user_id)->first();

        if(!$userfirstseed){ 
			return redirect('/Dashboard');
			
		}else{
			$userseedlist=Userseed::where('user_id',$user_id)->get();
			$checkuserseedexist=UserseedDetail::where('user_userseed_id','=',$user_id)->where('seed_id','=',$userfirstseed->user_seed_id)->with('germinationDays','maturityDays')->first();
			if($checkuserseedexist){
			   $userseeddetail=UserseedDetail::where('user_userseed_id','=',$user_id)->where('seed_id','=',$userfirstseed->user_seed_id)->with('germinationDays','maturityDays','seedsupplierName')->first();
			}else{
			   $userseeddetail=SeedsDetail::where('seed_id','=',$userfirstseed->user_seed_id)->with('germinationDays','maturityDays','userseedName','seedsupplierName')->first();
            }
            $notes= GrowNotes::select('grow_notes.*',DB::raw("DATEDIFF('".date('Y-m-d')."' ,DATE(created_at)) AS days"))->where('user_id',$user_id)->orderby('id','desc')->get();
            
            return view('user-backend.seed.index',compact('userseedlist','days','userseeddetail','notes'));
		}
       
    }
    public function create(Request $request){
        $user_id=Auth::user()->id;
        $userseed=Userseed::select('user_seed_id')->where('user_id',$user_id)->get();
        $supplier=Supplier::where('status','active')->pluck('name','id')->prepend('All','0'); 
        $seed=Seeds::where('status','active')->get();
        return view('user-backend.seed.create',compact('seed','userseed','supplier'));
    }
    public function supplierseed(Request $request,$id){
       $user_id=Auth::user()->id;
        $supplier=Supplier::where('status','active')->pluck('name','id')->prepend('All','0');
        if($id>0) {
              $seed=SeedSupplier::where('supplier_id',$id)->with('seedname')->get();
        }     
        else{
              $seed=SeedSupplier::with('seedname')->get();
        }
        $allseed=SeedSupplier::with('seedname')->get();
        return response()->json(['seed'=>$seed,'allseed'=>$allseed],200);
    }
    public function store(Request $request)
    {
       
		$rules = [
        'user_seed_id' => 'required|min:1'
         ];

        $customMessages = [
            'user_seed_id.required' => 'Please Select Atleast 1 Checkbox',
        ];

        $this->validate($request, $rules, $customMessages);
		$data = $request->all();
        $user_id=Auth::user()->id;
        if(!empty($request->input('user_seed_id'))){
            $userseed=Userseed::where('user_id',$user_id)->delete();
            foreach($request->input('user_seed_id') as $user_seed_id){

                    $userseed = new Userseed();
                    $userseed->user_id = $user_id;
                    $userseed->user_seed_id = $user_seed_id;
                    $userseed->save();
            }
                        
            Session::flash('flash_message', 'Seed added!');

            return redirect('/seed');
        }
    }
    public function edit(Request $request,$id)
    {
        $user_id=Auth::user()->id;
        $days = Days::pluck('name','id'); 
        $userseedlist=Userseed::where('user_id',$user_id)->get();
        $checkuserseedexist=UserseedDetail::where('seed_id','=',$id)->where('user_userseed_id','=',$user_id)->with('germinationDays','maturityDays')->first();
        if($checkuserseedexist){
           $userseeddetail=UserseedDetail::where('seed_id',$id)->where('user_userseed_id',$user_id)->with('germinationDays','maturityDays','seedsupplierName')->first();
        }else{
           $userseeddetail=SeedsDetail::where('seed_id',$id)->with('germinationDays','maturityDays','userseedName','seedsupplierName')->first();
        }
        $checkuserseedexist=Userseed::where('user_id',$user_id)->where('user_seed_id',$id)->first();
        $notes= GrowNotes::select('grow_notes.*',DB::raw("DATEDIFF('".date('Y-m-d')."' ,DATE(created_at)) AS days"))->where('user_id',$user_id)->where('seed_id',$id)->orderby('id','desc')->get();        
        
        if($checkuserseedexist){
			
        return view('user-backend.seed.editseed',compact('userseeddetail','days','userseedlist','id','notes'));
		}else{
			 return redirect('/seed');
		}
	
    }
    public function update(Request $request,$id)
    {
      $this->validate($request,[
           'seed_name'=>'required',
           'supplier_name'=>'required',
            'density'=>'required',
            'measurement'=>'required',
            'tray_size'=>'required',
            'soak_status'=>'required',
            'germination'=>'required',
            'situation'=>'required',
            'medium'=>'required',
            'maturity'=>'required',
            'yield'=>'required|numeric',
            'seeds_measurement'=>'required',
            
        ]);
        $user_id=Auth::user()->id; 
              
        $seedsexist = UserseedDetail::where('seed_id',$id)->where('user_userseed_id',$user_id)->first(); 
		 $seed = Seeds::where('name',$request->seed_name)->first(); 
        if($seedsexist){   
     
            $seedsexist->seed_name=$request->seed_name;
            $seedsexist->seed_id=$seed->id;
            $seedsexist->supplier_name=$request->supplier_id;
            $seedsexist->density=$request->density;
            $seedsexist->user_userseed_id=$user_id;
            $seedsexist->measurement=$request->measurement;
            $seedsexist->tray_size=$request->tray_size;
            $seedsexist->soak_status=$request->soak_status;
            $seedsexist->germination=$request->germination;
            $seedsexist->situation=$request->situation;
            $seedsexist->medium=$request->medium;
            $seedsexist->maturity=$request->maturity;
            $seedsexist->yield=$request->yield;
            $seedsexist->seeds_measurement=$request->seeds_measurement;
            $seedsexist->notes=$request->notes;
            $seedsexist->update();
        }else{
            $seedsdetail = new UserseedDetail();          
            $seedsdetail->seed_name=$request->seed_name;
            $seedsdetail->seed_id=$seed->id;
            $seedsdetail->supplier_name=$request->supplier_id;
            $seedsdetail->density=$request->density;
            $seedsdetail->user_userseed_id=$user_id;
            $seedsdetail->measurement=$request->measurement;
            $seedsdetail->tray_size=$request->tray_size;
            $seedsdetail->soak_status=$request->soak_status;
            $seedsdetail->germination=$request->germination;
            $seedsdetail->situation=$request->situation;
            $seedsdetail->medium=$request->medium;
            $seedsdetail->maturity=$request->maturity;
            $seedsdetail->yield=$request->yield;
            $seedsdetail->seeds_measurement=$request->seeds_measurement;
            $seedsdetail->notes=$request->notes;
            $seedsdetail->save();
        }

        if($request->notes != null)
        {
            $growNotes = new GrowNotes();
            $growNotes->seed_id = $seed->id;
            $growNotes->user_id = $user_id;
            $growNotes->notes = $request->notes;
            $growNotes->save();
        }
            Session::flash('flash_message', 'Seed added!');
            return redirect('/seed/edit/'.$id);
               
    }

    public function seedupdate(Request $request)
    {
      $this->validate($request,[
           'seed_name'=>'required',
           'supplier_name'=>'required',
            'density'=>'required',
            'measurement'=>'required',
            'tray_size'=>'required',
            'soak_status'=>'required',
            'germination'=>'required',
            'situation'=>'required',
            'medium'=>'required',
            'maturity'=>'required',
            'notes'=>'required',
            'yield'=>'required|numeric',
            'seeds_measurement'=>'required',
            
        ]);
        $user_id=Auth::user()->id; 
        $seedsexist = UserseedDetail::where('user_userseed_id',$user_id)->first();        
		 $seed = Seeds::where('name',$request->seed_name)->first(); 
        if($seedsexist){        
            $seedsexist->seed_name=$request->seed_name;
            $seedsexist->seed_id=$seed->id;
            $seedsexist->supplier_name=$request->supplier_id;
            $seedsexist->density=$request->density;
            $seedsexist->user_userseed_id=$user_id;
            $seedsexist->measurement=$request->measurement;
            $seedsexist->tray_size=$request->tray_size;
            $seedsexist->soak_status=$request->soak_status;
            $seedsexist->germination=$request->germination;
            $seedsexist->situation=$request->situation;
            $seedsexist->medium=$request->medium;
            $seedsexist->maturity=$request->maturity;
            $seedsexist->yield=$request->yield;
            $seedsexist->seeds_measurement=$request->seeds_measurement;
            $seedsexist->notes=$request->notes;
            $seedsexist->update();
        }else{
            $seedsdetail = new UserseedDetail();          
            $seedsdetail->seed_name=$request->seed_name;
            $seedsdetail->seed_id=$seed->id;
            $seedsdetail->supplier_name=$request->supplier_id;
            $seedsdetail->density=$request->density;
            $seedsdetail->user_userseed_id=$user_id;
            $seedsdetail->measurement=$request->measurement;
            $seedsdetail->tray_size=$request->tray_size;
            $seedsdetail->soak_status=$request->soak_status;
            $seedsdetail->germination=$request->germination;
            $seedsdetail->situation=$request->situation;
            $seedsdetail->medium=$request->medium;
            $seedsdetail->maturity=$request->maturity;
            $seedsdetail->yield=$request->yield;
            $seedsdetail->seeds_measurement=$request->seeds_measurement;
            $seedsdetail->notes=$request->notes;
            $seedsdetail->save();
        }
            
        if($request->notes != null)
        {
            $growNotes = new GrowNotes();
            $growNotes->seed_id = $seed->id;
            $growNotes->user_id = $user_id;
            $growNotes->notes = $request->notes;
            $growNotes->save();
        }
            Session::flash('flash_message', 'Seed added!');

                return redirect('/seed');
               
    }
}