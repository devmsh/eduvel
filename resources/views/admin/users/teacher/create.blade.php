@extends('admin.index')
@section('content')

    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ url('admin') }}">Dashboard</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ url('admin/teachers') }}">Teachers</a>
        </li>
        <li class="breadcrumb-item active">Create Teacher</li>
    </ol>

    @include('admin.layouts.message')

    <form action="store" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="box_general padding_bottom">
            <div class="header_box version_2">
                <h2><i class="fa fa-user"></i>details</h2>
            </div>
            <div class="row">
                <div class="col-md-6 add_top_30">
                    <div class="form-group">
                        <label>Image</label>
                        {{-- <form action="http://www.ansonika.com/file-upload" class="dropzone"></form> --}}
                        <div class="row">
                            <div class="col-md-12">
                                <input type='file' name="image" class="form-control"/>
                            </div>
                        </div>
                        {{-- <img id="blah2" src="#" alt="your image" /> --}}
                    </div>
                </div>
                <div class="col-md-6 add_top_30">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name" value="" placeholder="Your name">
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
                        <input class="form-control" name="password_confirmation" id="password_confirmation"
                               type="password">
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
                        <input class="form-control" name="new_email" value="{{ old('new_email') }}" id="new_email"
                               type="email">
                    </div>
                    <div class="form-group">
                        <label>Confirm new email</label>
                        <input class="form-control" name="confirm_new_email" value="{{ old('confirm_new_email') }}"
                               id="confirm_new_email" type="email">
                    </div>
                </div>
            </div>
        </div>
        <!-- /row-->

        <div class="box_general padding_bottom">
            <div class="header_box version_2">
                <h2><i class="fa fa-user"></i>Admission</h2>
            </div>
            <div class="row add_top_30">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Telephone</label>
                        <input type="text" class="form-control" name="telephone" value="{{ old('telephone') }}"
                               placeholder="Your telephone number">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Age</label>
                        <input type="text" class="form-control" name="age" value="{{ old('age') }}"
                               placeholder="Your age">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Personal info</label>
                        <textarea style="height:100px;" class="form-control" id="article-ckeditor-description-course"
                                  name="messagere_here"
                                  placeholder="Personal info">{!! old('messagere_here') !!}</textarea>
                    </div>
                </div>
            </div>
            <!-- /row-->
            <div class="row">
                <div class="col-md-6">
                    <label>Select your education level</label>
                    <div class="form-group">
                        <select class="form-control required" name="education_level" id="education_apply"
                                value="{{ old('education_level')}}">
                            <option value="Less than high school">Less than high school</option>
                            <option value="High school diploma or equivalent">High school diploma or equivalent</option>
                            <option value="Some college no degree">Some college, no degree</option>
                            <option value="Bachelor degree">Bachelor’s degree</option>
                            <option value="Doctoral or professional degree">Doctoral or professional degree</option>
                        </select>
                        @if($errors->has('education_level'))
                            <small style="color: red">{{ $errors->first('education_level') }}</small>
                        @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Gender</label>
                        <select class="form-control required" name="gender" id="education_apply"
                                value="{{ old('education_level')}}">
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
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
                        <input type="text" class="form-control" name="address" value="{{ old('address') }}"
                               placeholder="Your address">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>City</label>
                        <input type="text" class="form-control" name="city" value="{{ old('city') }}"
                               placeholder="Your city">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Zipcode</label>
                        <input type="text" class="form-control" name="zipcode" value="{{ old('zipcode') }}"
                               placeholder="Zipcode">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Select your country</label>
                        <select class="form-control required" name="country">
                            <option value="Europe">Europe</option>
                            <option value="Asia">Asia</option>
                            <option value="North America">North America</option>
                            <option value="South America">South America</option>
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

        <div class="row">
            <div class="col-md-6">
                <div class="box_general padding_bottom">
                    <div class="header_box version_2">
                        <h2><i class="fa fa-user pb-4"></i>Your preferences</h2>
                        <div class="form-group radio_input">
                            <label><input type="checkbox" value="Art" name="preferences[]" class="icheck"> Art:
                                Impressionist</label>
                        </div>
                        <div class="form-group radio_input">
                            <label><input type="checkbox" value="Litteratture" name="preferences[]" class="icheck">
                                Litteratture: Poetry</label>
                        </div>
                        <div class="form-group radio_input">
                            <label><input type="checkbox" value="Math" name="preferences[]" class="icheck"> Math: 12
                                Principles</label>
                        </div>
                        <div class="form-group radio_input">
                            <label><input type="checkbox" value="Architecture" name="preferences[]" class="icheck">
                                Architecture</label>
                        </div>
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