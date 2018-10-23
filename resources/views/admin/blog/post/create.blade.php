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
        <li class="breadcrumb-item active">Create</li>
    </ol>

    @include('admin.layouts.message')


    <form action="store" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="box_general padding_bottom">
            <div class="header_box version_2">
                <h2><i class="fa fa-file"></i>Create New Post</h2>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Image Post</label>
                        <input type="file" class="form-control" name="image">
                        @if($errors->has('image'))
                            <small style="color: red">{{ $errors->first('image') }}</small>
                        @endif
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label>Category</label>
                        <select class="form-control" name="category_id" value="{{ old('category_id') }}">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
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
                               value="{{ old('title') }}">
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
                                  style="height:100px;" placeholder="Description">{{ old('description') }}</textarea>
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
        <input type="submit" class="btn_1 medium" name="submit" value="Save">

    </form>

@endsection