<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Settings;
use App\SocialMedia;
use App\whychoose;
use App\OurFounders;
use App\Contacts;
use App\Category;
use App\Post;
use App\BlogComment;
use App\Faq;
use App\MediaGallery;
use App\CourseCategory;
use App\Courses;
use App\Newsletter;
use App\CourseComment;
use App\User;

use Session;
use App\Cart;
use Stripe\Charge;
use Stripe\Stripe;
use App\Order;
use Auth;

use Mail;
use App\Mail\CheckoutPayments;

use App\Coupon;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getCart()
    {
        $settings = Settings::get()->find(1);
        $socialMedia = SocialMedia::get();
        $categories = Category::get();
        $posts =Post::orderBy('id', 'desc')->paginate(4);
        $course_categorys = CourseCategory::get();
        $courses = Courses::orderBy('id', 'desc')->where('isActive', 1)->paginate(6);

        if (!Session::has('cart')) {
            
            return view('shopping-cart.shopping-cart', ['courses' => null], compact('settings', 'socialMedia', 'categories', 'posts', 'course_categorys', 'courses'));
        }

        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);

        return view('shopping-cart.shopping-cart',
            ['courses' => $cart->items, 'totalPrice' => $cart->totalPrice], 
            compact('settings', 'socialMedia', 'categories', 'posts', 'course_categorys', 'courses')
        );
    }

    public function getAddToCart(Request $request, $id) {
            
        $product = Courses::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);

        $request->session()->put('cart', $cart);
        // dd($request->session()->get('cart'));

        return back();
    }

    public function getReduceByOne($id){

        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->reduceByOne($id);

        Session::put('cart', $cart);
        return redirect('/shopping-cart');
    }

    public function getRemoveItem($id){
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);

        if (count($cart->items) > 0) {
            Session::put('cart', $cart);
        }else{
            Session::forget('cart');
        }
        return redirect('/shopping-cart');
    }

    public function getCheckout() {
        
        $settings = Settings::get()->find(1);
        $socialMedia = SocialMedia::get();
        $categories = Category::get();
        $posts =Post::orderBy('id', 'desc')->paginate(4);
        $course_categorys = CourseCategory::get();
        $courses = Courses::orderBy('id', 'desc')->where('isActive', 1)->paginate(6);

        if (!Session::has('cart')) {
            
            return redirect('/shopping-cart');
        }

        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $total = $cart->totalPrice;

        Session::put('oldUrl', url()->current());

        return view('shopping-cart.checkout', ['total' => $total], compact('settings', 'socialMedia', 'categories', 'posts', 'course_categorys', 'courses'));
    }

    public function postCheckout(Request $request) {
        
        if(!empty(request('stripeEmail'))){

            $email = request('stripeEmail');
        }else{
            $email = Auth::user()->email;
        }

       if (!Session::has('cart')) {
            return redirect('/shopping-cart');
        }

        $validatedData = $request->validate([
            'stripeToken' => 'required',
            'stripeEmail' => 'required',
        ]);

        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $total = $cart->totalPrice;

        // return request();

         // Charge::setApiKey('sk_test_fwmVPdJfpkmwlQRedXec5IxR');
        \Stripe\Stripe::setApiKey("sk_test_EJzqFDxNBwcV12kl425fQxZ7");
        $token = $_POST['stripeToken'];

        try{

            $charge = \Stripe\Charge::create([
                'amount' => $total * 100,
                'currency' => 'usd',
                'description' => 'Example charge',
                'source' => $token,
            ]);

            $order = new Order();
            // $order->user_id = auth()->user()->id;
            $order->cart = serialize($cart); // unserialize(str)
            $order->email = request('stripeEmail');
            // $order->name = "request('name')";
            $order->payment_id = $charge->id;
            $order->save();

            Auth::user()->orders()->save($order);

        }catch(\Exaption $e){
            return redirect('/checkout')->with('error', $e->getMessage());
        }


        Session::forget('cart');

        $settings = Settings::get()->find(1);
        $socialMedia = SocialMedia::get();
        $user = User::where('id', auth()->user()->id)->first();
        $payment_id = $charge->id;
        Mail::to($email)->send(new CheckoutPayments(['data' => $user, 'total' => $total, 'payment_id'=> $payment_id]));

        return view('shopping-cart.finish', compact('settings', 'socialMedia'));
        // return redirect('/')->with('success', 'Successfuly purchased courses');
    }

    // public function getAddToCoupon(Request $request){

    //     // return Request();
    //     $product = Courses::where('id', request('id'))->first();
    //     if (!empty($product)) {
    //         if ($product->coupon_code == request('coupon-code')) {
    //             $oldCart = Session::has('cart') ? Session::get('cart') : null;
    //             $cart = new Cart($oldCart);
    //             $cart->addCoupon($product, $product->id, $product->coupon_code_discount_price);

    //             // if (count($cart->items) > 0) {
    //             //     Session::put('cart', $cart);
    //             // }
    //         }   
    //     }

    //     return back();
    // }

    public function getAddToCoupon(Request $request) {

        $coupon = Coupon::whereNull('deleted_at')->where('coupon_code', $request->coupon_code)->first();
        if(empty($coupon)){
            return back();
        }else{
            $product = Courses::find($coupon->course_id);
            // return $course->course_price;
        }
        
        
        $product->course_price = $coupon->coupon_code_discount_price;
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);

        $request->session()->put('cart', $cart);
        // dd($request->session()->get('cart'));


        // $oldCart = Session::has('cart') ? Session::get('cart') : null;
        // $cart = new Cart($oldCart);
        // $cart->addCoupon($coupon->course_id, $coupon->coupon_code_discount_price);

        // Session::put('cart', $cart);
        return back();
    }

    
}






