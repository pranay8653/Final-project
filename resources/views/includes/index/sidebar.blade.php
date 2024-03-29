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
    <li class="nav-item @yield('dashboard_select')">
        <a class="nav-link" href="index.html">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
        </li>

    <!-- Divider -->
    <hr class="sidebar-divider">


<li class="nav-item @yield('create_new_departments_select')">
    <a class="nav-link" href="{{ route('department.create') }}">
        <i class="fa fa-history">  Create New Departments</i>
        </a>
</li>
<li class="nav-item @yield('list_of_departments_select')" >
    <a class="nav-link" href="{{ route('list.department') }}">
        <i class="fa fa-history"> list Of Department</i>
        </a>
</li>
<li class="nav-item @yield('list_of_students_select')" >
    <a class="nav-link" href="{{ route('list.student') }}">
        <i class="fa fa-history">  List Of Student</i>
        </a>
</li>


    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>



    </ul>
    <!-- End of Sidebar -->
