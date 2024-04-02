<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LeaveCodes;
class LeaveCodesController extends Controller
{
    
    
        public function LeaveCodeInstances()
        {
            // Define an array of leave code data
            $leaveCodesData = [
                ['LeaveCode' => 'L-001', 'LeaveDesc' => 'Sick Leave', 'LeaveDays' => '3 days'],
                ['LeaveCode' => 'L-002', 'LeaveDesc' => 'Casual Leave', 'LeaveDays' => '2 days'],
                ['LeaveCode' => 'L-003', 'LeaveDesc' => 'Duty Leave', 'LeaveDays' => '2 days'],
                ['LeaveCode' => 'L-004', 'LeaveDesc' => 'Maternity Leave', 'LeaveDays' => '90 days'],
                ['LeaveCode' => 'L-005', 'LeaveDesc' => 'Paternity Leave', 'LeaveDays' => '14 days'],
                ['LeaveCode' => 'L-006', 'LeaveDesc' => 'Bereavement Leave', 'LeaveDays' => '10 days'],
                ['LeaveCode' => 'L-007', 'LeaveDesc' => 'Compensatory Leave', 'LeaveDays' => '10 days'],
                ['LeaveCode' => 'L-008', 'LeaveDesc' => 'Sabbatical Leave', 'LeaveDays' => '10 months'],
                ['LeaveCode' => 'L-009', 'LeaveDesc' => 'Unpaid Leave', 'LeaveDays' => '10 months']
            ];
    
            // Loop through the leave code data and create or retrieve each leave code
            foreach ($leaveCodesData as $leaveCodeData) {
                LeaveCodes::firstOrCreate(
                    ['LeaveCode' => $leaveCodeData['LeaveCode']],
                    ['LeaveDesc' => $leaveCodeData['LeaveDesc'], 'LeaveDays' => $leaveCodeData['LeaveDays']]
                );
            }
    
            // Optionally, you can return a response indicating success or perform additional actions
            
            return response()->json(['message' => 'Leave codes created successfully'], 200);
        }
    }
    

