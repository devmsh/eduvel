<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateAdminRequest;
use App\Role;
use App\User;
use Illuminate\Support\Facades\Request;
use App\Admin;

class AdminController extends Controller
{
    public function index()
    {
        $admins = User::where('type_user','Admin')->paginate();
        return view('admin.admins.admins', compact('admins'));
    }

    public function create()
    {
        return view('admin.admins.create');
    }

    public function store(CreateAdminRequest $request)
    {
        $user = new User();
        $user->uniqid = uniqid();
        $user->type_user = 'Admin';
        $user->image = $request->image ? $request->image->store('upload/users') : null;
        $user->name = request('name');
        $user->email = request('new_email');
        $user->password = bcrypt(request('password'));
        $user->confirmed = 1;
        $user->save();

        $user->assignRole(request('roles'));

        return redirect('admin/admins')->with('success', 'Successfully added');
    }

    public function edit(User $admin)
    {
        return view('admin.admins.edit', compact('admin'));
    }

    public function update(Request $request, User $admin)
    {
        $this->validate(request(), [
            'name' => 'required|min:4|max:191',
        ]);

        $admin->image = $request->image ? $request->image->store('upload/users') : $admin->image;
        $admin->name = request('name');
        $admin->email = request('new_email',$admin->email);
        $admin->password = bcrypt(request('password'),$admin->password);
        $admin->save();

        return back()->with('success', 'Successfully Updated');
    }

    public function destroy(User $admin)
    {
        $admin->delete();

        return redirect('admin/admins')->with('success', 'Successfully Deleted');
    }

    public function delete_admin_all()
    {
        return 'admin Controller in delete_admin_all';
        return request('item');

        if (is_array(request('item'))) {
            User::destroy(request('item'));
        } else {
            User::find(request('item'))->delete();
        }

        session()->flash('success', 'Successfully Deleted');
        return redirect('admin/admins');
    }

    public function add_role(Request $request)
    {
        // return request();

        $user = User::where('uniqid', request('uniqid'))->first();
        $user->roles()->detach();

        if (request('role_admin')) {

            // Add Role
            $user->roles()->attach(Role::where('name', 'admin')->first());
        }
        if (request('role_editor')) {

            // Add Role
            $user->roles()->attach(Role::where('name', 'editor')->first());
        }
        if (request('role_user')) {

            // Add Role
            $user->roles()->attach(Role::where('name', 'user')->first());
        }

        return back();

    }

    public function my_profile()
    {
        return view('admin.myprofile.index');
    }
}
