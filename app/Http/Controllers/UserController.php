<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
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
