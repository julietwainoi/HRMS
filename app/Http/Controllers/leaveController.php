<?php

namespace App\Http\Controllers;
use App\Models\Leave;
use Illuminate\Support\Facades\Log;

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
    $all_leave_data = $user->leavess()->get();

    // Pass the data to the view
    return view('leave', ['all_leave_data' => $all_leave_data]);
}

    // Check if the user has the "admin" role
    public function acceptRequest($id)
    {
        // Retrieve the authenticated user
        $user = auth()->user();
    
        // Check if the user has the "admin" role
        if ($user->hasRole('admin')) {
            // Find the leave by its ID
            $leave = Leave::find($id);
    
            if ($leave) {
                // Update the approval status of the leave
                $leave->approval_status = "[ACCEPTED]";
                $leave->save();
    
                return redirect()->back()->with('message', 'Request accepted successfully.');
            } else {
                // Handle case where leave with the specified ID is not found
                return redirect()->back()->with('message', 'Leave not found.');
            }
        } else {
            // Handle unauthorized access for non-admin users
            return redirect()->back()->with('message', 'Unauthorized access.');
        }
    }
    public function rejectRequest($id)
{
    // Retrieve the authenticated user
    $user = auth()->user();

    // Check if the user has the "admin" role
    if ($user->hasRole('admin')) {
        // Find the leave by its ID
        $leave = Leave::find($id);

        if ($leave) {
            // Update the approval status of the leave to rejected
            $leave->approval_status = "[REJECTED]";
            $leave->save();

            return redirect()->back()->with('message', 'Request rejected successfully.');
        } else {
            // Handle case where leave with the specified ID is not found
            return redirect()->back()->with('message', 'Leave not found.');
        }
    } else {
        // Handle unauthorized access for non-admin users
        return redirect()->back()->with('message', 'Unauthorized access.');
    }
}

}