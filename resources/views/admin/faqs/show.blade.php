@extends('admin.index')
@section('content')

 <!-- Breadcrumbs-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="{{ url('admin') }}">Dashboard</a>
    </li>
    <li class="breadcrumb-item">
      <a href="{{ url('admin/faqs') }}">Faqs</a>
    </li>
    <li class="breadcrumb-item active">Show FAQ</li>
  </ol>

  @include('admin.layouts.message')


      <div class="box_general padding_bottom">
      <div class="header_box version_2">
        <h2><i class="fa fa-file"></i>Show FAQ</h2>
      </div>

      <div class="row">
        <div class="col-md-8">
          <div class="form-group">
            <label>Title : </label>
            <br>
            {{ $faq->title }}
          </div>

          <div class="form-group">
              <label>Category FAQ : </label>
              <br>
              {{ $faq->category_faq }}
          </div>

          <div class="form-group">
              <label>Category FAQ : </label>
              <br>
              {!! $faq->content !!}
          </div>

        </div>
      <!-- /row-->
    </div>
    <!-- /box_general-->


    
    <a href="{{ url('/admin/faqs') }}" class="btn_1 medium" style="background: #335693 !important">Back</a>
    <a href="/admin/faq/{{ $faq->id }}/edit" class="btn_1 bg-primary"><i class="fa fa-fw fa-edit"></i> Edit</a>
    <a href="/admin/faq/{{ $faq->id }}/destroy" class="btn_1 bg-danger"><i class="fa fa-fw fa-close"></i> Deleted</a>

    

@endsection