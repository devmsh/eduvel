@extends('admin.index')
@section('content')

    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ url('admin') }}">Dashboard</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ url('admin/blog/posts') }}">Posts</a>
        </li>
        <li class="breadcrumb-item active">Details</li>
    </ol>

    @include('admin.layouts.message')

    <div class="box_general">
        <h4 class="pb-2"> Details
            <a href="{{ url('admin/blog/post/create') }}" class="btn btn-success" style="float: right;"><i
                        class="fa fa-plus"></i> Add New</a>
        </h4>
        <div class="list_general">
            <ul>
                <li style="padding-left: 30px;">
                    <div class="container">  <!-- margin_60_35 -->
                        <div class="row">
                            <div class="col-lg-9">
                                <div class="bloglist singlepost">
                                    <p><img alt="" class="img-fluid" src="{{ asset('uplaod/posts/'.$post->image) }}">
                                    </p>
                                    <h1>{!! $post->title !!}</h1>

                                    <div class="post-content">
                                        <div class="dropcaps">
                                            <p>{!! $post->description !!}.</p>
                                        </div>
                                    </div>
                                    <!-- /post -->
                                </div>
                                <!-- /single-post -->

                                <div id="comments">
                                    <h5>Comments</h5>

                                    <ul>
                                        <style type="text/css">
                                            .avatar {
                                                float: left;
                                                margin-right: 25px;
                                                width: 68px;
                                                height: 68px;
                                                overflow: hidden;
                                                -webkit-border-radius: 3px;
                                                -moz-border-radius: 3px;
                                                -ms-border-radius: 3px;
                                                border-radius: 3px;
                                                position: relative;
                                            }

                                            .a {
                                                color: #3f9fff;
                                                -o-transition: all .3s ease-in-out;
                                                -webkit-transition: all .3s ease-in-out;
                                                -ms-transition: all .3s ease-in-out;
                                                transition: all .3s ease-in-out;
                                            }

                                            .img {
                                                width: 68px;
                                                height: auto;
                                                position: absolute;
                                                left: 50%;
                                                top: 50%;
                                                -webkit-transform: translate(-50%, -50%);
                                                -moz-transform: translate(-50%, -50%);
                                                -ms-transform: translate(-50%, -50%);
                                                -o-transform: translate(-50%, -50%);
                                                transform: translate(-50%, -50%);
                                            }

                                            .comment_right {
                                                display: table;
                                                border: 2px solid #ededed;
                                                -webkit-border-radius: 3px;
                                                -moz-border-radius: 3px;
                                                -ms-border-radius: 3px;
                                                border-radius: 3px;
                                                padding: 20px 20px 0 20px;
                                                position: relative;
                                            }

                                            .comment_info {
                                                padding-bottom: 7px;
                                            }

                                            .a {
                                                color: #3f9fff;
                                                -o-transition: all .3s ease-in-out;
                                                -webkit-transition: all .3s ease-in-out;
                                                -ms-transition: all .3s ease-in-out;
                                                transition: all .3s ease-in-out;
                                            }

                                            .comment_info b {
                                                padding: 0 10px !important;
                                            }
                                        </style>

                                        @foreach($post->blog_comments as $comm)
                                            <li style="padding: 25px 0 0 0; list-style: none;">
                                                <div class="avatar">
                                                    <a class="a" href="#"><img class="img"
                                                                               src="{{ asset('design/educationalzard/img/avatar1.jpg') }}"
                                                                               alt="">
                                                    </a>
                                                </div>
                                                <div class="comment_right clearfix">
                                                    <div class="comment_info">
                                                        By
                                                        <a href="#">{{ $comm->name }}</a><b>|</b>{{ $comm->created_at->toDateString() }}
                                                        <b>|</b><a href="{{ $comm->website }}">Reply</a> <span
                                                                class="float-right">{{ \Carbon\Carbon::parse($comm->created_at)->diffForHumans() }}</span>
                                                    </div>
                                                    <p>
                                                        {{ $comm->comment }}.
                                                    </p>
                                                    <a href="/admin/blog/comment/{{ $comm->id }}/destroy"
                                                       class="btn_1 bg-danger float-right mb-2" data-toggle="modal"
                                                       data-target="#sureDeleteComment"><i class="fa fa-close"></i>
                                                        Remove Comment</a>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>

                            </div>

                            <div class="col-lg-3">
                                <div class="postmeta">
                                    <ul>
                                        <li><a href="#"><i class="icon_folder-alt"></i> {{ $name_category->name }}</a>
                                        </li>
                                        <li><a href="#"><i
                                                        class="icon_clock_alt"></i> {{ $post->created_at->toDayDateTimeString() }}
                                            </a></li>
                                        <li><a href="#"><i class="icon_pencil-edit"></i> Admin</a></li>
                                        <li><a href="#"><i class="icon_comment_alt"></i> (14) Comments</a></li>
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

    <a href="{{ url('/admin/blog/posts/') }}" class="btn_1 medium " style="background: #335693 !important">Back</a>
    <a href="/admin/blog/post/{{ $post->id }}/edit" class="btn_1 bg-primary"><i class="fa fa-fw fa-edit"></i> Edit</a>
    <a href="/admin/blog/post/{{ $post->id }}/destroy" class="btn_1 bg-danger" data-toggle="modal"
       data-target="#sureDeletePost"><i class="fa fa-fw fa-close"></i> Deleted</a>

    <!-- Modal -->
    <div class="modal fade" id="sureDeletePost" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
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

                    <button type="button" class="btn btn-secondary" data-dismiss="modal" style="cursor: pointer;">
                        Close
                    </button>
                    <form action="/admin/blog/post/{{ $post->id }}/destroy" method="POST">
                        {{ csrf_field() }}
                        <input type="hidden" name="id" value="{{ $post->id }}">
                        <button type="submit" name="item" class="btn btn-danger" style="cursor: pointer;">Yes sure
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="sureDeleteComment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
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
                        <h5 style="color: red !important;">Are you sure you want to delete Comment ? </h5>
                    </div>
                </div>
                <div class="modal-footer">

                    <button type="button" class="btn btn-secondary" data-dismiss="modal" style="cursor: pointer;">
                        Close
                    </button>
                    @if(!empty($comm->id))
                        <form action="/admin/blog/comment/{{ $comm->id }}/destroy" method="POST">
                            {{ csrf_field() }}
                            <input type="hidden" name="id" value="{{ $comm->id }}">
                            <button type="submit" name="item" class="btn btn-danger" style="cursor: pointer;">Yes sure
                            </button>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection
