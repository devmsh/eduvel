@if(!empty($settings))
    <footer>
        <div class="container margin_120_95">
            <div class="row">
                <div class="col-lg-5 col-md-12 p-r-5">
                    <p><a href="{{ url('/') }}"><img src="{{ url('/design/educationalzard') }}/img/logo.png" width="149"
                                                     height="42" data-retina="true" alt=""></a></p>
                    <p>{{ $settings->description_footer }}</p>
                    <div class="follow_us">
                        <ul>
                            <li>Follow us</li>
                            @foreach($socialMedia as $links)
                                <li><a href="{{ $links->link }}" target="_blank"><i class="{{ $links->icon }}"></i></a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 ml-lg-auto">
                    <h5>Useful links</h5>
                    <ul class="links">
                        {{-- <li><a href="#0">Admission</a></li> --}}
                        <li><a href="{{ url('/about') }}">About</a></li>
                        <li><a href="{{ url('/admin/login') }}">Login</a></li>
                        <li><a href="{{ url('/admin/register') }}">Register</a></li>
                        <li><a href="{{ url('/blog') }}">News &amp; Events</a></li>
                        <li><a href="{{ url('/contacts') }}">Contacts</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5>Contact with Us</h5>
                    <ul class="contacts">
                        <li><a href="tel://61280932400"><i class="ti-mobile"></i>{{ $settings->telephone }}</a></li>
                        <li>
                            <a href="mailto:Enter%20an%20email?subject=Your%20Subject%20Line&body=Thought%20you%20might%20be%20interested%20in%20this%20http://education-alzard.devany.co">{{ $settings->email }}</span></a>
                        </li>
                    </ul>
                    <div id="newsletter">
                        <h6>Newsletter</h6>
                        <div id="message-newsletter"></div>
                        <form method="post" action="/newsletter_form" role="form" autocomplete="off"
                              name="newsletter_form" id="newsletter_form">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <input type="email" name="email_newsletter" id="email_newsletter" class="form-control"
                                       placeholder="Your email">
                                <input type="submit" value="Submit" {{-- id="submit-newsletter" --}}>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!--/row-->
            <hr>
            <div class="row">
                <div class="col-md-8">
                    <ul id="additional_links">
                        <li><a href="#0">Terms and conditions</a></li>
                        <li><a href="#0">Privacy</a></li>
                        <li>
                            <style>.goog-te-gadget-simple .goog-te-menu-value span {
                                    color: #000;
                                    font-weight: bold;
                                }</style>
                            <div id="google_translate_element"></div>
                            <script type="text/javascript">
                                function googleTranslateElementInit() {
                                    new google.translate.TranslateElement({
                                        pageLanguage: 'en',
                                        layout: google.translate.TranslateElement.InlineLayout.SIMPLE
                                    }, 'google_translate_element');
                                }
                            </script>
                            <script type="text/javascript"
                                    src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
                        </li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <div id="copy">&copy; {{ date('Y') }} {{ $settings->copyright_website }}</div>
                </div>
            </div>
        </div>
    </footer>
    <!--/footer-->
@endif

<!-- Search Menu -->
<div class="search-overlay-menu">
    <span class="search-overlay-close"><span class="closebt"><i class="ti-close"></i></span></span>
    <form action="{{ url('/searsh') }}" method="POST" role="search" id="searchform">
        {{ csrf_field() }}
        <input value="" name="search" type="search" placeholder="Search..."/>
        <button type="submit"><i class="icon_search"></i>
        </button>
    </form>
</div><!-- End Search Menu -->

<!-- COMMON SCRIPTS -->
<script data-cfasync="false"
        src="{{ url('/design/educationalzard') }}/../../cdn-cgi/scripts/d07b1474/cloudflare-static/email-decode.min.js"></script>
<script src="{{ url('/design/educationalzard') }}/js/jquery-2.2.4.min.js"></script>
<script src="{{ url('/design/educationalzard') }}/js/common_scripts.js"></script>
<script src="{{ url('/design/educationalzard') }}/js/main.js"></script>
<script src="{{ url('/design/educationalzard') }}/assets/validate.js"></script>

<!-- SPECIFIC SCRIPTS -->
<script type="text/javascript"
        src="http://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&key=AIzaSyDplYGVpx6IcbMvo8JolTz_D3ENJpgQcsA"></script>
<script type="text/javascript" src="{{ url('/design/educationalzard') }}/js/mapmarker.jquery.js"></script>
<script type="text/javascript" src="{{ url('/design/educationalzard') }}/js/mapmarker_func.jquery.js"></script>

<!-- For Star Number Courses Comments -->
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script>
    var $star_rating = $('.star-rating .fa');

    var SetRatingStar = function () {
        return $star_rating.each(function () {
            if (parseInt($star_rating.siblings('input.rating-value').val()) >= parseInt($(this).data('rating'))) {
                return $(this).removeClass('fa-star-o').addClass('fa-star');
            } else {
                return $(this).removeClass('fa-star').addClass('fa-star-o');
            }
        });
    };

    $star_rating.on('click', function () {
        $star_rating.siblings('input.rating-value').val($(this).data('rating'));
        return SetRatingStar();
    });

    SetRatingStar();
    $(document).ready(function () {

    });
</script>

<!-- For Ajax Send Post Not Refresh -->
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script type="text/javascript">

    var email_subscribe_form = $("#sendMessage");
    //var isLoading = true;
    email_subscribe_form.submit(function (e) {
        e.preventDefault();
        console.log("send");

        //if(isLoading){     
        //isLoading = false;
        $.ajax({

            type: 'POST',
            url: '/api/contacts',
            data: {
                'name_contact': $('#name_contact').val(),
                'lastname_contact': $('#lastname_contact').val(),
                'email_contact': $('#email_contact').val(),
                'phone_contact': $('#phone_contact').val(),
                'message_contact': $('#message_contact').val(),
                'verify_contact': $('#verify_contact').val(),
            },

            success: function (data) {

                toastr.options = {
                    "closeButton": true,
                    "debug": false,
                    "newestOnTop": false,
                    "progressBar": true,
                    "positionClass": "toast-top-right",
                    "preventDuplicates": false,
                    "onclick": null,
                    "showDuration": "300",
                    "hideDuration": "1000",
                    "timeOut": "5000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                }

                toastr.success("Your message was sent successfully");
                console.log('Your message was sent successfully');
                // console.log(data);

            }, error: function (data) {

                toastr.options = {
                    "closeButton": true,
                    "debug": false,
                    "newestOnTop": false,
                    "progressBar": true,
                    "positionClass": "toast-top-right",
                    "preventDuplicates": false,
                    "onclick": null,
                    "showDuration": "300",
                    "hideDuration": "1000",
                    "timeOut": "5000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                }

                /*if(data.status === 423){
                    toastr.error( data.responseJSON.message);
                }*/

                toastr.error("Please check the Data sent");
                console.log('An error occurred.');
                // console.log($('#email_subscribe_id').val());
            },

        });

        //}
    });

</script>

<script type="text/javascript">

    var email_subscribe_form = $("#newsletter_form");
    //var isLoading = true;
    email_subscribe_form.submit(function (e) {
        e.preventDefault();
        console.log("send");

        //if(isLoading){     
        //isLoading = false;
        $.ajax({

            type: 'POST',
            url: '/api/newsletter_form',
            data: {
                'email_newsletter': $('#email_newsletter').val(),
            },

            success: function (data) {

                toastr.options = {
                    "closeButton": true,
                    "debug": false,
                    "newestOnTop": false,
                    "progressBar": true,
                    "positionClass": "toast-top-right",
                    "preventDuplicates": false,
                    "onclick": null,
                    "showDuration": "300",
                    "hideDuration": "1000",
                    "timeOut": "5000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                }

                toastr.success("Your email was sent successfully");
                console.log('Your email was sent successfully');
                // console.log(data);

            }, error: function (data) {

                toastr.options = {
                    "closeButton": true,
                    "debug": false,
                    "newestOnTop": false,
                    "progressBar": true,
                    "positionClass": "toast-top-right",
                    "preventDuplicates": false,
                    "onclick": null,
                    "showDuration": "300",
                    "hideDuration": "1000",
                    "timeOut": "5000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                }

                toastr.error("Please check the Data sent");
                console.log('An error occurred.');
            },

        });

        //}
    });

</script>

@yield('stripe_script')

<!--Start of Tawk.to Script-->
<script type="text/javascript">
    var Tawk_API = Tawk_API || {}, Tawk_LoadStart = new Date();
    (function () {
        var s1 = document.createElement("script"), s0 = document.getElementsByTagName("script")[0];
        s1.async = true;
        s1.src = 'https://embed.tawk.to/5b1524888859f57bdc7bd167/default';
        s1.charset = 'UTF-8';
        s1.setAttribute('crossorigin', '*');
        s0.parentNode.insertBefore(s1, s0);
    })();
</script>
<!--End of Tawk.to Script-->
</body>

<!-- Mirrored from www.ansonika.com/udema/menu_2/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 16 Feb 2018 21:23:34 GMT -->
</html>