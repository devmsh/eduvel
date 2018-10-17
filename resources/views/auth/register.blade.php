<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from www.ansonika.com/udema/menu_2/register.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 16 Feb 2018 21:29:15 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Udema a modern educational site template">
    <meta name="author" content="Ansonika">
    <title>Register</title>

    <!-- Favicons-->
    <link rel="shortcut icon" href="{{ url('/design/educationalzard') }}/img/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" type="image/x-icon" href="{{ url('/design/educationalzard') }}/img/apple-touch-icon-57x57-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="{{ url('/design/educationalzard') }}/img/apple-touch-icon-72x72-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="{{ url('/design/educationalzard') }}/img/apple-touch-icon-114x114-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="{{ url('/design/educationalzard') }}/img/apple-touch-icon-144x144-precomposed.png">

    <!-- BASE CSS -->
    <link href="{{ url('/design/educationalzard') }}/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ url('/design/educationalzard') }}/css/style.css" rel="stylesheet">
	<link href="{{ url('/design/educationalzard') }}/css/vendors.css" rel="stylesheet">
	<link href="{{ url('/design/educationalzard') }}/css/icon_fonts/css/all_icons.min.css" rel="stylesheet">

    <!-- YOUR CUSTOM CSS -->
    <link href="{{ url('/design/educationalzard') }}/css/custom.css" rel="stylesheet">

</head>

<body id="register_bg">
	
	<!-- <div id="preloader">
		<div data-loader="circle-side"></div>
	</div> -->
	<!-- End Preload -->
	
	<div id="login">
		<aside>
			<figure>
				<a href="{{ url('/') }}"><img src="{{ url('/design/educationalzard') }}/img/logo.png" width="149" height="42" data-retina="true" alt=""></a>
			</figure>
			<form action="/register" method="POST" autocomplete="off">
				{{ csrf_field() }}
				<div class="form-group">

					<span class="input">
					<input class="input_field" required name="name" type="text">
						<label class="input_label">
						<span class="input__label-content">Full Name</span>
					</label>
					@if($errors->has('name'))
			          <small style="color: red">{{ $errors->first('name') }}</small>
			        @endif
					</span>

					<span class="input">
					{{-- <input class="input_field" required name="type_user" type="text">
						<label class="input_label">
						<span class="input__label-content">Your Last Name</span>
					</label> --}}
					<select class="input_field" required name="type_user">
						<option value="Teacher">Teacher</option>
						<option value="Student">Student</option>
					</select>
					@if($errors->has('type_user'))
			          <small style="color: red">{{ $errors->first('type_user') }}</small>
			        @endif
					</span>

					<span class="input">
					<input class="input_field" required name="email" type="email">
						<label class="input_label">
						<span class="input__label-content">Your Email</span>
					</label>
					@if($errors->has('email'))
			          <small style="color: red">{{ $errors->first('email') }}</small>
			        @endif
					</span>

					<span class="input">
					<input class="input_field" required name="password" type="password" id="password1">
						<label class="input_label">
						<span class="input__label-content">Your password</span>
					</label>
					@if($errors->has('password'))
			          <small style="color: red">{{ $errors->first('password') }}</small>
			        @endif
					</span>

					<span class="input">
					<input class="input_field" required type="password" name="password_confirmation" id="password2">
						<label class="input_label">
						<span class="input__label-content">Confirm password</span>
					</label>
					@if($errors->has('password_confirmation'))
			          <small style="color: red">{{ $errors->first('password_confirmation') }}</small>
			        @endif
					</span>
					
					<div id="pass-info" class="clearfix"></div>
				</div>
				<!-- <a href="#0" class="btn_1 rounded full-width add_top_30">Register to Udema</a> -->
				<input type="submit" class="btn_1 rounded full-width add_top_30" name="" value="Register to Alzard">
				<div class="text-center add_top_10">Already have an acccount? <strong><a href="{{ url('/login') }}">Sign In</a></strong></div>
			</form>
			<div class="copy">© 2018 Alzard</div>
		</aside>
	</div>
	<!-- /login -->
	
	<!-- COMMON SCRIPTS -->
    <script src="{{ url('/design/educationalzard') }}/js/jquery-2.2.4.min.js"></script>
    <script src="{{ url('/design/educationalzard') }}/js/common_scripts.js"></script>
    <script src="{{ url('/design/educationalzard') }}/js/main.js"></script>
	<script src="{{ url('/design/educationalzard') }}/assets/validate.js"></script>	
	
	<!-- SPECIFIC SCRIPTS -->
	<script src="{{ url('/design/educationalzard') }}/js/pw_strenght.js"></script>
  
</body>

<!-- Mirrored from www.ansonika.com/udema/menu_2/register.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 16 Feb 2018 21:29:16 GMT -->
</html>