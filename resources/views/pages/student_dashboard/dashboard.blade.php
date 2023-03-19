@extends('layouts.application')
@section('content')
pranay mondal. Student dashboard.
@endsection





{{-- <!DOCTYPE html>
<html lang="en">
<head>
    @include('includes.index.header')
</head>
    <body id="page-top">

    <div id="wrapper">
          <!-- Sidebar -->
                <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

                    <!-- Sidebar - Brand -->
                    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                        <div class="sidebar-brand-icon rotate-n-15">
                            <i class="fas fa-laugh-wink"></i>
                        </div>
                        <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
                    </a>

                    <!-- Divider -->
                    <hr class="sidebar-divider my-0">

                    <!-- Nav Item - Dashboard -->
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ route('student.dashboard') }}">
                            <i class="fas fa-fw fa-tachometer-alt"></i>
                            <span>Dashboard</span></a>
                    </li>

                    <!-- Divider -->
                    <hr class="sidebar-divider">

                    <!-- Heading -->
                    <div class="sidebar-heading">
                        Student Information
                    </div>

                    <!-- Nav Item - Edit Student Information Menu -->
                    <li class="nav-item ">
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                            aria-expanded="true" aria-controls="collapseTwo">
                            <i class="fa fa-info-circle"></i>
                                <span>Information</span>
                        </a>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                            <div class="bg-white py-2 collapse-inner rounded">
                                <h6 class="collapse-header">Edit Student Information</h6>
                                <a class="collapse-item" href="{{ route('student.information') }}"><i class="fa fa-graduation-cap"> Student Information</i> </a>
                                <a class="collapse-item" href="{{ route('change.password') }}"><i class="fa fa-key"> Change Password</i> </a>
                                <a class="collapse-item" href="{{ route('edit.information') }}"><i class="fa fa-info-circle"> Edit Information</i>  </a>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="#"  data-target="#collapseTwo"
                            aria-expanded="true" aria-controls="collapseTwo">
                            <i class="fa fa-history"></i>
                            <span>Result Of Exams </span>
                        </a>
                    </li>

                    <!-- Heading -->
                    <div class="sidebar-heading">
                        Questions
                    </div>
                    <!-- Nav Item - Utilities Collapse Menu -->
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                            aria-expanded="true" aria-controls="collapseUtilities">
                            <i class="fa fa-book"></i>
                            <span>Question Bank </span>
                        </a>
                        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                            data-parent="#accordionSidebar">
                            <div class="bg-white py-2 collapse-inner rounded">
                                <h6 class="collapse-header">Question:</h6>
                                <a class="collapse-item" href="utilities-color.html"><i class="fa fa-question"> MCQ Question </i></a>
                                <a class="collapse-item" href="utilities-border.html"><i class="fa fa-question-circle"> Broad Question</i> </a>
                            </div>
                        </div>
                    </li>

                    <!-- Heading -->
                    <div class="sidebar-heading">
                        Questions
                    </div>

                    <li class="nav-item">
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAssignment" aria-expanded="true" aria-controls="collapseAssignment">
                            <i class="fa fa-envelope"></i>
                            <span>Assignment</span>
                        </a>
                        <div id="collapseAssignment" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                            <div class="bg-white py-2 collapse-inner rounded">
                                <h6 class="collapse-header">Exam Type: </h6>
                                <a class="collapse-item" href="login.html"><i class="fa fa-question"> MCQ Assignment</i></a>
                                <a class="collapse-item" href="register.html"><i class="fa fa-question-circle"> Broad Assignment</i></a>
                            </div>
                        </div>
                    </li>



                    <!-- Sidebar Toggler (Sidebar) -->
                    <div class="text-center d-none d-md-inline">
                        <button class="rounded-circle border-0" id="sidebarToggle"></button>
                    </div>

                </ul>
                <!-- End of Sidebar -->



        <div id="content-wrapper" class="d-flex flex-column min-vh-100">
            <!-- Main Content -->
            <div id="content">
                @include('includes.index.topbar')

                <!-- Bigin Page Content -->

            </div>
            @include('includes.index.footer')
        </div>
    </div>
        @include('includes.index.scrolltotop')
        @include('includes.index.logout')
        @include('includes.index.script')
    </body>

</html> --}}
