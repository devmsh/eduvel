<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CourseCategory;

class CourseCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $course_categorys = CourseCategory::get();
        return view('admin.coursecategorys.index', compact('course_categorys'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $course_categorys = $this->validate(request(),[

            'name' => 'required',
            'image' => 'required',
        ]);

        if(!empty($request->image)){
             
            $img_name = time() . '.' . $request->image->getClientOriginalExtension();
        }

        $add = new CourseCategory;
        $add->name = request('name');
        $add->image = $img_name;
        $add->save();

        if(!empty($request->image)){

            $request->image->move(public_path('uplaod/coursecategorys/'), $img_name);
        }

        session()->flash('success', 'Added Successfully');
        return redirect('/admin/courses-categories');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $course_categorys = CourseCategory::where('id', $id)->first();
        return view('admin.coursecategorys.show',compact('course_categorys'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   public function edit($id)
    {
        $course_categorys = CourseCategory::get()->find($id);
        return view('admin.coursecategorys.edit',compact('course_categorys'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $course_categorys = $this->validate(request(),[

            'name' => 'required',
        ]);

        
        if(!empty($request->image)){
             
            $img_name = time() . '.' . $request->image->getClientOriginalExtension();
        }elseif(empty($request->image)){

            $img_name = $request->oldimage;
        }

        $add = CourseCategory::get()->find($request->id);
        $add->name = $request->name;
        $add->image = $img_name;
        $add->save();

        if(!empty($request->image)){
            
            $request->image->move(public_path('uplaod/coursecategorys'), $img_name);

        }

        session()->flash('success', 'Updated Successfully');
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
        CourseCategory::find($id)->delete();
        session()->flash('success', 'Deleted successfully');
        return redirect('/admin/courses-categories');
    }
}
