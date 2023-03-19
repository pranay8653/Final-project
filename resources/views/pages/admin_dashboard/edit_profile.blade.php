@extends('layouts.application')
@section('content')

<div class="card">
    <h5 class="card-header">Edit profile</h5>
    <div class="card-body">
        <h5 class="card-title">Edit Profile</h5>
        <form action="{{ route('admin_update.profile') }}" method="POST">
            @csrf
            @method('PUT')
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
                <label class="star-icon" for="name">Name</label>
                {{-- <input type="text" class="form-control" id="name" value="{{ $profile_name->name ?? $profile_name->student_name }}" name="name" required> --}}
                <input type="text" class="form-control" value="{{ $profile_name->name }}" name="name" required>
                {{-- <input type="text" class="form-control" id="name" value="{{ $profile_name->address ?? $profile_name->guardians_name }}" name="name" required> --}}
            </div>
            <div class="form-group">
                <label class="star-icon" for="address">address</label>
                {{-- <input type="text" class="form-control" id="name" value="{{ $profile_name->name ?? $profile_name->student_name }}" name="name" required> --}}
                <input type="text" class="form-control" value="{{ $profile_name->address }}" name="address" required>
                {{-- <input type="text" class="form-control" id="name" value="{{ $profile_name->address ?? $profile_name->guardians_name }}" name="name" required> --}}
            </div>

            <div class="form-group">
                <label class="star-icon" for="email">Email</label>
                <input type="email" class="form-control"  value="{{ $profile->email }}" name="email" readonly>
            </div>
            <div class="form-group">
                <label class="star-icon" for="phone_number">Phone Number</label>
                <input type="text" class="form-control"  value="{{ $profile_name->phone_number }}" name="phone_number"   required>
            </div>
            {{-- <div class="form-group">
                <label class="star-icon" for="gender">gender</label>
                <input type="number" class="form-control" id="" value="{{ $profile_name->gender }}" name="gender" required>
            </div> --}}
            <div class="form-group">
                <label for="">Gender: </label>
             <div class="col-sm-6 mb-3 mb-sm-0">
                 <input type="radio" name="gender" value="male" {{ $profile_name->gender == 'male' ? 'checked' : '' }} >
                 <label for="male ">Male</label><br>
                 <input type="radio" name="gender"  value="female" {{ $profile_name->gender == 'female' ? 'checked' : '' }}>
                 <label for="female ">Female</label><br>
                 <input type="radio" name="gender"  value="others" {{ $profile_name->gender == 'others' ? 'checked' : '' }}>
                 <label for="others">Other</label>
             </div>
            </div>
            <div class="form-group">
                <label for="">Date Of Birth:</label>
                <div class="col-sm-2 mb-3 mb-sm-0">
               <input type="date" class="form-control" name="dob" value="{{  $profile_name->dob }}">
                </div>
            </div>
            <div class="form-group float-right">
                <button type="submit" class="btn btn-primary mt-1">
                    <i class="fas fa-arrow-circle-up"></i> Update Profile
                </button>

                <a href="{{ route('admin.profile') }}" class="btn btn-danger mt-1">
                    <i class="far fa-times-circle"></i> Cancel
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
