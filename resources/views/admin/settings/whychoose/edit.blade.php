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
    <li class="breadcrumb-item">
      <a href="{{ url('/admin/settings/why-choose') }}">Why Choose</a>
    </li>
    <li class="breadcrumb-item active">Create New</li>
  </ol>

  @include('admin.layouts.message')

  <form action="/admin/settings/why-choose/update" method="POST">
      {{ csrf_field() }}
      <input type="hidden" name="id" value="{{ $get->id }}">

      <div class="box_general padding_bottom">
      <div class="header_box version_2">
        <h2><i class="fa fa-file"></i>Why Choose Education</h2>
      </div>

      <div class="row">
        <div class="col-md-4">
          <div class="form-group">
            <label>Icon</label>
            <!-- <input type="text" class="form-control" name="icon" placeholder="Title"  value=""> -->
            <select name="icon" class="form-control">
              <option <?php if($get->icon == 'pe-7s-diamond'){echo "selected";} ?> value="pe-7s-diamond">pe-7s-diamond</option>
              <option <?php if($get->icon == 'pe-7s-display2'){echo "selected";} ?> value="pe-7s-display2">pe-7s-display2</option>
              <option <?php if($get->icon == 'pe-7s-science'){echo "selected";} ?> value="pe-7s-science">pe-7s-science</option>
              <option <?php if($get->icon == 'pe-7s-rocket'){echo "selected";} ?> value="pe-7s-rocket">pe-7s-rocket</option>
              <option <?php if($get->icon == 'pe-7s-target'){echo "selected";} ?> value="pe-7s-target">pe-7s-target</option>
              <option <?php if($get->icon == 'pe-7s-graph1'){echo "selected";} ?> value="pe-7s-graph1">pe-7s-graph1</option>
            </select>
            @if($errors->has('icon'))
              <small style="color: red">{{ $errors->first('icon') }}</small>
            @endif
          </div>
        </div>
        <div class="col-md-8">
          <div class="form-group">
            <label>Title</label>
            <input type="text" class="form-control" name="title" placeholder="Title"  value="{{ $get->title }}">
            @if($errors->has('title'))
              <small style="color: red">{{ $errors->first('title') }}</small>
            @endif
          </div>
        </div>
      </div>
      <!-- /row-->

      <div class="row">
        <div class="col-md-12">
          <div class="form-group">
            <label>Description</label>
            <textarea rows="5" class="form-control" name="description" style="height:100px;" placeholder="Description">{{ $get->description }}</textarea>
            @if($errors->has('description'))
              <small style="color: red">{{ $errors->first('description') }}</small>
            @endif
          </div>
        </div>
      </div>
      <!-- /row-->

    </div>
    <!-- /box_general-->
    
    <a href="{{ url('/admin/settings/why-choose') }}" class="btn_1 medium" style="background: #335693 !important">Back</a>
    <input type="submit" class="btn_1 medium" name="submit" value="Edit">

  </form>

      
@endsection