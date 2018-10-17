<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from www.ansonika.com/udema/menu_2/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 16 Feb 2018 21:22:20 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Udema a modern educational site template">
    <meta name="author" content="Ansonika">
    <title>Education Alzard</title>

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

    <!-- For Ajax Send Post Not Refresh -->
    <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">

    <!-- For Star Number Courses Comments -->
    <link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css'> 
    <link rel='stylesheet prefetch' href='https://raw.githubusercontent.com/kartik-v/bootstrap-star-rating/master/css/star-rating.min.css'>
    <style> 
        .star-rating {line-height:32px;font-size:1.25em;}
        .star-rating .fa-star{color: #FFC107; cursor: pointer;} 
    </style>

</head>

<body class="">

        <div id="preloader">
        <div data-loader="circle-side"></div>
    </div>
    <!-- End Preload -->
    
    <header class="header fadeInDown">
        <div id="logo">
            <a href="{{ url('/') }}"><img src="{{ url('/design/educationalzard') }}/img/logo.png" width="149" height="42" data-retina="true" alt=""></a>
        </div>
        <ul id="top_menu">
            @unless (Auth::check())
                <li><a href="{{ url('/login') }}" class="login">Login</a></li>
            @endunless
            <li><a href="#0" class="search-overlay-menu-btn">Search</a></li>
            <li>
                <a href="{{ url('shopping-cart') }}" class="">
                    <i class="fa fa-shopping-cart fa-lg"></i> 
                    Shopping Cart 
                    @if(Session::has('cart'))
                        <span class="badge badge-secondary" style="padding: 5px 8px; font-size: 14px;">
                            {{ Session::has('cart') ? Session::get('cart')->totalQty : '' }}
                        </span>
                    @endif
                </a>
            </li>
            <!-- <li class="hidden_tablet"><a href="https://themeforest.net/item/udema-modern-educational-site-template/20941773?ref=ansonika" target="_parent">Buy this template</a></li> -->
            @if(Auth::check())
                @if(auth()->user()->type_user == 'Student')
                    <li class="hidden_tablet"><a href="{{ url('/profile/'. auth()->user()->name) }}" class="btn_1 rounded">Go To Profile</a></li>
                @elseif(auth()->user()->type_user == 'Teacher')
                    <li class="hidden_tablet"><a href="{{ url('/dashboard/') }}" class="btn_1 rounded">Go To Dashboard</a></li>
                @elseif(auth()->user()->type_user == 'Admin' || auth()->user()->type_user == 'Editor')
                    <li class="hidden_tablet"><a href="{{ url('/admin/') }}" class="btn_1 rounded">Go To Dashboard</a></li>
                @endif
            @endif
            <li>
                <div class="hamburger hamburger--spin">
                    <div class="hamburger-box">
                        <div class="hamburger-inner"></div>
                    </div>
                </div>
            </li>
        </ul>
        <!-- /top_menu -->

    </header>
    <!-- /header -->