<?php

namespace App\Http\Controllers;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('user.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all();
        $permissions = Permission::all();
        return view('user.create',compact('roles','permissions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate input data
        $validatedData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email', // Email should be unique
            'password' => 'required|string|min:6', // You can add further password validation
            'role' => 'required|string|exists:roles,name', // Ensure role exists in the roles table
            'permission' => 'required|string|exists:permissions,name',
        ]);
    
        // Create new user and hash the password
        $user = new \App\Models\User(); // Assuming you are using a custom User model
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->password = bcrypt($validatedData['password']); // Hash the password
        $user->save();
    
        // Assign the role to the user
        $role = \Spatie\Permission\Models\Role::where('name', $validatedData['role'])->first();
        $user->assignRole($role);

        // Assign the permissions to the user
        $permission = \Spatie\Permission\Models\Permission::where('name', $validatedData['permission'])->first();
        $user->givePermissionTo($permission);

    
        // Redirect back with success message
        return redirect()->route('users.index')
                         ->with('status', 'User registered and role assigned successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::find($id);
        return view('user.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::find($id);
        return view('user.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::find($id);
        $validatedData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string',
            'password' => 'required'
        ]);

        $user->update($validatedData);

        return redirect()->route('users.index')
                         ->with('status','User Created Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect()->route('users.index')
                         ->with('status','User deleted Successfully');
    }


    public function display(){
        $roles = Role::all();
        $permissions = Permission::all();
        return view('user.display',compact('roles','permissions'));
    }

    public function assignRoleTOPermission(Request $request){
        //  dd($request);
        $validatedData = $request->validate([
            'role_name' => 'required|string|exists:roles,name',
            'permissions' => 'required|array',
            'permissions.*' => 'string|exists:permissions,name',
        ]) ;
        // dd($validatedData);

        $role = Role::where('name',$validatedData['role_name'])->get();
        // dd($role);

        // Retrieve permissions
        $permissions = Permission::whereIn('name', $validatedData['permissions'])->get();

        // Assign permissions to the role
        $role->givePermissionTo($permissions);
        
        // $permissions = Permission::whereIn('name', $validatedData['permissions'])->pluck('id')->toArray();

        // if (!empty($permissions)) {
        //     $role->givePermissionTo($permissions);
        // } else {
        //     return back()->withErrors('Permissions not found');
        // }
        // // $permissions = Permission::whereIn('name',$validatedData['permissions'])->get();

        // // dd($role->givePermissionTo($permissions));

        return redirect()->route('users.index')
                         ->with('status','Role Assign To Permission Successfully');
    }
}
