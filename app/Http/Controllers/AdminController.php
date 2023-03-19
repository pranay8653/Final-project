<?php

namespace App\Http\Controllers;


use App\Mail\AdminRegisterMail;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    public function store(Request $request){
        $data = $request->validate([
            'name' => ['required', 'string', 'max:200'],
            'email' => ['required', 'string', 'max:200'],
            'phone_number' => ['required', 'string', 'digits:10', 'unique:admins'],

            'address' => ['required', 'string', 'max:300'],
            'dob' => ['required'],
            'gender' => ['required']
           ]);

        $token = Str::random(10);
        $data['token'] = $token;
        $admin = Admin::create($data);
        //    $admin = Admin::create([
        //     'name' => $data['name'],
        //     'email' => $data['email'],
        //     'phone_number' => $data['phone_number']
        //    ]);
        //    $admin->user()->create([
        //     'email' => $request['email'],
        //     'password' => Hash::make($request['password']),
        //     ]);


        //    $admin->user()->create(['name' => $admin->name, 'email' => $admin->email,  'password' => Hash::make($password)]);
           //$mail_subject = "WELCOME Sir ";
           Mail::to($admin->email)->send(new AdminRegisterMail($admin));
           return redirect()->route('login')->with('Status','Register Sucessful');
        //    Mail::to($admin->email)->send(new AdminRegisterMail($mail_subject, $data['password'], $admin));
        //    return redirect()->route('login')->with('Status','Register Sucessful');
    }
}
