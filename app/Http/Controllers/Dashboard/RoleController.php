<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Role;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $roles = Role::whenSearch(request()->search)->paginate(5);
        /*$roles = Role::whereRoleNot(['super_admin'])
            ->whenSearch(request()->search)
            ->with('permissions')
            ->withCount('users')
            ->paginate();*/
        return view('dashboard.roles.index', compact('roles'));

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.roles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:roles,name',
            'permissions' => 'required|array|min:1'
        ]);

        $role = Role::create($request->all());
        $role->attachPermissions($request->permissions);

        session()->flash('success', 'Data Added successfully');
        return redirect()->route('dashboard.roles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        //
        return view('dashboard.roles.edit', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $role = Role::findOrFail($id);

        $request->validate([
            'name' => [
                'required',
                Rule::unique('roles', 'name')->ignore($role->id)
            ],
            'permissions' => 'required|array|min:1',
        ]);

        $role->update($request->all());
        $role->syncPermissions($request->permissions);


        session()->flash('success', __('Data updated successfully'));
        return redirect()->route('dashboard.roles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //////////////////////////////
        $Role = Role::findOrFail($id);

        //////////////////////////////
        $Role->delete();
        session()->flash('success', 'Data deleted successfully');
        return redirect()->route('dashboard.roles.index');
    }

}
