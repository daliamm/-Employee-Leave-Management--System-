<?php
namespace App\Http\Controllers;
use App\Models\LeaveRequest;
use App\Models\LeaveType;
use Illuminate\Http\Request;
class AnotherLeaveTypeController extends Controller
{
    public function index()
    {
        $types = LeaveType::orderBy('id', 'desc')->paginate(5);
        return view('dashboard.admin.leave_types.index', ['types' => $types]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        LeaveType::create($validatedData);
        return redirect()->route('leave-types.index')->with('message', 'Leave Type Created Successfully');
    }

    public function update(Request $request, LeaveType $type)
    {
        $validatedData = $request->validate([
            'title' => 'nullable',
            'description' => 'nullable',
        ]);

        $type->update($validatedData);

        return redirect()->route('leave-types.index')->with('message', 'Leave Type Updated Successfully')->with('type', 'success');
    }

    public function destroy(string $id)
    {
        $type = LeaveType::findOrFail($id);
        $type->delete();

        return redirect()->route('leave-types.index')->with('message', 'Leave Type Deleted Successfully')->with('type', 'danger');
    }

    public function getLeaveRequestByType($id)
    {
        $requests = LeaveRequest::where('leave_type_id', $id)->orderBy('id', 'desc')->get();
        return view('dashboard.admin.leave_types.requests', ['requests' => $requests]);
    }
}