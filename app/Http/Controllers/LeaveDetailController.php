<?php

namespace App\Http\Controllers;
use App\Models\LeaveDetail;
use Illuminate\Http\Request;

class LeaveDetailController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }




    public function index(){
        return view ('LeaveDetail');
        }




    public function InsertLeaveDetail(Request $request)
    {
    try{
        // Validate the incoming request data
        $validatedData = $request->validate([
            'EmployeeID' => 'required|string',
            'LeaveCode' => 'required|string',
            'LeaveDesc' => 'required|string',
            'LeaveDays'=> 'required|numeric',
            'RemainingDays' => 'required|numeric',
           
        ]);

        // Create a new Leave instance with the validated data
        $leave = new LeaveDetail;
        $leave->EmployeeID = $validatedData['EmployeeID'];
        $leave->LeaveCode = $validatedData['LeaveCode'];
        $leave->LeaveDesc = $validatedData['LeaveDesc'];
        $leave->LeaveDays = $validatedData['LeaveDays'];
        $leave->RemainingDays = $validatedData['RemainingDays'];
      

        // Save the leave record to the database
        $leave->save();
        //dd($request->all());

        // Redirect the user after successfully saving the leave record
        return redirect('/LeaveDetail')->with('success', 'Leave assigned successfully.');
    }
 catch (\Exception $e) {
    // Handle exceptions
    dd($e->getMessage()); // Dump exception message for debugging
}

}
public function showLeaveDetails()
{
    // Get the current user's IDNo
    $IDNo = auth()->user()->IDNo;
    
    // Retrieve leave details associated with the current user
    $leaveDetails =LeaveDetail::where('EmployeeID', $IDNo)->get();
    
    return view('Dashboard')->with('leaveDetails', $leaveDetails);
}
}
