@extends('teacher.index')
@section('content')

    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">My Dashboard</li>
    </ol>

    @include('teacher.layouts.message')

    <!-- Icon Cards-->
    <div class="row">

        <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card dashboard text-white bg-success o-hidden h-100">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fa fa-fw fa-calendar-check-o"></i>
                    </div>
                    <div class="mr-5"><h5>{{ $count_courses }} Active Courses!</h5></div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="{{ url('/dashboard/courses') }}">
                    <span class="float-left">View Details</span>
                    <span class="float-right">
            <i class="fa fa-angle-right"></i>
          </span>
                </a>
            </div>
        </div>

        <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card dashboard text-white bg-warning o-hidden h-100">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fa fa-fw fa-star"></i>
                    </div>
                    <div class="mr-5"><h5>{{ $count_inactive_courses }} Inactive courses!</h5></div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="{{ url('/dashboard/courses') }}">
                    <span class="float-left">View Details</span>
                    <span class="float-right">
            <i class="fa fa-angle-right"></i>
          </span>
                </a>
            </div>
        </div>

        <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card dashboard text-white bg-primary o-hidden h-100">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fa fa-fw fa-envelope-open"></i>
                    </div>
                    <div class="mr-5"><h5>55 New Messages!</h5></div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="messages.html">
                    <span class="float-left">View Details</span>
                    <span class="float-right">
            <i class="fa fa-angle-right"></i>
          </span>
                </a>
            </div>
        </div>


        <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card dashboard text-white bg-danger o-hidden h-100">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fa fa-fw fa-comments"></i>
                    </div>
                    <div class="mr-5"><h5>{{ $count_comments }} New Comments!</h5></div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="{{ url('/dashboard/all-comments') }}">
                    <span class="float-left">View Details</span>
                    <span class="float-right">
            <i class="fa fa-angle-right"></i>
          </span>
                </a>
            </div>
        </div>

    </div>
    <!-- /cards -->


@endsection