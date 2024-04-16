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
                'LeaveCode' => 'required|string',
                'LeaveDesc' => 'nullable|string',
                'LeaveDays' => 'required|numeric',
            ]);
    
            // Create a new LeaveCodes instance and fill it with the submitted data
            $leaveCode = new LeaveCodes();
            $leaveCode->LeaveCode = $request->LeaveCode;
            $leaveCode->LeaveDesc = $request->LeaveDesc;
            $leaveCode->LeaveDays = $request->LeaveDays;
    
            // Save the leave code data to the database
            $leaveCode->save();
    
            return redirect('/LeavesCode')->with('success', 'Leave code submitted successfully.');
            // Redirect back with a success message
           
        }
       
        
    }
    

