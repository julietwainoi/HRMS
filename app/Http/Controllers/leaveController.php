<?php

namespace App\Http\Controllers;
use App\Models\Leave;
use App\Models\LeaveCodes;
use Illuminate\Support\Facades\Log;
use App\Models\LeaveDetail;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Department;
use Illuminate\Support\Facades\Auth;

class LeaveController extends Controller
{
public function __construct()
{
        $this->middleware('auth');
}

public function index()
{
        return view ('leave');
}
public function InsertLeaveData(Request $request)
{
    //try{
        // Validate the incoming request data
        $validatedData = $request->validate([
            'staff_id' => 'required|string',
            'type_of_leave' => 'required|string',
            'department_name'=>'required|string',
            'description' => 'required|string',
            'date_of_leave' => 'required|date',
            'end_of_leave' => 'required|date|after_or_equal:date_of_leave',
            'approval_status' => 'required|string',
        ]);

        $leaveDetail = LeaveDetail::where('EmployeeID', $validatedData['staff_id'])
                                  ->where('LeaveDesc', $validatedData['type_of_leave'])
                                  ->first();

        // Check if leave detail exists
        if ($leaveDetail) {
            // Calculate the number of leave days
            $startDate = new \DateTime($validatedData['date_of_leave']);
            $endDate = new \DateTime($validatedData['end_of_leave']);
            $leaveDays = $endDate->diff($startDate)->days + 1; // Add 1 to include both start and end dates

            // Check if there are enough remaining leave days
            if ($leaveDetail->RemainingDays >= $leaveDays) {
                // Create a new leave record
                $leave = new Leave();
                $leave->staff_id = $validatedData['staff_id'];
                $leave->type_of_leave = $validatedData['type_of_leave'];
                $leave->department_name = $validatedData['department_name'];
                $leave->description = $validatedData['description'];
                $leave->date_of_leave = $validatedData['date_of_leave'];
                $leave->end_of_leave = $validatedData['end_of_leave'];
                $leave->approval_status = 'Pending'; // Assuming leave is initially pending approval
                $leave->save();

                // Update remaining leave days in the leave detail
               // $leaveDetail->RemainingDays -= $leaveDays;
                $leaveDetail->save();

                return redirect()->back()->with('success', 'Leave applied successfully.');
            } else {
                return redirect()->back()->with('error', 'Insufficient leave days.');
            }
        } else {
            return redirect()->back()->with('error', 'Leave detail not found.');
        }
  }
// catch (\Exception $e) {
    // Handle exceptions
    //dd($e->getMessage()); // Dump exception message for debugging
//}


public function adminpendingRequests()
{
    $IDNo = auth()->user()->IDNo;
    
    // Retrieve leave details associated with the current user
    $leaveDetails =LeaveDetail::where('EmployeeID', $IDNo)->get();
    

    $leave_pending_data = Leave::where('approval_status', 'Pending')->get();

    // Pass the data to the view
    return view('pending-request',compact('leaveDetails', 
'leave_pending_data'));
}


public function Requestsleave()
{
    // Get the currently authenticated user
    $user = Auth::user();
    
    // Fetch pending leave requests of the current user
    $all_leave_data = $user->leavess()->get();

    // Pass the data to the view
    return view('staffleaves', ['all_leave_data' => $all_leave_data]);
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
    
                // Calculate the number of leave days
                $startDate = new \DateTime($leave->date_of_leave);
                $endDate = new \DateTime($leave->end_of_leave);
                $leaveDays = $endDate->diff($startDate)->days + 1; // Add 1 to include both start and end dates
    
                // Find the corresponding leave detail
                $leaveDetail = LeaveDetail::where('EmployeeID', $leave->staff_id)
                                          ->where('LeaveDesc', $leave->type_of_leave)
                                          ->first();
    
                if ($leaveDetail) {
                    // Update remaining leave days in the leave detail
                    $leaveDetail->RemainingDays -= $leaveDays;
                    $leaveDetail->save();
                    return redirect('staffleaves')->with('success', 'Leave assigned successfully.');
                    //return redirect()->back()->with('message', 'Request accepted successfully.');
                } else {
                    // Handle case where leave detail is not found
                    return redirect()->back()->with('error', 'Leave detail not found.');
                }
            } else {
                // Handle case where leave with the specified ID is not found
                return redirect()->back()->with('error', 'Leave not found.');
            }
        } else {
            // Handle unauthorized access for non-admin users
            return redirect()->back()->with('error', 'Unauthorized access.');
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
                return redirect()->back()->with('error', 'Leave not found.');
            }
        } else {
            // Handle unauthorized access for non-admin users
            return redirect()->back()->with('error', 'Unauthorized access.');
        }
}
public function showLeaveData()
{
    try {
        $leaveDescriptions = LeaveCodes::pluck('LeaveDesc');
        $departmentNames = Department::pluck('department_name');
        
        return view('leave', compact('leaveDescriptions', 'departmentNames'));
    } catch (\Exception $e) {
        return back()->withError('Failed to retrieve data. Please try again later.');
    }
}
public function deleteLeaveData($leaveId)
{
    
        // Find the leave record by its ID
        $leave = Leave::findOrFail($leaveId);

        // Check if the leave is pending
        if ($leave->approval_status === 'Pending') {
            // Delete the leave record
            $leave->delete();
            return response()->json(['message' => 'Leave data deleted successfully']);
        } else {
            // Return an error if the leave is not pending
            return response()->json(['error' => 'Leave is not pending and cannot be deleted'], 403);
        }
   
}
 public function getPendingLeavesInDepartment1()
 {
    $user = auth()->user();
    $leaveDetails =  $user->leaveDetails()->get(); 
    $all_leave_data = Leave::where('staff_id', $user->IDNo)
                            ->where('approval_status', 'Pending')
                            ->latest() 
                            ->get();
    $pendingLeaves = Leave::where('department_name', 'department 1')
                          ->where('approval_status', 'pending')
                          ->get();


    return view('Supervisor', [
        'leaveDetails' => $leaveDetails,
        'all_leave_data' => $all_leave_data,
        'pendingLeaves'  =>$pendingLeaves
        
                            ]); //
    
 }


} 