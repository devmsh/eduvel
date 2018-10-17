<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from www.ansonika.com/udema/menu_2/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 16 Feb 2018 21:27:20 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Udema a modern educational site template">
    <meta name="author" content="Ansonika">
    <title>{{ trans('admin.login') }}</title>

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

<body id="login_bg">
	
	<!-- <div id="preloader">
		<div data-loader="circle-side"></div>
	</div> -->
	<!-- End Preload -->
	
	<div id="login">
		<aside>
			<figure>
				<a href="{{ url('/') }}"><img src="{{ url('/design/educationalzard') }}/img/logo.png" width="149" height="42" data-retina="true" alt=""></a>
				@foreach($errors->all() as $error)
						<li>{{ $error }}</li>
				@endforeach
			</figure>
			  <form action="/login" method="POST">
			  	{{ csrf_field() }}
				<div class="access_social">
					<a href="{{ url('login/facebook') }}" class="social_bt facebook">Login with Facebook</a>
					<a href="{{ url('login/google') }}" class="social_bt google">Login with Google</a>
					<a href="{{ url('login/twitter') }}" class="social_bt {{-- linkedin --}}" style="background-color: #0077B5;"><i class="ti-twitter-alt float-left"></i>Login with Twitter</a>
				</div>
				<div class="divider"><span>Or</span></div>
				@if (session('status'))
				    <div class="alert alert-danger">
				        {{ session('status') }}
				    </div>
				@endif
				<div class="form-group">
					<span class="input">
					<input class="input_field" required type="email" autocomplete="off" name="email">
						<label class="input_label">
						<span class="input__label-content">Your email</span>
					</label>
					@if($errors->has('email'))
			          <small style="color: red">{{ $errors->first('email') }}</small>
			        @endif
					</span>

					<span class="input">
					<input class="input_field" required type="password" autocomplete="new-password" name="password">
						<label class="input_label">
						<span class="input__label-content">Your password</span>
					</label>
					@if($errors->has('password'))
			          <small style="color: red">{{ $errors->first('password') }}</small>
			        @endif
					</span>

					<div class="checkbox icheck">
			            <label>
			              <input type="checkbox" name="rememberme" value="1"> Remember Me
			            </label>
			        </div>

					<small><a href="{{ url('/forgot/password') }}">Forgot password?</a></small>
				</div>
				<button type="submit" class="btn_1 rounded full-width add_top_60">Login to Education Alzard</button>
				<!-- <a href="#0" class="btn_1 rounded full-width add_top_60">Login to Education Alzard</a> -->
				<div class="text-center add_top_10">New to Udema? <strong><a href="{{ url('/register') }}">Sign up!</a></strong></div>
			</form>
			<div class="copy">© {{ date('Y') }} Education Alzard</div>
		</aside>
	</div>
	<!-- /login -->
		
	<!-- COMMON SCRIPTS -->
    <script src="{{ url('/design/educationalzard') }}/js/jquery-2.2.4.min.js"></script>
    <script src="{{ url('/design/educationalzard') }}/js/common_scripts.js"></script>
    <script src="{{ url('/design/educationalzard') }}/js/main.js"></script>
	<script src="{{ url('/design/educationalzard') }}/assets/validate.js"></script>	
  
</body>

<!-- Mirrored from www.ansonika.com/udema/menu_2/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 16 Feb 2018 21:27:20 GMT -->
</html>