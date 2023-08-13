<?php

namespace App\Http\Controllers;

use App\Models\LeaveRequest;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class  TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::with('users')->paginate(10);
        return view('dashboard.admin.tasks.index', compact('tasks'));
    }

    public function create()
    {
        $usersWithUnapprovedRequests = User::whereHas('leaveRequests', function ($query) {
            $query->where('status', '!=', 'approved');
        })->get();

        $usersWithApprovedRequests = User::whereHas('leaveRequests', function ($query) {
            $query->where('status', 'approved');
        })->get();

        return view('dashboard.admin.tasks.create', compact('usersWithUnapprovedRequests', 'usersWithApprovedRequests'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'users' => 'required|array',
        ]);

        $task = Task::create([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        $task->users()->attach($request->users);

        return redirect()->route('tasks.index')->with('message', 'Task created successfully.');
    }

    public function edit(Task $task)
    {
        $users = User::all();
        $selectedUsers = $task->users->pluck('id')->toArray();
        return view('dashboard.admin.tasks.edit', compact('task', 'users', 'selectedUsers'));
    }

    public function update(Request $request, Task $task)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'users' => 'required|array',
        ]);

        $task->update([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        $task->users()->sync($request->users);

        return redirect()->route('tasks.index')->with('message', 'Task updated successfully.');
    }

    public function destroy(Task $task)
    {
        $task->users()->detach();
        $task->delete();
        return redirect()->route('tasks.index')->with('message', 'Task deleted successfully.');
    }
}
