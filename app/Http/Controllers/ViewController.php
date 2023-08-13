<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ViewController extends Controller
{
    public function index()
    {
        return view('view');
    }

    public function redirectToLogin(Request $request, $userType)
    {
        if ($userType === 'employee') {
            return Redirect::route('login'); 
        } elseif ($userType === 'admin') {
            return Redirect::route('admin.login'); 
        } else {
        }
    }
}
