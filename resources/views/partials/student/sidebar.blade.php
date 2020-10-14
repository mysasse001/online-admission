<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('student.dashboard')}}" class="brand-link">

      <span class="brand-text font-weight-light">Student</span>
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
          <li class="nav-item"><a class="nav-link" href="{{ route('student.dashboard') }}">My Dashboard</a></li>

          <li class="nav-item"><a class="nav-link" href="{{ route('application.create') }}"> <i class="fa fa-user" aria-hidden="true"></i> Update your profile</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ route('apply-admission') }}"> <i class="fa fa-folder" aria-hidden="true"></i> Apply for admission</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ route('student.pdf') }}">  View Full info</a></li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
