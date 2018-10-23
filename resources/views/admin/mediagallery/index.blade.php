@extends('admin.index')
@section('content')

    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ url('admin') }}">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Media Gallery</li>
    </ol>

    @include('admin.layouts.message')


    <!-- Example DataTables Card-->
    <div class="card mb-3">
        <div class="card-header">
            <i class="fa fa-table"></i> All Media Gallery
            {{--  <a href="{{ url('admin/media-gallery/create') }}" class="btn btn-success mr-2" style="float: right;"><i class="fa fa-edit"></i>Add New</a> --}}
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>#ID</th>
                        <th>Title</th>
                        <th>Image</th>
                        <th>Category Media Gallery</th>
                        <th>Created At</th>
                        <th>Control</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>#ID</th>
                        <th>Title</th>
                        <th>Image</th>
                        <th>Category Media Gallery</th>
                        <th>Created At</th>
                        <th>Control</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    <span hidden="hidden">{{ $count=0 }}</span>
                    @foreach($media_gallery as $value)
                        <tr>
                            <td>{{ $count = $count+1 }}</td>
                            <td>{!! substr($value->title, 0, 15) !!} ...</td>
                            <td>
                                <img style="width: 60px;" class=""
                                     src="{{ asset('uplaod/mediagallery/pictures/'.$value->image) }}" alt="No File">
                            </td>
                            <td>{{ $value->category }}</td>
                            <td>{{ $value->created_at->toDayDateTimeString() }}</td>
                            <td>
                                <a href="media-gallery/{{ $value->id }}" class="btn_1 bg-sucsses"><i
                                            class="fa fa-fw fa-eye"></i> Show</a>
                                <a href="media-gallery/{{ $value->id }}/edit" class="btn_1 bg-primary"><i
                                            class="fa fa-fw fa-edit"></i> Edit</a>
                                <a href="media-gallery/{{ $value->id }}/destroy" class="btn_1 bg-danger"><i
                                            class="fa fa-fw fa-close"></i> Deleted</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
    </div>
    <!-- /tables-->

    <form action="media-gallery/store" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
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
                                    <div class="col-md-3">
                                        <h6>Category</h6>
                                        <div class="form-group">
                                            <!-- <input type="text" class="form-control" placeholder=">Social Media Icon"> -->
                                            <select name="category" class="form-control">
                                                <option value="pictures">pictures</option>
                                                <option value="videos">videos</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <h6>Title</h6>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="title"
                                                   placeholder="Photo Title">
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <h6>Image</h6>
                                        <div class="form-group">
                                            <input type="file" class="form-control" name="image">
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
        <input type="submit" class="btn_1 medium" name="" value="Add">
    </form>

@endsection