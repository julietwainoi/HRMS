<?php

namespace App\Http\Controllers;
use App\Models\LeaveDetail;
use App\Models\Leave;
use App\Models\User;
use Illuminate\Http\Request;

class staffDashboardController extends Controller
{
    public function __construct()
{
        $this->middleware('auth');
}
   
    public function showStaffDashboard()
{
    $user = auth()->user();
    $leaveDetails =  $user->leaveDetails()->get(); 
    $all_leave_data = Leave::where('staff_id', $user->IDNo )->latest()->get();
    return view('staffDashboard', [
        'leaveDetails' => $leaveDetails,
        'all_leave_data' => $all_leave_data
    ]); // Pass both sets of data to the view
}



}