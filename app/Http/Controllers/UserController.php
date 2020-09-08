<?php

namespace App\Http\Controllers;

use App\User;
use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserPostRequest;

class UserController extends Controller
{
    public function __construct()
    {
        //parent::__construct();
        $this->middleware('auth');
    }

    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function show(Request $request, User $user)
    {
        return view('users.show', compact('user'));
    }

    public function create(Request $request)
    {
        if($request->ajax()){
            $roles = Role::where('id', $request->role_id)->first();
            $permissions = $roles->permissions;

            return $permissions;
        }

        $roles = Role::all();

        return view('users.create', ['roles' => $roles]);
    }

    public function store(UserPostRequest $request)
    {
        $data = $request->validated();
        $user = User::create($data);

        if($request->role != null){
            $user->roles()->attach($request->role);
            $user->save();
        }

        if($request->permissions != null){            
            foreach ($request->permissions as $permission) {
                $user->permissions()->attach($permission);
                $user->save();
            }
        }

        return redirect()->route('users.index')->with('status', 'Registro Creado Exitosamente...!');
    }

    public function edit(Request $request, User $user)
    {
        $roles = Role::get();
        $userRole = $user->roles->first();
        if($userRole != null){
            $rolePermissions = $userRole->allRolePermissions;
        }else{
            $rolePermissions = null;
        }
        $userPermissions = $user->permissions;

        return view('users.edit', [
            'user'=>$user,
            'roles'=>$roles,
            'userRole'=>$userRole,
            'rolePermissions'=>$rolePermissions,
            'userPermissions'=>$userPermissions
            ]);
    }

    public function update(UserPostRequest $request, User $user)
    {
        $data = $request->validated();
        $user->fill($data);
        $user->save();

        $user->roles()->detach();
        $user->permissions()->detach();

        if($request->role != null){
            $user->roles()->attach($request->role);
            $user->save();
        }

        if($request->permissions != null){            
            foreach ($request->permissions as $permission) {
                $user->permissions()->attach($permission);
                $user->save();
            }
        }

        return redirect()->route('users.index')->with('status', 'Registro Actualizado Exitosamente...!');
    }

    public function destroy(Request $request, User $user)
    {
        $user->roles()->detach();
        $user->permissions()->detach();
        $user->delete();
        return redirect()->route('users.index')->with('status', 'Registro Eliminado Exitosamente...!');
    }
}
