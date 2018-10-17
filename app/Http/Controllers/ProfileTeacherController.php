<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Admission;

class ProfileTeacherController extends Controller
{
    public function profile($name)
    {        
        if (empty($name)) {
            
            return redirect('/profile/'. auth()->user()->name);
        }
        # return redirect('/profile/'. auth()->user()->name);
        
    	$user = User::find(auth()->user()->id);
    	$admission = Admission::where('user_uniqid', auth()->user()->uniqid)->first();

    	return view('teacher.profile', compact('user', 'admission'));
    }

    public function update_profile(Request $request)
    {
        $this->validate(request(),[

            'name' => 'required|min:4|max:191',
            'telephone' => 'required',
            'age' => 'required',
            'education_level' => 'required',
            'gender' => 'required',
            'address' => 'required',
            'city' => 'required',
            'zipcode' => 'required',
            'country' => 'required',
            'preferences' => 'required',
            'messagere_here' => 'required',
        ]);

    	// return $request;
    	$user = User::where('uniqid', $request->uniqid)->first();
    	$admission = Admission::where('user_uniqid', auth()->user()->uniqid)->first();
        $register = $this->validate(request(),[
            'name' => 'required|min:4|max:191',
            'uniqid' => 'required',
            // 'email' => 'required|email',
        ]);

        if (!empty(request('image'))) {
            $image_name = time() . '.' . request('image')->getClientOriginalExtension();
            request('image')->move(public_path('uplaod/user/'), $image_name);
        }

        $user = User::find($user->id);
        if (!empty(request('image'))){ $user->image = $image_name; }
        $user->name = request('name');
        if(!empty(request('new_email'))){ $user->email = request('new_email'); }
        if(!empty(request('password'))){ $user->password = bcrypt(request('password')); }
        $user->save();

        $admission = Admission::find($admission->id);
        $admission->telephone = request('telephone');
        $admission->age = request('age');
		$admission->education_level = request('education_level');
        $admission->gender = request('gender');
        $admission->address = request('address');
        $admission->city = request('city');
        $admission->zipcode = request('zipcode');
        $admission->country = request('country');
        $admission->preferences = json_encode(request('preferences'));
        $admission->messagere_here = request('messagere_here');
        $admission->save();

        session()->flash('success', 'Successfully Updated');
        return redirect('/profile/'.request('name'));
    }

    public function my_courses(){
        
        $orders = Auth::user()->orders;
        $orders->transform(function($order, $key){
            $order->cart = unserialize($order->cart);
            return $order;
        });

        return view('teacher.my-courses', compact('orders'));
    }

    public function logout()
    {
    	Auth::logout();
    	return redirect('/login');
    }
}
