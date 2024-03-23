<?php

namespace App\Models;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class leave extends Model
{
    use HasFactory,HasFactory, Notifiable;

    protected $fillable = [
        'staff_id',
        'type_of_leave',
        'description',
        'date_of_leave',
        'end_of_leave',
        'approval_status'
    

    ];




}
