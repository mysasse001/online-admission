

    <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <li class="nav-item "><a class="nav-link {{request()->routeIs('welcome') ? 'active':''}}" href="{{ route('welcome') }}">Home</a></li>
               <li class="nav-item "><a class="nav-link {{request()->routeIs('home') ? 'active':''}}" href="{{ route('home') }}">My Dashboard</a></li>
               <li class="nav-item "><a class="nav-link {{request()->routeIs('design.index') ? 'active':''}}" href="{{ route('design.index') }}">Design</a></li>
               <li class="nav-item "><a class="nav-link {{request()->routeIs('programme.index') ? 'active':''}}" href="{{ route('programme.index') }}"><span class="badge badge-primary">{{$programmes->count()}}</span> {{$programmes->count() == 1 ? 'Programme':'Programmes'}} Dashboard</a></li>
               <li class="nav-item "><a class="nav-link {{request()->routeIs('applicationDashboard') ? 'active':''}}" href="{{ route('applicationDashboard') }}"><span class="badge badge-primary">{{$applications->count()}}</span> {{$applications->count() == 1 ? 'Application':'Applications'}} Dashboard</a></li>
               <li class="nav-item "><a class="nav-link {{request()->routeIs('admin.message.index') ? 'active':''}}" href="{{ route('admin.message.index') }}">Inquiries</a></li>
               <li class="nav-item "><a class="nav-link {{request()->routeIs('faq.index') ? 'active':''}}" href="{{ route('faq.index') }}">FAQ</a></li>
               @if(auth()->user()->id == 1)
               <li class="nav-item "><a class="nav-link {{request()->routeIs('roles') ? 'active':''}}" href="{{ route('roles') }}">Admins</a></li>
               @endif
     
               <li class="nav-item "><a class="nav-link {{request()->routeIs('admin.users') ? 'active':''}}" href="{{ route('admin.users') }}">Registered Applicants</a></li>
               <li class="nav-item "><a class="nav-link {{request()->routeIs('locations') ? 'active':''}}" href="{{ route('locations') }}">Locations</a></li>

               
               <li class="nav-item " ><a class="nav-link {{request()->routeIs('paymentOptions') ? 'active':''}}" href="{{ route('paymentOptions') }}">Payment Methods</a></li>
               <li class="nav-item "><a class="nav-link {{request()->routeIs('instructions.edit') ? 'active':''}}" href="{{ route('instructions.edit') }}">Edit Application Instructions</a></li>
               
     
     