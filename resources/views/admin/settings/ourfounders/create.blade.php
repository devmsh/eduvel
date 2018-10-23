@extends('admin.index')
@section('content')

    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ url('/admin') }}">Dashboard</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ url('/admin/settings') }}">Settings</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ url('/admin/settings/our-founders') }}">Our Founders</a>
        </li>
        <li class="breadcrumb-item active">Create New</li>
    </ol>

    @include('admin.layouts.message')

    <form action="store" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}

        <div class="box_general padding_bottom">
            <div class="header_box version_2">
                <h2><i class="fa fa-file"></i>Create New Our Founders</h2>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Image Story</label>
                        <input type="file" class="form-control" name="image">
                        @if($errors->has('image'))
                            <small style="color: red">{{ $errors->first('image') }}</small>
                        @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Name"
                               value="{{ old('name') }}">
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
                        <label>Job</label>
                        <input type="text" class="form-control" name="job" placeholder="job" value="{{ old('job') }}">
                        @if($errors->has('job'))
                            <small style="color: red">{{ $errors->first('job') }}</small>
                        @endif
                    </div>
                </div>
            </div>
            <!-- /row-->

        </div>
        <!-- /box_general-->

        <a href="{{ url('/admin/settings/our-founders') }}" class="btn_1 medium" style="background: #335693 !important">Back</a>
        <input type="submit" class="btn_1 medium" name="submit" value="Save">

    </form>


@endsection