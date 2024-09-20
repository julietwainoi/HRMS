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



       // public function InsertLeaveDetail(Request $request)
        //{
          //  try {
                // Validate the incoming request data
               // $validatedData = $request->validate([
                 //   'EmployeeID' => 'required|string',
                   // 'LeaveCode' => 'nullable|string',
                   // 'LeaveDesc' => 'required|string',
                  //  'LeaveDays' => 'required|numeric',
                  //  'RemainingDays' => 'required|numeric',
               // ]);
        
                // Check if a record with the same EmployeeID and LeaveCode already exists
               // $existingLeave = LeaveDetail::where('EmployeeID', $validatedData['EmployeeID'])
                                           // ->where('LeaveCode', $validatedData['LeaveCode'])
                                           // ->first();
        
               // if ($existingLeave) {
                    // If an existing record is found, add the new RemainingDays to the existing RemainingDays
                   // $existingLeave->RemainingDays += $validatedData['RemainingDays'];
        
                    // Update the LeaveDays if necessary (e.g., adding the new LeaveDays to the existing ones)
                   // $existingLeave->LeaveDays += $validatedData['LeaveDays'];
        
                    // Save the updated record
                    //$existingLeave->save();
        
                   // return redirect()->back()->with('success', 'Leave updated successfully.');
               // } else {
                    // If no existing record is found, create a new LeaveDetail instance
                  //  $leave = new LeaveDetail;
                   // $leave->EmployeeID = $validatedData['EmployeeID'];
                   // $leave->LeaveCode = $validatedData['LeaveCode'];
                   // $leave->LeaveDesc = $validatedData['LeaveDesc'];
                   // $leave->LeaveDays = $validatedData['LeaveDays'];
                   // $leave->RemainingDays = $validatedData['RemainingDays'];
        
                    // Save the new leave record to the database
                   // $leave->save();
        
                    //return redirect()->back()->with('success', 'Leave assigned successfully.');
               // }
           // } catch (\Exception $e) {
                // Handle exceptions
              //  return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
           // }
        //}
        

        public function InsertLeaveDetail(Request $request)
        {
            try {
                // Validate the incoming request data without RemainingDays
                $validatedData = $request->validate([
                    'EmployeeID' => 'required|string',
                    'LeaveCode' => 'nullable|string',
                    'LeaveDesc' => 'required|string',
                    'LeaveDays' => 'required|numeric',
                ]);
        
                // Check if a record with the same EmployeeID and LeaveCode already exists
                $existingLeave = LeaveDetail::where('EmployeeID', $validatedData['EmployeeID'])
                                            ->where('LeaveCode', $validatedData['LeaveCode'])
                                            ->first();
        
                if ($existingLeave) {
                    // If an existing record is found, update the RemainingDays and LeaveDays
                    $existingLeave->RemainingDays += $validatedData['LeaveDays'];
                    $existingLeave->LeaveDays += $validatedData['LeaveDays'];
        
                    // Save the updated record
                    $existingLeave->save();
        
                    return redirect()->back()->with('success', 'Leave updated successfully.');
                } else {
                    // If no existing record is found, create a new LeaveDetail instance
                    $leave = new LeaveDetail;
                    $leave->EmployeeID = $validatedData['EmployeeID'];
                    $leave->LeaveCode = $validatedData['LeaveCode'];
                    $leave->LeaveDesc = $validatedData['LeaveDesc'];
                    $leave->LeaveDays = $validatedData['LeaveDays'];
        
                    // Set RemainingDays equal to LeaveDays initially
                    $leave->RemainingDays = $validatedData['LeaveDays'];
        
                    // Save the new leave record to the database
                    $leave->save();
        
                    return redirect()->back()->with('success', 'Leave assigned successfully.');
                }
            } catch (\Exception $e) {
                // Handle exceptions
                return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
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
