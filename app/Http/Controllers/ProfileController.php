<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;


class ProfileController extends Controller
{
    
    
    
    
   
    
    
    public function CurrentProfile()
    {
        $IDNo = auth()->user()->id;

        // Execute the parameterized query to fetch the data based on the authenticated user's IDNo
        $data = DB::select("SELECT 
            users.id AS StaffNo,
            users.email AS email,
           users.name AS Names
            FROM users 
            WHERE id =$IDNo");
      
     
        // Return the data to your view
        return view('profile', compact('data'));

    }
 
}
