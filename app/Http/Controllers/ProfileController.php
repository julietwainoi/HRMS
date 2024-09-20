<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;


class ProfileController extends Controller
{
    
     public function CurrentProfile()
    {
    
       $id = auth()->user()->id;
        
    $data = DB::table('users')
    ->select('IDNo as StaffNo','id', 'email', 'name as Names') // Rename columns as needed
    ->where('id', $id) // Filter by 'id'
    ->first(); // Get the first (and only) result

if ($data === null) {
    // Handle the case where no data is found
    // For example, redirect or return an error message
    $data = (object) []; // Assign an empty object or handle as needed
}

// Return the data to your view
return view('profile', compact('data'));
}

public function edit($id)
{
    $user =User::findOrFail($id);
   
//dump($user);
    return view('profileupdate', compact('user'));
   //return view('profileupdate')->with('user', $user);
}


public function update(Request $request, $id)
{
    $validatedData = $request->validate([
        'IDNo' => 'required|unique:users', 
        'name' =>'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
    ]);

    $user = users::findOrFail($id);
    $user->IDNo = $validatedData['IDNo'];
    $user->name = $validatedData['name'];
    $user->email = $validatedData['email'];
    $user->save();

    return view('profileupdate')->with('success', 'profile updated successfully.');
}
}