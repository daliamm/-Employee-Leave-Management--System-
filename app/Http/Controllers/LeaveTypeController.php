<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LeaveType; 
use App\Models\Employee; 
use App\Models\LeaveRequest; 
class LeaveTypeController extends Controller
{
    public function index()
    {
        $leaveTypes = LeaveType::all();
        $employees = Employee::all();
        $leaveRequests = LeaveRequest::all();

        return view('leave-management.index', compact('leaveTypes', 'employees', 'leaveRequests'));
    }

    public function createLeaveType()
    {
        return view('leave-management.create-leave-type');
    }

    public function storeLeaveType(Request $request)
    {
        $validatedData = $request->validate([
            'leave_type_name' => 'required|string|max:255',
            'count' => 'required|integer',
            'from_date' => 'required|date',
            'to_date' => 'required|date',
            'active' => 'required|boolean',
        ]);

        LeaveType::create($validatedData);


        return redirect()->route('leave-management.index')->with('success', 'Leave type created successfully.');
    }

    public function editLeaveType(LeaveType $leaveType)
    {
        return view('leave-management.edit-leave-type', compact('leaveType'));
    }

    public function updateLeaveType(Request $request, LeaveType $leaveType)
    {
        $validatedData = $request->validate([
            'leave_type_name' => 'required|string|max:255',
            'count' => 'required|integer',
            'from_date' => 'required|date',
            'to_date' => 'required|date',
            'active' => 'required|boolean',
        ]);

        $leaveType->update($validatedData);


        return redirect()->route('leave-management.index')->with('success', 'Leave type updated successfully.');
    }

    public function deleteLeaveType(LeaveType $leaveType)
    {
        $leaveType->delete();

        return redirect()->route('leave-management.index')->with('success', 'Leave type deleted successfully.');
    }

}
