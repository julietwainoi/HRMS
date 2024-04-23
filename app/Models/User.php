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
use App\Models\LeaveDetail;
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    
    public function leavess()
    {
        return $this->hasMany(Leave::class,'staff_id', 'IDNo');
    }
    public function leaveDetails()
    {
    return $this->hasMany(LeaveDetail::class, 'EmployeeID', 'IDNo');
    }
    
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    } 
    
    
    public function hasRole($role)
    {
        return $this->roles()->where('name', $role)->exists();
    }
    
    public function hasAnyRole($roles)
    {
        return $this->roles()->whereIn('name', $roles)->exists();
    }
    public function role()
    {
        return $this->belongsToMany(Role::class, 'role_user', 'user_id', 'role_id');
    }
   

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($user) {
            // Delete the user's roles when the user is deleted
            $user->roles()->detach();
        });
    }
    // Define the relationship with LeaveDetail


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
