@extends('layouts.application')
@section('create_new_departments_select','active')
@section('content')

   <div class="container">
       <div class="card o-hidden border-0 shadow-lg my-5">
           <div class="card-body p-0">
               <!-- Nested Row within Card Body -->
               <div class="row">
                   <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                   <div class="col-lg-7">
                       <div class="p-5">
                           <div class="text-center">
                               <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                           </div>
                           <form action="{{ route('department.store') }}" class="sign-up-form" method="POST">
                               @csrf

                               @if ($errors->any())
                                   <div class="alert alert-danger">
                                       <ul>
                                           @foreach ($errors->all() as $error  )
                                               <li>{{ $error }}</li>
                                           @endforeach
                                       </ul>
                                   </div>
                               @endif

                               <div class="form-group">
                                   <input type="text" class="form-control form-control-user" id="exampleFirstName"
                                       placeholder="Enter Department Name" name="name">

                               </div>
                               <div class="form-group">
                                   <input type="text" class="form-control form-control-user" id="exampleFirstName"
                                       placeholder="Enter HOD Name Of The department " name="hod">

                               </div>
                               <div class="form-group">
                                <div class="row justify-content-start">
                                        <div class="col-5">
                                        <input type="number" class="form-control form-control-user" id="exampleInputEmail"
                                                placeholder="Enter Allocated rooms " name="allocated_rooms">
                                        </div>
                                        <div class="col-7">
                                            <input type="number" class="form-control form-control-user" id="exampleInputEmail"
                                                placeholder="Enter Total Number Of Students " name="total_students">
                                        </div>
                                 </div>
                               </div>

                               <button type="submit" class="btn btn-primary btn-user btn-block">
                                   create
                               </button>

                           </form>
                        </div>
                   </div>
               </div>
           </div>
       </div>

   </div>
@endsection
