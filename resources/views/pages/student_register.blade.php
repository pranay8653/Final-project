@extends('layouts.guest')
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
                               <h1 class="h4 text-gray-900 mb-4">Create New Student!</h1>
                           </div>
                           <form action="{{ route('student.register') }}" class="sign-up-form" method="POST">
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
                                   <label for="">Name Of The Student</label>
                                   <input type="text" class="form-control form-control-user" id="exampleFirstName"
                                   placeholder="Full Name" name="student_name">
                               </div>

                               <div class="form-group">
                                   <label for="">Enter Your Email</label>
                                   <input type="email" class="form-control form-control-user" id="exampleInputEmail"
                                       placeholder="Email Address" name="email">
                              </div>

                               <div class="form-group">
                                   <label for="">Guardians Name</label>
                                    <input type="text" class="form-control form-control-user" id="exampleInputGuardians"
                                       placeholder="Enter Guardians Name" name="guardians_name">
                               </div>

                               <div class="form-group">
                                   <label for="">Guardians Phone Number</label>
                                    <input type="number" class="form-control form-control-user" id="exampleInputGuardians"
                                       placeholder="Enter Guardians Phone Number" name="phone_number">
                               </div>

                               <div class="form-group">
                                   <label for="">Address Of Student</label>
                                   <textarea type="text" class="form-control form-control-user" id="exampleInputaddress" cols="30" rows="3" placeholder="Enter Student Address" name="address"></textarea>
                               </div>

                               <div class="form-group">
                                   <label for="">Gender: </label>
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="radio" id="" name="gender" value="male" >
                                    <label for="male ">Male</label><br>
                                    <input type="radio" id="" name="gender" value="female">
                                    <label for="female ">Female</label><br>
                                    <input type="radio" id="" name="gender" value="others">
                                    <label for="others">Other</label>
                                </div>

                            </div>

                            <div class="form-group">
                                <label for="">Death Of Birth:</label>
                               <input type="date" name="dob">
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                   <label for="grade"> Choose a Obtain Gread:</label>
                                   <select name="grade" id="">
                                        <option value="AA">AA</option>
                                        <option value="A+">A+</option>
                                        <option value="A">A</option>
                                        <option value="B+">B+</option>
                                        <option value="B">B</option>
                                        <option value="C">C</option>
                                        <option value="Failed">Failed</option>
                                   </select>
                                </div>
                                <div class="col-sm-6">
                                    <label for="">Student Obtain marks</label>
                                    <input type="number" class="form-control form-control-user" id="exampleInputMarks"
                                       placeholder="Enter Student Marks" name="marks">
                                </div>
                            </div>

                            {{-- <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                   <label for="grade"> Choose a Obtain Gread:</label>
                                   @foreach ($d_data as $data )


                                   <select name="grade" id="">
                                        <option value="AA">AA</option>
                                        <option value="A+">A+</option>
                                        <option value="A">A</option>
                                        <option value="B+">B+</option>
                                        <option value="B">B</option>
                                        <option value="C">C</option>
                                        <option value="Failed">Failed</option>
                                   </select>
                                </div>
                                @endforeach
                            </div> --}}


                               {{-- <div class="form-group row">
                                   <div class="col-sm-6 mb-3 mb-sm-0">
                                       <input type="password" class="form-control form-control-user"
                                           id="exampleInputPassword" placeholder="Password" name="password">
                                   </div>
                                   <div class="col-sm-6">
                                       <input type="password" class="form-control form-control-user"
                                           id="exampleRepeatPassword" placeholder="Repeat Password" name="password_confirmation">
                                   </div>
                               </div> --}}
                               <label for="department_id"> Choose department</label>
                               <select name="department_id" >
                                   @foreach ($d_data as $department )
                                   <option value="{{ $department->id }}">{{ $department->name }}</option>
                                   @endforeach
                               </select>

                               <button type="submit" class="btn btn-primary btn-user btn-block">
                                   Register New Student
                               </button>

                           </form>
                           <hr>
                           {{-- <div class="text-center">
                               <a class="small" href="{{ route('forgot_pass.forgot_password') }}">Forgot Password?</a>
                           </div> --}}
                           <div class="text-center">
                               <a class="small" href="{{ route('login') }}">Already have an account? Login!</a>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </div>

   </div>
@endsection
