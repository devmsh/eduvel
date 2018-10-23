@include('website.layouts.header')

@include('website.layouts.menu')

<main>
    <section id="hero_in" class="general">
        <div class="wrapper">
            <div class="container">
                <h1 class="fadeInUp"><span></span>Teacher detail</h1>
            </div>
        </div>
    </section>
    <!--/hero_in-->
    <div class="container margin_60_35">
        <div class="row">
            <aside class="col-lg-3" id="sidebar">
                <div class="profile">
                    <figure><img style="max-width: 100%" src="{{ asset('uplaod/user/'.$teacher_detail->image) }}"
                                 alt="Teacher" class="rounded-circle"></figure>
                    {{-- <ul class="social_teacher">
                        <li><a href="#"><i class="icon-facebook"></i></a></li>
                        <li><a href="#"><i class="icon-twitter"></i></a></li>
                        <li><a href="#"><i class="icon-linkedin"></i></a></li>
                        <li><a href="#"><i class="icon-email"></i></a></li>
                    </ul> --}}
                    <ul>
                        <li>Name <span class="float-right">{{ $teacher_detail->name }}</span></li>
                        <li>Courses <span class="float-right">{{ $countMyCourses }}</span></li>
                        <li>Age <span class="float-right">{{ $admission->age }}</span></li>
                        <li>Gender <span class="float-right">{{ $admission->gender }}</span></li>
                        <li>City <span class="float-right">{{ $admission->city }}</span></li>
                        <li>Address <span class="float-right">{{ $admission->address }}</span></li>
                        <li>Telephone <span class="float-right">{{ $admission->telephone }}</span></li>
                        <li>E-mail <span class="float-right">{{ $teacher_detail->email }}</span></li>
                    </ul>
                </div>
            </aside>
            <!--/aside -->

            <div class="col-lg-9">
                <div class="box_teacher">
                    <div class="indent_title_in">
                        <i class="pe-7s-user"></i>
                        <h3>Profile</h3>
                        {{-- <p>Mussum ipsum cacilds, vidis litro abertis.</p> --}}
                    </div>
                    <div class="wrapper_indent">
                        <p>
                            {!! $admission->messagere_here !!}
                        </p>
                    {{-- <p>Mei ut decore accusam consequat, alii dignissim no usu. Phaedrum intellegat sit ut, no pri mutat eirmod. In eum iriure perpetua adolescens, pri dicunt prodesset et. Vis dicta postulant ad.</p>
                    <h5>Credentials</h5>
                    <p>Lorem ipsum dolor sit amet, dicta oportere ad est, ea eos partem neglegentur theophrastus. Esse voluptatum duo ne, expetenda corrumpit no per, at mei nobis lucilius. No eos semper aperiri neglegentur, vis noluisse quaestio no. Vix an nostro inimicus, qui ut animal fabellas reprehendunt. In quando repudiare intellegebat sed, nam suas dicta melius ea.</p> --}}
                    {{-- <div class="row">
                        <div class="col-md-6">
                            <ul class="list_3">
                                <li><strong>September 2009 - Bachelor Degree in Economics</strong>
                                    <p>University of Cambrige - United Kingdom</p>
                                </li>
                                <li><strong>December 2012 - Master course in Economics</strong>
                                    <p>University of Cambrige - United Kingdom</p>
                                </li>
                                <li><strong>October 2013 - Master's Degree in Statistic</strong>
                                    <p>University of Oxford - United Kingdom</p>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <ul class="list_3">
                                <li><strong>September 2009 - Bachelor Degree in Economics</strong>
                                    <p>University of Cambrige - United Kingdom</p>
                                </li>
                                <li><strong>December 2012 - Master course in Economics</strong>
                                    <p>University of Cambrige - United Kingdom</p>
                                </li>
                            </ul>
                        </div>
                    </div> --}}
                    <!-- End row-->
                    </div>
                    <!--wrapper_indent -->
                    <hr class="styled_2">
                    <div class="indent_title_in">
                        <i class="pe-7s-display1"></i>
                        <h3>My courses</h3>
                        {{-- <p>Mussum ipsum cacilds, vidis litro abertis.</p> --}}
                    </div>
                    <div class="wrapper_indent">
                        {{-- <p>Mei ut decore accusam consequat, alii dignissim no usu. Phaedrum intellegat sit ut, no pri mutat eirmod. In eum iriure perpetua adolescens, pri dicunt prodesset et. Vis dicta postulant ad.</p> --}}
                        <table class="table table-responsive table-striped add_bottom_30">
                            <thead>
                            <tr>
                                <th>Category</th>
                                <th>Course name</th>
                                <th>Rate</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($myCourses as $myCourse)
                                <tr>
                                    @foreach($course_categorys as $course_category)
                                        @if($course_category->id == $myCourse->category_id)
                                            <td>{{ $course_category->name }}</td>
                                        @endif
                                    @endforeach
                                    <td>
                                        <a href="{{ url('/course-details/'.$myCourse->course_title) }}">{{ $myCourse->course_title }}</a>
                                    </td>
                                    <td class="rating"><i class="icon-star voted"></i><i class="icon-star voted"></i><i
                                                class="icon-star voted"></i><i class="icon-star voted"></i> <i
                                                class="icon-star voted"></i></td>
                                </tr>
                            @endforeach
                            {{-- <tr>
                                <td>Business</td>
                                <td><a href="#">Economy pinciples</a></td>
                                <td class="rating"><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star"></i> <i class="icon-star"></i></td>
                            </tr>
                            <tr>
                                <td>Business</td>
                                <td><a href="#">Understand diagrams</a></td>
                                <td class="rating"><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i> <i class="icon-star"></i></td>
                            </tr>
                            <tr>
                                <td>Business</td>
                                <td><a href="#">Marketing strategies</a></td>
                                <td class="rating"><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i> <i class="icon-star"></i></td>
                            </tr>
                            <tr>
                                <td>Business</td>
                                <td><a href="#">Marketing</a></td>
                                <td class="rating"><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i> <i class="icon-star voted"></i></td>
                            </tr>
                            <tr>
                                <td>Business</td>
                                <td><a href="#">Business Plan</a></td>
                                <td class="rating"><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star"></i> <i class="icon-star"></i></td>
                            </tr>
                            <tr>
                                <td>Business</td>
                                <td><a href="#">Economy pinciples</a></td>
                                <td class="rating"><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i> <i class="icon-star"></i></td>
                            </tr>
                            <tr>
                                <td>Business</td>
                                <td><a href="#">Understand diagrams</a></td>
                                <td class="rating"><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i><i class="icon-star voted"></i> <i class="icon-star"></i></td>
                            </tr> --}}
                            </tbody>
                        </table>
                    </div>
                    <!--wrapper_indent -->
                </div>
            </div>
            <!-- /col -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</main>
<!--/main-->

@include('website.layouts.footer')