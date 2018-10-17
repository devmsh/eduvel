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
    <li class="breadcrumb-item active">Update</li>
  </ol>

  @include('admin.layouts.message')



  <form action="{{ url('admin/faq/update') }}" method="POST">
      {{ csrf_field() }}
      <input type="hidden" name="id" value="{{ $faq->id }}">

      <div class="box_general padding_bottom">
      <div class="header_box version_2">
        <h2><i class="fa fa-file"></i>Update FAQ</h2>
      </div>

      <div class="row">
        <div class="col-md-8">
          <div class="form-group">
            <label>Title</label>
            <input type="text" class="form-control" name="title" placeholder="Title FAQ"  value="{{ $faq->title }}">
            @if($errors->has('title'))
              <small style="color: red">{{ $errors->first('title') }}</small>
            @endif
          </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label>Category FAQ</label>
                <select name="category_faq" class="form-control">
                  <option <?php if($faq->category_faq == 'Payments'){echo "selected";} ?> value="Payments">Payments</option>
                  <option <?php if($faq->category_faq == 'Suggestions'){echo "selected";} ?>  value="Suggestions">Suggestions</option>
                  <option <?php if($faq->category_faq == 'Reccomendations'){echo "selected";} ?>  value="Reccomendations">Reccomendations</option>
                  <option <?php if($faq->category_faq == 'Terms&conditons'){echo "selected";} ?>  value="Terms&conditons">Terms&conditons</option>
                  <option <?php if($faq->category_faq == 'Booking'){echo "selected";} ?>  value="Booking">Booking</option>
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
            <textarea rows="5" class="form-control" name="content"  id="article-ckeditor" placeholder="Content FAQ">{{ $faq->content }}</textarea>
            @if($errors->has('content'))
              <small style="color: red">{{ $errors->first('content') }}</small>
            @endif
          </div>
        </div>
      </div>
      <!-- /row-->

    </div>
    <!-- /box_general-->


    
    <a href="{{ url('/admin/faqs') }}" class="btn_1 medium" style="background: #335693 !important">Back</a>
    <input type="submit" class="btn_1 medium" name="submit" value="Update">

  </form>

    

@endsection