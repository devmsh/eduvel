<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Admission;

class AdmissionController extends Controller
{

    public function admission()
    {
        return view('website.admission');
    }

    public function admission_post(Request $Request)
    {

        $this->validate(request(), [

            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'telephone' => 'required',
            'age' => 'required',
            'educational_status' => 'required',
            'education_level' => 'required',
            'gender' => 'required',
            'address' => 'required',
            'city' => 'required',
            'zipcode' => 'required',
            'country' => 'required',
            /*'preferences' =>  'required',*/
            'messagere_here' => 'required',
            'terms' => 'required',
        ]);

        $add = new Admission();
        $add->firstname = request('firstname');
        $add->lastname = request('lastname');
        $add->email = request('email');
        $add->password = request('password');
        $add->telephone = request('telephone');
        $add->age = request('age');
        $add->educational_status = request('educational_status');
        $add->education_level = request('education_level');
        $add->gender = request('gender');
        $add->address = request('address');
        $add->city = request('city');
        $add->zipcode = request('zipcode');
        $add->country = request('country');
        $add->preferences = 'null';
        $add->messagere_here = request('messagere_here');
        $add->terms = request('terms');
        $add->save();

        /* Done  */
        auth()->attempt(['email' => request('email'), 'password' => request('password')], true);
        return redirect('/admin');

        return request();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    }
}
