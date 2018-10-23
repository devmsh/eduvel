@extends('admin.index')
@section('content')

    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ url('admin') }}">Dashboard</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ url('admin/media-gallery') }}">Media Gallery</a>
        </li>
        <li class="breadcrumb-item active">Edit</li>
    </ol>

    @include('admin.layouts.message')

    <form action="{{ url('admin/media-gallery/update') }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="hidden" name="id" value="{{ $media_gallery->id }}">
        <div class="box_general padding_bottom">
            <div class="header_box version_2">
                <h2><i class="fa fa-camera"></i>Media Gallery</h2>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <!-- <h6>Category</h6> -->
                    <table id="pricing-list-container" style="width:100%;">
                        <tr class="pricing-list-item">
                            <td>
                                <div class="row">
                                    <div class="col-md-6">
                                        <h6>Category</h6>
                                        <div class="form-group">
                                            <!-- <input type="text" class="form-control" placeholder=">Social Media Icon"> -->
                                            <select name="category" class="form-control">
                                                <option <?php if ($media_gallery->category == 'pictures') {
                                                    echo "selected";
                                                } ?> value="pictures">pictures
                                                </option>
                                                <option <?php if ($media_gallery->category == 'videos') {
                                                    echo "selected";
                                                } ?> value="videos">videos
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <h6>Title</h6>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="title"
                                                   placeholder="Photo Title" value="{{ $media_gallery->title }}">
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <h6>Image Or Video</h6>
                                        <div class="form-group">
                                            <input type="hidden" name="oldimage" value="{{ $media_gallery->image }}">
                                            <input type="file" class="form-control" name="image">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <h6>Image Or Video</h6>
                                        <div class="form-group">
                                            <img style="width: 100%" class=""
                                                 src="{{ asset('uplaod/mediagallery/'.$media_gallery->image) }}"
                                                 alt="No Image">
                                        </div>
                                    </div>
                                    <!-- <div class="col-md-2">
                                      <div class="form-group">
                                        <a class="delete" href="#"><i class="fa fa-fw fa-remove"></i></a>
                                      </div>
                                    </div> -->
                                </div>
                            </td>
                        </tr>
                    </table>
                    <!-- <a href="#0" class="btn_1 gray add-pricing-list-item"><i class="fa fa-fw fa-plus-circle"></i>Add New Link</a> -->
                </div>
            </div>
            <!-- /row-->
        </div>
        <!-- /box_general-->

        <!-- <p><a href="#0" class="btn_1 medium">Save</a></p> -->
        <a href="{{ url('/admin/media-gallery') }}" class="btn_1 medium "
           style="background: #335693 !important">Back</a>
        <input type="submit" class="btn_1 medium" name="" value="Save">
    </form>


@endsection