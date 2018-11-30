<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Role;
use App\User;
use Yajra\Datatables\Datatables;
use DB;
use Illuminate\Http\Request;
use Session;
use Auth;


class UsersController extends Controller

{

    public function __construct()
    {
        // $this->middleware('permission:access.users');
        // $this->middleware('permission:access.user.edit')->only(['edit', 'update']);
        // $this->middleware('permission:access.user.create')->only(['create', 'store']);
        // $this->middleware('permission:access.user.delete')->only('destroy');
    }


    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index(Request $request)
    {
        if(Auth::user()->hasRole('SU')){
        $role = Role::pluck('label', 'id')->prepend('Filter Users by Roles', '');
        return view('admin.users.index', compact('role'));
        }else{
             return redirect('/');
        }
    }

    public function datatable(request $request)
    {
        $user_id=Auth::user()->id;
        $user = User::where('id','!=',$user_id)->select('*')
           ->orderby('users.id','desc');         

        
        if ($request->has('filter_status') && $request->get('filter_status') != '' && $request->get('filter_status') != 'all') {
            $user->where('users.status', $request->get('filter_status'), 'OR');
        }  
         if($request->has('search') && $request->get('search') != '' ){
            $search = $request->get('search');
            if($search['value'] != ''){
                $value = $search['value'];
                $where_filter = "(users.name LIKE  '%$value%'  OR users.email LIKE  '%$value%'  )";
                $user->whereRaw($where_filter);
            }
        }     


        $user->groupBy('users.id');

        return Datatables::of($user)
            ->make(true);
        exit;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create(Request $request)
    {  
        return view('admin.users.create');
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
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required'
            
        ]);
        $data = $request->except('password');
        $data['password'] = bcrypt($request->password);
        $user = User::create($data);
		

        $user->assignRole('USER');

        Session::flash('flash_message', 'User added!');

        return redirect('admin/users');
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
        $user = User::find($id);
        
        //change users status
        $status = $request->get('status');

        if(!empty($status)){
            if($status == 'active' ){
                $user->status= 'inactive';
                $user->update();            
                return redirect()->back();
            }else{
                $user->status= 'active';
                $user->update();               
                return redirect()->back();
            }

        }
		/* Check user is exist or not */
		if($user){
            return view('admin.users.show', compact('user'));
        }
        else{
            return redirect('/admin/users');
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
		$user = User::where('id',$id)->first();
		/* Check user is exist or not */
		if($user){
             return view('admin.users.edit', compact('user', 'country'));
        }
        else{
            return redirect('/admin/users');
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
        $user = User::findOrFail($id);
     
        if ($request->image) {
            $image = $request->image;              
            $filename = uniqid(time()) . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('UserProfile'), $filename);
            $requestData['image'] = url('UserProfile').'/'.$filename;
        }
	    $user->update($requestData);
        flash('User Updated Successfully!');
		
        return redirect('admin/users');
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
       
        $user = User::find($id);
        $user->delete();
        $message='Deleted';
        return response()->json(['message'=>$message],200);
    }  
    
}
