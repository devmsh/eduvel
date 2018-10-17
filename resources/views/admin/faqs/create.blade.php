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
    <li class="breadcrumb-item active">Create</li>
  </ol>

  @include('admin.layouts.message')



  <form action="store" method="POST">
      {{ csrf_field() }}
      <input type="hidden" name="id" value="">

      <div class="box_general padding_bottom">
      <div class="header_box version_2">
        <h2><i class="fa fa-file"></i>Create New FAQ</h2>
      </div>

      <div class="row">
        <div class="col-md-8">
          <div class="form-group">
            <label>Title</label>
            <input type="text" class="form-control" name="title" placeholder="Title FAQ"  value="">
            @if($errors->has('title'))
              <small style="color: red">{{ $errors->first('title') }}</small>
            @endif
          </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label>Category FAQ</label>
                <select name="category_faq" class="form-control">
                  <option value="Payments">Payments</option>
                  <option value="Suggestions">Suggestions</option>
                  <option value="Reccomendations">Reccomendations</option>
                  <option value="Terms&conditons">Terms&conditons</option>
                  <option value="Booking">Booking</option>
                </select>
            </div>
            @if($errors->has('category_faq'))
              <small style="color: red">{{ $errors->first('category_faq') }}</small>
            @endif
        </div>
      </div>
      <!-- /row-->

      <div class="row">
        <div class="col-md-12">
          <div class="form-group">
            <label>Fixed Description</label>
            <textarea rows="5" class="form-control" name="content" id="article-ckeditor" placeholder="Content FAQ"></textarea>
            @if($errors->has('content'))
              <small style="color: red">{{ $errors->first('content') }}</small>
            @endif
          </div>
        </div>
      </div>
      <!-- /row-->

    </div>
    <!-- /box_general-->


    
    <a href="{{ url('/admin/faqs') }}" class="btn_1 medium bg-primary">Back</a>
    <input type="submit" class="btn_1 medium" name="submit" value="Save">

  </form>

    

@endsection