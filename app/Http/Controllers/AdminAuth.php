<?php

namespace App\Http\Controllers;
// use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Request;
// use Illuminate\Http\Request;

use App\Admin;
use App\User;
use App\Role;
use App\Mail\AdminResetPassword;
use App\Mail\ConfirmAccount;
use DB;
use Carbon\Carbon;
use Mail;
use App\Admission;
use App\UserRole;
use Session;

class AdminAuth extends Controller
{
    public function userHasRole($id)
    {
    	$user = User::find($id);

    	if ($user->hasRole('Admin')) {
    			
			return redirect('/admin');
		}elseif ($user->hasRole('Editor')) {

			return redirect('/editor');
		}elseif ($user->hasRole('User')) {
			
			return 'User';
		}elseif ($user->hasRole('Teacher')) {
			
			return redirect('/dashboard');
			return redirect('/profile/'.auth()->user()->name);
		}elseif ($user->hasRole('Student')) {
			
			return redirect('/courses-grid');
			return redirect('/profile/'.auth()->user()->name);
		}
    }

    public function login()
    {
    	return view('auth.login');
    }

    public function dologin() 
    {
    	$this->validate(request(),[

    		'email' => 'required|email',
			'password' => 'required'
		]);

		$rememberme = request('rememberme') == 1?true:false;
    	if (auth()->attempt(request(['email', 'password']), $rememberme)) {
    		
    		$user = User::where('email', request('email'))->first();

    		// if (Session::has('oldUrl')) {
    		// 	return $oldUrl = Session::get('oldUrl');
    		// 	Session::forget('oldUrl');
    		// 	return redirect('/checkout');
    		// }
    		return $this->userHasRole($user->id);
    		
    	}else {

			// session()->flash('error', trans('admin.inccorrect_information_login'));
			return redirect('login')->with('status', 'Inccorrect information login!');
		}
		
	}

	public function logout()
	{
		auth()->logout();
		return redirect('/login');
	}

	public function forgot_password()
	{
		return view('auth.forgot_password');
	}

	public function forgot_password_post()
	{		
		$this->validate(request(),[

    		'email' => 'required|email',
		]);

		$user = User::where('email', request('email'))->first();
		if(!empty($user)){

			$token = app('auth.password.broker')->createToken($user);
			$data = DB::table('password_resets')->insert([
				'email' => $user->email,
				'token' => $token,
				'created_at' => Carbon::now(),
			]);
			Mail::to($user->email)->send(new AdminResetPassword(['data' => $user, 'token' => $token]));
			session()->flash('success', 'Reset Link Is Sent');
			return back();

			// return new AdminResetPassword(['data' => $user, 'token' => $token]);
		}

		return back();
	}

	public function reset_password($token)
	{
		$this->validate(request(),[
    		'token' => 'required',
		]);

		$check_token = DB::table('password_resets')->where('token', $token)->where('created_at', '>', Carbon::now()->subHours(2))->first();
		
		if(!empty($check_token))
		{

			return view('auth.reset_password', ['data' => $check_token]);

		}else{
			return redirect('/forgot/password');
		}
	}

	public function reset_password_post($token)
	{
		$this->validate(request(),[
			'token' => 'required',
			'password' => 'required|confirmed',
			'password_confirmation' => 'required',

		], [], [

			'password' => 'Password',
			'password_confirmation' => 'Confirmation Password',
		]);

		$check_token = DB::table('password_resets')->where('token', $token)->where('created_at', '>', Carbon::now()->subHours(2))->first();

		if(!empty($check_token))
		{
			$user = User::where('email', $check_token->email)->update([
				'email' => $check_token->email, 
				'password' => bcrypt(request('password'))
			]);

			DB::table('password_resets')->where('email', request('email'))->delete();
			// For Login 
			auth()->attempt(['email' => $check_token->email, 'password' => request('password')], true);

			$user = User::where('email', $check_token->email)->first();
			
			return $this->userHasRole($user->id);

		} else {

			return redirect('/forgot/password');
		}
	}

	// For Register
	public function register()
	{
		return view('auth.register');
	}

	public function doregister(Request $request)
	{

		$register = $this->validate(request(),[
            'name' => 'required|min:4|max:191',
            'type_user' => '|in:Student,Teacher',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
			'password_confirmation' => 'required',
        ], [], [

			'password' => 'Password',
			'password_confirmation' => 'Confirmation Password',
		]);

        $add = new User();
        $add->uniqid = uniqid();
        $add->type_user = request('type_user');
        $add->image = 'user-image.png';
        $add->name = request('name');
        $add->email = request('email');
        $add->password = bcrypt(request('password'));
        $add->confirmed = 0;
        $add->token = str_random(55);
        $add->save();

        // Add Role
		if(request('type_user') == 'Student'){
			$add->roles()->attach(Role::where('name', 'Student')->first());
		}

        $rememberme = request('rememberme') == 1?true:false;
		if (true/*auth()->attempt(['email' => request('email'), 'password' => request('password')], $rememberme)*/) 
		{

			$user = User::where('email', request('email'))->first();
			if(!empty($user)){

				$token = app('auth.password.broker')->createToken($user);
				$data = DB::table('password_resets')->insert([
					'email' => $user->email,
					'token' => $token,
					'created_at' => Carbon::now(),
				]);

				/******************* Start Mail ******************/
		        $get = User::where('email', request('email'))->get();

		        foreach($get as $getdata) 
		        { 
		            $id = $getdata->id;
		            $name = $getdata->name;
		            $email = $getdata->email;
		            $confirmed = $getdata->confirmed;
		            $getToken = $getdata->token;

		            if($confirmed == 0)
		            {
		                /*$data = array('name'=> $name, "body" => "Please click the link to confirm your account.", "token" => $getToken);
		                Mail::send('website.emails.mail', $data, function($message) use($getToken) {
		                    $message->to(request('email'))->subject('The Message For Checked Email');
		                    $message->from('alzard@gmail.com','Mohammed Alzard');
		                });*/

						$token = $getToken;
						Mail::to($user->email)->send(new ConfirmAccount(['data' => $user, 'token' => $token]));
		                
		                session()->flash('success', 'Please check your email, Admission Apply link has been sent');
		                return view('auth.chech_email');
		                // return redirect()->route('/url/test=', $kolid);
		            }
		        }
		        /******************* End Mail ******************/
				
			}

			return back();


			//return redirect('/admin');

		} else {

			session()->flash('error', trans('admin.inccorrect_information_login'));
			return redirect('/login');
		}

		// return request();
	}

	public function confirmation($token)
	{
		// $this->validate(request(),[

  //   		'token' => 'required',
		// ]);
		if (!empty($token)) {
			$check_token = User::where('token', $token)->where('created_at', '>', Carbon::now()->subHours(2))->first();
		}

		if(!empty($check_token))
		{

			if($check_token->type_user !== 'Student'){

				return view('admission', ['data' => $check_token]);
			}

			$update = User::find($check_token->id);
			$update->token = '';
			$update->confirmed = 1;
			$update->save();

			auth()->attempt(['email' => $check_token->email, 'password' => request('password')], true);

			/*if (Session::has('oldUrl')) {
    			$oldUrl = Session::get('oldUrl');
    			Session::forget('oldUrl');
    			return redirect()->to($oldUrl);
    		}*/
			return $this->userHasRole($check_token->id);
			// return redirect('/Student');
		}else{
			return redirect('/not-found');
		}
	}

	public function confirmation_post($token)
	{
		$this->validate(request(),[

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
			'terms' => 'required',
		]);
		$check_token = DB::table('users')->where('token', $token)->where('created_at', '>', Carbon::now()->subHours(2))->first();

		if(!empty($check_token))
		{

			if(request('terms') == 'yes')
			{
				$admission = new Admission();
				$admission->user_uniqid = $check_token->uniqid;
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
		        $admission->terms = request('terms');
		        $admission->save();

		        $update = User::find($check_token->id);
				$update->token = '';
				$update->confirmed = 1;
				$update->save();

				DB::table('password_resets')->where('email', request('email'))->delete();
				
				// Add Role
				if($check_token->type_user == 'Teacher'){
					$user = User::find($check_token->id);
        			$user->roles()->attach(Role::where('name', 'Teacher')->first());
				}
				
				// For Login 
				auth()->attempt(['email' => $check_token->email, 'password' => request('password')], true);
				
				/*if (Session::has('oldUrl')) {
	    			$oldUrl = Session::get('oldUrl');
	    			Session::forget('oldUrl');
	    			return redirect()->to($oldUrl);
	    		}*/
				return $this->userHasRole($check_token->id);
				// return redirect('/Teacher');

			} else {

				// Session For Terms
				session()->flash('error_terms', 'Please agree to the terms and conditions');
				return back();
			}

		} 

		return redirect('/not-found');
	}


}
