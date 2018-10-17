@extends('student.index')
@section('content')

 <!-- Breadcrumbs-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="#">Profile</a>
    </li>
    <li class="breadcrumb-item active">My Profile</li>
  </ol>

  @include('student.layouts.message')

<form action="{{ url('profile/'. $user->id .'/update') }}" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
  <div class="box_general padding_bottom">
      <div class="header_box version_2">
        <h2><i class="fa fa-user"></i>Profile details</h2>
      </div>
      <div class="row">
        <div class="col-md-4 add_top_30">
          <div class="form-group">
          <label>Your photo</label>
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
                <input type="text" class="form-control" name="name" value="{{ $user->name }}" placeholder="Your name">
              </div>
            </div>
            {{-- <div class="col-md-6">
              <div class="form-group">
                <label>Last name</label>
                <input type="text" class="form-control" placeholder="Your last name">
              </div>
            </div> --}}
            <div class="col-md-6">
              <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" value="{{ $user->email }}" placeholder="Your email">
              </div>
            </div>
          </div>
          <!-- /row-->
          {{-- <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>Telephone</label>
                <input type="text" class="form-control" placeholder="Your telephone number">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" placeholder="Your email">
              </div>
            </div>
          </div> --}}
          <!-- /row-->
          {{-- <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>Personal info</label>
                <textarea style="height:100px;" class="form-control" placeholder="Personal info"></textarea>
              </div>
            </div>
          </div> --}}
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
          {{-- <div class="form-group">
            <label>Old password</label>
            <input class="form-control" type="password">
          </div> --}}
          <div class="form-group">
            <label>New password</label>
            <input class="form-control" name="password" id="password" type="password">
          </div>
          <div class="form-group">
            <label>Confirm new password</label>
            <input class="form-control" name="password_confirmation" id="password_confirmation" type="password">
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="box_general padding_bottom">
          <div class="header_box version_2">
            <h2><i class="fa fa-envelope"></i>Change email</h2>
          </div>
          {{-- <div class="form-group">
            <label>Old email</label>
            <input class="form-control" name="old_email" value="{{ $user->email }}" id="old_email" type="email">
          </div> --}}
          <div class="form-group">
            <label>New email</label>
            <input class="form-control" name="new_email" id="new_email" type="email">
          </div>
          <div class="form-group">
            <label>Confirm new email</label>
            <input class="form-control" name="confirm_new_email" id="confirm_new_email" type="email">
          </div>
        </div>
      </div>
    </div>
    <!-- /row-->
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