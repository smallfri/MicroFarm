<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Supplier;
use Session;
use App\SeedSupplier;
use Yajra\Datatables\Datatables;

class SupplierController extends Controller
{
    public function create(Request $request)
    {  
        return view('admin.supplier.create');
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
        $supplier = Supplier::create($data);
        Session::flash('flash_message', 'Supplier added!');

        return redirect('admin/supplier');
    }

    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index(Request $request)
    {
        return view('admin.supplier.index');
        
    }

    public function datatable(request $request)
    {
        $supplier = Supplier::select('*')
           ->orderby('supplier.id','desc');                 
    
         if($request->has('search') && $request->get('search') != '' ){
            $search = $request->get('search');
            if($search['value'] != ''){
                $value = $search['value'];
                $where_filter = "(supplier.name LIKE  '%$value%')";
                $supplier->whereRaw($where_filter);
            }
        }     


        $supplier->groupBy('supplier.id');

        return Datatables::of($supplier)
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
        $supplier = Supplier::find($id);
        /* Check user is exist or not */
		if($supplier){
            return view('admin.supplier.show', compact('supplier'));
        }
        else{
            return redirect('/admin/supplier');
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
		$supplier = Supplier::where('id',$id)->first();
		/* Check user is exist or not */
		if($supplier){
             return view('admin.supplier.edit', compact('supplier'));
        }
        else{
            return redirect('/admin/supplier');
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
        $supplier = Supplier::findOrFail($id);
     
        
	    $supplier->update($requestData);
        flash('Supplier Updated Successfully!');
		
        return redirect('admin/supplier');
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
       
        $seedsupplier = SeedSupplier::where('supplier_id',$id)->first();
        $supplier = Supplier::find($id);
        if(!$seedsupplier){
           $supplier->delete();
           $message='Deleted';
        return response()->json(['message'=>$message],200);
        }else{
             $message='Not Deleted! Supplier is exist in Seed';
            return response()->json(['message'=>$message],400);
        }
        
       
       
    }  
}
