<?php

namespace App\Http\Controllers;

use App\Models\LeaveRequest;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EmployeeController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('query');

        $users = User::where(function ($queryBuilder) use ($query) {
            if ($query) {
                $queryBuilder->where('name', 'like', '%' . $query . '%')
                             ->orWhere('email', 'like', '%' . $query . '%');
            }
        })
            ->orderByDesc('id')
            ->paginate(5);

        return view('dashboard.admin.employee.index', [
            'users' => $users,
            'query' => $query,
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $user = new User($validatedData);
        $user->password = bcrypt($validatedData['password']);
        $user->save();

        return redirect()->route('employees.index')->with('message', 'Employee Created Successfully')->with('type', 'success');
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|min:6',
        ]);

        $user = User::findOrFail($id);
        $user->fill($validatedData);
        if ($request->filled('password')) {
            $user->password = bcrypt($validatedData['password']);
        }
        $user->save();

        return redirect()->route('employees.index')->with('message', 'Employee Updated Successfully')->with('type', 'success');
    }

    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('employees.index')->with('message', 'Employee Deleted Successfully')->with('type', 'danger');
    }

    public function getLeaveRequestByUserId($id)
    {
        $requests = LeaveRequest::where('user_id', $id)->get();
        return view('dashboard.admin.employee.employee_request', compact('requests'));
    }

    public function tasksByCurrentUser()
    {
        $user = auth()->user();
        $tasks = $user->tasks;
        return view('dashboard.employee.tasks.index', ['tasks' => $tasks]);
    }

    public function leave(Request $request, Task $task)
    {
        $user = auth()->user();
        $task->users()->detach($user->id);
        return redirect()->route('tasks.myTasks')->with('message', 'You left the task successfully.');
    }

    public function show(Task $task)
    {
        $task->load('users');
        return view('dashboard.employee.tasks.show', compact('task'));
    }
}
