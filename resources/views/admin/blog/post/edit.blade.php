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
        <li class="breadcrumb-item active">Edit</li>
    </ol>

    @include('admin.layouts.message')


    <form action="/admin/blog/post/update" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="hidden" name="id" value="{{ $post->id }}">

        <div class="box_general padding_bottom">
            <div class="header_box version_2">
                <h2><i class="fa fa-file"></i>Edit The Post</h2>
            </div>

            <div class="row">
                <div class="col-md-5">
                    <div class="form-group">
                        <label>Image Post</label>
                        <input type="hidden" name="oldImage" value="{{ $post->image }}">
                        <input type="file" class="form-control" name="image">
                        @if($errors->has('image'))
                            <small style="color: red">{{ $errors->first('image') }}</small>
                        @endif
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <!-- <label>Old Image Story</label> -->
                        <img class="img-thumbnail" src="{{ asset('uplaod/posts/'.$post->image) }}" alt="Image Post">
                    </div>
                </div>

                <div class="col-md-5">
                    <div class="form-group">
                        <label>Category</label>
                        <select class="form-control" name="category_id">
                            @foreach($categories as $category)
                                <option <?php if ($category->id == $post->category_id) {
                                    echo 'selected="selected"';
                                } ?> value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('category_id'))
                            <small style="color: red">{{ $errors->first('category_id') }}</small>
                        @endif
                    </div>
                </div>

            </div>
            <!-- /row-->

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" class="form-control" name="title" placeholder="Title"
                               value="{{ $post->title }}">
                        @if($errors->has('title'))
                            <small style="color: red">{{ $errors->first('title') }}</small>
                        @endif
                    </div>
                </div>
            </div>
            <!-- /row-->

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Description</label>
                        <textarea rows="5" class="form-control" name="description" id="article-ckeditor"
                                  style="height:100px;" placeholder="Description">{{ $post->description }}</textarea>
                        @if($errors->has('description'))
                            <small style="color: red">{{ $errors->first('description') }}</small>
                        @endif
                    </div>
                </div>
            </div>
            <!-- /row-->

        </div>
        <!-- /box_general-->

        <a href="{{ url('/admin/blog/posts/') }}" class="btn_1 medium " style="background: #335693 !important">Back</a>
        <input type="submit" class="btn_1 medium" name="submit" value="Update">

    </form>

@endsection