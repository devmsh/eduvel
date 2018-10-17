@extends('teacher.index')
@section('content')

 <!-- Breadcrumbs-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="#">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">My Courses</li>
  </ol>

  @include('teacher.layouts.message')

    <div class="box_general">
            <h4>Inbox</h4>
            <div class="list_general">
                <ul>
                    @foreach($orders as $order)
                        @foreach($order->cart->items as $item)
                        <li>
                            <span>{{ \Carbon\Carbon::parse($order->created_at)->diffForHumans() }}</span>
                            <figure><img src="{{ asset('/uplaod/courses/coursesimages/'.$item['item']['course_image']) }}" alt=""></figure>
                            <h4>{{ $item['item']['course_title'] }} <i class="read">{{ $item['price'] }}$</i> <a href="{{ url('/course-details/'.$item['item']['course_title']) }}">Show</a> </h4>
                            <p>{!! substr($item['item']['course_description'], 0, 180) !!} ...</p>
                        </li>
                        @endforeach
                    @endforeach
                </ul>
            </div>
        </div>
        <!-- /box_general-->

@endsection