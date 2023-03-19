<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class DepartmentController extends Controller
{
    public function index(){
        $departments = Department::all();
        return view('pages.admin_dashboard.department.department_list', compact('departments'));
    }
       public function create(){
        return view('pages.admin_dashboard.department.create');
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:200'],
            'hod' => ['required', 'string', 'max:200'],
            'allocated_rooms' => ['required'],
            'total_students' => ['required']
        ]);
        $admin = Auth::user()->profile()->first();

        $admin->departments()->create([
            'name' => $data['name'],
            'hod' => $data['hod'],
            'allocated_rooms' => $data['allocated_rooms'],
            'total_students' => $data['total_students']
        ]);
        Session::flash('alert-success','denger');
        // return view('pages.admin_dashboard.dashboard');
        return redirect()->route('admin.dashboard');

    }
    public function student_index($id){
        $department = Department::find($id);
        // $students = $department->students()->get();
        $students = $department->students()->paginate(2);
        $student_count = $department->students()->count();
        return view('pages.student_dashboard.particular_list', compact('students','student_count','department'));
    }
}

