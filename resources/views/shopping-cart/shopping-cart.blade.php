@include('website.layouts.header')

@include('website.layouts.menu')

<main>
    <section id="hero_in" class="cart_section">
        <div class="wrapper">
            <div class="container">
                <div class="bs-wizard clearfix">
                    <div class="bs-wizard-step active">
                        <div class="text-center bs-wizard-stepnum">Your cart</div>
                        <div class="progress">
                            <div class="progress-bar"></div>
                        </div>
                        <a href="#0" class="bs-wizard-dot"></a>
                    </div>

                    <div class="bs-wizard-step disabled">
                        <div class="text-center bs-wizard-stepnum">Payment</div>
                        <div class="progress">
                            <div class="progress-bar"></div>
                        </div>
                        <a href="#0" class="bs-wizard-dot"></a>
                    </div>

                    <div class="bs-wizard-step disabled">
                        <div class="text-center bs-wizard-stepnum">Finish!</div>
                        <div class="progress">
                            <div class="progress-bar"></div>
                        </div>
                        <a href="#0" class="bs-wizard-dot"></a>
                    </div>
                </div>
                <!-- End bs-wizard -->
            </div>
        </div>
    </section>
    <!--/hero_in-->

    <div class="bg_color_1">
        <div class="container margin_60_35">
            <div class="row">
                <div class="col-lg-8">
                    <div class="box_cart">
                        <table class="table table-striped cart-list">
                            <thead>
                            <tr>
                                <th>
                                    Item
                                </th>
                                <th>
                                    Qty
                                </th>
                                <th>
                                    Discount
                                </th>
                                <th>
                                    Price
                                </th>
                                <th>
                                    Actions
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(Session::has('cart'))
                                @foreach($courses as $course)
                                    <tr>
                                        <td>
                                            <div class="thumb_cart">
                                                <img src="{{ asset('/uplaod/courses/coursesimages/'.$course['item']['course_image']) }}"
                                                     alt="Image">
                                            </div>
                                            <a href="{{ url('/course-details/'.$course['item']['course_title']) }}"><span
                                                        class="item_cart">{{ $course['item']['course_title'] }}</span></a>
                                        </td>
                                        <td>
                                            <span class="badge badge-secondary p-2">{{ $course['qty'] }}</span>
                                        </td>
                                        <td>
                                            0%
                                        </td>
                                        <td>
                                            <strong>{{ $course['price'] }}$</strong>
                                        </td>
                                        <td class="options" style="width:5%; text-align:center;">
                                            {{-- <a href="{{ url('/reduce/'.$course['item']['id']) }}"><i class="icon-trash"></i></a> |--}}
                                            <a href="{{ url('/remove/'.$course['item']['id']) }}"><i
                                                        class="icon-trash"></i></a>
                                        </td>
                                    </tr>
                                @endforeach

                            @else
                                <tr>
                                    <td class="text-center">
                                        No Items In Cart
                                    </td>
                                </tr>
                            @endif

                            {{-- <tr>
                                <td>
                                    <div class="thumb_cart">
                                        <img src="{{ url('/design/educationalzard') }}/img/thumb_cart_2.jpg" alt="Image">
                                    </div>
                                    <span class="item_cart">At deseruisse scriptorem</span>
                                </td>
                                <td>
                                    0%
                                </td>
                                <td>
                                    <strong>15,50$</strong>
                                </td>
                                <td class="options" style="width:5%; text-align:center;">
                                    <a href="#"><i class="icon-trash"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="thumb_cart">
                                        <img src="{{ url('/design/educationalzard') }}/img/thumb_cart_3.jpg" alt="Image">
                                    </div>
                                    <span class="item_cart">Ea vel semper quaerendum</span>
                                </td>
                                <td>
                                    0%
                                </td>
                                <td>
                                    <strong>24,71$</strong>
                                </td>
                                <td class="options" style="width:5%; text-align:center;">
                                    <a href="#"><i class="icon-trash"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="thumb_cart">
                                        <img src="{{ url('/design/educationalzard') }}/img/thumb_cart_4.jpg" alt="Image">
                                    </div>
                                    <span class="item_cart">Ei has exerci graecis</span>
                                </td>
                                <td>
                                    0%
                                </td>
                                <td>
                                    <strong>24,71$</strong>
                                </td>
                                <td class="options" style="width:5%; text-align:center;">
                                    <a href="#"><i class="icon-trash"></i></a>
                                </td>
                            </tr> --}}
                            </tbody>
                        </table>
                        <div class="cart-options clearfix">
                            <div class="float-left">
                                <form action="{{ url('/getAddToCoupon/') }}" method="post">
                                    {{ csrf_field() }}
                                    <div class="apply-coupon">
                                        <div class="form-group">
                                            @if(!empty($course['item']['id']))
                                                <input type="hidden" name="id" value="{{ $course['item']['id'] }}">
                                            @endif
                                            <input type="text" name="coupon_code" placeholder="Your Coupon Code"
                                                   class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" class="btn_1 outline" value="Apply Coupon">
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="float-right fix_mobile">
                                <button type="button" class="btn_1 outline">Update Cart</button>
                            </div>
                        </div>
                        <!-- /cart-options -->
                    </div>
                </div>
                <!-- /col -->

                {{-- @if(Session::has('cart')) --}}
                <aside class="col-lg-4" id="sidebar">
                    <div class="box_detail">
                        <div id="total_cart">
                            Total <span class="float-right">
								
							</span>
                        </div>
                        <div class="add_bottom_30">
                            {{-- Lorem ipsum dolor sit amet, sed vide <strong>moderatius</strong> ad. Ex eius soleat sanctus pro, enim conceptam in quo, <a href="#0">brute convenire</a> appellantur an mei --}}
                            <h1 class="text-center">
                                @if(Session::has('cart'))
                                    {{ $totalPrice }}$
                                @else
                                    0$
                                @endif
                            </h1>
                        </div>
                        <a href="{{ url('/checkout') }}" class="btn_1 full-width">Checkout</a>
                        {{-- <a href="courses-grid-sidebar.html" class="btn_1 full-width outline"><i class="icon-right"></i> Continue Shopping</a> --}}
                    </div>
                </aside>
                {{-- @endif --}}
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /bg_color_1 -->
</main>
<!--/main-->


@include('website.layouts.footer')