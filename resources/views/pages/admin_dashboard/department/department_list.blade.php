@extends('layouts.application')
@section('list_of_departments_select','active')
@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tables</h1>
    {{-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
        For more information about DataTables, please visit the </p> --}}

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">List Of Departments</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive" >
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead style="color: #ff3300; font-family: 'Bebas Neue', cursive;">
                        <tr>
                            <th>Name of Departments</th>
                            <th>Name Of 'HOD' </th>
                            <th>Allocated Rooms</th>
                            <th>Total Student</th>
                            <th>Admin_id</th>
                        </tr>
                    </thead>
                    <tfoot style="color: #ff3300; font-family: 'Bebas Neue', cursive;">
                        <tr>
                            <th>Name of Departments</th>
                            <th>Name Of 'HOD' </th>
                            <th>Allocated Rooms</th>
                            <th>Total Student</th>
                            <th>Admin_id</th>
                        </tr>
                    </tfoot>
                    <tbody style="color: #0000ff; font-family: 'Fjalla One', sans-serif;">
                       @foreach ($departments as $department)
                       <tr>
                           <td>{{ $department->name }}</td>
                           <td>{{ $department->hod }}</td>
                           <td>{{ $department->allocated_rooms }}</td>
                           <td>{{ $department->total_students }}</td>
                           <td>{{ $department->admin_id }}</td>
                       </tr>
                       @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
@endsection
