<?php

namespace App\Http\Controllers;
// use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Request;
// use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Admin;
use App\User;
use App\Role;
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
        $admins = User::where('type_user', 'admin')->get();

        /*foreach ($admins as $value) {
            echo $value->hasRole('admin');
            // return unserialize($value->preferences);
        }*/

        return view('admin.admins.admins', compact('admins'));
    }

    public function my_profile()
    {
        $user = User::find(auth()->user()->id);
        
        return view('admin.myprofile.index', compact('user'));
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $register = $this->validate(request(),[
            'name' => 'required|min:4|max:191',
            'new_email' => 'required|email',
            'password' => 'required',
        ]);

        if (!empty(request('image'))) {
            $image_name = time() . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('uplaod/user/'), $image_name);
        }else{
            $image_name = 'user-image.png';
        }

        $user = new User();
        $user->uniqid = uniqid();
        $user->type_user = 'Admin';
        $user->image = $image_name;
        $user->name = request('name');
        $user->email = request('new_email');
        $user->password = bcrypt(request('password'));
        $user->confirmed = 1;
        $user->save();

        // Add Role
        if(request('roles') == 'Admin') {            
            $user->roles()->attach(Role::where('name', 'Admin')->first());
        }elseif(request('roles') == 'Editor'){
            $user->roles()->attach(Role::where('name', 'Editor')->first());
        }

        session()->flash('success', 'Successfully added');

        return redirect('admin/admins');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $user = User::find($id);
        return view('admin.admins.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
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
        // $add->confirmed = 1;
        $add->save();

        session()->flash('success', 'Successfully Updated');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        User::find($id)->delete();
        session()->flash('success', 'Successfully Deleted');
        return redirect('admin/admins');
    }

    public function delete_admin_all()
    {
        return 'admin Controller in delete_admin_all';
        return request('item');

        if(is_array(request('item')))
        {
            User::destroy(request('item'));
        }else{
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

        if(request('role_admin')) {
            
            // Add Role
            $user->roles()->attach(Role::where('name', 'admin')->first());
        }
        if(request('role_editor')) {
            
            // Add Role
            $user->roles()->attach(Role::where('name', 'editor')->first());
        }
        if(request('role_user')) {
            
            // Add Role
            $user->roles()->attach(Role::where('name', 'user')->first());
        }

        return back();

    }
}
