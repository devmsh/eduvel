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
    <link rel="apple-touch-icon" type="image/x-icon"
          href="{{ url('/design/educationalzard') }}/img/apple-touch-icon-57x57-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72"
          href="{{ url('/design/educationalzard') }}/img/apple-touch-icon-72x72-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114"
          href="{{ url('/design/educationalzard') }}/img/apple-touch-icon-114x114-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144"
          href="{{ url('/design/educationalzard') }}/img/apple-touch-icon-144x144-precomposed.png">

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
            <a href="{{ url('/') }}"><img src="{{ url('/design/adminpanel') }}/img/logo.png" width="149" height="42"
                                          data-retina="true" alt=""></a>
        </figure>
        <form action="/forgot/password" method="POST">
            {{ csrf_field() }}

            <div class="pb-5 mb-5 pt-3">
                <h3 class="text-center">Education Alzard</h3>
            </div>

            @if(session()->has('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <div class="form-group">
					<span class="input">
					<input class="input_field" type="email" autocomplete="off" name="email" required>
						<label class="input_label">
						<span class="input__label-content">Your email</span>
					</label>
                        @if($errors->has('email'))
                            <small style="color: red">{{ $errors->first('email') }}</small>
                        @endif
					</span>

            </div>
            <button type="submit" class="btn_1 rounded full-width add_top_60">Reset Password</button>
            <!-- <a href="#0" class="btn_1 rounded full-width add_top_60">Login to Education Alzard</a> -->
            <div class="text-center add_top_10">New to Udema? <strong><a href="{{ url('/login') }}">Sign
                        in!</a></strong></div>
        </form>
        <div class="copy">© {{ date('Y') }} Education Alzard</div>
    </aside>
</div>
<!-- /login -->

<!-- COMMON SCRIPTS -->
<script src="{{ url('/design/adminpanel') }}/js/jquery-2.2.4.min.js"></script>
<script src="{{ url('/design/adminpanel') }}/js/common_scripts.js"></script>
<script src="{{ url('/design/adminpanel') }}/js/main.js"></script>
<script src="{{ url('/design/adminpanel') }}/assets/validate.js"></script>

</body>

<!-- Mirrored from www.ansonika.com/udema/menu_2/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 16 Feb 2018 21:27:20 GMT -->
</html>