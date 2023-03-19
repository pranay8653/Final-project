@extends('layouts.application')
@section('content')
<form action="{{ route('student.update.marks',['id' =>$students->id]) }}" class="sign-up-form" method="POST">
    @csrf
    @method('PATCH')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error  )
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
<div class="col-sm-6">
    <label for="">Student Obtain marks</label>
    <input type="number" class="form-control form-control-user" id="exampleInputMarks"
       placeholder="Enter Student Marks" name="marks"  value="{{ $students->marks }}">
</div>
<button type="submit" class="btn btn-primary btn-user btn-block">
    Update marks
</button>
</form>
@endsection
