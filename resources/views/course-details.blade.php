@include('website.layouts.header')

@include('website.layouts.menu')
<?php $item = ''; ?>
<?php $itemTrue = ''; ?>
<?php $if_orders = 'null' ?>
<main>
    <section id="hero_in" class="courses">
        <div class="wrapper">
            <div class="container">
                <h1 class="fadeInUp"><span></span>Online course detail</h1>
            </div>
        </div>
    </section>
    <!--/hero_in-->

    <div class="bg_color_1">
        <nav class="secondary_nav sticky_horizontal">
            <div class="container">
                <ul class="clearfix">
                    <li><a href="#description" class="active">Description</a></li>
                    <li><a href="#lessons">Lessons</a></li>
                    <li><a href="#reviews">Reviews</a></li>
                </ul>
            </div>
        </nav>
        <div class="container margin_60_35">
            <div class="row">
                <div class="col-lg-8">

                    <section id="description">
                        <h2>Description</h2>
                        <p>{!! $course_details->course_description !!}.</p>
                        <h5>What will you learn</h5>
                        <ul class="list_ok">
                            <?php $arr_what_will_you_learn_title = json_decode($course_details->what_will_you_learn_title);
                            $arr_what_will_you_learn_description = json_decode($course_details->what_will_you_learn_description); ?>
                            @for ($i=0; $i < count($arr_what_will_you_learn_title); $i++)
                                <li>
                                    <h6>{{ $arr_what_will_you_learn_title[$i] }}</h6>
                                    <p>{{ $arr_what_will_you_learn_description[$i] }}.</p>
                                </li>
                            @endfor
                        </ul>
                    {{-- <hr>
                    <p>Mea appareat omittantur eloquentiam ad, nam ei quas oportere democritum. Prima causae admodum id est, ei timeam inimicus sed. Sit an meis aliquam, cetero inermis vel ut. An sit illum euismod facilisis, tamquam vulputate pertinacia eum at.</p>
                    <div class="row">
                        <div class="col-lg-6">
                            <ul class="bullets">
                                <li>Dolorem mediocritatem</li>
                                <li>Mea appareat</li>
                                <li>Prima causae</li>
                                <li>Singulis indoctum</li>
                            </ul>
                        </div>
                        <div class="col-lg-6">
                            <ul class="bullets">
                                <li>Timeam inimicus</li>
                                <li>Oportere democritum</li>
                                <li>Cetero inermis</li>
                                <li>Pertinacia eum</li>
                            </ul>
                        </div>
                    </div> --}}
                    <!-- /row -->
                    </section>
                    <!-- /section -->
                <?php $courses_files = DB::table('courses_files')->where('course_id', $course_details->id)->first(); ?>
                <?php $arr_video_title = json_decode($courses_files->video_title); $arr_video_category = json_decode($courses_files->video_category); $arr_video_url = json_decode($courses_files->video_url); ?>
                <?php $arr = []; ?>
                @for ($i=0; $i < count($arr_video_category); $i++)
                    @if($arr_video_category[$i]  == $arr_video_category[$i])
                        {{-- <b> {{ $arr_video_title[$i] }} </b> |  --}}
                        <?php $arr[] = $arr_video_category[$i]; ?>
                        {{-- {{ $arr_video_category[$i] }} |  --}}
                        {{-- <b> {{ $arr_video_url[$i] }} </b> <br> --}}
                    @endif
                @endfor

                <?php

                // Unique values
                $unique = array_unique($arr);
                // Duplicates
                $duplicates = array_diff_assoc($arr, $unique);
                // Unique values
                $result = array_diff($unique, $duplicates);
                // Get the unique keys
                $unique_keys = array_keys($result);
                // Get duplicate keysv
                echo "<pre>";
                $duplicate_keys = array_keys(array_intersect($arr, $duplicates));
                echo "</pre>";
                $test = array_merge($unique_keys, $duplicate_keys);

                $array_count_values = array_count_values($arr);
                sort($test);
                // echo "<pre>";
                // print_r($test);
                // echo "</pre>";

                $start = 0;
                $end = 0;

                ?>

                <!-- {{ $arr[0] }}
                <?php print_r($arr); ?>
                <?php echo key($arr); ?>-->
                    <section id="lessons">
                        <div class="intro_title">
                            <h2>Lessons</h2>
                            <ul>
                                <li>{{ count($arr_video_url) }} lessons</li>
                                <li>{{ $course_details->course_time }}</li>
                            </ul>
                        </div>
                        <div id="accordion_lessons" role="tablist" class="add_bottom_45">
                            <?php $number = 0 ?>
                            @foreach($array_count_values as $array_count_key => $array_count_value)
                                <?php $number = $number + 1 ?>
                                <div class="card">
                                    <div class="card-header" role="tab" id="heading{{ $number }}">
                                        <h5 class="mb-0">
                                            <a data-toggle="collapse" href="#collapse{{ $number }}" aria-expanded="true"
                                               aria-controls="collapse{{ $number }}"><i
                                                        class="indicator ti-plus {{-- minus --}}"></i> {{ $array_count_key }}
                                            </a>
                                        </h5>
                                    </div>

                                    <div id="collapse{{ $number }}" class="collapse {{-- show --}}" role="tabpanel"
                                         aria-labelledby="heading{{ $number }}" data-parent="#accordion_lessons">
                                        <div class="card-body">
                                            <div class="list_lessons">
                                                <ul>
                                                    <?php

                                                    $end = $end + $array_count_value;
                                                    for ($a = $start; $a < $end; $a++) { ?>
                                                    @if(!empty($orders))
                                                        @foreach($orders as $order)
                                                            @foreach($order->cart->items as $item)
                                                                @if($item['item']['id'] == $course_details->id)
                                                                    <?php $if_orders = 'notNull' ?>
                                                                @endif
                                                            @endforeach
                                                        @endforeach
                                                    @endif
                                                    <?php $price = $course_details->course_price - $course_details->course_discount_price ?>
                                                    <style>a.disabled {
                                                            pointer-events: none;
                                                        }

                                                        li.disable-links {
                                                            pointer-events: none;
                                                        }</style>
                                                    @if(Auth::check())
                                                        @if(auth()->user()->type_user == 'Admin')
                                                            <?php $filesNotEmpty = 'filesNotEmpty' ?>
                                                            <li><a href="{{ $arr_video_url[$a] }}"
                                                                   class="video">{{ $arr_video_title[$a] }}</a></li>
                                                        @elseif($price == 0)
                                                            <?php $filesNotEmpty = 'filesNotEmpty' ?>
                                                            <li><a href="{{ $arr_video_url[$a] }}"
                                                                   class="video">{{ $arr_video_title[$a] }}</a></li>
                                                        @elseif($if_orders  === 'notNull')
                                                            <?php $filesNotEmpty = 'filesNotEmpty' ?>
                                                            <li><a href="{{ $arr_video_url[$a] }}"
                                                                   class="video">{{ $arr_video_title[$a] }}</a></li>
                                                        @elseif($course_details->user_id  == auth()->user()->id)
                                                            <?php $filesNotEmpty = 'filesNotEmpty' ?>
                                                            <li><a href="{{ $arr_video_url[$a] }}"
                                                                   class="video">{{ $arr_video_title[$a] }}</a></li>
                                                        @else
                                                            <li class="disable-links"><a href=""
                                                                                         class="video">{{ $arr_video_title[$a] }}</a>
                                                            </li>
                                                        @endif
                                                    @else
                                                        <li class="disable-links"><a href=""
                                                                                     class="video">{{ $arr_video_title[$a] }}</a>{{-- <span>00:59</span> --}}
                                                        </li>
                                                    @endif

                                                    <?php } $start = $start + $array_count_value; ?>
                                                    {{-- <li><a href="https://www.youtube.com/watch?v=LDgd_gUcqCw" class="video">Health Science</a><span>00:59</span></li>
                                                    <li><a href="https://www.youtube.com/watch?v=LDgd_gUcqCw" class="video">Health and Social Care</a><span>00:59</span></li>
                                                    <li><a href="#0" class="txt_doc">Audiology</a><span>00:59</span></li> --}}
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            @if(!empty($courseFiles[0]))
                                <div class="card">
                                    <div class="card-header" role="tab" id="heading_files">
                                        <h5 class="mb-0">
                                            <a data-toggle="collapse" href="#collapse_files" aria-expanded="true"
                                               aria-controls="collapse_files"><i
                                                        class="indicator ti-plus {{-- minus --}}"></i> Course Files</a>
                                        </h5>
                                    </div>

                                    <div id="collapse_files" class="collapse {{-- show --}}" role="tabpanel"
                                         aria-labelledby="heading_files" data-parent="#accordion_lessons">
                                        <div class="card-body">
                                            <div class="list_lessons">
                                                <ul>
                                                    @foreach($courseFiles as $courseFile)
                                                        @if(!empty($filesNotEmpty))
                                                            <li><a href="{{ $courseFile->file_name }}"
                                                                   class="txt_doc">{{ $courseFile->name }}</a><span>{{ EducationAlzardHelpers::bytesToHuman($courseFile->size) }}</span>
                                                            </li>
                                                        @else
                                                            <li class="disable-links"><a href=""
                                                                                         class="txt_doc">{{ $courseFile->name }}</a><span>{{ $courseFile->size }}</span>
                                                            </li>
                                                        @endif
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        <!-- /card -->
                            {{-- <div class="card">
                                <div class="card-header" role="tab" id="headingTwo"> id
                                    <h5 class="mb-0">
                                        <a class="collapsed" data-toggle="collapse" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                            <i class="indicator ti-plus"></i>Generative Modeling Review
                                        </a>
                                    </h5>
                                </div>
                                <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo" data-parent="#accordion_lessons">
                                    <div class="card-body">
                                        <div class="list_lessons">
                                            <ul>
                                                <li><a href="https://www.youtube.com/watch?v=LDgd_gUcqCw" class="video">Health Science</a><span>00:59</span></li>
                                                <li><a href="https://www.youtube.com/watch?v=LDgd_gUcqCw" class="video">Health and Social Care</a><span>00:59</span></li>
                                                <li><a href="https://www.youtube.com/watch?v=LDgd_gUcqCw" class="video">History</a><span>00:59</span></li>
                                                <li><a href="https://www.youtube.com/watch?v=LDgd_gUcqCw" class="video">Healthcare Science</a><span>00:59</span></li>
                                                <li><a href="#0" class="txt_doc">Audiology</a><span>00:59</span></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /card -->
                            <div class="card">
                                <div class="card-header" role="tab" id="headingThree">
                                    <h5 class="mb-0">
                                        <a class="collapsed" data-toggle="collapse" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                            <i class="indicator ti-plus"></i>Variational Autoencoders
                                        </a>
                                    </h5>
                                </div>
                                <div id="collapseThree" class="collapse" role="tabpanel" aria-labelledby="headingThree" data-parent="#accordion_lessons">
                                    <div class="card-body">
                                        <div class="list_lessons">
                                            <ul>
                                                <li><a href="https://www.youtube.com/watch?v=LDgd_gUcqCw" class="video">Health Science</a><span>00:59</span></li>
                                                <li><a href="https://www.youtube.com/watch?v=LDgd_gUcqCw" class="video">Health and Social Care</a><span>00:59</span></li>
                                                <li><a href="https://www.youtube.com/watch?v=LDgd_gUcqCw" class="video">History</a><span>00:59</span></li>
                                                <li><a href="https://www.youtube.com/watch?v=LDgd_gUcqCw" class="video">Healthcare Science</a><span>00:59</span></li>
                                                <li><a href="#0" class="txt_doc">Audiology</a><span>00:59</span></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /card -->

                            <div class="card">
                                <div class="card-header" role="tab" id="headingFourth">
                                    <h5 class="mb-0">
                                        <a class="collapsed" data-toggle="collapse" href="#collapseFourth" aria-expanded="false" aria-controls="collapseFourth">
                                            <i class="indicator ti-plus"></i>Gaussian Mixture Model Review
                                        </a>
                                    </h5>
                                </div>
                                <div id="collapseFourth" class="collapse" role="tabpanel" aria-labelledby="headingFourth" data-parent="#accordion_lessons">
                                    <div class="card-body">
                                        <div class="list_lessons">
                                            <ul>
                                                <li><a href="https://www.youtube.com/watch?v=LDgd_gUcqCw" class="video">Health Science</a><span>00:59</span></li>
                                                <li><a href="https://www.youtube.com/watch?v=LDgd_gUcqCw" class="video">Health and Social Care</a><span>00:59</span></li>
                                                <li><a href="https://www.youtube.com/watch?v=LDgd_gUcqCw" class="video">History</a><span>00:59</span></li>
                                                <li><a href="https://www.youtube.com/watch?v=LDgd_gUcqCw" class="video">Healthcare Science</a><span>00:59</span></li>
                                                <li><a href="#0" class="txt_doc">Audiology</a><span>00:59</span></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /card --> --}}
                        </div>
                        <!-- /accordion -->
                    </section>
                    <!-- /section -->
                    <section id="reviews">
                        @if(!empty($comments))
                            <h2>Reviews</h2>
                            <div class="reviews-container">
                                <div class="row">
                                    <div class="col-lg-3">
                                        <div id="review_summary">
                                            <strong>{{ $round = round($reviews['countReviews']) }}</strong>
                                            <div class="rating">
                                                @for($i = 0; $i < $round; $i++)
                                                    <i class="icon_star voted"></i>
                                                @endfor
                                                @if($round < 5)
                                                    @for($i = 0; $i < (5 - $round); $i++)
                                                        <i class="icon_star"></i>
                                                    @endfor
                                                @endif
                                            </div>
                                            <small>Based on {{ $reviews['totalReviews'] }} reviews</small>
                                        </div>
                                    </div>
                                    <div class="col-lg-9">
                                        <div class="row">
                                            <div class="col-lg-10 col-9">
                                                <div class="progress">
                                                    <div class="progress-bar" role="progressbar"
                                                         style="width: {{ round(($reviews['reviews5']/$reviews['countReviews'])*100) }}%"
                                                         aria-valuenow="{{ ($reviews['countReviews'] / 5) * 100 }}"
                                                         aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <div class="col-lg-2 col-3">
                                                <small><strong>5 stars</strong></small>
                                            </div>
                                        </div>
                                        <!-- /row -->
                                        <div class="row">
                                            <div class="col-lg-10 col-9">
                                                <div class="progress">
                                                    <div class="progress-bar" role="progressbar"
                                                         style="width: {{ round(($reviews['reviews4']/$reviews['countReviews'])*100) }}%"
                                                         aria-valuenow="{{ ($reviews['countReviews'] / 4) * 100 }}"
                                                         aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <div class="col-lg-2 col-3">
                                                <small><strong>4 stars</strong></small>
                                            </div>
                                        </div>
                                        <!-- /row -->
                                        <div class="row">
                                            <div class="col-lg-10 col-9">
                                                <div class="progress">
                                                    <div class="progress-bar" role="progressbar"
                                                         style="width: {{ round(($reviews['reviews3']/$reviews['countReviews'])*100) }}%"
                                                         aria-valuenow="{{ ($reviews['countReviews'] / 3) * 100 }}"
                                                         aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <div class="col-lg-2 col-3">
                                                <small><strong>3 stars</strong></small>
                                            </div>
                                        </div>
                                        <!-- /row -->
                                        <div class="row">
                                            <div class="col-lg-10 col-9">
                                                <div class="progress">
                                                    <div class="progress-bar" role="progressbar"
                                                         style="width: {{ round(($reviews['reviews2']/$reviews['countReviews'])*100) }}%"
                                                         aria-valuenow="{{ ($reviews['countReviews'] / 2) * 100 }}"
                                                         aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <div class="col-lg-2 col-3">
                                                <small><strong>2 stars</strong></small>
                                            </div>
                                        </div>
                                        <!-- /row -->
                                        <div class="row">
                                            <div class="col-lg-10 col-9">
                                                <div class="progress">
                                                    <div class="progress-bar" role="progressbar"
                                                         style="width: {{ round(($reviews['reviews1']/$reviews['countReviews'])*100) }}%"
                                                         aria-valuenow="{{ ($reviews['countReviews'] / 1) * 100 }}"
                                                         aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                            <div class="col-lg-2 col-3">
                                                <small><strong>1 stars</strong></small>
                                            </div>
                                        </div>
                                        <!-- /row -->
                                    </div>
                                </div>
                                <!-- /row -->
                            </div>

                            <hr>
                        @endif

                        <div class="reviews-container">
                            @foreach($comments as $comment)
                                <div class="review-box clearfix">
                                    <figure class="rev-thumb"><img
                                                src="{{ asset('/uplaod/user/'.$comment[1]['image']) }}" alt="">
                                    </figure>
                                    <div class="rev-content">
                                        <div class="comment_right clearfix">
                                            <div class="comment_info">
                                                By <a href="#">{{ $comment[1]['name'] }}</a> <span
                                                        class="float-right"> {{ \Carbon\Carbon::parse($comment[0]['created_at'])->diffForHumans() }}</span>
                                            </div>
                                        </div>
                                        <div class="rating">
                                            @for($i = 0; $i < $comment[0]['star_number']; $i++)
                                                <i class="icon_star voted"></i>
                                            @endfor
                                            @if($comment[0]['star_number'] < 5)
                                                @for($i = 0; $i < (5 - $comment[0]['star_number']); $i++)
                                                    <i class="icon_star"></i>
                                                @endfor
                                            @endif
                                        </div>
                                        <div class="rev-info">
                                            {{ $comment[1]['type_user'] }}
                                            – {{ \Carbon\Carbon::parse($comment[0]['created_at'])->toFormattedDateString() }} {{-- - <a href="?reply={{ $comment[1]['id'] }}">Reply</a> --}}
                                        </div>
                                        <div class="rev-text">
                                            <p>
                                                {!! $comment[0]['comment'] !!}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        <!-- /review-box -->
                            {{-- <div class="review-box clearfix">
                                <figure class="rev-thumb"><img src="{{ url('/design/educationalzard') }}/img/avatar2.jpg" alt="">
                                </figure>
                                <div class="rev-content">
                                    <div class="rating">
                                        <i class="icon-star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star"></i>
                                    </div>
                                    <div class="rev-info">
                                        Ahsan – April 01, 2016:
                                    </div>
                                    <div class="rev-text">
                                        <p>
                                            Sed eget turpis a pede tempor malesuada. Vivamus quis mi at leo pulvinar hendrerit. Cum sociis natoque penatibus et magnis dis
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <!-- /review-box -->
                            <div class="review-box clearfix">
                                <figure class="rev-thumb"><img src="{{ url('/design/educationalzard') }}/img/avatar3.jpg" alt="">
                                </figure>
                                <div class="rev-content">
                                    <div class="rating">
                                        <i class="icon-star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star"></i>
                                    </div>
                                    <div class="rev-info">
                                        Sara – March 31, 2016:
                                    </div>
                                    <div class="rev-text">
                                        <p>
                                            Sed eget turpis a pede tempor malesuada. Vivamus quis mi at leo pulvinar hendrerit. Cum sociis natoque penatibus et magnis dis
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <!-- /review-box --> --}}

                            @auth
                                @if(!empty($thisMyCourse) || $userAuth->hasRole('Admin') || !empty($filesNotEmpty) ) {{-- $thisMyCourse == ture ||  --}}
                                <h5 id="#reply">Leave a Comment</h5>
                                {{-- @foreach($course_details->course_comments as $comm)

                                @endforeach --}}
                                <form action="/course/comment-store" method="POST">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="course_id" value="{{ $course_details->id }}">
                                    {{-- @if(isset($_GET['reply']))
                                        <input type="hidden" name="reply_id" value="{{ $_GET['reply'] }}">
                                    @endif --}}
                                    <div class="form-group">
                                        <label for="star_number">Choose the rating level</label>
                                        <div class="star-rating">
                                            <div class="rating">
                                                {{-- <i class="icon_star voted"></i> --}}
                                                <span class="fa fa-star-o" data-rating="1"></span>
                                                <span class="fa fa-star-o" data-rating="2"></span>
                                                <span class="fa fa-star-o" data-rating="3"></span>
                                                <span class="fa fa-star-o" data-rating="4"></span>
                                                <span class="fa fa-star-o" data-rating="5"></span>
                                                <input type="hidden" id="star_number" name="star_number"
                                                       class="rating-value" value="4">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <textarea class="form-control" name="comment" id="comments2" rows="6"
                                                  placeholder="Message Below" required=""></textarea>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" id="submit2" class="btn_1 rounded add_bottom_30"> Submit
                                        </button>
                                    </div>
                                </form>
                                @endif
                            @endguest
                        </div>
                        <!-- /review-container -->
                    </section>
                    <!-- /section -->
                </div>
                <!-- /col -->

                <aside class="col-lg-4" id="sidebar">
                    <div class="box_detail">
                        <figure>
                            <a href="{{ $course_details->course_video }}" class="video"><i
                                        class="arrow_triangle-right"></i><img
                                        src="{{ asset('/uplaod/courses/coursesimages/'. $course_details->course_image) }}"
                                        alt="" class="img-fluid"><span>View course preview</span></a>
                        </figure>
                        <div class="price">
                            ${{ $course_details->course_price - $course_details->course_discount_price }}<span
                                    class="original_price"><em>${{ $course_details->course_discount_price }}</em>{{ explode(".",(($course_details->course_price - $course_details->course_discount_price) * 100)/$course_details->course_price)[0] }}
                                % discount price</span>
                        </div>

                        <form action="{{ url('/teacher-detail/'.$teacher_detail->name) }}" method="post">
                            {{ csrf_field() }}
                            <input type="hidden" name="id" value="{{ $teacher_detail->id }}">
                            <input type="hidden" name="name" value="{{ $teacher_detail->name }}">
                            <input type="submit" class="btn_1 full-width" value="Teacher Detail" name="">
                            {{-- <a href="{{ url('/teacher-detail/'.$teacher_detail->name) }}" class="btn_1 full-width">Teacher Detail</a> --}}
                        </form>

                        {{-- @if(!$userAuth->hasRole('Admin')) --}}
                        <a href="{{ url('/shopping-cart') }}" class="btn_1 full-width">Purchase</a>
                        @if($price != 0)
                            <a href="{{ url('add-to-cart/'.$course_details->id) }}" class="btn_1 full-width outline"><i
                                        class="icon_heart"></i> Add to wishlist</a>
                        @endif
                        {{-- @endif --}}
                        <div id="list_feat">
                            <h3>What's includes</h3>
                            <ul>
                                <?php $whats_includes = explode(",", $course_details->whats_includes); ?>
                                @for($i = 0; $i < count($whats_includes); $i++)
                                    <li><i class="fas fa-circle"></i> * {{ $whats_includes[$i] }}</li>
                                @endfor
                                {{-- <li><i class="icon_mobile"></i>Mobile support</li>
                                <li><i class="icon_archive_alt"></i>Lesson archive</li>
                                <li><i class="icon_mobile"></i>Mobile support</li>
                                <li><i class="icon_chat_alt"></i>Tutor chat</li>
                                <li><i class="icon_document_alt"></i>Course certificate</li> --}}
                            </ul>
                        </div>
                    </div>
                </aside>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /bg_color_1 -->
</main>
<!--/main-->


@include('website.layouts.footer')