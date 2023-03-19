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
                               <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                           </div>
                           <form action="{{ route('admin.register') }}" class="sign-up-form" method="POST">
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
                                       placeholder="Token" name="token">
                                   {{-- <div class="col-sm-6">
                                       <input type="text" class="form-control form-control-user" id="exampleLastName"
                                           placeholder="Last Name">
                                   </div> --}}
                               </div>

                               <div class="form-group row">
                                   <div class="col-sm-6 mb-3 mb-sm-0">
                                       <input type="password" class="form-control form-control-user"
                                           id="exampleInputPassword" placeholder="Password" name="password">
                                   </div>
                                   <div class="col-sm-6">
                                       <input type="password" class="form-control form-control-user"
                                           id="exampleRepeatPassword" placeholder="Repeat Password" name="password_confirmation">
                                   </div>
                               </div>
                               <button type="submit" class="btn btn-primary btn-user btn-block">
                                   Register Account
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
