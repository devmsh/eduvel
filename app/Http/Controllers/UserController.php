<?php

namespace App\Http\Controllers;

// use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Request;
// use Illuminate\Http\Request;

use App\User;
use App\Mail\AdminResetPassword;
use DB;
use Carbon\Carbon;
use Mail;
use App\Admission;
use App\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // For Get All Users 
    /* public function index()
     {
         //
         $users = User::whereIn('type_user', ['Student'])->get();
         return view('admin.users.index', compact('users'));
     }*/

    public function show_all_teachers()
    {

        $users = User::orderBy('created_at', 'desc')->whereIn('type_user', ['Teacher'])->get();
        // return $users;
        return view('admin.users.teachers', compact('users'));
    }

    public function show_all_students()
    {

        $users = User::whereIn('type_user', ['Student'])->get();
        // return $users;
        return view('admin.users.students', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create_teacher()
    {
        return view('admin.users.teacher.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store_teacher(Request $request)
    {
        $this->validate(request(), [

            'name' => 'required|min:4|max:191',
            // 'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required',

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

        // |in:user,company,vendor',

        // $user = User::where('id', $id)->first();
        // $admission = Admission::where('user_uniqid', $user->uniqid)->first();

        if (!empty(request('image'))) {
            $image_name = time() . '.' . request('image')->getClientOriginalExtension();
            request('image')->move(public_path('uplaod/user/'), $image_name);
        }

        $user = new User();
        $user->uniqid = uniqid();
        $user->type_user = 'Teacher';
        if (!empty(request('image'))) {
            $user->image = $image_name;
        } else {
            $user->image = 'user-image.png';
        }
        $user->name = request('name');
        $user->email = request('new_email');
        $user->password = bcrypt(request('password'));
        $user->confirmed = 1;
        $user->token = '';
        $user->save();

        // Add Role
        $user->roles()->attach(Role::where('name', 'Teacher')->first());

        $user = User::orderBy('created_at', 'desc')->first();

        $admission = new Admission();
        $admission->user_uniqid = $user->uniqid;
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
        $admission->terms = 'yes';
        $admission->save();

        session()->flash('success', 'Successfully added');

        return redirect('admin/teachers');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    // Fot Edit Teachers
    public function edit_teacher($id)
    {
        //
        $user = User::find($id);
        $admission = Admission::where('user_uniqid', $user->uniqid)->first();

        return view('admin.users.teacher.edit', compact('user', 'admission'));
    }

    // Fot Update Teachers
    public function update_teacher(Request $request, $id)
    {

        $this->validate(request(), [

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
        // |in:user,company,vendor',

        $user = User::where('id', $id)->first();
        $admission = Admission::where('user_uniqid', $user->uniqid)->first();

        if (!empty(request('image'))) {
            $image_name = time() . '.' . request('image')->getClientOriginalExtension();
            request('image')->move(public_path('uplaod/user/'), $image_name);
        }

        $user = User::find($user->id);
        if (!empty(request('image'))) {
            $user->image = $image_name;
        }
        $user->name = request('name');
        if (!empty(request('new_email'))) {
            $user->email = request('new_email');
        }
        if (!empty(request('password'))) {
            $user->password = bcrypt(request('password'));
        }
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
        return back();
        return redirect('admin/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        session()->flash('success', 'Successfully Deleted');
        return back();
    }

    public function delete_user_all()
    {
        return 'admin Controller in delete_admin_all';
        return request('item');

        if (is_array(request('item'))) {
            User::destroy(request('item'));
        } else {
            User::find(request('item'))->delete();
        }

        session()->flash('success', 'Successfully Deleted');
        return redirect('admin/users');
    }
}
