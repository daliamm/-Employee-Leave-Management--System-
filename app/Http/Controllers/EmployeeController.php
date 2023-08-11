<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LeaveType; 
use App\Models\Employee; 
use App\Models\LeaveRequest; 
class EmployeeController extends Controller
{
    public function createEmployee()
    {
        return view('leave-management.create-employee');
    }
    public function storeEmployee(Request $request)
    {
        $validatedData = $request->validate([
            'staff_id' => 'required',
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'age' => 'required',
            'email' => 'required|string|email|unique:employees',
            'phone_number' => 'required|string|max:255',
            'department' => 'required',
        ]);
        Employee::create($validatedData);
        return redirect()->route('leave-management.index')->with('success', 'Employee created successfully.');
    }

    public function editEmployee(Employee $employee)
    {
        return view('leave-management.edit-employee', compact('employee'));
    }

    public function updateEmployee(Request $request, Employee $employee)
    {
        $validatedData = $request->validate([
            'staff_id' => 'required',
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'age' => 'required',
            'email' => 'required|string|email|unique:employees',
            'phone_number' => 'required|string|max:255',
            'department' => 'required',

        ]);

        $employee->update($validatedData);
        return redirect()->route('leave-management.index')->with('success', 'Employee updated successfully.');
    }
    public function deleteEmployee(Employee $employee)
    {      $employee->delete();
        return redirect()->route('leave-management.index')->with('success', 'Employee deleted successfully.');
    }
}
