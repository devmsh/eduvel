<ul class="navbar-nav navbar-sidenav" id="exampleAccordion">

    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
        <a class="nav-link" href="{{ url('/my-profile/'. auth()->user()->name) }}">
            {{-- <i class="fa fa-fw fa-wrench"></i> --}}
            <img id="blah" src="{{ asset('uplaod/user/'.auth()->user()->image) }}" alt="User Image">
            <span class="nav-link-text">My profile</span>
        </a>
    </li>

    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
        <a class="nav-link" href="{{ url('/dashboard') }}">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Dashboard</span>
        </a>
    </li>

    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Bookings">
        <a class="nav-link" href="{{ url('/dashboard/courses') }}">
            <i class="fa fa-fw fa-archive"></i>
            <span class="nav-link-text">Courses
                <?php $courses = DB::table('courses')->where('isActive', 0)->count(); ?>
                @if(!empty($courses))
                    <span class="badge badge-pill badge-primary">{{ $courses }} New</span>
                @endif
        </span>
        </a>
    </li>

    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Add Courses">
        <a class="nav-link" href="{{ url('/dashboard/add-courses') }}">
            <i class="fa fa-fw fa-plus-circle"></i>
            <span class="nav-link-text">Add Courses</span>
        </a>
    </li>

    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Add Courses">
        <a class="nav-link" href="{{ url('/dashboard/files') }}">
            <i class="fa fa-fw fa-file"></i>
            <span class="nav-link-text">Files</span>
        </a>
    </li>

    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Add Courses">
        <a class="nav-link" href="{{ url('/dashboard/all-comments') }}">
            <i class="fa fa-fw fa-comments "></i>
            <span class="nav-link-text">All Comments</span>
        </a>
    </li>

    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Add Courses">
        <a class="nav-link" href="{{ url('/dashboard/coupon') }}">
            <i class="fa fa-fw fa-industry"></i>
            <span class="nav-link-text">Coupon</span>
        </a>
    </li>

    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Add Courses">
        <a class="nav-link" href="{{ url('/dashboard/my-courses') }}">
            <i class="fa fa-fw fa-plus-circle"></i>
            <span class="nav-link-text">My Courses Cart</span>
        </a>
    </li>

</ul>