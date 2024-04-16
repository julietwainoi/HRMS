<?php

namespace App\Http\Controllers;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index(){

        Return view('roles');
    }
   
public function store(Request $request)
{
    $validatedData = $request->validate([
        'name' => 'required|string|unique:roles,name',
        'description' => 'required|string',
    ]);

    // Create or retrieve the role
    $role = Role::firstOrCreate(
        ['name' => $validatedData['name']],
        ['description' => $validatedData['description']]
    );

    return redirect('/roles')->with('success', 'role assigned successfully.');
}
}

       
    
   
    
