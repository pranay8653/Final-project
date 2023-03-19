<?php
namespace App\Http\Controllers;

use App\Mail\After_Send_Forgot_Password_Mail;
use App\Mail\ForgotPasswordMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class ForgotPasswordController extends Controller
{
    public function forgot(Request $request){
        $data = $request->validate([
            'email' => ['required', 'string', 'max:200', 'exists:users']
        ]);

        $token = Str::random(15);
        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);
        $mail_subject = "Reset Password";
        $user = User::where('email', $data['email'])->first();
        Mail::to($data['email'])->send(new ForgotPasswordMail($mail_subject, $token, $user));
        Session::flash('success', "Reset password link send on { $request->email }!");
        return redirect()->route('login');
    }

    public function reset(Request $request){
    $data = $request->validate([
        'password' => ['required', 'string', 'max:16', 'min:6', 'confirmed'],
        'token' => ['required', 'string', 'size:15', 'exists:password_resets']
    ]);
    $token = DB::table('password_resets')->where('token', $request['token'])->first();

    if($user=User::where('email',$token->email)->first()){
        $user->password = Hash::make($data['password']);
        $user->save();
        DB::table('password_resets')->where('email',$user->email)->delete();
    }

    Session::flash('success', "Reset password Sucessfully");
    /** @var User $user, $email */
    $mail_subject = "Reset Password";
    Mail::to($user['email'])->send(new After_Send_Forgot_Password_Mail($user,$data['password'],$mail_subject));
    return redirect()->route('login');
    }
}
