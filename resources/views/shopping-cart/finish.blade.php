@include('website.layouts.header')

@include('website.layouts.menu')


<main>
    <section id="hero_in" class="cart_section">
        <div class="wrapper">
            <div class="container">
                <div class="bs-wizard clearfix">
                    <div class="bs-wizard-step">
                        <div class="text-center bs-wizard-stepnum">Your cart</div>
                        <div class="progress">
                            <div class="progress-bar"></div>
                        </div>
                        <a href="#0" class="bs-wizard-dot"></a>
                    </div>

                    <div class="bs-wizard-step">
                        <div class="text-center bs-wizard-stepnum">Payment</div>
                        <div class="progress">
                            <div class="progress-bar"></div>
                        </div>
                        <a href="cart-2.html" class="bs-wizard-dot"></a>
                    </div>

                    <div class="bs-wizard-step active">
                        <div class="text-center bs-wizard-stepnum">Finish!</div>
                        <div class="progress">
                            <div class="progress-bar"></div>
                        </div>
                        <a href="#0" class="bs-wizard-dot"></a>
                    </div>
                </div>
                <!-- End bs-wizard -->
                <div id="confirm">
                    <h4>Order completed!</h4>
                    <p>A confirmation message has been sent to email <a target="_blank" href="https://mail.google.com/"
                                                                        class="__cf_email__"
                                                                        data-cfemail="600d01090c200518010d100c054e030f0d">[email&#160;protected]</a>
                    </p>
                </div>
            </div>
        </div>
    </section>
    <!--/hero_in-->
</main>
<!--/main-->


@include('website.layouts.footer')