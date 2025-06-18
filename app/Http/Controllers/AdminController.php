<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $user_type = Auth::user()->user_type;
            if ($user_type === 'admin') {
                return redirect()->route('back.index');  
            } else {
                return redirect()->route('dashboard');
            }
        }

        return view('auth.login'); 
    }

    public function admin(){
        return view('back.index');

    }
}
