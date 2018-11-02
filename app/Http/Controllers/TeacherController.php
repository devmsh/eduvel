<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Request;
// use Illuminate\Http\Request;

use App\User;
use App\Admission;

class TeacherController extends Controller
{
    public function index()
    {
        $teachers = User::role('Teacher')->latest()->get();

        return view('admin.users.teachers', compact('teachers'));
    }

    public function create()
    {
        return view('admin.users.teacher.create');
    }

    public function store(Request $request)
    {
        $this->validate(request(), [
            'name' => 'required|min:4|max:191',
            'email' => 'required|email|unique:users',
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

        if (!empty(request('image'))) {
            $image_name = time() . '.' . request('image')->getClientOriginalExtension();
            request('image')->move(public_path('uplaod/user/'), $image_name);
        }

        $user = new User();
        $user->uniqid = uniqid();
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

    public function edit(User $teacher)
    {
        $admission = Admission::where('user_uniqid', $teacher->uniqid)->first();

        return view('admin.users.teacher.edit', compact('teacher', 'admission'));
    }

    public function update(Request $request, $id)
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

    public function destroy(User $teacher)
    {
        $teacher->delete();

        return back()->with('success', 'Successfully Deleted');
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
