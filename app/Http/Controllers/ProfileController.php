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
        $IDNo = auth()->user()->IDNo;

        // Execute the parameterized query to fetch the data based on the authenticated user's IDNo
        $data = DB::select("SELECT 
            users.IDNo AS StaffNo,
            users.email AS email,
           users.name AS Names
            FROM users 
            WHERE IDNo =$IDNo");
      
      if (!empty($data)) {
        // Extract the first element from the array (assuming there should be only one result)
        $data = $data[0];
    } else {
        // Handle the case where no data is found, you might want to return a message or redirect
        // For now, let's assign an empty object
        $data = (object) [];
    }

    // Return the data to your view
    return view('profile', compact('data'));
}
public function edit($id)
{
    $user =User::findOrFail($id);
//dump($user);
    //return view('profileupdate', compact('user'));
    return view('profileupdate')->with('user', $user);
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