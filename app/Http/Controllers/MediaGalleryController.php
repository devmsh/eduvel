<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MediaGallery;

class MediaGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $media_gallery = MediaGallery::get();
        return view('admin.mediagallery.index', compact('media_gallery'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.mediagallery.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $media_gallery = $this->validate(request(),[

            'title' => 'required|max:25',
            'image' => 'required',
            'category' => 'required',
        ]);

        if(!empty($request->image)){
             
            $img_name = time() . '.' . $request->image->getClientOriginalExtension();
        }

        $add = new MediaGallery;
        $add->title = request('title');
        $add->image = $img_name;
        $add->category = request('category');
        $add->save();

        if(!empty($request->image)){
            
            if (request('category') == 'videos') {
                $request->image->move(public_path('uplaod/mediagallery/videos'), $img_name);
            }elseif (request('category') == 'pictures') {
                $request->image->move(public_path('uplaod/mediagallery/pictures'), $img_name);
            }else{
                return redirect('/not-found');
            }

        }

        session()->flash('success', 'Added Successfully');
        return redirect('/admin/media-gallery');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $media_gallery = MediaGallery::where('id', $id)->first();
        return view('admin.mediagallery.show',compact('media_gallery'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $media_gallery = MediaGallery::get()->find($id);
        return view('admin.mediagallery.edit',compact('media_gallery'));
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

        $media_gallery = $this->validate(request(),[

            'title' => 'required|max:25',
            'category' => 'required',
        ]);

        
        if(!empty($request->image)){
             
            $img_name = time() . '.' . $request->image->getClientOriginalExtension();
        }elseif(empty($request->image)){

            $img_name = $request->oldimage;
        }

        $add = MediaGallery::get()->find($request->id);
        $add->title = $request->title;
        $add->image = $img_name;
        $add->category = $request->category;
        $add->save();

        if(!empty($request->image)){
            
            $request->image->move(public_path('uplaod/mediagallery'), $img_name);

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
        MediaGallery::find($id)->delete();
        session()->flash('success', 'Deleted successfully');
        return redirect('/admin/media-gallery');
    }
}
