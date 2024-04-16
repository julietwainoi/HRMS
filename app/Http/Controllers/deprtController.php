<?php

namespace App\Http\Controllers;
use App\Models\Department;
use Illuminate\Http\Request;

class deprtController extends Controller
{
    public function index()
    {
        return view('department');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'department_name' => 'required|string',
            'department_code' => 'required|string',
            'department_description'=> 'required|string',
        ]);

        $Department = new Department;
        $Department->department_name = $validatedData['department_name'];
        $Department->department_code = $validatedData['department_code'];
        $Department->department_description = $validatedData['department_description'];
        $Department->save();

        return redirect('/department')->with('success', 'Department created successfully.');
    }
    
}
