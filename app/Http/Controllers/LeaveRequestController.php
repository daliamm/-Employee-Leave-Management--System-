<?php

namespace App\Http\Controllers;

use App\Models\LeaveRequest;
use App\Models\LeaveType;
use Illuminate\Http\Request;
use Carbon\Carbon;

class LeaveRequestController extends Controller
{
    public function index()
    {
        $user_id = auth()->user()->id;
        $leaveTypes = LeaveType::all();
        $requests = LeaveRequest::where('user_id', $user_id)->orderByDesc('id')
        ->paginate(7);           
        return view('dashboard.employee.all_requests', ['requests' => $requests, 'leaveTypes' => $leaveTypes]);
    }
    public function store(Request $request)
    {
        $user = auth()->user();
        $userTasks = $user->tasks->count();
        if ($userTasks > 2) {
            return redirect()->route('my-requests.index')->with('msg', 'You cannot create a leave request.')->with('type', 'danger');
        }

        $validatedData = $request->validate([
            'start_date' => 'required',
            'end_date' => 'required',
            'reason' => 'required',
        ]);

        $leaveTypeId = $request->input('leave_type_id');
        $manualLeaveType = $request->input('manual_leave_type');

        if ($leaveTypeId === 'other' && empty($manualLeaveType)) {
            $manualLeaveType = null;
        }

        LeaveRequest::create([
            'user_id' => $user->id,
            'leave_type_id' => $leaveTypeId === 'other' ? null : $leaveTypeId,
            'start_date' => $validatedData['start_date'],
            'end_date' => $validatedData['end_date'],
            'reason' => $validatedData['reason'],
            'manual_leave_type' => $manualLeaveType,
        ]);

        return redirect()->route('my-requests.index')->with('message', 'Leave Request Created Successfully');
    }

    public function update(Request $request, $id)
    {
        $leaveRequest = LeaveRequest::findOrFail($id);
        $user = auth()->user();
        $userTasksCount = $user->tasks->count();

        if ($userTasksCount > 3) {
            return redirect()->route('my-requests.index')->with('message', 'You cannot update the leave request because you already have more than 3 tasks.')->with('type', 'danger');
        }

        $validatedData = $request->validate([
            'start_date' => 'required',
            'end_date' => 'required',
            'reason' => 'required',
            'count'=>'required'
        ]);

        $leaveTypeId = $request->input('leave_type_id');
        $manualLeaveType = $request->input('manual_leave_type');

        if ($leaveTypeId === 'other' && empty($manualLeaveType)) {
            return redirect()->route('my-requests.index')->with('message', 'Leave Request not updated. Select a valid leave type or provide a manual leave type.')->with('type', 'danger');
        }

        $leaveRequest->update([
            'leave_type_id' => $leaveTypeId === 'other' ? null : $leaveTypeId,
            'start_date' => $validatedData['start_date'],
            'end_date' => $validatedData['end_date'],
            'reason' => $validatedData['reason'],
            'count'=>$validatedData['required'],
            'manual_leave_type' => $leaveTypeId === 'other' ? $manualLeaveType : null,
        ]);

        return redirect()->route('my-requests.index')->with('message', 'Leave request updated successfully.');
    }

    public function destroy(string $id)
    {
        $request = LeaveRequest::findOrFail($id);
        $request->delete();

        return redirect()->route('my-requests.index')->with('message', 'Leave Request Deleted Successfully');
    }
}

