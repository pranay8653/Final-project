@extends('layouts.application')
@section('content')

<div class="container">
    <div class="main-body">
        <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-column align-items-center text-center">
                            <img src="{{ asset('assets/uploads/admins/profile_pictures/'.$profile->profile()->first()->image) }}" alt="Admin" class="rounded-circle" width="250">
                            <div class="mt-3">
                                 {{ $profile_name->name}}
                                {{-- <h4>{{ $profile->name }}</h4> --}}
                                <p class="text-secondary mb-1">{{ $profile->user_type }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 mr-2">
                                <form action="{{ route('admin.update.profile.photo') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error  )
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <input type="file" placeholder="Insert your Image" name="image_file" required>
                                <button class="btn btn-primary mt-2" type="submit">Change Profile Picture</button>
                               </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-9 text-secondary">
                                <label for="name">Name: </label>
                                {{ $profile_name->name}}
                                {{-- {{ $profile_name->name ?? $profile_name->student_name }} --}}
                            </div>

                            <div class="col-sm-9 text-secondary">
                                <label for="name">Email: </label>
                               {{ $profile_name->email  }}
                               {{-- {{ $profile_name->email ?? $profile_name->guardians_name }} --}}

                            </div>
                            <div class="col-sm-9 text-secondary">
                                <label for="name">Address: </label>
                                {{ $profile_name->address }}
                                {{-- {{ $profile_name->name ?? $profile_name->address }} --}}
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <label for="name">Date Of birth: </label>
                                {{ $profile_name->dob }}
                                {{-- {{ $profile_name->name ?? $profile_name->address }} --}}
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <label for="name">Gender: </label>
                                {{ $profile_name->gender }}
                                {{-- {{ $profile_name->name ?? $profile_name->address }} --}}
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <label for="name">Phone Number: </label>
                                {{ $profile_name->phone_number }}
                                {{-- {{ $profile_name->name ?? $profile_name->address }} --}}
                            </div>
                            <div class="col-sm-9 text-secondary">
                                <label for="name">Profile Created At: </label>
                               {{ $profile->created_at->diffForHumans() }}
                            </div>
                        </div>
                    </div>

                    <a class="btn btn-primary mt-2 col-sm-2 offset-sm-1" href="{{ route('admin_edit.profile') }}">Edit Profile</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
