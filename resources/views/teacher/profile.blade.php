@extends('teacher.index')
@section('content')

 <!-- Breadcrumbs-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="#">Profile</a>
    </li>
    <li class="breadcrumb-item active">My Profile</li>
  </ol>

  @include('teacher.layouts.message')

<form action="{{ url('profile/update') }}" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
    <input type="hidden" name="uniqid" value="{{ $user->uniqid }}">
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
          </div>
          <!-- /row-->
          <div class="row">
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

     <div class="box_general padding_bottom">
      {{-- <div class="header_box version_2">
        <h2><i class="fa fa-user"></i>Admission</h2>
      </div> --}}
        <div class="row add_top_30">
            <div class="col-md-6">
              <div class="form-group">
                <label>Telephone</label>
                <input type="text" class="form-control" name="telephone" value="{{ $admission->telephone }}" placeholder="Your telephone number">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Age</label>
                <input type="text" class="form-control" name="age" value="{{ $admission->age }}" placeholder="Your age">
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label>Personal info</label>
                <textarea style="height:100px;" class="form-control" id="article-ckeditor-description-course" name="messagere_here" placeholder="Personal info">{!! $admission->messagere_here !!}</textarea>
              </div>
            </div>
        </div>
        <!-- /row-->
        <div class="row">
            <div class="col-md-6">
            <label>Select your education level</label>
            <div class="form-group">
                <select class="form-control required" name="education_level" id="education_apply" value="{{ old('education_level')}}">
                    <option @if($admission->education_level == 'Less than high school') selected @endif value="Less than high school">Less than high school</option>
                    <option @if($admission->education_level == 'High school diploma or equivalent') selected @endif value="High school diploma or equivalent">High school diploma or equivalent</option>
                    <option @if($admission->education_level == 'Some college no degree') selected @endif value="Some college no degree">Some college, no degree</option>
                    <option @if($admission->education_level == 'Bachelor degree') selected @endif value="Bachelor degree">Bachelor’s degree</option>
                    <option @if($admission->education_level == 'Doctoral or professional degree') selected @endif value="Doctoral or professional degree">Doctoral or professional degree</option>
                </select>
                @if($errors->has('education_level'))
                  <small style="color: red">{{ $errors->first('education_level') }}</small>
                @endif
            </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Gender</label>
                <select class="form-control required" name="gender" id="education_apply" value="{{ old('education_level')}}">
                    <option @if($admission->gender == 'Male') selected @endif value="Male">Male</option>
                    <option @if($admission->gender == 'Female') selected @endif value="Female">Female</option>
                    @if($errors->has('gender'))
                      <small style="color: red">{{ $errors->first('gender') }}</small>
                    @endif
                </select>
              </div>
            </div>
        </div>
        <!-- /row-->
        <div class="row add_top_30">
            <div class="col-md-6">
              <div class="form-group">
                <label>Address</label>
                <input type="text" class="form-control" name="address" value="{{ $admission->address }}" placeholder="Your address">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>City</label>
                <input type="text" class="form-control" name="city" value="{{ $admission->city }}" placeholder="Your city">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Zipcode</label>
                <input type="text" class="form-control" name="zipcode" value="{{ $admission->zipcode }}" placeholder="Zipcode">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label>Select your country</label>
                <select class="form-control required" name="country">
                    <option  @if($admission->country == 'Europe') selected @endif value="Europe">Europe</option>
                    <option @if($admission->country == 'Asia') selected @endif  value="Asia">Asia</option>
                    <option  @if($admission->country == 'North America') selected @endif value="North America">North America</option>
                    <option  @if($admission->country == 'South America') selected @endif value="South America">South America</option>
                </select>
                @if($errors->has('country'))
                  <small style="color: red">{{ $errors->first('country') }}</small>
                @endif
              </div>
            </div>
        </div>
        <!-- /row-->
      </div>
    <!-- /box_general-->


    <?php $arr_preferences = json_decode($admission->preferences); ?>
    <div class="row">
          <div class="col-md-6">
            <div class="box_general padding_bottom">
              <div class="header_box version_2">
                <h2><i class="fa fa-user pb-4"></i>Your preferences</h2>
                @for($i = 0; $i < count($arr_preferences); $i++) 
                <div class="form-group radio_input">
                    <label><input type="checkbox" checked value="{{ $arr_preferences[$i] }}" name="preferences[]" class="icheck"> {{ $arr_preferences[$i] }}</label>
                </div>
                @endfor
                {{-- <div class="form-group radio_input">
                    <label><input type="checkbox" value="Art" name="preferences[]" class="icheck"> Art: Impressionist</label>
                </div>
                <div class="form-group radio_input">
                    <label><input type="checkbox" value="Litteratture" name="preferences[]" class="icheck"> Litteratture: Poetry</label>
                </div>
                <div class="form-group radio_input">
                    <label><input type="checkbox" value="Math" name="preferences[]" class="icheck"> Math: 12 Principles</label>
                </div>
                <div class="form-group radio_input">
                    <label><input type="checkbox" value="Architecture" name="preferences[]" class="icheck"> Architecture</label>
                </div> --}}
              </div>
            </div>
          </div>
          {{-- <div class="col-md-6">
            <div class="box_general padding_bottom">
              <div class="header_box version_2">
                <h2><i class="fa fa-envelope"></i>Change email</h2>
              </div>
             
              <div class="form-group">
                <label>New email</label>
                <input class="form-control" name="new_email" id="new_email" type="email">
              </div>
              <div class="form-group">
                <label>Confirm new email</label>
                <input class="form-control" name="confirm_new_email" id="confirm_new_email" type="email">
              </div>
            </div>
          </div> --}}
        </div>
        <!-- /row-->

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