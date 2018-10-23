@include('website.layouts.header')

@include('website.layouts.menu')

<main>
    <section id="hero_in" class="general">
        <div class="wrapper">
            <div class="container">
                <h1 class="fadeInUp"><span></span>About Udema</h1>
            </div>
        </div>
    </section>
    <!--/hero_in-->

    <div class="container margin_120_95">
        <div class="main_title_2">
            <span><em></em></span>
            <h2>Why choose Udema</h2>
            <p>Cum doctus civibus efficiantur in imperdiet deterruisset.</p>
        </div>
        <div class="row">
            @foreach($whychooses as $whychoose)
                <div class="col-lg-4 col-md-6">
                    <a class="box_feat" href="#">
                        <i class="{{ $whychoose->icon }}"></i>
                        <h3>{!! $whychoose->title !!}</h3>
                        <p>{!! $whychoose->description !!}</p>
                    </a>
                </div>
            @endforeach
        </div>
        <!--/row-->
    </div>
    <!-- /container -->

    <div class="bg_color_1">
        <div class="container margin_120_95">
            <div class="main_title_2">
                <span><em></em></span>
                <h2>Our Origins and Story</h2>
                <p>Cum doctus civibus efficiantur in imperdiet deterruisset.</p>
            </div>
            <div class="row justify-content-between">
                <div class="col-lg-6 wow" data-wow-offset="150">
                    <figure class="block-reveal">
                        <div class="block-horizzontal"></div>
                        <img src="{{ asset('uplaod/settings/'.$settings->image_story) }}" class="img-fluid" alt="">
                    </figure>
                </div>
                <div class="col-lg-5">
                    <p>{!! $settings->description_story !!}</p>
                </div>
            </div>
            <!--/row-->
        </div>
        <!--/container-->
    </div>
    <!--/bg_color_1-->

    <div class="container margin_120_95">
        <div class="main_title_2">
            <span><em></em></span>
            <h2>Our founders</h2>
            <p>Cum doctus civibus efficiantur in imperdiet deterruisset.</p>
        </div>
        <div id="carousel" class="owl-carousel owl-theme">
            @foreach($ourFounders as $ourFounder)
                <div class="item">
                    <a href="#0">
                        <div class="title">
                            <h4>{{ $ourFounder->name }}<em>{{ $ourFounder->job }}</em></h4>
                        </div>
                        <img src="{{ asset('uplaod/settings/ourfounders/'.$ourFounder->image) }}" alt="">
                    </a>
                </div>
            @endforeach

        </div>
        <!-- /carousel -->
    </div>
    <!--/container-->
</main>
<!--/main-->


@include('website.layouts.footer')