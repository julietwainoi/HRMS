<?php

namespace App\Http\Controllers;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function RoleInstances()
    {
        // Create or retrieve admin role
        $adminRole = Role::firstOrCreate(
            ['name' => 'admin'],
            ['description' => 'Administrator role with full access']
        );
    
        // Create or retrieve user role
        $userRole = Role::firstOrCreate(
            ['name' => 'user'],
            ['description' => 'Regular user role with basic access']
        );
    
        // Create or retrieve manager role
        $managerRole = Role::firstOrCreate(
            ['name' => 'manager'],
            ['description' => 'Manager role with intermediate access']
        );
    
       
    }
    
}