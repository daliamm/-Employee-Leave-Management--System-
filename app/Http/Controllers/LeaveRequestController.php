<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\NewLeaveApplicationRequest;
use App\Models\LeaveApplication;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use App\Models\LeaveType; 
use App\Models\Employee; 
use App\Models\LeaveRequest; 
class LeaveRequestController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(NewLeaveApplicationRequest $request)
    {
        $application = new LeaveRequest();

        $application->employee_id = Auth::id(); 
        $application->leave_type_id = $request->input('leave_type'); 
        $application->start_date = $request->input('start_date'); 
        $application->end_date = $request->input('end_date'); 
        $application->reason = $request->input('reason'); 
        $application->status = 'pending'; 

        $application->save();
        Session::flash('success', 'Application Submitted Successfully.');
        return redirect()->route('homeView');
    }
    
    public function update(Request $request, LeaveRequest $application)
    {
        $application->remarks = $request['remarks'];
        $application->authorizer_user_id = Auth::id();

        if($request->has('approved')) {
            $application->status = 'approved';
        } else {
            $application->status = 'rejected';
        }
        $application->save();

        $applier = User::findOrFail($application->applier_user_id);
        
        return redirect()->back();
    }

    public function approve(LeaveRequest $leaveRequest, Request $request)
    {
        $leaveRequest->update([
            'status' => 'approved',
        ]);

        Session::flash('success', 'Leave request approved.');
        return redirect()->route('leave-requests.index');
    }

    public function deny(LeaveRequest $leaveRequest, Request $request)
    {
        $this->validate($request, [
            'denial_reason' => 'required|string',
        ]);

        $leaveRequest->update([
            'status' => 'denied',
            'denial_reason' => $request->denial_reason,
        ]);

        Session::flash('success', 'Leave request denied.');
        return redirect()->route('leave-requests.index');
    }
}