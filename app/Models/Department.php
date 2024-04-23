<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;
    
    public function leave()
    {
        return $this->hasMany(Leave::class);
    }

    public function leaves()
    {
        return $this->belongsToMany(Leave::class);
    } 
    


    protected $fillable = [
        'department_name',
        'department_code',
        'department_description',
       

    ];
    
}
