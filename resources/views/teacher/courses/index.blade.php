@extends('teacher.index')
@section('content')

  <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">All Courses</li>
      </ol>
    <div class="box_general">
      <div class="header_box">
        <h2 class="d-inline-block">All Courses</h2>
        <div class="filter">
          <select name="orderby" class="selectbox" onchange="javascript:handleSelect(this)">
            <option>Select Category</option>
            @foreach($course_categorys as $course_category)
                <option value="/dashboard/category/{{ $course_category->name }}">{{ $course_category->name }}</option>
            @endforeach
          </select>
          <script type="text/javascript">
           function handleSelect(elm) { 

              window.location = elm.value; 
              console.log(elm.value)
          }
         </script>
        </div>
      </div>
      <div class="list_general">
        <ul>
          @foreach($courses as $course)
          <li>
            <figure><img src="{{ asset('/uplaod/courses/coursesimages/'. $course->course_image) }}" alt=""></figure>
            <h4>{{ $course->course_title }} 
               {{-- - {{ \Carbon\Carbon::parse($course->created_at)->diffForHumans() }} --}}
              @if(strtotime(date('Y-m-d')) < strtotime($course->course_start))
                <i class="pending">Pending</i>
              @elseif(date('Y-m-d') <= strtotime($course->course_expire))
                <i class="approved">Started</i>
              @elseif(strtotime(date('Y-m-d')) > strtotime($course->course_expire))
                <i class="cancel">Cancelled</i>
              @endif
              @if($course->isActive == 0)
               |<i class="pending"><i class="fa fa-fw fa-check-circle-o"></i> Inactive</i>
               @endif
            </h4>
            <ul class="course_list">
              <li><strong>Start date</strong> {{ date('d M Y', strtotime($course->course_start)) }}</li>
              <li><strong>Expire date</strong> {{ date('d M Y', strtotime($course->course_expire)) }}</li>
              <li><strong>Category</strong> 
                @foreach($course_categorys as $course_category)
                  @if($course_category->id  == $course->category_id)
                    {{ $course_category->name }}
                  @endif
                @endforeach
              </li>
              <li><strong>Teacher</strong> {{ $course->teacher_name }}</li>
            </ul>
            <h6>Course description</h6> 
            <p>{!! $course->course_description !!} </p>
            <ul class="buttons">              
              <li><a href="{{ url('/dashboard/course/'.$course->id.'/edit') }}" class="btn_1 gray badge-primary"><i class="fa fa-edit"></i> Edit</a></li>
              <li><a href="{{ url('/dashboard/course/'.$course->id.'/delete') }}" class="btn_1 gray delete"><i class="fa fa-fw fa-times-circle-o"></i> Delete</a></li>
            </ul>
          </li>
          @endforeach
        </ul>
      </div>
    </div>
    <!-- /box_general-->
    {{-- <nav aria-label="...">
      <ul class="pagination pagination-sm add_bottom_30">
        <li class="page-item disabled">
          <a class="page-link" href="#" tabindex="-1">Previous</a>
        </li>
        <li class="page-item"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item">
          <a class="page-link" href="#">Next</a>
        </li>
      </ul>
    </nav> --}}
    <link rel="stylesheet" type="text/css" href="{{ url('/design/adminpanel') }}/css/pagenation-admin.css">
    {{ $courses->links() }}
    <!-- /pagination-->
    </div>
    <!-- /container-fluid-->

@endsection