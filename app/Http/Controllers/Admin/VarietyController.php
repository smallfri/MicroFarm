<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Variety;
use Session;
use Yajra\Datatables\Datatables;
use App\SeedsVariety;

class VarietyController extends Controller
{
    public function create(Request $request)
    {  
        return view('admin.variety.create');
    }

     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return void
     */
    public function store(Request $request)
    {
		$this->validate($request, [
            'name' => 'required'
        ]);
        $data = $request->all();
        $variety = Variety::create($data);
        Session::flash('flash_message', 'Variety added!');

        return redirect('admin/variety');
    }

    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index(Request $request)
    {
        return view('admin.variety.index');
        
    }

    public function datatable(request $request)
    {
        $variety = Variety::select('*')
           ->orderby('variety.id','desc'); 

        if ($request->has('filter_status') && $request->get('filter_status') != '' && $request->get('filter_status') != 'all') {
            $variety->where('variety.status', $request->get('filter_status'), 'OR');
        } 
         if($request->has('search') && $request->get('search') != '' ){
            $search = $request->get('search');
            if($search['value'] != ''){
                $value = $search['value'];
                $where_filter = "(variety.name LIKE  '%$value%')";
                $variety->whereRaw($where_filter);
            }
        }     


        $variety->groupBy('variety.id');

        return Datatables::of($variety)
            ->make(true);
        exit;
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return void
     */
    public function show(Request $request,$id)
    {   
        $variety = Variety::find($id);
        //change users status
        $status = $request->get('status');

        if(!empty($status)){
            if($status == 'active' ){
                $variety->status= 'inactive';
                $variety->update();            
                return redirect()->back();
            }else{
                $variety->status= 'active';
                $variety->update();               
                return redirect()->back();
            }

        }

        /* Check user is exist or not */
		if($variety){
            return view('admin.variety.show', compact('variety'));
        }
        else{
            return redirect('/admin/variety');
        }
    }

     /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return void
     */
    public function edit(Request $request,$id)
    {
        $request->id=$id;
		$variety = Variety::where('id',$id)->first();
		/* Check user is exist or not */
		if($variety){
             return view('admin.variety.edit', compact('variety'));
        }
        else{
            return redirect('/admin/variety');
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @param  \Illuminate\Http\Request $request
     *
     * @return void
     */
    public function update($id, Request $request)
    {
        $this->validate($request,[
            'name' => 'required'
        ]);
        $requestData = $request->all();              
        $variety = Variety::findOrFail($id);
     
        
	    $variety->update($requestData);
        flash('Variety Updated Successfully!');
		
        return redirect('admin/variety');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return void
     */
    public function destroy($id)
    {
        $variety = Variety::find($id);
        $seedvariety = SeedsVariety::where('variety_id',$id)->delete();  
		$variety->delete();
        $message='Deleted';
            return response()->json(['message'=>$message],200);
       
    } 

}
