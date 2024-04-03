<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeaveDetail extends Model
{
    use HasFactory;
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Define the relationship with LeaveCode
    public function leaveCodes()
    {
        return $this->belongsTo(LeaveCodes::class);
    }


protected $fillable = [
'EmployeeID',
'LeaveCode',
'LeaveDesc',
'LeaveDays',
'RemainingDays'
     

];
protected $table = 'LeaveDetail';

public function leave()
{
    return $this->belongsTo(Leave::class, 'staff_id', 'EmployeeID');
}
}