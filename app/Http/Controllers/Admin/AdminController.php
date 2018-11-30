<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Permission;
use App\Role;
use Illuminate\Http\Request;
use Session;

use Dedicated\GoogleTranslate\Translator;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index()
    {
       return view('admin.dashboard');
    }

    /**
     * Display given permissions to role.
     *
     * @return void
     */
    public function getGiveRolePermissions()
    {
        $roles = Role::with('permissions')->get();
//        return $roles;
        $permissions = Permission::with('child')->parent()->get();
        return view('admin.permissions.role-give-permissions', compact('roles', 'permissions'));
    }

    /**
     * Store given permissions to role.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return void
     */
    public function postGiveRolePermissions(Request $request)
    {
        $this->validate($request, ['role' => 'required', 'permissions' => 'required']);
        $role = Role::with('permissions')->whereName($request->role)->first();
        $role->permissions()->detach();
        foreach ($request->permissions as $permission_name) {
            $permission = Permission::whereName($permission_name)->first();
            $role->givePermissionTo($permission);
        }
        Session::flash('flash_success', _('Permission granted!'));
        return redirect('admin/roles');
    }

    public function getLangTranslation($to,Request $request){
        if (!$request->has('filename')) {
            echo "not valid file "; exit;
        }
        \App::setLocale('en');
        $langs = \Lang::get($request->filename);
        print "--------------------------------".$request->filename."-------------------------------------------<br><br><br>";
        foreach ($langs as $key=>$val){
            if(is_array($val)){
                foreach ($val as $k=>$s){
                    if(is_array($s)){
                        foreach ($s as $d=>$j){
                            if(!is_array($j)) $langs[$key][$k][$d] = $this->doTranslator('en',$to,$j);
                        }

                    }else{
                        $langs[$key][$k] = $this->doTranslator('en',$to,$s);
                    }

                }
            }else{
                $langs[$key] = $this->doTranslator('en',$to,$val);
            }
        }
        print "<pre>";
        var_export($langs);
        print "<br><br><br>---------------------------------------------------------------------------";
        exit;
    }

    public function doTranslator($from,$to,$data){
        $translator = new Translator;
        try{
            $data = $translator->setSourceLang($from)
                ->setTargetLang($to)
                ->translate($data);

        }catch (\Exception $e){
            //$desc =  $e->getMessage();
        }
        return html_entity_decode($data, ENT_QUOTES, "utf-8");
    }

    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function adminlist(Request $request)
    {
        /* $customer_id = "";
        if($request->has('customer_id') && $request->get('customer_id') != "" ){

            $customer_id = $request->get('customer_id');
        }
 */
        $role = Role::pluck('label', 'id')->prepend('Filter Users by Roles', '');
       
        return view('admin.admin.list', compact('role'));
    }

    public function datatable(request $request)
    {
        $user = User::select('users.*','roles.name as role_name','roles.id as role_id','roles.label as role_label')
            ->join('role_user', 'users.id', '=', 'role_user.user_id')
            ->join('roles', 'roles.id', '=', 'role_user.role_id');         

        if ($request->has('filter_role') && $request->get('filter_role') != '') {
            $user->where('roles.id', $request->get('filter_role'),'OR');
        }
         if ($request->has('filter_status') && $request->get('filter_status') != '' && $request->get('filter_status') != 'all') {
            $user->where('users.status', $request->get('filter_status'), 'OR');
        }  
         if($request->has('search') && $request->get('search') != '' ){
            $search = $request->get('search');
            if($search['value'] != ''){
                $value = $search['value'];
                $where_filter = "(users.name LIKE  '%$value%' OR users.email LIKE  '%$value%'  )";
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
        
        $roles = Role::where('name','EMP');
        $roles = $roles->pluck('label', 'name');
        $role = $request->role;
        
        return view('admin.admin.create', compact('roles'));
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
            'password' => 'required',
            'roles' => 'required',
            
        ]);
		
        $data = $request->except('password');
        $data['password'] = bcrypt($request->password);
		$data['status'] = 'active';
        $user = User::create($data);
		
        $user->assignRole($request->roles);
       

        Session::flash('flash_message', 'Admin added!');

        return redirect('admin/list');
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

        //notification
        if(\Auth::check()){

            if(\Auth::user()->roles[0]->name == "SU"){
                //if user is added by admin, notification send to all backoffice

                $cbb = Role::Where('name','SU')->get();

                if($cbb != ""){
                    foreach($cbb as $roles){
                        foreach($roles->users as $cbbuser){
                            $user_id[] = $cbbuser->id ;
                        } 
                    }
                }
                $users = User::whereIN('id',$user_id)->get();

            }else{

                //if user is added by any backoffice then notification send to admin
                $su = Role::Where('name','SU')->get();

                if($su != ""){
                    foreach($su as $roles){
                        foreach($roles->users as $su_user){
                            $user_id[] = $su_user->id ;
                        } 
                    }
                }
                $users = User::whereIN('id',$user_id)->get();

            }
			
        }

        $user = User::findOrFail($id);
        
        //change users status
        $status = $request->get('status');
        if(!empty($status)){
            if($status == 'active' ){
                $user->status= 'inactive';
                $user->update();            

                return redirect()->back();
            }else{
                $user->user_status= 'active';
                $user->update();               
                return redirect()->back();
            }

        }

        return view('admin.users.show', compact('user'));
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
		$roles = Role::where('name','EMP');
        $roles = $roles->pluck('label', 'name');
		$user = User::where('id',$id)->first();

        return view('admin.users.edit', compact('user', 'roles'));

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
            
            'name' => 'required',
            'email' => 'required|unique:users,email,' . $id
        ]);
        $requestData = $request->all();              
        $user = User::findOrFail($id);
	    $user->update($requestData);
        $user->roles()->detach();
        $user->assignRole($request->roles);

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

        return redirect('admin/users');
    }  
}
