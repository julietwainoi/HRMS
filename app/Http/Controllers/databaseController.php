<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect;
use Session;
use DB;
use App\Models\leave;

class databaseController extends Controller
{

    public function index(){
        return view ('home-page-index');
        }


    public function InsertLeaveDataOfStaffAccount(Request $request){

      
   
     
   
          $this->validate($request, [
            'type_of_leave' => 'required',
            'description' => 'required',
            'date_of_leave' => 'required',
          ]);
   
          $staff_id          =  $request->staff_id;
          $type_of_leave     =  $request->type_of_leave;
          $description       =  $request->description;
          $date_of_leave     =  $request->date_of_leave;
          $date_of_request   =  date('Y-m-d H:i:s');
          $approval_status	  =  "[PENDING]";
   
   
          if(DB::insert('INSERT INTO leaves (staff_id, type_of_leave, description, date_of_leave, date_of_request, approval_status ) values (?, ?, ?, ?, ?, ?)', [$staff_id, $type_of_leave, $description, $date_of_leave, $date_of_request, $approval_status])){
   
              return redirect()->back()->with('message', 'Leave request has been submited successfully.');
   
          }
   
        }
 
    public function showPendingRequests()
    {
        $leave_pending_data = leave::where('approval_status', 'pending')->get();
        return back()->with(compact('leave_pending_data'));

    }

    // Other controller methods...


      }

