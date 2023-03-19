<?php

namespace App\Http\Controllers;

use App\Mail\AdminAfterSavePasswordMail;
use App\Mail\AfterSavePasswordMail;
use App\Mail\StudentAfterSavePasswordMail;
use App\Models\student;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Session;


class UserController extends Controller
{
    public function password_store(Request $request){
        $data = $request->validate([
            'token' =>['required', 'string'],
            'password' => ['required', 'string', 'max:16', 'min:6', 'confirmed'],
        ]);
        if($check = student::where('token',$request->token)->first())
         {
             if(!is_null($check))
             {
                $check->user()->create([
                    'name' =>$check['student_name'],//
                    'email' =>$check['email'],
                    'password' =>Hash::make($data['password'])
                ]) ;
                // $check['token'] = NULL;
                // $check->update();
                $check->update(['token'=>NULL]);
                $mail_subject = "Student password";
                Mail::to($check->email)->send(new StudentAfterSavePasswordMail($mail_subject, $data['password'],$check));
             }
         }

        elseif($check = Admin::where('token',$data['token'])->first())
         {
            if(!is_null($check)){
                $check->user()->create([
                    'name' => $check['name'],
                    'email' => $check['email'],
                    'password' => Hash::make($data['password']),

            ]);
            $check->update(['token'=>NULL]);
            $mail_subject = "Authority password";
            Mail::to($check->email)->send(new AdminAfterSavePasswordMail($mail_subject, $data['password'],$check));
            }

         }
    return redirect()->route('login')->with('Status','Your Password send Your Mail Id');
    }


    public function admin_edit(){
        $profile = Auth::user();
        $profile_name = Auth::user()->profile;
        return view('pages.admin_dashboard.edit_profile', compact('profile','profile_name'));
    }
    //student update profile function
    public function student_edit_profile(){
        $profile = Auth::user();
        $profile_name = Auth::user()->profile;
        return view('pages.student_dashboard.edit_profile', compact('profile','profile_name'));
    }

    public function admin_update_profile(Request $request){
       $data = $request->validate([
        'name'=>['required', 'string', 'max:200'],
        'email' => ['required', 'string', 'max:200'],
        'phone_number' => ['required', 'string', 'digits:10'],
        'address' => ['required', 'string', 'max:300'],
        'dob' => ['required'],
        'gender' => ['required']
        ]);


       /** @var User $user */
       $user = Auth::user();


       $user->profile()->update($data);
       $user->update([
           'name' => $request['name']
       ]);
       Session::flash('sussess', 'Profile Successfully updated');
       return redirect()->route('admin.profile');
    }
    // student update function
    public function student_update_profile(Request $request){
       $data = $request->validate([
        'student_name'=>['required', 'string', 'max:200'],
        'guardians_name'=>['required', 'string', 'max:200'],
        'email' => ['required', 'string', 'max:200'],
        'phone_number' => ['required', 'string', 'digits:10'],
        'address' => ['required', 'string', 'max:300'],
        'dob' => ['required'],
        'gender' => ['required']
        ]);


       /** @var User $user */
       $user = Auth::user();


       $user->profile()->update($data);
       $user->update([
           'name' => $request['student_name']
       ]);
       Session::flash('sussess', 'Profile Successfully updated');
       return redirect()->route('student.profile');
    }

    public function admin_update_profile_photo(Request $request)
    {
        $data = $request->validate([
            'image_file'=>['required','mimes:png,jpg,jpeg', 'max:1024']
        ]);

        $file_path = 'assets/uploads/admins/profile_pictures';
        File::isDirectory($file_path) or File::makeDirectory($file_path, 0777, true, true);
        $file_name = Carbon::now()->timestamp;
        $file_extension = $request['image_file']->getClientOriginalExtension();
        $data['image_file']->move($file_path, $file_name.'.'.$file_extension);

        /** @var User $user */
        $user = Auth::user();
        $user->profile()->update([
            'image' => $file_name.'.'.$file_extension,
        ]);
        return redirect()->route('admin.profile');
    }
}
