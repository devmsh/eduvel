<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from www.ansonika.com/udema/menu_2/admission.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 16 Feb 2018 21:27:20 GMT -->
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
	
	<!-- SPECIFIC CSS -->
	<link href="{{ url('/design/educationalzard') }}/css/skins/square/grey.css" rel="stylesheet">
	<link href="{{ url('/design/educationalzard') }}/css/wizard.css" rel="stylesheet">

    <!-- YOUR CUSTOM CSS -->
    <link href="{{ url('/design/educationalzard') }}/css/custom.css" rel="stylesheet">

</head>

<body id="admission_bg">
	
	<div id="preloader">
		<div data-loader="circle-side"></div>
	</div>
	<!-- End Preload -->
	
	<div id="form_container" class="clearfix">
		<figure>
			<a href="{{ url('/') }}"><img src="{{ url('/design/adminpanel') }}/img/logo.png" width="149" height="42" data-retina="true" alt=""></a>
		</figure>
		<div id="wizard_container">
			<div id="top-wizard">
				<div id="progressbar"></div>
			</div>
			<!-- /top-wizard -->
			<form>  <!-- name="example-1" id="wrapped"  -->
				<!-- Leave for security protection, read docs for details -->
				<div id="middle-wizard">
					<div class="step">
						<div id="intro">
							<figure><img src="{{ url('/design/educationalzard') }}/img/wizard_intro_icon.svg" alt=""></figure>
							<h1>Notice</h1>
							<div class="mt-5" style="font-size: 14px !important;">
								@if(session()->has('success'))
									<div class="alert alert-success" role="alert">
										{{ session('success') }}
									</div>
								@endif
							</div>
							<!-- <p>Exerci tibique eum cu, paulo appellantur et mei, ea partem urbanitas vim. His ei iusto nonumes atomorum. Mentitum pericula in nec. In eos habemus tibique. </p>
							<p><strong>Mel erant legere iuvaret ea. At eum doctus voluptatibus, has id veritus constituam.</strong></p> -->
						</div>
					</div>

				</div>
				<!-- /middle-wizard -->
			</form>
		</div>
		<!-- /Wizard container -->
	</div>
	<!-- /Form_container -->
	
	<!-- COMMON SCRIPTS -->
    <script src="{{ url('/design/educationalzard') }}/js/jquery-2.2.4.min.js"></script>
    <script src="{{ url('/design/educationalzard') }}/js/common_scripts.js"></script>
    <script src="{{ url('/design/educationalzard') }}/js/main.js"></script>
	<script src="{{ url('/design/educationalzard') }}/assets/validate.js"></script>
	
	<!-- SPECIFIC SCRIPTS -->
	<script src="{{ url('/design/educationalzard') }}/js/jquery-ui-1.8.22.min.js"></script>
	<script src="{{ url('/design/educationalzard') }}/js/jquery.wizard.js"></script>
	<script src="{{ url('/design/educationalzard') }}/js/jquery.validate.js"></script>
	<script src="{{ url('/design/educationalzard') }}/js/admission_func.js"></script>
  
</body>

<!-- Mirrored from www.ansonika.com/udema/menu_2/admission.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 16 Feb 2018 21:27:36 GMT -->
</html>