<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;


class ProfileController extends Controller
{
    public function CurrentProfile(){
    
        $user = auth()->user();

    if ($user) {
        // User is logged in
      return view('Profile',  ['name'=>$user->name,'email'=>$user->email]);
    } else {
        // User is not logged in
        return view('Profile', "user not logged in");
    } 

}
 
}
