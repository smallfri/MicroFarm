<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\Datatables\Datatables;
use App\SeedsDetail;
use App\Seeds;
use App\Days;
use App\Variety;
use App\SeedsVariety;
use App\Supplier;
use App\SeedSupplier;
use App\Userseed;
use App\UserseedDetail;
use Session;

class SeedsdetailController extends Controller
{
     public function index(Request $request)
    {
        return view('admin.seeds.index');
    }

    public function datatable(request $request)
    {
        $seeds = Seeds::orderby('id','desc');                     
         if($request->has('search') && $request->get('search') != '' ){
            $search = $request->get('search');
            if($search['value'] != ''){
                $value = $search['value'];
                $where_filter = "(name LIKE  '%$value%' OR density LIKE  '%$value%' OR measurement LIKE  '%$value%')";
                $seeds->whereRaw($where_filter);
            }
        }    
        return Datatables::of($seeds)
            ->make(true);
        exit;
    }

    public function show(Request $request,$id)
    {   
        $seeds = Seeds::find($id);
        
        //change users status
        $status = $request->get('status');

        if(!empty($status)){
            if($status == 'active' ){
                $seeds->status= 'inactive';
                $seeds->update();   
                $userseed=Userseed::where('user_seed_id','=',$id)->delete();
                $userseeddetail=UserseedDetail::where('seed_id','=',$id)->delete();				
                return redirect()->back();
            }else{
                $seeds->status= 'active';
                $seeds->update();               
                return redirect()->back();
            }

        }
		
    }

    public function edit(Request $request,$id)
    {
        $request->id=$id;
        $days = Days::pluck('name','id'); 
        $supplier=Supplier::where('status','active')->pluck('name','id')->prepend('Select Supplier',''); 
		$seeds = Seeds::where('id',$id)->first();
        $seedsdetail = SeedsDetail::with('germinationDays','maturityDays')->where('seed_id',$id)->first();
		$seedvariety = SeedsVariety::where('seed_id',$id)->get();
        $seedsupplier = SeedSupplier::where('supplier_seed_id',$id)->first();
        $variety = Variety::where('status','active')->get(); 
        //dd($seedsdetail);
        /* Check seed is exist or not */
		if($seeds){
             return view('admin.seeds.edit', compact('seeds','seedsdetail','days','seedvariety','variety','supplier','seedsupplier'));
        }
        else{
            return redirect('/admin/seeds');
        }

    }
    public function update($id, Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
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
           // 'variety'=>'required',
            'supplier_id'=>'required',
            'seeds_measurement'=>'required'
           
        ]);
                    
        
        $seedsdetail = SeedsDetail::where('seed_id','=',$id)->first();          
  $seeds = Seeds::find($id);
         //if(!empty($request->input('variety'))){
             if(!empty($request->input('supplier_id'))){
              
                $seeds->name=$request->name;
                $seeds->density=$request->density;
                $seeds->tray_size=$request->tray_size;
                $seeds->measurement=$request->measurement;
                 $seeds->save();
                $seedsupplier=SeedSupplier::where('supplier_seed_id',$id)->first();
                $seedsupplier->supplier_id=$request->supplier_id;
                $seedsupplier->save();
                $seedsdetail->soak_status=$request->soak_status;
                $seedsdetail->seed_id= $seeds->id;
                $seedsdetail->germination=$request->germination;
                $seedsdetail->situation=$request->situation;
                $seedsdetail->medium=$request->medium;
                $seedsdetail->maturity=$request->maturity;
                $seedsdetail->yield=$request->yield;
                $seedsdetail->seeds_measurement=$request->seeds_measurement;
                $seedsdetail->notes=$request->notes;
                $seedsdetail->save();
                $seedsvariety = SeedsVariety::where('seed_id',$id);
                $seedsvariety->delete();
                // foreach($request->input('variety') as $variety_id){

                //         $variety = new SeedsVariety();
                //         $variety->seed_id = $seeds->id;
                //         $variety->variety_id = $variety_id;
                //         $variety->save();
                // }
             }
        //}
        flash('Seed Updated Successfully!');
		
        return redirect('admin/seeds');
    }
    public function create(Request $request){
         $days = Days::pluck('name','id')->prepend('Select Days',''); 
         $variety = Variety::where('status','active')->get(); 
         $supplier=Supplier::where('status','active')->pluck('name','id')->prepend('Select Supplier',''); 
         return view('admin.seeds.create',compact('days','variety','supplier'));
    }

    public function store(Request $request){
        $this->validate($request, [
            'name' => 'required|unique:seeds',
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
            //'variety'=>'required',
            'supplier_id'=>'required',
            'seeds_measurement'=>'required'
        ]);

        // if(!empty($request->input('variety'))){
             if(!empty($request->input('supplier_id'))){
            $seeds=new Seeds;
            $seeds->name=$request->name;
            $seeds->density=$request->density;
            $seeds->tray_size=$request->tray_size;
            $seeds->measurement=$request->measurement;
            $seeds->save();
            $seedsupplier=new SeedSupplier;
            $seedsupplier->supplier_seed_id=$seeds->id;
            $seedsupplier->supplier_id=$request->supplier_id;
            $seedsupplier->save();
            $seedsdetail = new SeedsDetail();         
            $seedsdetail->soak_status=$request->soak_status;
            $seedsdetail->seed_id= $seeds->id;
            $seedsdetail->germination=$request->germination;
            $seedsdetail->situation=$request->situation;
            $seedsdetail->medium=$request->medium;
            $seedsdetail->maturity=$request->maturity;
            $seedsdetail->yield=$request->yield;
            $seedsdetail->seeds_measurement=$request->seeds_measurement;
            $seedsdetail->notes=$request->notes;
            $seedsdetail->save();
                // foreach($request->input('variety') as $variety_id){

                //         $variety = new SeedsVariety();
                //         $variety->seed_id = $seeds->id;
                //         $variety->variety_id = $variety_id;
                //         $variety->save();
                // }
             }
        //}
                
        Session::flash('flash_message', 'Seeds added!');

        return redirect('admin/seeds');
    }

     public function destroy($id)
    {
       
        $seeds = Seeds::find($id);
        $seedsdetail=SeedsDetail::where('seed_id','=',$id)->delete();
		 $userseed=Userseed::where('user_seed_id','=',$id)->delete();
		  $userseeddetail=UserseedDetail::where('seed_id','=',$id)->delete();
		
        $seeds->delete();
        $message='Deleted';
        return response()->json(['message'=>$message],200);
    }  
}
