<?php

namespace App\Models;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use App\Models\User;
class Leave extends Model
{
    use HasFactory, Notifiable;
    
    public function Department()
    {
        return $this->belongsTo(Department::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'staff_id', 'IDNo');
    }
    
    
    protected $fillable = [
        'staff_id',
        'Name',
        'type_of_leave',
        'department_name',
        'description',
        'date_of_leave',
        'end_of_leave',
        'approval_status'
    

    ];

    protected $attributes = [
        'approval_status' => 'Pending',
    ];

    public function leaveDetail()
    {
        return $this->hasOne(LeaveDetail::class, 'EmployeeID', 'staff_id');
    }
    
    public function LeaveCodes()
    {
        return $this->belongsTo(LeaveCodes::class);
    }
    public function departments()
{
    return $this->belongsTo(Department::class);
}
  

}
