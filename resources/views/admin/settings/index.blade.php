@extends('admin.index')
@section('content')

 <!-- Breadcrumbs-->
  <ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="#">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">Settings</li>
  </ol>

  @include('admin.layouts.message')

  	<form action="settings/update" method="POST" enctype="multipart/form-data">
  		{{ csrf_field() }}
  		<input type="hidden" name="id" value="{{ $setting->id }}">

  		<div class="box_general padding_bottom">
			<div class="header_box version_2">
				<h2><i class="fa fa-file"></i>Session Fixed</h2>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="form-group">
						<label>Fixed Title</label>
						<input type="text" class="form-control" name="title_fixed" placeholder="Fixed Title"  value="{{ $setting->title_fixed }}">
						@if($errors->has('title_fixed'))
							<small style="color: red">{{ $errors->first('title_fixed') }}</small>
						@endif
					</div>
				</div>
			</div>
			<!-- /row-->

			<div class="row">
				<div class="col-md-12">
					<div class="form-group">
						<label>Fixed Description</label>
						<textarea rows="5" class="form-control" name="description_fixed" style="height:100px;" placeholder="Fixed Description">{{ $setting->description_fixed }}</textarea>
						@if($errors->has('description_fixed'))
							<small style="color: red">{{ $errors->first('description_fixed') }}</small>
						@endif
					</div>
				</div>
			</div>
			<!-- /row-->

		</div>
		<!-- /box_general-->


		<div class="box_general padding_bottom">
			<div class="header_box version_2">
				<h2><i class="fa fa-file"></i>Page About Us</h2>
			</div>
			<div class="row">
				<div class="col-md-10">
					<div class="form-group">
						<label>Image Story</label>
						<input type="hidden" name="oldImage" value="{{ $setting->image_story }}">
						<input type="file" class="form-control" name="image_story" value="{{ $setting->image_story }}">
						@if($errors->has('image_story'))
							<small style="color: red">{{ $errors->first('image_story') }}</small>
						@endif
					</div>
				</div>

				<div class="col-md-2">
					<div class="form-group">
						<!-- <label>Old Image Story</label> -->
						<img class="img-thumbnail" src="{{ asset('uplaod/settings/'.$setting->image_story) }}" alt="image_story">
					</div>
				</div>
			</div>
			<!-- /row-->
			
			<div class="row">
				<div class="col-md-12">
					<div class="form-group">
						<label>Description Story</label>
						<textarea rows="5" class="form-control" id="article-ckeditor" name="description_story" style="height:100px;" placeholder="Description Story">{{ $setting->description_story }}</textarea>
						@if($errors->has('description_story'))
							<small style="color: red">{{ $errors->first('description_story') }}</small>
						@endif
					</div>
				</div>
			</div>
			<!-- /row-->

		</div>
		<!-- /box_general-->

		
		<div class="box_general padding_bottom">
			<div class="header_box version_2">
				<h2><i class="fa fa-file-text"></i>Footer</h2>
			</div>

			<div class="row">
				<div class="col-md-12">
					<div class="form-group">
						<label>Footer Description</label>
						<textarea rows="5" class="form-control" name="description_footer" style="height:100px;" placeholder="Footer Description">{{ $setting->description_footer }}</textarea>
						@if($errors->has('description_footer'))
							<small style="color: red">{{ $errors->first('description_footer') }}</small>
						@endif
					</div>
				</div>

				
			</div>
			<!-- /row-->

			<div class="row">
				<div class="col-md-3">
					<div class="form-group">
						<label>Telephone</label>
						<input type="text" class="form-control" name="telephone" placeholder="Telephone" value="{{ $setting->telephone }}">
						@if($errors->has('telephone'))
							<small style="color: red">{{ $errors->first('telephone') }}</small>
						@endif
					</div>
				</div>

				<div class="col-md-3">
					<div class="form-group">
						<label>E-mail</label>
						<input type="email" class="form-control" name="email" placeholder="E-mail" value="{{ $setting->email }}">
						@if($errors->has('email'))
							<small style="color: red">{{ $errors->first('email') }}</small>
						@endif
					</div>
				</div>

				<div class="col-md-6">
					<div class="form-group">
						<label>Address</label>
						<input type="text" class="form-control" name="address" placeholder="Address" value="{{ $setting->address }}">
						@if($errors->has('address'))
							<small style="color: red">{{ $errors->first('address') }}</small>
						@endif
					</div>
				</div>
			</div>
			<!-- /row-->

			<div class="row">
				<div class="col-md-12">
					<div class="form-group">
						<label>Copyright Website</label>
						<input type="text" class="form-control" name="copyright_website" placeholder="Copyright Website" value="{{ $setting->copyright_website }}">
						@if($errors->has('copyright_website'))
							<small style="color: red">{{ $errors->first('copyright_website') }}</small>
						@endif
					</div>
				</div>
			</div>
			<!-- /row-->

		</div>
		<!-- /box_general-->
		
		<p><input type="submit" class="btn_1 medium" name="submit" value="Update"></p>

	</form>
  

    

@endsection