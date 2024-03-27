<?php

namespace App\Http\Controllers;
use App\Models\Leave;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class LeaveController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }




    public function index(){
        return view ('leave');
        }



    // Other controller methods...






    public function InsertLeaveData(Request $request)
    {
    try{
        // Validate the incoming request data
        $validatedData = $request->validate([
            'staff_id' => 'required|string',
            'type_of_leave' => 'required|string',
            'description' => 'required|string',
            'date_of_leave' => 'required|date',
            'end_of_leave' => 'required|date',
            'approval_status' => 'required|string',
        ]);

        // Create a new Leave instance with the validated data
        $leave = new leave;
        $leave->staff_id = $validatedData['staff_id'];
        $leave->type_of_leave = $validatedData['type_of_leave'];
        $leave->description = $validatedData['description'];
        $leave->date_of_leave = $validatedData['date_of_leave'];
        $leave->end_of_leave = $validatedData['end_of_leave'];
      

        // Save the leave record to the database
        $leave->save();
        //dd($request->all());

        // Redirect the user after successfully saving the leave record
        return redirect('/leave')->with('success', 'Leave application submitted successfully.');
    }
 catch (\Exception $e) {
    // Handle exceptions
    dd($e->getMessage()); // Dump exception message for debugging
}

}
public function adminpendingRequests()
{
    // Fetch pending leave requests from the database
    $leave_pending_data = Leave::where('approval_status', 'Pending')->get();

    // Pass the data to the view
    return view('pending-request', ['leave_pending_data' => $leave_pending_data]);
}


public function pendingRequestsleave()
{
    // Get the currently authenticated user
    $user = Auth::user();
    
    // Fetch pending leave requests of the current user
    $leave_pending_data = $user->leavess()->where('approval_status', 'Pending')->get();

    // Pass the data to the view
    return view('leave', ['leave_pending_data' => $leave_pending_data]);
}


}