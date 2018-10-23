<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Request;
// use Illuminate\Http\Request;

use App\Admin;
use App\Mail\AdminResetPassword;
use DB;
use Carbon\Carbon;
use Mail;

class AdminAuth extends Controller
{
    //

    public function login()
    {
        return view('admin.login');
    }

    public function dologin()
    {
        $rememberme = request('rememberme') == 1 ? true : false;
        if (auth()->guard('admin')->attempt(['email' => request('email'), 'password' => request('password')], $rememberme)) {
            return redirect('/admin');

        } else {

            session()->flash('error', trans('admin.inccorrect_information_login'));
            return redirect('admin/login');
        }
    }

    public function logout()
    {
        auth()->guard('admin')->logout();
        return redirect('/admin/login');
    }

    public function forgot_password()
    {
        return view('admin.forgot_password');
    }

    public function forgot_password_post()
    {
        $admin = Admin::where('email', request('email'))->first();
        if (!empty($admin)) {

            $token = app('auth.password.broker')->createToken($admin);
            $data = DB::table('password_resets')->insert([
                'email' => $admin->email,
                'token' => $token,
                'created_at' => Carbon::now(),
            ]);
            Mail::to($admin->email)->send(new AdminResetPassword(['data' => $admin, 'token' => $token]));
            session()->flash('success', 'Reset Link Is Sent');
            return back();

            // return new AdminResetPassword(['data' => $admin, 'token' => $token]);
        }

        return back();
    }

    public function reset_password($token)
    {
        $check_token = DB::table('password_resets')->where('token', $token)->where('created_at', '>', Carbon::now()->subHours(2))->first();

        if (!empty($check_token)) {

            return view('admin.reset_password', ['data' => $check_token]);

        } else {
            return redirect('admin/forgot/password');
        }
    }

    public function reset_password_post($token)
    {
        // return request();

        $this->validate(request(), [

            'password' => 'required|confirmed',
            'password_confirmation' => 'required',

        ], [], [

            'password' => 'Password',
            'password_confirmation' => 'Confirmation Password',
        ]);

        $check_token = DB::table('password_resets')->where('token', $token)->where('created_at', '>', Carbon::now()->subHours(2))->first();

        if (!empty($check_token)) {
            // return request('password');

            $admin = Admin::where('email', $check_token->email)->update([
                'email' => $check_token->email,
                'password' => bcrypt(request('password'))
            ]);

            DB::table('password_resets')->where('email', request('email'))->delete();
            // For Login
            /*admin()->attempt($admin);*/
            auth()->guard('admin')->attempt(['email' => $check_token->email, 'password' => request('password')], true);
            return redirect('/admin');

        } else {

            return redirect('/admin/forgot/password');
        }
    }

    // For Register
    public function register()
    {
        return view('admin.register');
    }

    public function doregister(Request $request)
    {

        $register = $this->validate(request(), [
            'name' => 'required|min:4|max:191',
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $add = new Admin();
        $add->name = request('name');
        $add->email = request('email');
        $add->password = bcrypt(request('password'));
        $add->confirmed = 0;
        $add->token = str_random(55);
        $add->save();

        $rememberme = request('rememberme') == 1 ? true : false;
        if (auth()->guard('admin')->attempt(['email' => request('email'), 'password' => request('password')], $rememberme)) {

            $admin = Admin::where('email', request('email'))->first();
            if (!empty($admin)) {

                $token = app('auth.password.broker')->createToken($admin);
                $data = DB::table('password_resets')->insert([
                    'email' => $admin->email,
                    'token' => $token,
                    'created_at' => Carbon::now(),
                ]);

                /******************* Start Mail ******************/
                $get = Admin::where('email', request('email'))->get();

                foreach ($get as $getdata) {
                    $id = $getdata->id;
                    $name = $getdata->name;
                    $email = $getdata->email;
                    $confirmed = $getdata->confirmed;
                    $getToken = $getdata->token;

                    if ($confirmed == 0) {
                        $data = array('name' => $name, "body" => "Please click the link to confirm your account.", "token" => $getToken);
                        Mail::send('website.emails.mail', $data, function ($message) use ($getToken) {
                            $message->to(request('email'))->subject('The Message For Checked Email');
                            $message->from('alzard@gmail.com', 'Mohammed Alzard');
                        });
                        session()->flash('success', 'Reset Link Is Sent');
                        return 'Plase Chech Your Email';
                        // return redirect()->route('/url/test=', $kolid);
                    }
                }
                /******************* End Mail ******************/

            }

            return back();

            //return redirect('/admin');

        } else {

            session()->flash('error', trans('admin.inccorrect_information_login'));
            return redirect('admin/login');
        }

        // return request();
    }

    public function confirmation($token)
    {
        $check_token = Admin::where('token', $token)->where('created_at', '>', Carbon::now()->subHours(2))->first();

        if (!empty($check_token)) {

            $update = Admin::find($check_token->id);
            $update->token = '';
            $update->confirmed = 1;
            $update->save();

            auth()->guard('admin')->attempt(['email' => $check_token->email, 'password' => request('password')], true);
            return redirect('/admin');

            // return view('website.admission', ['data' => $check_token]);

        } else {
            return '404';
        }
    }

    public function confirmation_post($token)
    {
        /*$array = array("item1","item2","item3");
        $serializedArr = serialize($array);
        return $serializedArr;
        return unserialize($serializedArr);*/

        // return request("preferences");
        $check_token = DB::table('admins')->where('token', $token)->where('created_at', '>', Carbon::now()->subHours(2))->first();

        if (!empty($check_token)) {
            // return bcrypt(request('password'));

            // if(request('educational_status') == 'Teacher')
            // {
            // 	$control = 3;
            // }else{
            // 	 $control = 4;
            // }

            if (request('terms') == 'yes') {
                //return request('terms');
                $admin = Admin::where('email', $check_token->email)->update([
                    /*'email' => $check_token->email,
                    'password' => bcrypt(request('password')),

                    'firstname' => request('firstname'),
                    'lastname' => request('lastname'),
                    'email' => request('email'),
                    'password' => request('password'),*/
                    'confirmed' => 1,
                    'control' => request('educational_status'),
                    'token' => '',
                    'telephone' => request('telephone'),
                    'age' => request('age'),
                    'educational_status' => request('educational_status'),
                    'education_level' => request('education_level'),
                    'gender' => request('gender'),
                    'address' => request('address'),
                    'city' => request('city'),
                    'zipcode' => request('zipcode'),
                    'country' => request('country'),
                    'preferences' => serialize(request('preferences')),
                    'messagere_here' => request('messagere_here'),
                    'terms' => request('terms'),
                ]);

                // DB::table('password_resets')->where('email', request('email'))->delete();
                // For Login
                /*admin()->attempt($admin);*/
                auth()->guard('admin')->attempt(['email' => $check_token->email, 'password' => request('password')], true);

                return redirect('/admin');

            } else {

                // Session For Terms
                session()->flash('error_terms', 'Please agree to the terms and conditions');
                return back();
            }

        }

        return '404';
    }

}
