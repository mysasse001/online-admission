  <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
             <li class="nav-item"><a class="nav-link {{request()->routeIs('welcome') ? 'active':'' }}" href="{{ route('welcome') }}">Home/Programmes</a></li>
             <li class="nav-item"><a class="nav-link {{request()->routeIs('home') ? 'active':'' }}" href="{{ route('home') }}">My Dashboard</a></li>
             
             <li class="nav-item"><a class="nav-link {{request()->routeIs('step1') ? 'active':'' }}
              " href="{{ route('step1') }}"> <i class="fa fa-user" aria-hidden="true"></i> Update your profile</a></li>
             <li class="nav-item"><a class="nav-link {{request()->routeIs('apply-admission') ? 'active':'' }}
              " href="{{ route('apply-admission') }}"> <i class="fa fa-folder" aria-hidden="true"></i> Upload Additional Documents</a></li>
             <li class="nav-item"><a class="nav-link {{request()->routeIs('instructions') ? 'active':'' }}
              " href="{{ route('instructions') }}"> <i class="fa fa-folder" aria-hidden="true"></i> Application Instructions</a></li>
             <li class="nav-item"><a class="nav-link {{request()->routeIs('apply-admission') ? 'active':'' }}
              " href="{{ route('apply-admission') }}"> <i class="fa fa-folder" aria-hidden="true"></i> Apply for admission</a></li>
             <li class="nav-item"><a class="nav-link" href="{{ route('student.pdf') }}">  View Full info</a></li>
     