<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class RoleuserController extends Controller
{
    public function index(){
        Return view('/assignrole');
    }
   
    public function assignRole(Request $request)
    {
        // Validate the request data
        $request->validate([
            'IDNo' => 'required|exists:users,IDNo',
            'role_id' => 'required|exists:roles,id',
        ]);
    
        // Retrieve the user based on the IDNo
        $user = User::where('IDNo', $request->IDNo)->first();
    
        // Retrieve the role based on the role_id provided in the request
        $role = Role::findOrFail($request->role_id);
    
        // Assign the role to the user
        if ($user) {
            // Sync the user's roles, which will update the pivot table
            $user->roles()->sync([$role->id]);
    
            return redirect()->back()->with('success', 'Role assigned successfully');
        } else {
            return redirect()->back()->with('error', 'User not found');
        }
}
}