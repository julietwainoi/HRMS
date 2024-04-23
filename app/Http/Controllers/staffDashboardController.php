<?php

namespace App\Http\Controllers;
use App\Models\LeaveDetail;
use App\Models\Leave;
use App\Models\User;
use App\Models\Role;
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
    $all_leave_data = Leave::where('staff_id', $user->IDNo)
                            ->where('approval_status', 'Pending')
                            ->latest() 
                            ->get();
    
    
    
    
    return view('staffDashboard', [
        'leaveDetails' => $leaveDetails,
        'all_leave_data' => $all_leave_data
        ]);
     }

   


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

 public function DashboardView()
 {
     $user = auth()->user();
 
     if ($user->hasRole('manager')) {
         return $this->adminpendingRequests();
     } elseif ($user->hasRole('Supervisor 1')) {
         return $this->getPendingLeavesInDepartment1();
     } else {
         return $this->showStaffDashboard();
     }
 }
 public function hasRole($role)
{
    return User::where('id', auth()->id())->whereHas('roles', function ($query) use ($role) {
        $query->where('name', $role);
    })->exists();
}


}

