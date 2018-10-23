@extends('admin.index')
@section('content')

    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ url('admin') }}">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Categories</li>
    </ol>

    @include('admin.layouts.message')


    <!-- Example DataTables Card-->
    <div class="card mb-3">
        <div class="card-header">
            <i class="fa fa-table"></i> Data Table Categories
            <!-- <input type="submit" style="cursor: pointer;" name="item[]" class="btn btn-danger float-right delBtn" value="Deleted All" onclick="delete_at()" data-toggle="modal" data-target="#sureDelete"> -->
            <!-- <form action="users/create" method="POST">
              <input type="submit"  class="btn btn-primary mr-2" style="float: right;" name="" value="Add New">
            </form> -->
            <a href="{{ url('admin/blog/category/create') }}" class="btn btn-success mr-2" style="float: right;"><i
                        class="fa fa-edit"></i>Add New</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <!-- Button trigger modal -->
                        <!-- <th><input type="checkbox" id="Select" name="item[]" class="check_all" onclick="check_all()"> <label for="Select">Select</label></th> -->
                        <th>ID</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Created At</th>
                        <th>Control</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <!-- <th>Select</th> -->
                        <th>ID</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Created At</th>
                        <th>Control</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    <span hidden>{{ $count = 0 }}</span>
                    @foreach($categories as $category)
                        <tr>
                        <!-- <td><input type="checkbox" class="item_checkall" name="item[]" value="{{ $category->id }}"></td> -->
                            <td>{{ $count = $count + 1 }}</td>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->description }}</td>
                            <td>{{ $category->created_at->toDayDateTimeString() }}</td>
                            <td>
                                <a href="{{ url('/admin/blog/category/'.$category->id) }}" class="btn btn-success"><i
                                            class="fa fa-eye"></i> Show Posts</a>
                                <a href="{{ url('/admin/blog/category/'.$category->id.'/edit') }}"
                                   class="btn btn-outline-primary"><i class="fa fa-edit"></i> Edit</a>
                                <a href="{{ url('/admin/blog/category/'.$category->id.'/destroy') }}"
                                   class="btn btn-outline-danger" data-toggle="modal" data-target="#sureDeleteCategory"><i
                                            class="fa fa-close"></i> Delete</a>
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

    <!-- Modal Delete One -->
    <!-- data-toggle="modal" data-target="#sureDeleteOne" -->
    <div class="modal fade" id="sureDeleteCategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                    <form action="/admin/blog/category/{{ $category->id }}/destroy" method="POST">
                        {{ csrf_field() }}
                        <input type="hidden" name="id" value="{{ $category->id }}">
                        <button type="submit" name="item" class="btn btn-danger" style="cursor: pointer;">Yes sure
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection