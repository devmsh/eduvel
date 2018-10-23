@extends('admin.index')
@section('content')

    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Users</li>
    </ol>

    @include('admin.layouts.message')


    <!-- Example DataTables Card-->
    <div class="card mb-3">
        <div class="card-header">
            <i class="fa fa-table"></i> Data Table Users
            <!-- <input type="submit" style="cursor: pointer;" name="item[]" class="btn btn-danger float-right delBtn" value="Deleted All" onclick="delete_at()" data-toggle="modal" data-target="#sureDelete"> -->
            <!-- <form action="users/create" method="POST">
              <input type="submit"  class="btn btn-primary mr-2" style="float: right;" name="" value="Add New">
            </form> -->
            <a href="{{ url('admin/users/create') }}" class="btn btn-success mr-2" style="float: right;"><i
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
                        <th>Email</th>
                        <th>reference</th>
                        <th>Created At</th>
                        <th>Control</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <!-- <th>Select</th> -->
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>reference</th>
                        <th>Created At</th>
                        <th>Control</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    <span hidden>{{ $count = 0 }}</span>
                    @foreach($users as $user)
                        <tr>
                        <!-- <td><input type="checkbox" class="item_checkall" name="item[]" value="{{ $user->id }}"></td> -->
                            <td>{{ $count = $count + 1 }}</td>
                            <td>{{ $user->name }}  {!! json_encode(unserialize($user->preferences)[0]) !!} </td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->control }}</td>
                            <td>{{ $user->created_at }}</td>
                            <td>
                                <a href="{{ url('/admin/users/'.$user->id.'/edit') }}"
                                   class="btn btn-outline-primary"><i class="fa fa-edit"></i> Edit</a>
                                <a href="{{ url('/admin/users/'.$user->id.'/destroy') }}"
                                   class="btn btn-outline-danger"><i class="fa fa-close"></i> Delete</a>
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



    <!-- Modal Delete All -->
    <div class="modal fade" id="sureDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                        <h5 style="color: red !important;">Are you sure you want to delete users <span
                                    style="padding-left: 5px; color: #000" class="record_count"></span> ? </h5>
                    </div>
                </div>
                <div class="modal-footer">

                    <button type="button" class="btn btn-secondary" data-dismiss="modal" style="cursor: pointer;">
                        Close
                    </button>
                    <form action="/admin/users/destroy/all" method="POST">
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-danger" style="cursor: pointer;">Yes sure</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal Delete One -->
    <!-- data-toggle="modal" data-target="#sureDeleteOne" -->
    <div class="modal fade" id="sureDeleteOne" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                        <h5 style="color: red !important;">Are you sure you want to delete user <span
                                    style="padding-left: 5px; color: #000" class="record_count"></span> ? </h5>
                    </div>
                </div>
                <div class="modal-footer">

                    <button type="button" class="btn btn-secondary" data-dismiss="modal" style="cursor: pointer;">
                        Close
                    </button>
                    <form action="/admin/users/destroy" method="POST">
                        {{ csrf_field() }}
                        <input type="submit" name="destroy" value="$users->id">
                        <button type="submit" name="item" class="btn btn-danger" style="cursor: pointer;">Yes sure
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection