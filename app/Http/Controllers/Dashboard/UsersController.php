<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Role;
use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:read_users')->only(['index']);
        $this->middleware('permission:create_users')->only(['create','store']);
        $this->middleware('permission:update_users')->only(['edit','update']);
        $this->middleware('permission:delete_users')->only(['destroy']);
    }

    public function index()
    {
        $roles = Role::whereRoleNot(['super_admin'])->get();
        $users=User::whenSearch(request()->search)->whenRole(request()->role_id)->paginate();
        return view('dashboard.users.index', compact('roles','users'));
    }


    public function create()
    {
        $roles = Role::whereRoleNot(['super_admin'/*, 'admin'*/])->get();
        return view('dashboard.users.create', compact('roles'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed',
            // 'status' => 'required',
            'role_id' => 'required|numeric',
        ]);

        $request->merge(['password' => bcrypt($request->password)]);


        $user = User::create($request->all());
        $user->attachRoles([$request->role_id]);

        session()->flash('success', 'Data Added successfully');
        return redirect()->route('dashboard.users.index');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::whereRoleNot(['super_admin'])->get();
        return view('dashboard.users.edit', compact('user','roles'));
    }


    public function update(Request $request, $id)
    {
        $user = User::findOrfail($id);
        $request->validate([
            'name' => 'required',
            //  'email' =>[ 'required','email', Rule::unique('users','email') ->ignore($user->id)],
            'email' => 'required|email|unique:users,email,'.$user->id,
            'password' => 'required|confirmed',
            'role_id' => 'required|numeric',
        ]);
        $request->merge(['password' => bcrypt($request->password)]);

        $user->update($request->all());
//        $user->syncRoles(['admin', $request->role_id]);
        $user->syncRoles([ $request->role_id]);
        session()->flash('success', 'Data Added successfully');
        return redirect()->route('dashboard.users.index');
    }


    public function destroy($id)
    {
        $user = User::findOrFail($id);

        //////////////////////////////
        $user->delete();
        session()->flash('success', 'Data deleted successfully');
        return redirect()->route('dashboard.users.index');
    }
}
