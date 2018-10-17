@extends('admin.index')
@section('content')

 <!-- Breadcrumbs-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="{{ url('admin') }}">Dashboard</a>
    </li>
    <li class="breadcrumb-item">
      <a href="{{ url('admin/blog/category') }}">Categories</a>
    </li>
    <li class="breadcrumb-item active">Show Posts</li>
  </ol>

  @include('admin.layouts.message')

  <div class="box_general">
		<h4 class="pb-2">All Posts From Category : {{ $category->name }} 
			 <a href="{{ url('admin/blog/post/create') }}" class="btn btn-success" style="float: right;"><i class="fa fa-plus"></i> Add New</a>
		</h4>
		<div class="list_general">
			<ul>
				@foreach($category->posts as $post)
					<li style="">
						<span> {{ \Carbon\Carbon::parse($post->created_at)->diffForHumans() }} </span>
						<figure style="border-radius: 0px;"><img src="{{ asset('design/educationalzard/img/avatar1.jpg') }}" alt=""></figure>
						<h4>{{ $post->title }} </h4>
						<span class="float-left">
							<i class="fa fa-user-circle"></i> Admin {{ $post->admin_id }} 
						</span>
						<span class="float-left pl-4">
							<i class="fa fa-comments"></i> (95) Comments {{ $post->phone_contact }}
						</span> <br>
						<p>{{ $post->description }}.</p>
						<div class="text-right">
							<a href="{{ url('/admin/blog/post/'.$post->id) }}" class="btn_1 bg-success"><i class="fa fa-eye"></i> Details</a>
							@if($post->done_read == 0)
							<a href="/admin/blog/post/{{ $post->id }}/edit" class="btn_1 bg-primary"><i class="fa fa-fw fa-edit"></i> Edit</a>
							@endif
							<a href="/admin/blog/post/{{ $post->id }}/destroy" class="btn_1 bg-danger" data-toggle="modal" data-target="#sureDeleteMessage"><i class="fa fa-fw fa-close"></i> Deleted</a>
						</div>
					</li>
				@endforeach
			</ul>
		</div>
	</div>
	<!-- /box_general-->

	<!-- Modal -->
	<div class="modal fade" id="sureDeleteMessage" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">Message Sure</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	        Are you sure you're sorry?
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	        <!-- <button type="button" class="btn btn-danger">Delete</button> -->
	        <a href="messages/{{ $category->id }}/destroy" class="btn btn-danger"><i class="fa fa-fw fa-close"></i> Deleted</a>
	      </div>
	    </div>
	  </div>
	</div>

	<a href="{{ url('/admin/blog/category/') }}" class="btn_1 medium " style="background: #335693 !important">Back</a>


@endsection
