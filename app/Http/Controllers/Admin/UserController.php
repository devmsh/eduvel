<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Request;
// use Illuminate\Http\Request;

use App\User;
use App\Mail\AdminResetPassword;
use DB;
use Carbon\Carbon;
use Mail;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // For Get All Users 
    public function index()
    {
        //
        $users = User::get();

        /* foreach ($users as $value) {
             return unserialize($value->preferences);
         }*/

        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $register = $this->validate(request(), [
            'name' => 'required|min:4|max:191',
            // 'control' => 'required|in:user,company,vendor',
            'email' => 'required|email',
            'password' => 'required|min:6',
            // 'control' => 'required',
            // 'description' => 'required',
        ]);

        $add = new User();
        $add->name = request('name');
        $add->email = request('email');
        $add->password = bcrypt(request('password'));
        // $add->control = request('control');
        // $add->description = request('description');
        // $add->confirmed = 1;
        $add->save();

        session()->flash('success', 'Successfully added');

        return redirect('admin/users');
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $users = User::find($id);
        return view('admin.users.edit', compact('users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $register = $this->validate(request(), [
            'name' => 'required|min:4|max:191',
            'control' => 'required|in:user,company,vendor',
            'email' => 'required|email',
            'control' => 'required',
            'description' => 'required',
        ]);

        $add = User::find($id);
        $add->name = request('name');
        $add->email = request('email');
        if (request('password')) {
            $add->password = bcrypt(request('password'));
        }
        $add->control = request('control');
        // $add->description = request('description');
        // $add->confirmed = 1;
        $add->save();

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
        //
        User::find($id)->delete();
        session()->flash('success', 'Successfully Deleted');
        return redirect('admin/users');
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
