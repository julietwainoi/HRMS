<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\leave;

class leaveController extends Controller
{
    public function index(){
        return view ('leave');
        }



    // Other controller methods...






    public function InsertLeaveData(Request $request)
    {
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
        $leave = new Leave();
        $leave->staff_id = $validatedData['staff_id'];
        $leave->type_of_leave = $validatedData['type_of_leave'];
        $leave->description = $validatedData['description'];
        $leave->date_of_leave = $validatedData['date_of_leave'];
        $leave->end_of_leave = $validatedData['end_of_leave'];
        $leave->approval_status = $validatedData['approval_status'];

        // Save the leave record to the database
        $leave->save();

        // Redirect the user after successfully saving the leave record
        return redirect('/leave')->with('success', 'Leave application submitted successfully.');
    }
}