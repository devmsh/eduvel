@include('website.layouts.header')
	
	@include('website.layouts.menu')
	
	<main>
		<section id="hero_in" class="contacts">
			<div class="wrapper">
				<div class="container">
					<h1 class="fadeInUp"><span></span>Contact Udema</h1>
				</div>
			</div>
		</section>
		<!--/hero_in-->

		<div class="contact_info">
			<div class="container">
				<ul class="clearfix">
					<li>
						<i class="pe-7s-map-marker"></i>
						<h4>Address</h4>
						<span>{{ $settings->address }}</span>
					</li>
					<li>
						<i class="pe-7s-mail-open-file"></i>
						<h4>Email address</h4>
						<span><a href="#" class="__cf_email__" data-cfemail="e382878e8a90908a8c8da39687868e82cd808c8e">{{ $settings->email }}</a><br>{{-- <small>Monday to Friday 9am - 7pm</small> --}}</span>

					</li>
					<li>
						<i class="pe-7s-phone"></i>
						<h4>Contacts info</h4>
						<span>{{ $settings->telephone }}<br>{{-- <small>Monday to Friday 9am - 7pm</small> --}}</span>
					</li>
				</ul>
			</div>
		</div>
		<!--/contact_info-->

		<div class="bg_color_1">
			<div class="container margin_120_95">
				<div class="row justify-content-between">
					<div class="col-lg-5">
						<div class="map_contact">
						</div>
						<!-- /map -->
					</div>
					<div class="col-lg-6">
						<h4>Send a message</h4>
						<p>Ex quem dicta delicata usu, zril vocibus maiestatis in qui.</p>
						@include('message')
						<div id="message-contact"></div>
						<form method="post" action="/contacts" id="sendMessage" role="form" autocomplete="off"><!--id="contactform" -->
							{{ csrf_field() }}
							<div class="row">
								<div class="col-md-6">
									<span class="input">
										<input class="input_field" type="text" id="name_contact" name="name_contact" value="{{ old('name_contact')}}">
										<label class="input_label">
											<span class="input__label-content">Your Name</span>
										</label>
									</span>
								</div>
								<div class="col-md-6">
									<span class="input">
										<input class="input_field" type="text" id="lastname_contact" name="lastname_contact" required="required" value="{{ old('lastname_contact') }}">
										<label class="input_label">
											<span class="input__label-content">Last name</span>
										</label>
									</span>
								</div>
							</div>
							<!-- /row -->
							<div class="row">
								<div class="col-md-6">
									<span class="input">
										<input class="input_field" type="email" id="email_contact" name="email_contact" required="required" value="{{ old('email_contact') }}">
										<label class="input_label">
											<span class="input__label-content">Your email</span>
										</label>
									</span>
								</div>
								<div class="col-md-6">
									<span class="input">
										<input class="input_field" type="text" id="phone_contact" name="phone_contact" required="required"  value="{{ old('phone_contact') }}">
										<label class="input_label">
											<span class="input__label-content">Your telephone</span>
										</label>
									</span>
								</div>
							</div>
							<!-- /row -->
							<span class="input">
									<textarea class="input_field" id="message_contact" name="message_contact" style="height:150px;" required="required"> {{ old('message_contact') }}</textarea>
									<label class="input_label">
										<span class="input__label-content">Your message</span>
									</label>
							</span>
							<span class="input">
									<input type="hidden" name="x" value="{{ $x }}">
									<input type="hidden" name="y" value="{{ $y }}">
									<input class="input_field" type="text" id="verify_contact" name="verify_contact" required="required">
									<label class="input_label">
									<span class="input__label-content">Are you human? {{ $x }} + {{ $y }} =</span>
									</label>
							</span>
							<p class="add_top_30"><input type="submit" value="Submit" class="btn_1 rounded" id="submit-contact"></p>
						</form>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /bg_color_1 -->
	</main>
	<!--/main-->

@include('website.layouts.footer')
