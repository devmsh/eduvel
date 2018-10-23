<div id="main_menu">
    <div class="container">
        <nav class="version_2">
            <div class="row">
                <div class="col-md-2">
                    <h3>Home</h3>
                    <ul>
                        <li><a href="{{ url('/') }}">Home Page</a></li>
                    </ul>
                </div>
                <div class="col-md-2">
                    <h3>Courses</h3>
                    <ul>
                        <li><a href="{{ url('courses-grid') }}">Courses grid</a></li>

                        <li><a href="{{ url('courses-list') }}">Courses list</a></li>

                        {{-- <li><a href="course-detail.html">Course detail</a></li> --}}

                        {{-- <li><a href="admission.html">Admission wizard</a></li> --}}
                        {{-- <li><a href="{{ url('/teacher-detail') }}">Teacher detail</a></li> --}}
                    </ul>
                </div>

                <div class="col-md-3">
                    <h3>Categories</h3>
                    <ul>
                        <?php $categories = DB::table('course_categories')->get(); ?>
                        @foreach($categories as $categorie)
                            <li><a href="{{ url('/category/'.$categorie->name) }}">{{ $categorie->name }}</a></li>
                        @endforeach
                    </ul>
                </div>

                <div class="col-md-2">
                    <h3>Pages</h3>
                    <ul>

                        <li><a href="{{ url('/about') }}">About</a></li>
                        <li><a href="{{ url('/blog') }}">Blog</a></li>
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                        <li><a href="{{ url('/contacts') }}">Contacts</a></li>
                        {{-- <li><a href="/404">404 page</a></li> --}}
                        {{-- <li><a href="agenda-calendar.html">Agenda Calendar</a></li> --}}
                        <li><a href="{{ url('/faqs') }}">Faqs</a></li>
                        <li><a href="{{ url('/help') }}">Help</a></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h3>Extra pages</h3>
                    <ul>
                        <li><a href="{{ url('/login') }}"
                               target="_blank">Admin-Dashboard</a>{{-- <span class="badge_info">New</span> --}}</li>
                        <li><a href="{{ url('/media-gallery') }}">Media gallery</a></li>
                        @if(Auth::check())
                            <li><a href="{{ url('/logout') }}">Logout</a></li>
                        @endif
                        {{-- <li><a href="cart-1.html">Cart page 1</a></li>
                        <li><a href="cart-2.html">Cart page 2</a></li>
                        <li><a href="cart-3.html">Cart page 3</a></li>
                        <li><a href="pricing-tables.html">Responsive pricing tables</a></li>
                        <li><a href="coming_soon/index.html">Coming soon</a></li>
                        <li><a href="icon-pack-1.html">Icon pack 1</a></li>
                        <li><a href="icon-pack-2.html">Icon pack 2</a></li>
                        <li><a href="icon-pack-3.html">Icon pack 3</a></li>
                        <li><a href="icon-pack-4.html">Icon pack 4</a></li> --}}
                    </ul>
                </div>
            </div>
            <!-- /row -->
        </nav>
        <div class="follow_us">
            <ul>
                <li>Follow us</li>
                @foreach($socialMedia as $links)
                    <li><a href="{{ $links->link }}" target="_blank"><i class="{{ $links->icon }}"></i></a></li>
                @endforeach
                {{-- <li><a href="#0"><i class="ti-facebook"></i></a></li>
                <li><a href="#0"><i class="ti-twitter-alt"></i></a></li>
                <li><a href="#0"><i class="ti-google"></i></a></li>
                <li><a href="#0"><i class="ti-pinterest"></i></a></li>
                <li><a href="#0"><i class="ti-instagram"></i></a></li> --}}
            </ul>
        </div>
    </div>
</div>
<!-- /main_menu 2-->