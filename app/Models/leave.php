<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class leave extends Model
{
    use HasFactory;
    protected $fillable = [

    'staff_id',
    'type_of_leave',
    'description',
    'date_of_leave',
    'end_of_leave',
    'date_of_request',
    'approval_status',

    ];
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->date_of_request = now(); // Sets the date_of_request to the current date and time
        });
    }


}
