<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Http\Controllers\Controller;
// use Illuminate\Support\Facades\Request;
use App\Settings;
use App\SocialMedia;
use App\whychoose;
use App\OurFounders;


use App\Http\Controllers\SettingsController;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $setting = Settings::get()->find(1);
        if($setting){
            return view('admin.settings.index', compact('setting'));
        }else{
            // return "No data, please add temporary data through DataBase";
            //return view('admin.settings.index');
        }

        //return view('settings/index');
    }

    public function socialMedia()
    {
        $socialMedia = SocialMedia::get();
        return view('admin.settings.socialMedia', compact('socialMedia'));
    }

    public function socialMedia_store(Request $request)
    {
        $socialMedia = $this->validate(request(),[

            'icon' => 'required',
            'link' => 'required',
        ]);

        $add = new SocialMedia;
        $add->link = request('link');
        $add->icon = request('icon');
        $add->save();

        session()->flash('success', 'Added Successfully');
        return back();
    }

    public function socialMedia_edit($id)
    {
        $get = SocialMedia::find($id);
        return view('admin.settings.socialMedia_edit', compact('get'));
    }

    public function socialMedia_update(Request $request)
    {
        $socialMedia = $this->validate(request(),[

            'icon' => 'required',
            'link' => 'required',
        ]);

        // return request('icon');
        // SocialMedia::update($request->id);
        $add = SocialMedia::find($request->id);
        $add->link = request('link');
        $add->icon = request('icon');
        $add->save();


        session()->flash('success', 'Edit Successfully');
        return back();
    }

    public function socialMedia_destroy($id)
    {
        SocialMedia::find($id)->delete();
        session()->flash('success', 'Social Media deleted successfully');
        return back();
    }

    // Start why_choose
    public function why_choose()
    {
        $whychooses = whychoose::paginate(3);
        return view('admin.settings.whychoose.index', compact('whychooses'));
    }

    public function why_choose_create()
    {
        return view('admin.settings.whychoose.create');
    }

    public function why_choose_store(Request $request)
    {
        $whychoose = $this->validate(request(),[

            'icon' => 'required',
            'title' => 'required|max:25',
            'description' => 'required|min:50|max:130',
        ]);

        $add = new whychoose;
        $add->icon = request('icon');
        $add->title = request('title');
        $add->description = request('description');
        $add->save();

        session()->flash('success', 'Added Successfully');
        return redirect('/admin/settings/why-choose');
    }

    public function why_choose_edit($id)
    {
        $get = whychoose::find($id);
        return view('admin.settings.whychoose.edit', compact('get'));
    }

    public function why_choose_update(Request $request)
    {
        $whychoose = $this->validate(request(),[

            'icon' => 'required',
            'title' => 'required|max:25',
            'description' => 'required|min:50|max:130',
        ]);

        $add = whychoose::find($request->id);
        $add->icon = request('icon');
        $add->title = request('title');
        $add->description = request('description');
        $add->save();


        session()->flash('success', 'Edit Successfully');
        return back();
    }

    public function why_choose_destroy($id)
    {
        whychoose::find($id)->delete();
        session()->flash('success', 'Deleted successfully');
        return back();
    }
    // End why_choose

    // Start Our Founders
    public function our_founders()
    {
        $ourfounders = OurFounders::paginate(3);
        return view('admin.settings.ourfounders.index', compact('ourfounders'));
    }

    public function our_founders_create()
    {
        return view('admin.settings.ourfounders.create');
    }

    public function our_founders_store(Request $request)
    {
        $ourfounders = $this->validate(request(),[

            'image' => 'required',
            'name' => 'required|max:25',
            'job' => 'required|max:25',
        ]);

        if(empty($request->image)){

            $img_name = $request->oldImage;
        }elseif(!empty($request->image)){
             
            $img_name = time() . '.' . $request->image->getClientOriginalExtension();
        }

        $add = new OurFounders;
        $add->image = $img_name;
        $add->name = request('name');
        $add->job = request('job');
        $add->save();

        if(!empty($request->image)){
            
            $request->image->move(public_path('uplaod/settings/ourfounders'), $img_name);
        }

        session()->flash('success', 'Added Successfully');
        return redirect('/admin/settings/our-founders');
    }

    public function our_founders_edit($id)
    {
        $get = OurFounders::find($id);
        return view('admin.settings.ourfounders.edit', compact('get'));
    }

    public function our_founders_update(Request $request)
    {
        $whychoose = $this->validate(request(),[

            //'image' => 'required',
            'name' => 'required|max:25',
            'job' => 'required|max:25',
        ]);

        if(empty($request->image)){

            $img_name = $request->oldImage;
        }elseif(!empty($request->image)){
             
            $img_name = time() . '.' . $request->image->getClientOriginalExtension();
        }

        $add = OurFounders::find($request->id);
        $add->image = $img_name;
        $add->name = request('name');
        $add->job = request('job');
        $add->save();

        if(!empty($request->image)){
            
            $request->image->move(public_path('uplaod/settings/ourfounders'), $img_name);
        }

        session()->flash('success', 'Updated Successfully');
        return back();
    }

    public function our_founders_destroy($id)
    {
        OurFounders::find($id)->delete();
        session()->flash('success', 'Deleted successfully');
        return back();
    }
    // End Our Founders



    public function update(Request $request)
    {
        //
        // return $request->image_story;

        $settings = $this->validate(request(),[

            'title_fixed' => 'required',
            'description_fixed' => 'required',
            'description_footer' => 'required',
            'telephone' => 'required',
            'email' => 'required',
            'copyright_website' => 'required',
            // 'image_story' => 'required',
            'description_story' => 'required',
        ]);


        // Settings::where('id', 1)->update($settings);

        if(empty($request->image_story)){

            $img_name = $request->oldImage;
        }elseif(!empty($request->image_story)){
             
            $img_name = time() . '.' . $request->image_story->getClientOriginalExtension();
        }

        $add = Settings::find(1);
        $add->title_fixed = request('title_fixed');
        $add->description_fixed = request('description_fixed');
        $add->description_footer = request('description_footer');
        $add->telephone = request('telephone');
        $add->email = request('email');
        $add->address = request('address');
        $add->copyright_website = request('copyright_website');
        $add->image_story = $img_name;
        $add->description_story = request('description_story');
        $add->save();

        if(!empty($request->image_story)){
            
            $request->image_story->move(public_path('uplaod/settings'), $img_name);
        }

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
    }
}
