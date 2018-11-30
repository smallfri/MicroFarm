<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Role;
use DebugBar\DebugBar;
use Illuminate\Http\Request;
use Session;
use App\Permission;
use Yajra\Datatables\Datatables;

class RolesController extends Controller
{


    public function __construct()
    {
        $this->middleware('permission:access.roles');
        $this->middleware('permission:access.role.edit')->only(['edit', 'update']);
        $this->middleware('permission:access.role.create')->only(['create', 'store']);
        $this->middleware('permission:access.role.delete')->only('destroy');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        /*
        $keyword = $request->get('search');
        $perPage = 15;

        if (!empty($keyword)) {
            $roles = Role::where('name', 'LIKE', "%$keyword%")->orWhere('label', 'LIKE', "%$keyword%")
                ->lower()->paginate($perPage);
        } else {
            $roles = Role::paginate($perPage);
        }
        */

        return view('admin.roles.index');
    }
    public function datatable(){
        $roles = Role::all();
        return Datatables::of($roles)
            ->make(true);
            exit;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {
        $permissions = Permission::with('child')->parent()->get();

        $isChecked = function ($name) {
            return '';
        };

        return view('admin.roles.create', compact('permissions', 'isChecked'));
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
        $this->validate($request, ['name' => 'required', 'permissions' => 'required']);

        $requestData = $request->all();


        

        if ($request->file('icon')) {
            
                        $icon = $request->file('icon');
                        $filename = uniqid(time()) . '.' . $icon->getClientOriginalExtension();
            
                        $icon->move(public_path('images'), $filename);
            
                        $requestData['icon'] = $filename;
            
                    }

        $role = Role::create($requestData);

        $role->permissions()->detach();

        foreach ($request->permissions as $permission_name) {
            $permission = Permission::whereName($permission_name)->first();
            $role->givePermissionTo($permission);
        }

        \ActionLog::addToLog("Add Role"," New Role ". $role->label ." is added ",$role->getTAble(),$role->id);

        Session::flash('flash_success', __('Role added!'));

        return redirect('admin/roles/' . $role->id . '/edit');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return void
     */
    public function show($id)
    {
        $role = Role::with('main_permission.child')->lower()->findOrFail($id);

        $permissions = Permission::with('child')->parent()->get();


        return view('admin.roles.show', compact('role', 'permissions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return void
     */
    public function edit($id)
    {
        $role = Role::with('permissions')->findOrFail($id);


        $permissions = Permission::with('child')->parent()->get();

        $isChecked = function ($name) use ($role) {

            if ($role->permissions->contains('name', $name)) {
                return 'checked';
            }
            return '';
        };
        return view('admin.roles.edit', compact('role', 'permissions', 'isChecked'));
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
        $this->validate($request, ['name' => 'required', 'permissions' => 'required']);

        $role = Role::findOrFail($id);

        $requestData = $request->all();


        if ($request->file('icon')) {
            
                        $icon = $request->file('icon');
                        $filename = uniqid(time()) . '.' . $icon->getClientOriginalExtension();
            
                        $icon->move(public_path('images'), $filename);
            
                        $requestData['icon'] = $filename;
            
                    }


        $role->update($requestData);

        $role->permissions()->detach();

        foreach ($request->permissions as $permission_name) {
            $permission = Permission::whereName($permission_name)->first();
            $role->givePermissionTo($permission);
        }

        \ActionLog::addToLog("Edit Role"," Role ". $role->label ." is updated ",$role->getTAble(),$role->id);


        Session::flash('flash_success', __('Role updated!'));

        return redirect('admin/roles/' . $id . '/edit');
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
        $role = Role::find($id)->lower()->get();

        \ActionLog::addToLog("Delete Role"," Role ". $role->label ." is deleted",$role->getTAble(),$role->id);

        $role->delete();

        Session::flash('flash_success', __('Role deleted!'));

        return redirect('admin/roles');
    }
}
