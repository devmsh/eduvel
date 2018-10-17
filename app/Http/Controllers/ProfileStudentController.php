<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Order;

class ProfileStudentController extends Controller
{
    public function profile($name = null)
    {
        if (empty($name)) {
            
            return redirect('/profile/'. auth()->user()->name);
        }

    	$user = User::find(auth()->user()->id);
    	return view('student.profile', compact('user'));
    }

    public function update_profile(Request $request, $id)
    {
        $register = $this->validate(request(),[
            'name' => 'required|min:4|max:191',
            // 'email' => 'required|email',
        ]);

        if (!empty(request('image'))) {
            $image_name = time() . '.' . request('image')->getClientOriginalExtension();
            request('image')->move(public_path('uplaod/user/'), $image_name);
        }

        $add = User::find($id);
        if (!empty(request('image'))){ $add->image = $image_name; }
        $add->name = request('name');
        if(!empty(request('new_email'))){ $add->email = request('new_email'); }
        if(!empty(request('password'))){ $add->password = bcrypt(request('password')); }
        $add->save();

        session()->flash('success', 'Successfully Updated');
        return redirect('/profile/'.request('name'));
    }

    public function my_courses(){
        
        $orders = Auth::user()->orders;
        $orders->transform(function($order, $key){
            $order->cart = unserialize($order->cart);
            return $order;
        });

        return view('student.my-courses', compact('orders'));
    }

    public function logout()
    {
    	Auth::logout();
    	return redirect('/login');
    }
}
