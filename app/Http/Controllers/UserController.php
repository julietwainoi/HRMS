<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    public function assignRole($userId, $roleId)
    {
        // Retrieve the user and role instances based on the provided IDs
        $user = User::where('IDNo', $userId)->first();
        $role = Role::find($roleId);

        // Check if both user and role exist
        if (!$user || !$role) {
            return response()->json(['error' => 'User or role not found.'], 404);
        }

        // Attach the role to the user
        $user->roles()->attach($role->id);

        return response()->json(['message' => 'Role assigned to user successfully.']);
    }
   
   public function index(){
    return view ('change-password');
   }
   
   
    public function changePassword(Request $request)
    {
        $request->validate([
          'current_password' => 'required',
          'new_password' => 'required|string|min:8|confirmed',
        ]);

       $user = Auth::user();

        if (!Hash::check($request->current_password, $user->password)) {
           return redirect()->back()->with('error', 'The current password is incorrect.');
        }

       $user->password = Hash::make($request->new_password);
       $user->save();

       return redirect()->back()->with('success', 'Password updated successfully.');
    }
}
