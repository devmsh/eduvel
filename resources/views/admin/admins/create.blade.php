@extends('admin.index')
@section('content')

 <!-- Breadcrumbs-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="#">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">Create New Admin</b></li>
  </ol>

  @include('admin.layouts.message')

<form action="store" method="POST" enctype="multipart/form-data">
  	{{ csrf_field() }}

  <div class="box_general padding_bottom">
      <div class="header_box version_2">
        <h2><i class="fa fa-user"></i>Create New Admin</h2>
      </div>
      <div class="row">
        <div class="col-md-4 add_top_30">
          <div class="form-group">
          <label>Image</label>
            {{-- <form action="http://www.ansonika.com/file-upload" class="dropzone"></form> --}}
            <div class="row">
              <div class="col-md-12">
                <input type='file' name="image" class="form-control" onchange="readURL(this);" />
              </div>
            </div>
            {{-- <img id="blah2" src="#" alt="your image" /> --}}
          </div>
        </div>
        <div class="col-md-8 add_top_30">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Your name" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Roles</label>
                <select name="roles" me class="form-control" required>
                	<option value="Admin">Admin</option>
                	<option value="Editor">Editor</option>
                </select>
              </div>
            </div>
          </div>
          <!-- /row-->
        </div>
      </div>
    </div>
    <!-- /box_general-->
    <div class="row">
      <div class="col-md-6">
        <div class="box_general padding_bottom">
          <div class="header_box version_2">
            <h2><i class="fa fa-lock"></i>Change password</h2>
          </div>
          <div class="form-group">
            <label>New password</label>
            <input class="form-control"  name="password" id="password" type="password" required>
          </div>
          <div class="form-group">
            <label>Confirm new password</label>
            <input class="form-control"  name="password_confirmation" id="password_confirmation" type="password" required>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="box_general padding_bottom">
          <div class="header_box version_2">
            <h2><i class="fa fa-envelope"></i>Change email</h2>
          </div>

          <div class="form-group">
            <label>New email</label>
            <input class="form-control" name="new_email" id="new_email" value="{{ old('email') }}" type="email" required>
          </div>
          <div class="form-group">
            <label>Confirm new email</label>
            <input class="form-control" name="confirm_new_email" id="confirm_new_email" value="{{ old('email') }}" type="email" required>
          </div>
        </div>
      </div>
    </div>
    <!-- /row-->
    <a href="{{ url('/admin/admins') }}" class="btn_1 medium" style="background: #335693 !important">Back</a>
	<input type="submit" class="btn_1 medium" name="" value="Save">
</form>

<script>
  // HTML - Display image after selecting filename [duplicate] For Profile User
  function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blah')
                    .attr('src', e.target.result)
                    .width(100);
                    // .height(200);

                $('#blah2')
                    .attr('src', e.target.result)
                    .width(100);
                    // .height(200);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endsection