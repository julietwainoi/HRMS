<?php

namespace App\Http\Controllers;
use App\Models\LeaveDetail;
use Illuminate\Http\Request;
use App\Models\LeaveCodes;
use Carbon\Carbon;
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
            'LeaveCode' => 'nullable|string',
            'LeaveDesc' => 'required|string',
            'LeaveDays'=> 'required|numeric',
            'RemainingDays' => 'required|numeric',
           
        ]);
        $currentYear = Carbon::now()->year;
        $existingAssignment = LeaveDetail::where('EmployeeID', $validatedData['EmployeeID'])
                                          ->where('LeaveDesc', $validatedData['LeaveDesc'])
                                          ->whereYear('created_at', $currentYear)
                                          ->exists();

        // If the user has already been assigned this leave type for the current year, return an error
        if ($existingAssignment) {
            return redirect()->back()->with('error', 'User has already been assigned this leave type for this year.');
        }

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
public function showLeaveDescriptions()
{
    try {
        // Retrieve all leave descriptions from the database
        $leaveDescriptions = LeaveCodes::pluck('LeaveDesc');

        // Dump the leaveDescriptions variable
        //dd($leaveDescriptions);

        // Pass the leave descriptions to the view
        return view('LeaveDetail', ['leaveDescriptions' => $leaveDescriptions]);
    } catch (\Exception $e) {
        // Handle any exceptions, maybe log them, and return an error response
        return back()->withError('Failed to retrieve leave descriptions. Please try again later.');
    }
}
}
