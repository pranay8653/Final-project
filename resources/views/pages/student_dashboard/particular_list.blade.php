@extends('layouts.application')
@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    {{-- <h1 class="h3 mb-2 text-gray-800">Tables</h1> --}}
    {{-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
        For more information about DataTables, please visit the </p> --}}

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">List Of Student Details {{ $department->name }}</h6>
            <h3>Total students:{{ $student_count }}</h3>
            <div align="right">
                <a href="{{ route('list.student') }}">
                    <button type="button" class="btn btn-outline-dark"> Return Main Student list</button>
                </a>
            </div>

         <div class="card-body">
            <div class="table-responsive" >
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead style="color: #ff3300; font-family: 'Bebas Neue', cursive;">
                        <tr>
                            <th>Name of Student</th>
                            <th>Name Of Guardians </th>
                            <th>Email Id</th>
                            <th>Address of Student</th>
                            <th>gender</th>
                            <th>Obtain Greade</th>
                            <th>Marks Obtain</th>
                            <th>Date Of birth Student</th>
                            <th>Phone Number Of Guardians</th>
                            <th>Name Of The Department</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tfoot style="color: #ff3300; font-family: 'Bebas Neue', cursive;">
                        <tr>
                            <th>Name of Student</th>
                            <th>Name Of Guardians </th>
                            <th>Email Id</th>
                            <th>Address of Student</th>
                            <th>gender</th>
                            <th>Obtain Greade</th>
                            <th>Marks Obtain</th>
                            <th>Date Of birth Student</th>
                            <th>Phone Number Of Guardians</th>
                            <th>Name Of The Department</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                    <tbody style="color: #0000ff; font-family: 'Fjalla One', sans-serif;">
                       @foreach ($students  as $student)
                       <tr>
                           <td>{{ $student->student_name }}</td>
                           <td>{{ $student->guardians_name }}</td>
                           <td>{{ $student->email }}</td>
                           <td>{{ $student->address }}</td>
                           <td>{{ $student->gender }}</td>
                           <td>{{ $student->grade }}</td>
                           <td>{{ $student->marks}}</td>
                           <td>{{ $student->dob}}</td>
                           <td>{{ $student->phone_number}}</td>
                           <td style="color: #002b80; font-family: 'Bebas Neue', cursive;">
                           {{ $student->department->name}}
                           </td>
                            <td>
                                {{-- <a href="{{ route('#') }}"> --}}
                                <button type="button" class="btn btn-warning m-2">Edit Details</button>
                                {{-- </a> --}}
                                {{-- <a href="{{ route('#') }}"> --}}
                                <button type="button" class="btn btn-light m-2">Edit Marks</button>
                                {{-- </a> --}}
                                <a href="{{ route('student.delete',['id' => $student->id]) }}">
                                <button type="button" class="btn btn-danger m-2"> Recycle</button>
                                </a>
                           </td>
                        </tr>
                       @endforeach
                    </tbody>
                    <p>
                        {{ $students->render('pagination::bootstrap-4') }}
                    </p>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
@endsection
