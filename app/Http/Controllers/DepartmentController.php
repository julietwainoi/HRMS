<?php

namespace App\Http\Controllers;
use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index()
    {
        $departments = Department::all();
        return view('department')->with('departments', $departments);
    }

    public function store(Request $request)
    {
    
            $validatedData = $request->validate([
                'department_name' => 'required|string',
                'department_code' => 'required|string',
                'department_description' => 'required|string',
            ]);
    
            $department = new Department();
            $department->department_name = $validatedData['department_name'];
            $department->department_code = $validatedData['department_code'];
            $department->department_description = $validatedData['department_description'];
            $department->save();
        
            return redirect('/department')->with('success', 'Department created successfully.');
    }
            public function edit($id)
            {
                $department = Department::findOrFail($id);
          
                return view('departmentedit', compact('department'));
            }
        
            public function update(Request $request, $id)
            {
                $validatedData = $request->validate([
                    'department_name' => 'required|string',
                    'department_code' => 'required|string',
                    'department_description' => 'required|string',
                ]);
        
                $department = Department::findOrFail($id);
                $department->department_name = $validatedData['department_name'];
                $department->department_code = $validatedData['department_code'];
                $department->department_description = $validatedData['department_description'];
                $department->save();
        
                return view('department')->with('success', 'Department updated successfully.');
            }
        
            public function destroy($id)
            {
                $department = Department::findOrFail($id);
                $department->delete();
        
                return view('department')->with('success', 'Department deleted successfully.');
            }
    
}
