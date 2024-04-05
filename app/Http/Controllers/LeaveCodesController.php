<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LeaveCodes;
class LeaveCodesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view ('LeavesCode');
    }

    public function store(Request $request)
        {
            // Validate the incoming request data
            $request->validate([
                'leave_code' => 'required|string',
                'leave_desc' => 'nullable|string',
                'leave_days' => 'required|numeric',
            ]);
    
            // Create a new LeaveCodes instance and fill it with the submitted data
            $leaveCode = new LeaveCodes();
            $leaveCode->LeaveCode = $request->leave_code;
            $leaveCode->LeaveDesc = $request->leave_desc;
            $leaveCode->LeaveDays = $request->leave_days;
    
            // Save the leave code data to the database
            $leaveCode->save();
    
            return redirect('/LeavesCode')->with('success', 'Leave code submitted successfully.');
            // Redirect back with a success message
           
        }
       
        
    }
    

