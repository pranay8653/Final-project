 @extends('layouts.guest')
 @section('content')

    <div class="container">
        @if(session('status'))
        <h6 class="alert alert-sucess">{{ session('status') }}</h6>
      @endif
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
                                        placeholder="Full Name" name="name">
                                    {{-- <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user" id="exampleLastName"
                                            placeholder="Last Name">
                                    </div> --}}
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" id="exampleInputEmail"
                                        placeholder="Email Address" name="email">
                                </div>
                                <div class="form-group">
                                    <i class="fas fa-mobile">
                                    <input type="mobile_number" class="form-control form-control-user" id="exampleInputEmail"
                                        placeholder="Enter Your phone number" name="phone_number">
                                    </i>
                                </div>
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


                                <div class="form-group">
                                    <label for="">Enter Address</label>
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

                                 <div class="form-group">
                                    <label for="">Date Of Birth:</label>
                                   <input type="date" name="dob">
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
