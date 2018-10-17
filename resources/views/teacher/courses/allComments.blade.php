@extends('teacher.index')
@section('content')

 <!-- Breadcrumbs-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="{{ url('admin') }}">Dashboard</a>
    </li>
    <li class="breadcrumb-item">
      <a href="{{ url('admin/courses') }}">Courses</a>
    </li>
    <li class="breadcrumb-item active">All Comments</li>
  </ol>

  @include('teacher.layouts.message')

  <div class="box_general">
			<h4>Inbox</h4>
			<div class="list_general">
				<ul>
					@foreach($comments as $comment)
					<li>
						<span>{{ \Carbon\Carbon::parse($comment[0]['created_at'])->diffForHumans() }}</span>
						<figure><img src="{{ asset('/uplaod/user/'.$comment[1]['image']) }}" alt=""></figure>
						<?php $course = DB::table('courses')->where('id', $comment[0]["course_id"])->first(); ?>
						<h4>{{ $comment[1]['name'] }} <i class="approved"> {{ $course->course_title }}</i></h4>

						<div class="rating">
							<style>
								.voted{color: #FFC107;}
							</style>
							@for($i = 0; $i < $comment[0]['star_number']; $i++)
								<i class="fa fa-star voted"></i>
							@endfor
							@if($comment[0]['star_number'] < 5)
								@for($i = 0; $i < (5 - $comment[0]['star_number']); $i++)
									<i class="fa fa-star"></i>
								@endfor
							@endif
						</div>


						<p>{!! $comment[0]['comment'] !!} .</p>
						{{-- @if($comment[1]['dane_read'] = 0) --}}
						<li><a href="{{ url('/dashboard/comment/'. $comment[0]["id"] .'/dane-read') }}" class="btn_1 badge-primary" style="float: right;margin-top: -2.5em;"><i class="fa fa-eye"></i> Done Read</a></li>
						{{-- @endif --}}
					</li>
					@endforeach
				</ul>
			</div>
		</div>
		<!-- /box_general-->
		{{-- <nav aria-label="...">
			<ul class="pagination pagination-sm add_bottom_30">
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
		</nav> --}}
		 <link rel="stylesheet" type="text/css" href="{{ url('/design/adminpanel') }}/css/pagenation-admin.css">
		{{-- {{ $comment->links() }} --}}
		<!-- /pagination-->


@endsection