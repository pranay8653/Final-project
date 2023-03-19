<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class SessionController extends Controller
{
    public function login(Request $request)
    {
        $data = $request->validate([
            'email' => ['required', 'string', 'max:200'],
            'password' => ['required', 'string', 'max:16', 'min:6'],
        ]);

            $login_credentials = [
            'email'     => $request->email,
            'password'  => $request->password
                ];
            $user = User::where('email', $login_credentials['email'])->first();

            if(Auth::attempt(  $login_credentials ))
            {
                if(Auth::user()->profile_type == 'App\Models\Admin')
                 {
                     return view('pages.admin_dashboard.dashboard');
                 }
                 else
                 {
                    return view('pages.student_dashboard.dashboard');
                 }

            }
            else
            {
            return back()->withErrors(['password' => 'wrong password']);
            }

    }
    public function admin_profile(){
        $profile = Auth::user();
        $profile_name = Auth::user()->profile;
        return view('pages.admin_dashboard.profile', compact('profile','profile_name'));
    }
    public function student_profile(){
        $profile = Auth::user();
        $profile_name = Auth::user()->profile;
        return view('pages.student_dashboard.profile', compact('profile','profile_name'));
    }
    public function logout()
     {
         Auth::logout();
         return redirect()->route('login');
     }
}
