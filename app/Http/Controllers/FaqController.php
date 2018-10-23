<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Faq;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faqs = Faq::get();
        return view('admin.faqs.index', compact('faqs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.faqs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $faq = $this->validate(request(), [
            'title' => 'required',
            'content' => 'required',
            'category_faq' => 'required',
        ]);

        $add = new Faq();
        $add->title = request('title');
        $add->content = request('content');
        $add->category_faq = request('category_faq');
        $add->save();

        session()->flash('success', 'Successfully added');
        return redirect('admin/faqs');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $faq = Faq::where('id', $id)->first();
        return view('admin.faqs.show', compact('faq'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $faq = Faq::get()->find($id);
        return view('admin.faqs.edit', compact('faq'));
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
        $faq = $this->validate(request(), [
            'title' => 'required',
            'content' => 'required',
            'category_faq' => 'required',
        ]);

        $add = Faq::find($request->id);
        $add->title = request('title');
        $add->content = request('content');
        $add->category_faq = request('category_faq');
        $add->save();

        session()->flash('success', 'Successfully Updated');
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
        Faq::find($id)->delete();
        session()->flash('success', 'Deleted successfully');
        return back();
    }
}
