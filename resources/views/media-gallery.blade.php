@include('website.layouts.header')
	
	@include('website.layouts.menu')
	
	<main>
		<section id="hero_in" class="general">
			<div class="wrapper">
				<div class="container">
					<h1 class="fadeInUp"><span></span>Media Gallery</h1>
				</div>
			</div>
		</section>
		<!--/hero_in-->

		<div class="container margin_60_35">
			<div class="main_title_2">
				<span><em></em></span>
				<h2>Here some pictures ...</h2>
				<p>Cum doctus civibus efficiantur in imperdiet deterruisset.</p>
			</div>
			<div class="grid">
				<ul class="magnific-gallery">

					@foreach($mediaGallery as $value)
						@if($value->category == "pictures")
						<li>
							<figure>
								<img style="min-height: 213px;" src="{{ asset('uplaod/mediagallery/pictures/'.$value->image) }}" alt="">
								<figcaption>
									<div class="caption-content">
										<a href="{{ asset('uplaod/mediagallery/pictures/'.$value->image) }}" title="{{ $value->title }}" data-effect="mfp-zoom-in">
											<i class="pe-7s-albums"></i>
											<p>Your caption</p>
										</a>
									</div>
								</figcaption>
							</figure>
						</li>
						@endif
					@endforeach

					<!-- <li>
						<figure>
							<img src="{{ url('/design/educationalzard') }}/img/gallery/pic_4.jpg" alt="">
							<figcaption>
								<div class="caption-content">
									<a href="" title="Photo title" data-effect="mfp-zoom-in">
										<i class="pe-7s-albums"></i>
										<p>Your caption</p>
									</a>
								</div>
							</figcaption>
						</figure>
					</li> -->

				</ul>
			</div>
			<!-- /grid gallery -->
		</div>
		<!-- /container -->
		
		<div class="bg_color_1">
			<div class="container margin_60_35">
				<div class="main_title_2">
					<span><em></em></span>
					<h2>Here some videos ...</h2>
					<p>Cum doctus civibus efficiantur in imperdiet deterruisset.</p>
				</div>
				<div class="grid">
					<ul class="magnific-gallery">

						@foreach($mediaGallery as $value)
						@if($value->category == "videos")
							<li>
								<figure>
									{{-- {{ url('/design/educationalzard') }}/img/gallery/pic_2.jpg --}}
									<img src="{{ asset('uplaod/mediagallery/videos/'.$value->image) }}" alt="{{ $value->title }}">
									<figcaption>
									<div class="caption-content">
										<a href="{{ asset('uplaod/mediagallery/videos/'.$value->image) }}" class="video" title="{{ $value->title }}">
											<i class="pe-7s-film"></i>
											<p>{{ $value->title }}</p>
									</a>
									</div>
									</figcaption>
								</figure>
							</li>
						@endif
						@endforeach

						<!-- <li>
							<figure>
								<img src="{{ url('/design/educationalzard') }}/img/gallery/pic_2.jpg" alt="">
								<figcaption>
								<div class="caption-content">
									<a href="https://vimeo.com/45830194" class="video" title="Video Vimeo">
										<i class="pe-7s-film"></i>
										<p>Your caption</p>
								</a>
								</div>
								</figcaption>
							</figure>
						</li> -->
						
					</ul>
				</div>
				<!-- /grid -->
			</div>
			<!-- /container -->
		</div>
		<!-- /bg_color_1 -->
		
	</main>
	<!--/main-->
	
@include('website.layouts.footer')