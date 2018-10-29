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
        <li class="breadcrumb-item active">create</li>
    </ol>

    @include('admin.layouts.message')

    <form action="/admin/blog/categories" method="post">
        {{ csrf_field() }}

        <div class="box_general padding_bottom">
            <div class="header_box version_2">
                <h2><i class="fa fa-file"></i>Create New Category</h2>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Name Category</label>
                        <input type="text" class="form-control" name="name" placeholder="Name Category" value="">
                        @if($errors->has('name'))
                            <small style="color: red">{{ $errors->first('name') }}</small>
                        @endif
                    </div>
                </div>
            </div>
            <!-- /row-->

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Description Category</label>
                        <textarea rows="5" class="form-control" name="description" style="height:100px;"
                                  placeholder="Description Category"></textarea>
                        @if($errors->has('description'))
                            <small style="color: red">{{ $errors->first('description') }}</small>
                        @endif
                    </div>
                </div>
            </div>
            <!-- /row-->

        </div>
        <!-- /box_general-->

        <a href="{{ url('/admin/blog/category/') }}" class="btn_1 medium "
           style="background: #335693 !important">Back</a>
        <input type="submit" class="btn_1 medium" name="submit" value="Save">

    </form>


@endsection