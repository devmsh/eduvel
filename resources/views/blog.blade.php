@include('website.layouts.header')

	<!-- SPECIFIC CSS -->
    <link href="{{ url('/design/educationalzard') }}/css/blog.css" rel="stylesheet">

    <!-- YOUR CUSTOM CSS -->
    <link href="{{ url('/design/educationalzard') }}/css/custom.css" rel="stylesheet">
	
	@include('website.layouts.menu')
	
	<main>
		<section id="hero_in" class="general">
			<div class="wrapper">
				<div class="container">
					<h1 class="fadeInUp"><span></span>Education blog</h1>
				</div>
			</div>
		</section>
		<!--/hero_in-->

		<div class="container margin_60_35">
			<div class="row">
				<div class="col-lg-9">

					@if(!empty($posts))
					@foreach($posts as $post)
						<article class="blog wow fadeIn">
							<div class="row no-gutters">
								<div class="col-lg-7">
									<figure>
										<a href="/blog/blog-post/{{ $post->id }}"><img src="{{ asset('uplaod/posts/'.$post->image) }}" alt="">
											<div class="preview"><span>Read more</span></div>
										</a>
									</figure>
								</div>
								<div class="col-lg-5">
									<div class="post_info">
										<small>{{ $post->created_at->toDayDateTimeString() }}</small>
										<h3><a href="/blog/blog-post/{{ $post->id }}">{{ $post->title }}</a></h3>
										<p>{!! substr($post->description, 0, 155) !!} ...</p>
										<ul>
											<li>
												<div class="thumb"><img src="img/thumb_blog.jpg" alt=""></div> Jessica Hoops
											</li>
											<li><i class="icon_comment_alt"></i> 20</li>
										</ul>
									</div>
								</div>
							</div>
						</article>
						<!-- /article -->
					@endforeach
					@endif

					@if(!empty($data))
					@foreach($data[0] as $post)
						<article class="blog wow fadeIn">
							<div class="row no-gutters">
								<div class="col-lg-7">
									<figure>
										<a href="/blog/blog-post/{{ $post->id }}"><img src="{{ asset('uplaod/posts/'.$post->image) }}" alt="">
											<div class="preview"><span>Read more</span></div>
										</a>
									</figure>
								</div>
								<div class="col-lg-5">
									<div class="post_info">
										<small>{{ $post->created_at->toDayDateTimeString() }}</small>
										<h3><a href="/blog/blog-post/{{ $post->id }}">{{ $post->title }}</a></h3>
										<p>{!! substr($post->description, 0, 155) !!} ...</p>
										<ul>
											<li>
												<div class="thumb"><img src="{{ asset('design/educationalzard/img/thumb_blog.jpg') }}" alt=""></div> Jessica Hoops
											</li>
											<li><i class="icon_comment_alt"></i> 20</li>
										</ul>
									</div>
								</div>
							</div>
						</article>
						<!-- /article -->
					@endforeach
					@endif

					@if(isset($data))
						<article class="blog wow fadeIn">
							<div class="row no-gutters"  style="margin-top: 5%; text-align: center;">

								<div class="col-lg-12">
									<ul>

										@foreach($categories as $category)
											<li>
												
												<a @if(!empty($id) && $id == $category->id)  style="color: #392779 !important; font-weight: 700;" @endif href="{{ url('/blog/category/'.$category->id) }}">{{ $category->name }} 
													<span>( {{ count($category->posts) }} )</span>
												</a>
											</li>
										@endforeach
										
									</ul>
								</div>

								<div class="col-lg-12">
									<p>

										0 results found
										<br>
										Use the tabs above to see more results or try another search term.
																			
									</p>
								</div>
							</div>
						</article>
						<!-- /article -->
					@endif

					<!-- <nav aria-label="...">
						<ul class="pagination pagination-sm">
							<li class="page-item disabled">
								<a class="page-link" href="#" tabindex="-1">Previous</a>
							</li>
							<li class="page-item"><a class="page-link" href="#">1</a></li>
							<li class="page-item"><a class="page-link" href="#">2</a></li>
							<li class="page-item"><a class="page-link" href="#">3</a></li>
							<li class="page-item">
								<a class="page-link" href="#">Next</a>
							</li>
						</ul>
					</nav> -->

					@if(!empty($posts))
					<style type="text/css">
						.tags .active {
							background-color: #392779;
							color: #fff;
							padding: 3px 10px;
							font-size: 13px;
							margin: 0 0 4px;
							letter-spacing: 0.4px;
							-webkit-border-radius: 3px;
							-moz-border-radius: 3px;
							-ms-border-radius: 3px;
							border-radius: 3px;
							display: inline-block;
						}
					</style>
					<div class="widget">
						<div class="tags">
							{{ $posts->links() }}
							<!-- <?php
								$text = str_replace('1', "Next", $posts->links());
								Echo $text;
							?>  -->
						</div>
					</div>
					<!-- /pagination -->
					@endif

				</div>
				<!-- /col -->

				<aside class="col-lg-3">
					<div class="widget">
						<form action="/blog/search" method="POST">
							{{ csrf_field() }}
							<div class="form-group">
								<input type="text" name="search" id="search" class="form-control" value="" placeholder="Search...">
							</div>
							<button type="submit" id="submit" class="btn_1 rounded"> Search</button>
						</form>
					</div>
					<!-- /widget -->
					<div class="widget">
						<div class="widget-title">
							<h4>Recent Posts</h4>
						</div>
						<ul class="comments-list">
							@if(!empty($posts))
							@foreach($posts as $post)
							<li>
								<div class="alignleft">
									<a href="#0"><img src="{{ asset('uplaod/posts/'.$post->image) }}" alt=""></a>
								</div>
								<small>{{ $post->created_at->toDayDateTimeString() }}</small>
								<h3><a href="#" title="">{!! substr($post->title, 0, 50) !!} ...</a></h3>
							</li>
							@endforeach
							@endif
						</ul>
					</div>
					<!-- /widget -->
					<div class="widget">
						<div class="widget-title">
							<h4>Blog Categories</h4>
						</div>
						<ul class="cats">
							@foreach($categories as $category)
								<li>
									
									<a @if(!empty($id) && $id == $category->id)  style="color: #392779 !important; font-weight: 700;" @endif href="{{ url('/blog/category/'.$category->id) }}">{{ $category->name }} 
										<span>( {{ count($category->posts) }} )</span>
									</a>
								</li>
							@endforeach
						</ul>
					</div>
					<!-- /widget -->
					<div class="widget">
						<div class="widget-title">
							<h4>Popular Tags</h4>
						</div>
						<div class="tags">
							<a href="#">Information tecnology</a>
							<a href="#">Students</a>
							<a href="#">Community</a>
							<a href="#">Carreers</a>
							<a href="#">Literature</a>
							<a href="#">Seminars</a>
						</div>
					</div>
					<!-- /widget -->
				</aside>
				<!-- /aside -->
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</main>
	<!--/main-->
	

@include('website.layouts.footer')