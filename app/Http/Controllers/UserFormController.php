<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;

class UserFormController extends Controller
{
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $validated = $request->validate([
        //     'name' => 'required',
        //     'email' => 'required|email',
        //     'phone_number' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
        //     'designation'=>'required',
        //     'address' => 'required',
        //     'joined_year' => 'required',
        // ]);
        //  Store data in database
        // dump($request->all());
        // var_dump($request->all());
        // var_dump("Hello");
        // dd($request->all());
        // User::create($request->all());

        $user = new User();
        $user->name = $request->user_name;
        $user->email = $request->user_email;
        $user->designation = $request->designation;
        $user->iqac = $request->iqac;
        $user->portfolio = $request->portfolio;
        $user->phone_number = $request->phone_number;
        $user->address = $request->address;
        $user->joined_year=date("Y-m-d",strtotime($request->joined_year));
        $user->save();

        return redirect('/login');
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
        //
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
