<ul class="navbar-nav navbar-sidenav" id="exampleAccordion">

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="{{ url('/admin/my-profile') }}">
            {{-- <i class="fa fa-fw fa-wrench"></i> --}}
            <img  id="blah" src="{{ asset('uplaod/user/'.auth()->user()->image) }}" alt="User Image">
            <span class="nav-link-text">My profile</span>
          </a>
        </li>

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="{{ url('/admin') }}">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Dashboard</span>
          </a>
        </li>

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Settings">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#Settings" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-edit"></i>
            <span class="nav-link-text">Settings</span>
          </a>
          <ul class="sidenav-second-level collapse" id="Settings">
            <li>
              <a href="{{ url('/admin/settings') }}">Setting Home Page</a>
            </li>
            <li>
              <a href="{{ url('/admin/settings/social-media') }}">Links Social Media</a> 
            </li>
            <li>
              <a href="{{ url('/admin/settings/why-choose') }}">Why choose</a> 
            </li>
            <li>
              <a href="{{ url('/admin/settings/our-founders') }}">Our Founders</a> 
            </li>
            <li>
              <a href="{{ url('/admin/faqs') }}">Faqs</a> 
            </li>
          </ul>
        </li>

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Messages">
          <a class="nav-link" href="{{ url('/admin/media-gallery') }}">
            <i class="fa fa-fw fa-camera"></i>
            <span class="nav-link-text">Media Gallery</span>
          </a>
        </li>


        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Accounts Users">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#accountsUsers" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-users"></i>
            <span class="nav-link-text">Accounts Users</span>
          </a>
          <ul class="sidenav-second-level collapse" id="accountsUsers">
            <li>
              <a href="{{ url('/admin/admins') }}">Admins</a>
            </li>
            {{-- <li>
              <a href="{{ url('/admin/users') }}">Users</a>
            </li> --}}
            <li>
             <a href="{{ url('/admin/teachers') }}">Teachers</a>
            </li>
            <li>
             <a href="{{ url('/admin/students') }}">Students</a>
            </li>
          </ul>
        </li>

		<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Messages">
      <a class="nav-link" href="{{ url('/admin/messages') }}">
        <i class="fa fa-fw fa-envelope-open"></i>
        <span class="nav-link-text">Messages
        <?php $contacts = DB::table('contacts')->where('done_read', 0)->count(); ?>
          @if(!empty($contacts))
          <span class="badge badge-pill badge-primary">{{ $contacts }} New</span>
          @endif
        </span>
      </a>
    </li>

    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Newsletter">
      <a class="nav-link" href="{{ url('/admin/newsletter') }}">
        <i class="fa fa-fw fa-newspaper"></i>
        <span class="nav-link-text">Newsletter</span>
      </a>
    </li>

    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Blog">
      <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#blog" data-parent="#exampleAccordion">
        <i class="fa fa-fw fa-gg"></i>
        <span class="nav-link-text">Blog</span>
      </a>
      <ul class="sidenav-second-level collapse" id="blog">
        <li>
          <a href="{{ url('/admin/blog/category') }}">Categories</a>
        </li>
        <li>
          <a href="{{ url('/admin/blog/posts') }}">Posts</a>
        </li>
      </ul>
    </li>

    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Messages">
      <a class="nav-link" href="{{ url('/admin/courses-categories') }}">
        <i class="fa fa-fw fa-camera"></i>
        <span class="nav-link-text">Courses Categories</span>
      </a>
    </li>

	<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Bookings">
      <a class="nav-link" href="{{ url('/admin/courses') }}">
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
      <a class="nav-link" href="{{ url('/admin/files') }}">
        <i class="fa fa-fw fa-file"></i>
        <span class="nav-link-text">Files</span>
      </a>
    </li>

    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Add Courses">
      <a class="nav-link" href="{{ url('/admin/add-courses') }}">
        <i class="fa fa-fw fa-plus-circle"></i>
        <span class="nav-link-text">Add Courses</span>
      </a>
    </li>

    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Add Courses">
      <a class="nav-link" href="{{ url('/admin/coupon') }}">
        <i class="fa fa-fw fa-industry"></i>
        <span class="nav-link-text">Coupon</span>
      </a>
    </li>



		{{-- <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Reviews">
          <a class="nav-link" href="reviews.html">
            <i class="fa fa-fw fa-star"></i>
            <span class="nav-link-text">Reviews</span>
          </a>
        </li>
		<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Bookmarks">
          <a class="nav-link" href="bookmarks.html">
            <i class="fa fa-fw fa-heart"></i>
            <span class="nav-link-text">Bookmarks</span>
          </a>
        </li>
		<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Add listing">
          <a class="nav-link" href="add-listing.html">
            <i class="fa fa-fw fa-plus-circle"></i>
            <span class="nav-link-text">Add listing</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="My profile">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseProfile" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-wrench"></i>
            <span class="nav-link-text">My profile</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseProfile">
            <li>
              <a href="user-profile.html">User profile</a>
            </li>
			<li>
              <a href="teacher-profile.html">Teacher profile</a>
            </li>
          </ul>
        </li>
		<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-gear"></i>
            <span class="nav-link-text">Components</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseComponents">
            <li>
              <a href="charts.html">Charts</a>
            </li>
			<li>
              <a href="tables.html">Tables</a>
            </li>
          </ul>
        </li> --}}
      </ul>