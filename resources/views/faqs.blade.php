@include('website.layouts.header')
	
	@include('website.layouts.menu')
	
	<main>
		<section id="hero_in" class="general">
			<div class="wrapper">
				<div class="container">
					<h1 class="fadeInUp"><span></span>Faq Section</h1>
				</div>
			</div>
		</section>
		<!--/hero_in-->

		<div class="container margin_60_35">
			<div class="row">
				<aside class="col-lg-3" id="sidebar">
						<div class="box_style_cat" id="faq_box">
							<ul id="cat_nav">
								<li><a href="#payment" class="active"><i class="icon_document_alt"></i>Payments</a></li>
								<li><a href="#tips"><i class="icon_document_alt"></i>Suggestions</a></li>
								<li><a href="#reccomendations"><i class="icon_document_alt"></i>Reccomendations</a></li>
								<li><a href="#terms"><i class="icon_document_alt"></i>Terms&amp;conditons</a></li>
								<li><a href="#booking"><i class="icon_document_alt"></i>Booking</a></li>
							</ul>
						</div>
						<!--/sticky -->
				</aside>
				<!--/aside -->
				
				<div class="col-lg-9" id="faq">
					<h4 class="nomargin_top">Payments</h4>
					<div role="tablist" class="add_bottom_45 accordion_2" id="payment">

						@foreach($faqs as $faq)
						@if($faq->category_faq == "Payments")
						<div class="card">
							<div class="card-header" role="tab">
								<h5 class="mb-0">
									<a class="collapsed" data-toggle="collapse" href="#collapse{{ $faq->id }}_payment" aria-expanded="false">
										<i class="indicator ti-plus"></i>{{ $faq->title }}
									</a>
								</h5>
							</div>
							<div id="collapse{{ $faq->id }}_payment" class="collapse" role="tabpanel" data-parent="#payment">
								<div class="card-body">
									<p>{!! $faq->content !!}.</p>
								</div>
							</div>
						</div>
						<!-- /card -->
						@endif
						@endforeach

					</div>
					<!-- /accordion payment -->
					
					<h4 class="nomargin_top">Suggestions</h4>
					<div role="tablist" class="add_bottom_45 accordion_2" id="tips">
						@foreach($faqs as $faq)
						@if($faq->category_faq == "Suggestions")
							<div class="card">
								<div class="card-header" role="tab">
									<h5 class="mb-0">
										<a data-toggle="collapse" href="#collapse{{ $faq->id }}_tips" aria-expanded="true"><i class="indicator ti-plus"></i>{{ $faq->title }}</a>
									</h5>
								</div>

								<div id="collapse{{ $faq->id }}_tips" class="collapse" role="tabpanel" data-parent="#tips">
									<div class="card-body">
										<p>{!! $faq->content !!} .</p>
									</div>
								</div>
							</div>
							<!-- /card -->
						@endif
						@endforeach
						
					</div>
					<!-- /accordion suggestions -->
					
					<h4 class="nomargin_top">Reccomendations</h4>
					<div role="tablist" class="add_bottom_45 accordion_2" id="reccomendations">
						@foreach($faqs as $faq)
						@if($faq->category_faq == "Reccomendations")
						<div class="card">
							<div class="card-header" role="tab">
								<h5 class="mb-0">
									<a data-toggle="collapse" href="#collapse{{ $faq->id }}_reccomendations" aria-expanded="true"><i class="indicator ti-plus"></i>{{ $faq->title }}</a>
								</h5>
							</div>

							<div id="collapse{{ $faq->id }}_reccomendations" class="collapse" role="tabpanel" data-parent="#reccomendations">
								<div class="card-body">
									<p>{!! $faq->content !!}.</p>
								</div>
							</div>
						</div>
						<!-- /card -->
						@endif
						@endforeach

					</div>
					<!-- /accordion Reccomendations -->
					
					<h4 class="nomargin_top">Terms&amp;conditons</h4>
					<div role="tablist" class="add_bottom_45 accordion_2" id="terms">
						@foreach($faqs as $faq)
						@if($faq->category_faq == "Terms&conditons")
						<div class="card">
							<div class="card-header" role="tab">
								<h5 class="mb-0">
									<a data-toggle="collapse" href="#collapse{{ $faq->id }}_terms" aria-expanded="true"><i class="indicator ti-plus"></i>{{ $faq->title }}</a>
								</h5>
							</div>

							<div id="collapse{{ $faq->id }}_terms" class="collapse" role="tabpanel" data-parent="#terms">
								<div class="card-body">
									<p>{!! $faq->content !!}.</p>
								</div>
							</div>
						</div>
						<!-- /card -->
						@endif
						@endforeach

					</div>
					<!-- /accordion Terms -->
					
					<h4 class="nomargin_top">Booking</h4>
					<div role="tablist" class="add_bottom_45 accordion_2" id="booking">
						@foreach($faqs as $faq)
						@if($faq->category_faq == "Booking")
						<div class="card">
							<div class="card-header" role="tab">
								<h5 class="mb-0">
									<a data-toggle="collapse" href="#collapse{{ $faq->id }}_booking" aria-expanded="true"><i class="indicator ti-plus"></i>{{ $faq->title }}</a>
								</h5>
							</div>

							<div id="collapse{{ $faq->id }}_booking" class="collapse" role="tabpanel" data-parent="#booking">
								<div class="card-body">
									<p>{!! $faq->content !!}.</p>
								</div>
							</div>
						</div>
						<!-- /card -->
						@endif
						@endforeach
						
					</div>
					<!-- /accordion Booking -->
				</div>
				<!-- /col -->
			</div>
			<!-- /row -->
		</div>
		<!--/container-->
	</main>
	<!--/main-->

	
@include('website.layouts.footer')