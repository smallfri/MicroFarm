<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Permission;
use Illuminate\Http\Request;
use Session;

class PermissionsController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:access.permissions');
        $this->middleware('permission:access.permission.edit')->only(['edit', 'update']);
        $this->middleware('permission:access.permission.create')->only(['create', 'store']);
        $this->middleware('permission:access.permission.delete')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return void
     */
    public function index(Request $request)
    {


        $keyword = $request->get('search');
        $perPage = 15;

        if (!empty($keyword)) {
            $permissions = Permission::with('child')->parent()->where('name', 'LIKE', "%$keyword%")->orWhere('label', 'LIKE', "%$keyword%")
                ->get();
//                ->paginate($perPage);
        } else {
            $permissions = Permission::with('child')->parent()->get();//paginate($perPage);
        }


        return view('admin.permissions.index', compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return void
     */
    public function create()
    {

        $permissions = Permission::select()->parent()->pluck('name', 'id')->prepend('No Parent', 0);


        return view('admin.permissions.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return void
     */
    public function store(Request $request)
    {
        $this->validate($request, ['name' => 'required']);


        $permission = Permission::create($request->all());

        \ActionLog::addToLog("Add Permission"," New Permission is added ",$permission->getTAble(),$permission->id);

        Session::flash('flash_success', __('Permission added!'));

        return redirect('admin/permissions');
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
        $permission = Permission::findOrFail($id);

        return view('admin.permissions.show', compact('permission'));
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
        $permission = Permission::findOrFail($id);

        $permissions = Permission::select()->parent()->pluck('name', 'id')->prepend('No Parent', 0);


        return view('admin.permissions.edit', compact('permission', 'permissions'));
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
        $this->validate($request, ['name' => 'required']);

        $permission = Permission::findOrFail($id);
        $permission->update($request->all());

        \ActionLog::addToLog("Edit Permission"," Permission - ".$permission->id." is updated ",$permission->getTAble(),$permission->id);


        Session::flash('flash_success', __('Permission updated!'));

        return redirect('admin/permissions');
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
        $permission = Permission::find($id);

        \ActionLog::addToLog("Delete Permission"," Permission - ".$permission->id." is deleted ",$permission->getTAble(),$permission->id);

        $permission->delete();

        Session::flash('flash_success', __('Permission deleted!'));

        return redirect('admin/permissions');
    }
}
