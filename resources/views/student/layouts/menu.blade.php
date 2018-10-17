<ul class="navbar-nav navbar-sidenav" id="exampleAccordion">

    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
      <a class="nav-link" href="{{ url('/profile/'. auth()->user()->name) }}">
        {{-- <i class="fa fa-fw fa-wrench"></i> --}}
        <img  id="blah" src="{{ asset('uplaod/user/'.auth()->user()->image) }}" alt="User Image">
        <span class="nav-link-text">My profile</span>
      </a>
    </li>

    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
      <a class="nav-link" href="{{ url('/courses-grid') }}">
        <i class="fa fa-fw fa-dashboard"></i>
        <span class="nav-link-text">All Courses</span>
      </a>
    </li>
    
    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
      <a class="nav-link" href="{{ url('/dashboard/my-course') }}">
        <i class="fa fa-fw fa-dashboard"></i>
        <span class="nav-link-text">My Courses</span>
      </a>
    </li>


</ul>