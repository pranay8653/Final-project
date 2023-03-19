<?php

namespace App\Http\Controllers;

use App\Mail\WelcomeStudentMail;
use App\Models\Department;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;
use App\Models\student;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Validator;

class StudentController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'student_name' => ['required', 'string', 'max:100'],
            'guardians_name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'string', 'max:200' ],
            'phone_number' =>  ['required', 'string', 'digits:10'],
            'marks' => ['required', 'string', 'digits:3'],
            'address' => ['required', 'string', 'max:300'],
            'dob' => ['required'],
            'gender' => ['required'],
            'grade' => ['required'],
            'department_id' => ['required','exists:departments,id' ]
        ]);
            $token = Str::random(10);
            $data['token']=$token;
            student::create($data);

            $title = "WELCOME TO Student data";
            Mail::to($data['email'])->send(new WelcomeStudentMail($title, $data['token'], $data['student_name']));
            return redirect()->route('login');
   }
   public function create(){
       $d_data = Department::select('id','name')->get();
    return view('pages.student_register',compact('d_data'));
   }
   // show all department function
   public function index(){
      $students =  student::with('department')->paginate(2);
      $student_count = student::count();
     return view('pages.student_dashboard.list_of_student', compact('students','student_count'));
   }
   // temporary delete function
   public function delete($id)
    {
        $student = student::find($id);
        if(!is_null($student))
         {
            $student->delete();
         }
        return redirect()->route('list.student');
    }
    // permanent delete
    public function forceDelete($id)
     {
        $student = student::with('department')->withTrashed()->find($id);
        if(!is_null($student))
         {
            $student->forceDelete();
            $user= User::where('profile_id',$id)->delete();
         }
        return redirect()->back();
     }

    //trash function
    public function trash()
    {
        $students = student::with('department')->onlyTrashed()->get();
        return view('pages.student_dashboard.recycle',compact('students')) ;
    }
    public function edit($id)
    {
        $students = student::with('department')->find($id);
        $d_data = Department::select('id','name')->get();
        // dd($students);
        return view('pages.student_dashboard.edit',compact('students','d_data'));
    }
    public function edit_marks($id)
    {
        $students = student::find($id);
              // dd($students);
        return view('pages.student_dashboard.edit_marks',compact('students' ));
    }
    //restore function
    public function restore($id)
    {
        $students = student::with('department')->withTrashed()->find($id);
        $student_count = student::count();
        if(!is_null($students))
        {
            $students->restore();
        }
        $data = compact('students','student_count');
        return redirect()->route('list.student')->with('$data');
    }
    // update function
    public function update( Request $request, $id)
    {

        $students = student::find($id);
        $students->update(
            [
               'student_name' => $request['student_name'],
               'guardians_name' => $request['guardians_name'],
               'email' => $request['email'],
               'address' => $request['address'],
               'gender' => $request['gender'],
               'grade' => $request['grade'],
               'dob' => $request['dob'],
               'marks' => $request['marks'],
               'phone_number' => $request['phone_number'],
               'department_id' => $request['department_id']
            ]
        );
        // $data = compact('students');
        return redirect()->route('list.student');
    }
    public function update_marks( Request $request, $id)
    {
        $data = $request->validate([
            'marks' => ['required', 'string', 'digits:3'],
        ]);
        $students = student::find($id)->update([
            'marks' => $request['marks']
        ]);
        return redirect()->route('list.student');
    }
}


