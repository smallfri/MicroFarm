<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Setting;
use Session;
use Yajra\Datatables\Datatables;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index(Request $request)
    {
        $setting=Setting::first();
        return view('admin.setting.index',compact('setting'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create(Request $request)
    {
		return view('admin.setting.create');
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
            'email' => 'required',
            'facebook' => 'required',
            'contactno' => 'required',
            'address' => 'required',
        ]);
        $data = $request->all();
        $setting = Setting::create($data);
    
        Session::flash('flash_message', 'Setting added!');
        return redirect('admin/setting');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return void
     */

    public function edit(Request $request, $id)
    {
        $setting = Setting::where('id', $id)->first();
       
             return view('admin.setting.edit', compact('setting'));
        
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
         $this->validate($request, [
            'email' => 'required',
            'facebook' => 'required',
            'contactno' => 'required',
            'address' => 'required',
        ]);
        $requestData = $request->all();  
        $setting = Setting::findOrFail($id);
         $setting->update($requestData);
        Session::flash('flash_message', 'Setting Updated Successfully!');
        return redirect('admin/setting');
    }


    
}
