<?php

namespace App\Http\Controllers;

use App\Models\LeaveRequest;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        $status = $request->input('status', 'pending'); // Default status if not provided

        $requests = LeaveRequest::with('user')
            ->when($status !== 'approved', function ($query) use ($status) {
                $query->where('status', $status);
            })
            ->orderByDesc('id')
            ->paginate(5);

        return view('dashboard.admin.requests.index', [
            'requests' => $requests,
            'selectedStatus' => $status,
        ]);
    }

    public function show($id)
    {
        $leaveRequest = LeaveRequest::findOrFail($id);

        return view('dashboard.admin.requests.status', ['leaveRequest' => $leaveRequest]);
    }

    public function updateLeaveRequest(Request $request, LeaveRequest $leaveRequest)
    {
        $validatedData = $request->validate([
            'status' => 'required|in:pending,approved,rejected',
            'reply' => 'nullable|string',
        ]);

        $leaveRequest->update($validatedData);

        return redirect()->route('dashboard.index')->with('success', 'Leave request updated successfully.');
    }
}
