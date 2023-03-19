@extends('layouts.application')
@section('content')

<div class="container">
    <h1>This the a student profile</h1>
    <div class="main-body">
        <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-column align-items-center text-center">
                            <img src="{{ asset('assets/img/user-avatar.svg.png') }}" alt="Admin" class="rounded-circle" width="140">
                            <div class="mt-3">
                                 {{ $profile_name->student_name}}
                                {{-- <h4>{{ $profile->name }}</h4> --}}
                                <p class="text-secondary mb-1">{{ $profile->user_type }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="row">
                            {{-- <div class="col-sm-3">
                                <h6 class="mb-0">Full Name</h6>
                            </div> --}}

                            <div class="col-sm-9 text-secondary">
                                <label for="name"><strong style="color: blue">Name Of The Student:</strong> </label>
                                {{ $profile_name->student_name}}
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <label for="name"><strong style="color: blue">Name Of The Gurardians of Student:</strong> </label>
                                {{ $profile_name->guardians_name}}
                            </div>

                            <div class="col-sm-9 text-secondary">
                                <label for="name"><strong style="color: blue">Email:</strong> </label>
                               {{ $profile_name->email  }}
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <label for="name"><strong style="color: blue">Address:</strong> </label>
                                {{ $profile_name->address }}
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <label for="name"><strong style="color: blue">gender: </strong></label>
                                {{ $profile_name->gender }}
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <label for="name"><strong style="color: blue">Date Of birth:</strong> </label>
                                {{ $profile_name->dob }}
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <label for="name"><strong style="color: blue">phone number:</strong> </label>
                                {{ $profile_name->phone_number }}
                                {{-- {{ $profile_name->name ?? $profile_name->address }} --}}
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <label for="name"><strong style="color: blue">Department:</strong> </label>
                                {{ $profile_name->department->name}}
                                {{-- {{ $profile_name->name ?? $profile_name->address }} --}}
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <label for="name"><strong style="color: blue"> Created At :</strong> </label>
                               {{ $profile->created_at->diffForHumans() }}
                            </div>
                     </div>
                    </div>

                        {{-- <div class="row">
                            <div class="col-sm-3">
                                <h6 class="mb-0">Email</h6>
                            </div>

                            <div class="col-sm-9 text-secondary">
                                {{ $profile->email }}
                            </div>
                        </div> --}}



                        <div class="row">
                            <div class="col-sm-12 mr-2">
                                {{-- <a class="btn btn-primary mt-2" href="{{ route('admin.edit.profile') }}">Edit Profile</a> --}}
                                {{-- <a href="{{ route('change_password') }}" class="btn btn-primary mt-2"> Change Password</a> --}}
                                <a class="btn btn-primary mt-2" href="{{ route('student.edit.profile') }}">Edit Profile</a>
                                <button class="btn btn-primary mt-2">Change Profile Picture</button>
                            </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
