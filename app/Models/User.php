<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\leave;
use App\Models\Role;
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    
    public function leavess()
    {
        return $this->hasMany(Leave::class,'staff_id', 'IDNo');
    }
    public function hasRole($role)
    {
        return $this->roles()->where('name', $role)->exists();
    }
    
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
    // Define the relationship with LeaveDetail
public function leaveDetails()
{
    return $this->hasMany(LeaveDetail::class, 'EmployeeID', 'IDNo');
}

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
   
    protected $fillable = [
        'name',
        'email',
        'IDNo',
        'password',
    

    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
 
}
