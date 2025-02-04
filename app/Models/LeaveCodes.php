<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeaveCodes extends Model
{
    use HasFactory;
    protected $fillable = [
        'LeaveCode',
        'LeaveDesc',
        'LeaveDays',
        
    

    ];
protected $table = 'leavecodes';

public function leaveDetails()
{
    return $this->hasMany(LeaveDetail::class);
}
public function leave()
{
    return $this->hasMany(Leave::class);
}
}
