@include('website.layouts.header')
	
	@include('website.layouts.menu')
	
	<main>
		<section class="hero_single version_2">
			<div class="wrapper">
				<div class="container">
					<h3>What would you learn?</h3>
					<p>Increase your expertise in business, technology and personal development</p>
					<form action="{{ url('/searsh') }}" method="POST">
						{{ csrf_field() }}
						<div id="custom-search-input">
							<div class="input-group">
								<input type="text" class="search-query" name="search" placeholder="Ex. Architecture, Specialization...">
								<input type="submit" class="btn_search" value="Search">
							</div>
						</div>
					</form>
				</div>
			</div>
		</section>
		<!-- /hero_single -->

		<div class="features clearfix">
			<div class="container">
				<ul>
					<li><i class="pe-7s-study"></i>
						<h4>+{{ $countCourses }} courses</h4><span>Explore a variety of fresh topics</span>
					</li>
					<li><i class="pe-7s-cup"></i>
						<h4>Expert teachers</h4><span>Find the right instructor for you</span>
					</li>
					<li><i class="pe-7s-target"></i>
						<h4>Focus on target</h4><span>Increase your personal expertise</span>
					</li>
				</ul>
			</div>
		</div>
		<!-- /features -->

		<div class="container-fluid margin_120_0">
			<div class="main_title_2">
				<span><em></em></span>
				<h2>Alzard Popular Courses</h2>
				<p>Cum doctus civibus efficiantur in imperdiet deterruisset.</p>
			</div>
			<div id="reccomended" class="owl-carousel owl-theme">
				@foreach($courses as $course)
				<div class="item">
					<div class="box_grid">
						<figure>
							<a href="{{ url('add-to-cart/'.$course->id) }}" class="wish_bt"></a>
							<a href="{{ url('course-details/'.$course->course_title) }}">
								<div class="preview"><span>Preview course</span></div><img style="max-height: 350px;" src="{{ asset('/uplaod/courses/coursesimages/'. $course->course_image) }}" class="img-fluid" alt="">
							</a>
							<div class="price">
								@if($course->course_price - $course->course_discount_price > 0)
									${{ $course->course_price - $course->course_discount_price }}
								@else
									Free
								@endif
							</div>

						</figure>
						<div class="wrapper">
							@foreach($course_categorys as $course_category)
								@if($course_category->id == $course->category_id)
								<small>{{ $course_category->name }}</small>
								@endif
							@endforeach
							<h3>{{ $course->course_title }}</h3>
							<p>{!! substr($course->course_description, 0, 80) !!} ...</p>
							{{-- <div class="rating"><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star"></i><i class="icon_star"></i> <small>(145)</small></div> --}}
						</div>
						<ul>
							<li><i class="icon_clock_alt"></i> {{ $course->course_time }}</li>
							{{-- <li><i class="icon_like"></i> 890</li> --}}
							<li><a href="{{ url('course-details/'.$course->course_title) }}">Enroll now</a></li>
						</ul>
					</div>
				</div>
				@endforeach
				<!-- /item -->
				{{-- <div class="item">
					<div class="box_grid">
						<figure>
							<a href="#0" class="wish_bt"></a>
							<a href="course-detail.html"><img src="{{ url('/design/educationalzard') }}/img/course__list_2.jpg" class="img-fluid" alt=""></a>
							<div class="price">$45</div>
							<div class="preview"><span>Preview course</span></div>
						</figure>
						<div class="wrapper">
							<small>Category</small>
							<h3>Persius delenit has cu</h3>
							<p>Id placerat tacimates definitionem sea, prima quidam vim no. Duo nobis persecuti cu.</p>
							<div class="rating"><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star"></i><i class="icon_star"></i> <small>(145)</small></div>
						</div>
						<ul>
							<li><i class="icon_clock_alt"></i> 1h 30min</li>
							<li><i class="icon_like"></i> 890</li>
							<li><a href="course-detail.html">Enroll now</a></li>
						</ul>
					</div>
				</div>
				<!-- /item -->
				<div class="item">
					<div class="box_grid">
						<figure>
							<a href="#0" class="wish_bt"></a>
							<a href="course-detail.html"><img src="{{ url('/design/educationalzard') }}/img/course__list_3.jpg" class="img-fluid" alt=""></a>
							<div class="price">$54</div>
							<div class="preview"><span>Preview course</span></div>
						</figure>
						<div class="wrapper">
							<small>Category</small>
							<h3>Persius delenit has cu</h3>
							<p>Id placerat tacimates definitionem sea, prima quidam vim no. Duo nobis persecuti cu.</p>
							<div class="rating"><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star"></i><i class="icon_star"></i> <small>(145)</small></div>
						</div>
						<ul>
							<li><i class="icon_clock_alt"></i> 1h 30min</li>
							<li><i class="icon_like"></i> 890</li>
							<li><a href="course-detail.html">Enroll now</a></li>
						</ul>
					</div>
				</div>
				<!-- /item -->
				<div class="item">
					<div class="box_grid">
						<figure>
							<a href="#0" class="wish_bt"></a>
							<a href="course-detail.html"><img src="{{ url('/design/educationalzard') }}/img/course__list_4.jpg" class="img-fluid" alt=""></a>
							<div class="price">$27</div>
							<div class="preview"><span>Preview course</span></div>
						</figure>
						<div class="wrapper">
							<small>Category</small>
							<h3>Persius delenit has cu</h3>
							<p>Id placerat tacimates definitionem sea, prima quidam vim no. Duo nobis persecuti cu.</p>
							<div class="rating"><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star"></i><i class="icon_star"></i> <small>(145)</small></div>
						</div>
						<ul>
							<li><i class="icon_clock_alt"></i> 1h 30min</li>
							<li><i class="icon_like"></i> 890</li>
							<li><a href="course-detail.html">Enroll now</a></li>
						</ul>
					</div>
				</div>
				<!-- /item -->
				<div class="item">
					<div class="box_grid">
						<figure>
							<a href="#0" class="wish_bt"></a>
							<a href="course-detail.html"><img src="{{ url('/design/educationalzard') }}/img/course__list_5.jpg" class="img-fluid" alt=""></a>
							<div class="price">$35</div>
							<div class="preview"><span>Preview course</span></div>
						</figure>
						<div class="wrapper">
							<small>Category</small>
							<h3>Persius delenit has cu</h3>
							<p>Id placerat tacimates definitionem sea, prima quidam vim no. Duo nobis persecuti cu.</p>
							<div class="rating"><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star"></i><i class="icon_star"></i> <small>(145)</small></div>
						</div>
						<ul>
							<li><i class="icon_clock_alt"></i> 1h 30min</li>
							<li><i class="icon_like"></i> 890</li>
							<li><a href="course-detail.html">Enroll now</a></li>
						</ul>
					</div>
				</div>
				<!-- /item -->
				<div class="item">
					<div class="box_grid">
						<figure>
							<a href="#0" class="wish_bt"></a>
							<a href="course-detail.html"><img src="{{ url('/design/educationalzard') }}/img/course__list_6.jpg" class="img-fluid" alt=""></a>
							<div class="price">$54</div>
							<div class="preview"><span>Preview course</span></div>
						</figure>
						<div class="wrapper">
							<small>Category</small>
							<h3>Persius delenit has cu</h3>
							<p>Id placerat tacimates definitionem sea, prima quidam vim no. Duo nobis persecuti cu.</p>
							<div class="rating"><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star"></i><i class="icon_star"></i> <small>(145)</small></div>
						</div>
						<ul>
							<li><i class="icon_clock_alt"></i> 1h 30min</li>
							<li><i class="icon_like"></i> 890</li>
							<li><a href="course-detail.html">Enroll now</a></li>
						</ul>
					</div>
				</div>
				<!-- /item --> --}}
			</div>
			<!-- /carousel -->
			<div class="container">
				<p class="btn_home_align"><a href="{{ url('courses-grid') }}" class="btn_1 rounded">View all courses</a></p>
			</div>
			<!-- /container -->
			<hr>
		</div>
		<!-- /container -->

		<div class="container margin_30_95">
			<div class="main_title_2">
				<span><em></em></span>
				<h2>Udema Categories Courses</h2>
				{{-- <p>Cum doctus civibus efficiantur in imperdiet deterruisset.</p> --}}
			</div>
			<div class="row">
				@foreach($course_categorys as $value)
				<div class="col-lg-4 col-md-6 wow" data-wow-offset="150">
					<a href="{{ url('category/'.$value->name) }}" class="grid_item">
						<figure class="block-reveal">
							<div class="block-horizzontal"></div>
							<img src="{{ asset('uplaod/coursecategorys/'.$value->image) }}" class="img-fluid" alt="{{ $value->name }}">
							<div class="info">
								<small><i class="ti-layers"></i>15 Programmes</small>
								<h3>{{ $value->name }}</h3>
							</div>
						</figure>
					</a>
				</div>
				@endforeach
				{{-- <!-- /grid_item -->
				<div class="col-lg-4 col-md-6 wow" data-wow-offset="150">
					<a href="#0" class="grid_item">
						<figure class="block-reveal">
							<div class="block-horizzontal"></div>
							<img src="{{ url('/design/educationalzard') }}/img/course_2.jpg" class="img-fluid" alt="">
							<div class="info">
								<small><i class="ti-layers"></i>23 Programmes</small>
								<h3>Engineering</h3>
							</div>
						</figure>
					</a>
				</div>
				<!-- /grid_item -->
				<div class="col-lg-4 col-md-6 wow" data-wow-offset="150">
					<a href="#0" class="grid_item">
						<figure class="block-reveal">
							<div class="block-horizzontal"></div>
							<img src="{{ url('/design/educationalzard') }}/img/course_3.jpg" class="img-fluid" alt="">
							<div class="info">
								<small><i class="ti-layers"></i>23 Programmes</small>
								<h3>Architecture</h3>
							</div>
						</figure>
					</a>
				</div>
				<!-- /grid_item -->
				<div class="col-lg-4 col-md-6 wow" data-wow-offset="150">
					<a href="#0" class="grid_item">
						<figure class="block-reveal">
							<div class="block-horizzontal"></div>
							<img src="{{ url('/design/educationalzard') }}/img/course_4.jpg" class="img-fluid" alt="">
							<div class="info">
								<small><i class="ti-layers"></i>23 Programmes</small>
								<h3>Science and Biology</h3>
							</div>
						</figure>
					</a>
				</div>
				<!-- /grid_item -->
				<div class="col-lg-4 col-md-6 wow" data-wow-offset="150">
					<a href="#0" class="grid_item">
						<figure class="block-reveal">
							<div class="block-horizzontal"></div>
							<img src="{{ url('/design/educationalzard') }}/img/course_5.jpg" class="img-fluid" alt="">
							<div class="info">
								<small><i class="ti-layers"></i>23 Programmes</small>
								<h3>Law and Criminology</h3>
							</div>
						</figure>
					</a>
				</div>
				<!-- /grid_item -->
				<div class="col-lg-4 col-md-6 wow" data-wow-offset="150">
					<a href="#0" class="grid_item">
						<figure class="block-reveal">
							<div class="block-horizzontal"></div>
							<img src="{{ url('/design/educationalzard') }}/img/course_6.jpg" class="img-fluid" alt="">
							<div class="info">
								<small><i class="ti-layers"></i>23 Programmes</small>
								<h3>Medical</h3>
							</div>
						</figure>
					</a>
				</div>
				<!-- /grid_item --> --}}
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->

		<div class="bg_color_1">
			<div class="container margin_120_95">
				<div class="main_title_2">
					<span><em></em></span>
					<h2>News and Events</h2>
					<p>Cum doctus civibus efficiantur in imperdiet deterruisset.</p>
				</div>
				<div class="row">
					@foreach($posts as $post)
						<div class="col-lg-6">
							<a class="box_news" href="blog/blog-post/{{ $post->id }}">
								<figure><img src="{{ asset('uplaod/posts/'.$post->image) }}" alt="No Image">
									<figcaption><strong>28</strong>Dec</figcaption>
								</figure>
								<ul>
									<li>
										@foreach($categories as $category)
											@if($category->id == $post->category_id)
												{{ $category->name }}
											@endif
										@endforeach
									</li>
									<li>{{ $post->created_at->toDateString() }}</li>
								</ul>
								<h4>{{ $post->title }}</h4>
								<p>{!! substr($post->description, 0, 130) !!} ...</p>
							</a>
						</div>
						<!-- /box_news -->
					@endforeach
					
				</div>
				<!-- /row -->
				<p class="btn_home_align"><a href="{{ url('/blog') }}" class="btn_1 rounded">View all news</a></p>
			</div>
			<!-- /container -->
		</div>
		<!-- /bg_color_1 -->

		<div class="call_section">
			<div class="container clearfix">
				<div class="col-lg-5 col-md-6 float-right wow" data-wow-offset="250">
					<div class="block-reveal">
						<div class="block-vertical"></div>
						<div class="box_1">
							<h3>{{ $settings->title_fixed }}</h3>
							<p>{!! $settings->description_fixed !!}. </p>
							<a href="{{ url('/about') }}" class="btn_1 rounded">Read more</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--/call_section-->
	</main>
	<!-- /main -->

@include('website.layouts.footer')