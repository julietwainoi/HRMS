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
        $validatedData = $request->validate([
            'IDNo' => 'required|string',
            'roleId' => 'required|numeric',
        ]);
    
    
        $user = User::where('IDNo', $validatedData['IDNo'])->first();
    
      
        if (!$user) {
            return back()->with('error', 'User not found');
        }
    
        
        $userId = $user->id;
    
      
        $role = Role::find($validatedData['roleId']);
    
     
        if (!$role) {
            return back()->with('error', 'Role not found');
        }
    
    
        $user->roles()->syncWithoutDetaching($role);
    
   
        return redirect('assignrole')->with('success', 'Role assigned successfully.');
    }

   
}
