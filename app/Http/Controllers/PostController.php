<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Post;
use App\BlogComment;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::get();
        $categories = Category::get();
        return view('admin.blog.post.index', compact('posts', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::get();
        return view('admin.blog.post.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = $this->validate(request(), [
            'image' => 'required|image',
            'title' => 'required|min:6|max:191',
            'description' => 'required',
        ]);

        $img_name = time() . '.' . $request->image->getClientOriginalExtension();

        $add = new Post();
        $add->image = $img_name;
        $add->title = request('title');
        $add->description = request('description');
        $add->category_id = request('category_id');
        $add->save();

        $request->image->move(public_path('uplaod/posts'), $img_name);

        session()->flash('success', 'Successfully added');
        return redirect('admin/blog/posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $name_category = Category::where('id', $post->category_id)->first();
        return view('admin.blog.post.show', compact('post', 'name_category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::get()->find($id);
        $categories = Category::get();
        return view('admin.blog.post.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $post = $this->validate(request(), [
            // 'image' => 'required|image',
            'title' => 'required|min:6|max:191',
            'description' => 'required',
        ]);

        if (empty($request->image)) {

            $img_name = $request->oldImage;
        } elseif (!empty($request->image)) {

            $img_name = time() . '.' . $request->image->getClientOriginalExtension();
        }

        $add = Post::find($request->id);
        $add->image = $img_name;
        $add->title = request('title');
        $add->description = request('description');
        $add->category_id = request('category_id');
        $add->save();

        if (!empty($request->image)) {

            $request->image->move(public_path('uplaod/posts'), $img_name);
        }

        session()->flash('success', 'Updated Successfully');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::find($id)->delete();
        session()->flash('success', 'Deleted successfully');
        return back();
    }

    public function comment_destroy($id)
    {
        BlogComment::find($id)->delete();
        session()->flash('success', 'Deleted successfully');
        return back();
    }
}
