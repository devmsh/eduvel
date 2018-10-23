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
        <li class="breadcrumb-item active">Our Founders</li>
    </ol>

    @include('admin.layouts.message')

    <a href="{{ url('admin/settings/our-founders/create') }}" class="btn btn-success mr-2 mt-2" style="float: right;"><i
                class="fa fa-plus"></i> Add New</a>
    <div class="box_general">
        <h4>Inbox</h4>
        <div class="list_general">
            <ul>
                @foreach($ourfounders as $ourfounder)
                    <li>
                        <span></span>
                        <figure><img src="{{ asset('uplaod/settings/ourfounders/'.$ourfounder->image) }}" alt="Not">
                        </figure>
                        <h4>{{ $ourfounder->name }}</h4>
                        <p>{{ $ourfounder->job }}.</p>
                        <div class="">

                            <a href="our-founders/{{ $ourfounder->id }}/edit" class="btn_1 bg-primary"><i
                                        class="fa fa-fw fa-edit"></i> Edit</a>
                            <a href="our-founders/{{ $ourfounder->id }}/destroy" class="btn_1 bg-danger"><i
                                        class="fa fa-fw fa-close"></i> Deleted</a>
                            <!-- <a href="" class="btn btn-primary">Edit</a> -->
                            <!-- <a href="" class="btn btn-danger">Delete</a> -->
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
    <!-- /box_general-->
    <link rel="stylesheet" type="text/css" href="{{ url('/design/adminpanel') }}/css/pagenation-admin.css">
    {{ $ourfounders->links() }}
    <!-- /pagination-->


@endsection