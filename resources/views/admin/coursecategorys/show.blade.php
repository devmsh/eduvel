@extends('admin.index')
@section('content')

 <!-- Breadcrumbs-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="{{ url('admin') }}">Dashboard</a>
    </li>
    <li class="breadcrumb-item">
      <a href="{{ url('admin/courses-categories') }}">Courses Categories</a>
    </li>
    <li class="breadcrumb-item active">Show</li>
  </ol>

  @include('admin.layouts.message')

  	<div class="box_general">
    <h4 class="pb-2"> Details
       {{-- <a href="{{ url('admin/blog/post/create') }}" class="btn btn-success" style="float: right;"><i class="fa fa-plus"></i> Add New</a> --}}
    </h4>
    <div class="list_general">
      <ul>
        <li style="padding-left: 30px;">
          <div class="container">  <!-- margin_60_35 -->
            <div class="row">
              <div class="col-lg-9">
                <div class="bloglist singlepost">
                  <p>
                     <img style="width: 100%" class="" src="{{ asset('uplaod/coursecategorys/'.$course_categorys->image) }}" alt="No Image">
                  </p>
                  <h1>{!! $course_categorys->name !!}</h1>

                  <!-- /media gallery -->
                </div>
                <!-- /single-post -->

                

              </div>

              <div class="col-lg-3">
                <div class="postmeta">
                  <ul>
                    {{-- <li><a href="#"><i class="icon_folder-alt"></i> {{ $course_categorys->title }}</a></li>
                    <li><a href="#"><i class="icon_folder-alt"></i> {{ $course_categorys->category }}</a></li>
                    <li><a href="#"><i class="icon_clock_alt"></i> {{ $course_categorys->created_at->toDayDateTimeString() }}</a></li> --}}
                    
                  </ul>
                </div>
                <!-- /post meta -->
              </div>
            </div>
          </div>

        </li>
      </ul>
    </div>
  </div>
  <!-- /box_general-->

  <a href="{{ url('/admin/courses-categories') }}" class="btn_1 medium " style="background: #335693 !important">Back</a>
  <a href="{{ url('admin/courses-categories/'.$course_categorys->id.'/edit') }}" class="btn_1 bg-primary"><i class="fa fa-fw fa-edit"></i> Edit</a>
  <a href="{{ url('admin/courses-categories/'.$course_categorys->id.'/destroy') }}" class="btn_1 bg-danger"><i class="fa fa-fw fa-close"></i> Deleted</a>

  <!-- Modal -->
  <div class="modal fade" id="sureDeletePost" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Message sure </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="not_empty_record">
              <h5 style="color: red !important;">Are you sure you want to delete Category ? </h5>
            </div>
          </div>
          <div class="modal-footer">
              
              <button type="button" class="btn btn-secondary" data-dismiss="modal" style="cursor: pointer;">Close</button>
              <form action="/admin/blog/post/{{ $course_categorys->id }}/destroy" method="POST">
                {{ csrf_field() }}
                <input type="hidden" name="id" value="{{ $course_categorys->id }}">
                <button type="submit" name="item" class="btn btn-danger" style="cursor: pointer;">Yes sure
                </button>
              </form>
          </div>
        </div>
      </div>
    </div>

  
    
@endsection