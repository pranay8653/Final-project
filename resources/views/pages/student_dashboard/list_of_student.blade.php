@extends('layouts.application')
@section('list_of_students_select','active')
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
            <h6 class="m-0 font-weight-bold text-primary">List Of Student Details</h6>
            <h3>Total students:{{ $student_count }}</h3>
            <div align="right">
                <a href="{{ route('student.trash') }}">
                    <button type="button" class="btn btn-danger"> <i class="fa fa-recycle" aria-hidden="true"></i>
                        Recycle Bin</button>
                </a>
            </div>
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
                           <a href="{{ route('department.student_index', ['id' => $student->department->id]) }}">{{ $student->department->name}}</a>
                           </td>
                           <td>
                                <a href="{{ route('student.edit',['id' => $student->id]) }}">
                                <button type="button" class="btn btn-warning m-2">Edit Details</button>
                                </a>
                                <a href="{{ route('student.edit.marks',['id' => $student->id]) }}">
                                <button type="button" class="btn btn-light m-2">Edit Marks</button>
                                </a>
                                <a href="{{ route('student.delete',['id' => $student->id]) }}">
                                <button type="button" class="btn btn-danger m-2"> Recycle</button>
                                </a>
                           </td>
                         </tr>
                       @endforeach

                    </tbody>

                </table>
                <div >
                    <p >
                        {{ $students->render('pagination::bootstrap-4') }}
                    </p>
                </div>
                <div>
                    Showing{{ $students->firstItem() }} to {{ $students->lastItem() }} of
                    {{ $students->total() }} entries
                </div>
            </div>

        </div>
    </div>

</div>
<!-- /.container-fluid -->
@endsection
