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
 
   /*public function getProfile(){

try{
    $data = DB::select(" SELECT HREMP.HREMP_EMPID AS StaffNo,
                         HREMP.HREMP_PHONEC AS MobilePhone,
                         HREMP.HREMP_MSN,
                         HREMP.HREMP_NAME AS Names,
                         HREMP.HREMP_FNAME AS FirstName,
                         HREMP.HREMP_MNAME AS MiddleName, 
                         HREMP.HREMP_LNAME AS LastName,
                         HREMP.HREMP_JOBID AS JobCode
                         FROM HREMP");

    //dd($data);
   return view('Profile', ['data' => $data]);

}catch(\Exception $e) {
    Log::error($e);

    return view('Profile',['data'=>'Error processing']);
}


    }
    */
}
