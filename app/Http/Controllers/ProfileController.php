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
        $IDNo = auth()->user()->IDNo;

        // Execute the parameterized query to fetch the data based on the authenticated user's IDNo
        $data = DB::select("SELECT 
            HREMP.HREMP_EMPID AS StaffNo,
            HREMP.HREMP_PHONEC AS MobilePhone,
            HREMP.HREMP_MSN,
            HREMP.HREMP_NAME AS Names,
            HREMP.HREMP_FNAME AS FirstName,
            HREMP.HREMP_MNAME AS MiddleName,
            HREMP.HREMP_LNAME AS LastName,
            HREMP.HREMP_JOBID AS JobCode
            FROM HREMP 
            WHERE HREMP_IDCARD =$IDNo");
      
     
        // Return the data to your view
        return view('profile', compact('data'));

    }
 
}
