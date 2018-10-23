<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Request;
// use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Admin;
use App\Mail\AdminResetPassword;
use DB;
use Carbon\Carbon;
use Mail;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // For Get All Admins 
    public function index()
    {
        //
        $admins = Admin::get();

        /* foreach ($admins as $value) {
             return unserialize($value->preferences);
         }*/

        return view('admin.admins.admins', compact('admins'));
    }

    public function my_profile()
    {
        $admins = Admin::get();
        return view('admin.myprofile.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.admins.create');
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
            'email' => 'required|email',
            'password' => 'required|min:6',
            'control' => 'required',
            'description' => 'required',
        ]);

        $add = new Admin();
        $add->name = request('name');
        $add->email = request('email');
        $add->password = bcrypt(request('password'));
        $add->control = request('control');
        $add->description = request('description');
        $add->confirmed = 1;
        $add->save();

        session()->flash('success', 'Successfully added');

        return redirect('admin/admins');
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
        $admins = Admin::find($id);
        return view('admin.admins.edit', compact('admins'));
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
            'email' => 'required|email',
            'control' => 'required',
            'description' => 'required',
        ]);

        $add = Admin::find($id);
        $add->name = request('name');
        $add->email = request('email');
        if (request('password')) {
            $add->password = bcrypt(request('password'));
        }
        $add->control = request('control');
        $add->description = request('description');
        $add->confirmed = 1;
        $add->save();

        session()->flash('success', 'Successfully Updated');
        return redirect('admin/admins');
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
        Admin::find($id)->delete();
        session()->flash('success', 'Successfully Deleted');
        return redirect('admin/admins');
    }

    public function delete_admin_all()
    {
        return 'admin Controller in delete_admin_all';
        return request('item');

        if (is_array(request('item'))) {
            Admin::destroy(request('item'));
        } else {
            Admin::find(request('item'))->delete();
        }

        session()->flash('success', 'Successfully Deleted');
        return redirect('admin/admins');
    }
}
