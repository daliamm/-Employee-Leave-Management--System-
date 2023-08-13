<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function LoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $validatedData  = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);
        // $user = User::create([
        //     'name' => $validatedData['name'],
        //     'email' => $validatedData['email'],
        //     'password' => bcrypt($validatedData['password']),
        // ]);
        if (Auth::attempt($validatedData )) {
           $user = Auth::user();

            if ($user->type === 'admin') {
                return redirect()->route('dashboard.index')->with('success', 'Logged In Successfully as Admin');
            } else {
                return redirect()->route('my-requests.index')->with('success', 'Logged In Successfully');
            }
        }
        return redirect()->back()->withErrors(['email' => 'Invalid credentials.']);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        return redirect()->route('login')->with('success', 'You have been logged out.');
    }
}
