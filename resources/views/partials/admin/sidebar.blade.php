<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('admin-dashboard')}}" class="brand-link">

      <span class="brand-text font-weight-light">Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">

        <div class="info">
          <a href="#" class="d-block">{{ auth()->user()->name }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item"><a class="nav-link" href="{{ route('admin-dashboard') }}">My Dashboard</a></li>

          <li class="nav-item"><a class="nav-link" href="{{ route('category.index') }}">Categories</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ route('department.index') }}">Departments</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ route('intake.index') }}">Intake Name</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ route('academic-year') }}">Academic Year</a></li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">

              <p>
                Programmes
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('programme.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Programmes</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('programme.create') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Programme</p>
                </a>
              </li>

            </ul>
          </li>
          <li class="nav-item"><a class="nav-link" href="{{ route('admin.message.index') }}">Inquiries</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ route('faq.index') }}">FAQ</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ route('examinedBy.index') }}">Examined By</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ route('educationSystem.index') }}">Education System</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ route('country.index') }}">Country</a></li>

          <li class="nav-item"><a class="nav-link" href="{{ route('admin.users') }}">Registered Applicants</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ route('admin.users') }}">Registered Applicants</a></li>


        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
