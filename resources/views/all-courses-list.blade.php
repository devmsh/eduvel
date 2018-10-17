@include('website.layouts.header')
	
	@include('website.layouts.menu')
	
	<main>
		<section id="hero_in" class="courses">
			<div class="wrapper">
				<div class="container">
					<h1 class="fadeInUp"><span></span>Online courses</h1>
				</div>
			</div>
		</section>
		<!--/hero_in-->
		<div class="filters_listing sticky_horizontal">
			<div class="container">
				<ul class="clearfix">
					<li>
						<div class="switch-field">
							<input type="radio" id="all" name="listing_filter" value="all" checked>
							<label for="all">All</label>
							<input type="radio" id="popular" name="listing_filter" value="popular">
							<label for="popular">Popular</label>
							<input type="radio" id="latest" name="listing_filter" value="latest">
							<label for="latest">Latest</label>
						</div>
					</li>
					<li>
						<div class="layout_view">
							<a href="{{ url('courses-grid') }}"><i class="icon-th"></i></a>
							<a href="{{ url('courses-list') }}" class="active"><i class="icon-th-list"></i></a>
						</div>
					</li>
					<li style="min-width: 150px;">
						<select name="orderby" class="selectbox" onchange="javascript:handleSelect(this)">
				            <option value="/courses-grid">Select Category</option>
				            @foreach($course_categorys as $course_category)
				                <option value="/category/{{ $course_category->name }}">{{ $course_category->name }}</option>
				            @endforeach
				          </select>
				          <script type="text/javascript">
				           function handleSelect(elm) { 

				              window.location = elm.value; 
				              console.log(elm.value)
				          }
				        </script>
					</li>
				</ul>
			</div>
			<!-- /container -->
		</div>
		<!-- /filters -->



		<div class="container margin_60_35">
			@foreach($courses as $course)
			<div class="box_list wow">
				<div class="row no-gutters">
					<div class="col-lg-5">
						<figure class="block-reveal">
							<div class="block-horizzontal"></div>
							<a href="{{ url('course-details/'.$course->course_title) }}"><img src="{{ asset('/uplaod/courses/coursesimages/'. $course->course_image) }}" class="img-fluid" alt=""></a>
							<div class="preview"><span>Preview course</span></div>
						</figure>
					</div>
					<div class="col-lg-7">
						<div class="wrapper">
							<a href="{{ url('add-to-cart/'.$course->id) }}" class="wish_bt"></a>
							<div class="price">${{ $course->course_price - $course->course_discount_price }}</div>
							@foreach($course_categorys as $course_category)
								@if($course_category->id == $course->category_id)
								<small>{{ $course_category->name }}</small>
								@endif
							@endforeach
							<h3>{{ $course->course_title }}</h3>
							<p>{!! substr($course->course_description, 0, 250) !!} ...</p>
							{{-- <div class="rating"><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star"></i><i class="icon_star"></i> <small>(145)</small></div> --}}
						</div>
						<ul>
							<li><i class="icon_clock_alt"></i> {{ $course->course_time }}</li>
							{{-- <li><i class="icon_like"></i> 890</li> --}}
							<li><a href="{{ url('course-details/'.$course->course_title) }}">Enroll now</a></li>
						</ul>
					</div>
				</div>
			</div>
			@endforeach
			<!-- /box_list -->

			
				<!-- /box_grid -->
				{{-- <div class="col-xl-4 col-lg-6 col-md-6">
					<div class="box_grid wow">
						<figure class="block-reveal">
							<div class="block-horizzontal"></div>
							<a href="#0" class="wish_bt"></a>
							<a href="course-detail.html"><img src="img/course__list_2.jpg" class="img-fluid" alt=""></a>
							<div class="price">$45</div>
							<div class="preview"><span>Preview course</span></div>
						</figure>
						<div class="wrapper">
							<small>Category</small>
							<h3>At deseruisse scriptorem</h3>
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
				<!-- /box_grid -->
				<div class="col-xl-4 col-lg-6 col-md-6">
					<div class="box_grid wow">
						<figure class="block-reveal">
							<div class="block-horizzontal"></div>
							<a href="#0" class="wish_bt"></a>
							<a href="course-detail.html"><img src="img/course__list_3.jpg" class="img-fluid" alt=""></a>
							<div class="price">$39</div>
							<div class="preview"><span>Preview course</span></div>
						</figure>
						<div class="wrapper">
							<small>Category</small>
							<h3>Ea vel semper quaerendum</h3>
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
				<!-- /box_grid -->
				<div class="col-xl-4 col-lg-6 col-md-6">
					<div class="box_grid wow">
						<figure class="block-reveal">
							<div class="block-horizzontal"></div>
							<a href="#0" class="wish_bt"></a>
							<a href="course-detail.html"><img src="img/course__list_4.jpg" class="img-fluid" alt=""></a>
							<div class="price">$60</div>
							<div class="preview"><span>Preview course</span></div>
						</figure>
						<div class="wrapper">
							<small>Category</small>
							<h3>Ei has exerci graecis</h3>
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
				<!-- /box_grid -->
				<div class="col-xl-4 col-lg-6 col-md-6">
					<div class="box_grid wow">
						<figure class="block-reveal">
							<div class="block-horizzontal"></div>
							<a href="#0" class="wish_bt"></a>
							<a href="course-detail.html"><img src="img/course__list_5.jpg" class="img-fluid" alt=""></a>
							<div class="price">$45</div>
							<div class="preview"><span>Preview course</span></div>
						</figure>
						<div class="wrapper">
							<small>Category</small>
							<h3>Decore tractatos</h3>
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
				<!-- /box_grid -->
				<div class="col-xl-4 col-lg-6 col-md-6">
					<div class="box_grid wow">
						<figure class="block-reveal">
							<div class="block-horizzontal"></div>
							<a href="#0" class="wish_bt"></a>
							<a href="course-detail.html"><img src="img/course__list_6.jpg" class="img-fluid" alt=""></a>
							<div class="price">$39</div>
							<div class="preview"><span>Preview course</span></div>
						</figure>
						<div class="wrapper">
							<small>Category</small>
							<h3>Eam id legimus torquatos</h3>
							<p>Id placerat tacimates definitionem sea, prima quidam vim no. Duo nobis persecuti cu.</p>
							<div class="rating"><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star voted"></i><i class="icon_star"></i><i class="icon_star"></i> <small>(145)</small></div>
						</div>
						<ul>
							<li><i class="icon_clock_alt"></i> 1h 30min</li>
							<li><i class="icon_like"></i> 890</li>
							<li><a href="course-detail.html">Enroll now</a></li>
						</ul>
					</div>
					<!-- /box_grid -->
				</div> --}}
			</div>
			<!-- /row -->
			<p class="text-center"><a href="{{ url('/courses-grid') }}" class="btn_1 rounded add_top_30">Load more</a></p>
		</div>
		<!-- /container -->
		{{-- <div class="bg_color_1">
			<div class="container margin_60_35">
				<div class="row">
					<div class="col-md-4">
						<a href="#0" class="boxed_list">
							<i class="pe-7s-help2"></i>
							<h4>Need Help? Contact us</h4>
							<p>Cum appareat maiestatis interpretaris et, et sit.</p>
						</a>
					</div>
					<div class="col-md-4">
						<a href="#0" class="boxed_list">
							<i class="pe-7s-wallet"></i>
							<h4>Payments and Refunds</h4>
							<p>Qui ea nemore eruditi, magna prima possit eu mei.</p>
						</a>
					</div>
					<div class="col-md-4">
						<a href="#0" class="boxed_list">
							<i class="pe-7s-note2"></i>
							<h4>Quality Standards</h4>
							<p>Hinc vituperata sed ut, pro laudem nonumes ex.</p>
						</a>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container --> --}}
		</div>
		<!-- /bg_color_1 -->
	</main>
	<!--/main-->

	
@include('website.layouts.footer')