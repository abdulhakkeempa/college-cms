<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


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
            $users = User::all();
            return view('admin/users', ['users' =>$users]);
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
        $validated = $request->validate([
            'user_name' => 'required',
            'user_email' => 'required|email',
            'phone_number' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'designation'=>'required',
            'address' => 'required',
            'joined_year' => 'required',
        ]);
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

        if ($request->account_type == "Teacher"){
            // $faculty = DB::table('roles')->where('name', 'faculty')->first();
            $user->assignRole('faculty');
        } elseif ($request->account_type == "Office Staff"){
            // $staff = DB::table('roles')->where('name', 'office staff')->first();
            $user->assignRole("staff");
        }elseif ($request->account_type == "Admin"){
            // $admin = DB::table('roles')->where('name', 'Super-Admin')->first();
            $user->assignRole("Super-Admin");
        }

        // return back()->with('success', 'User Create Successfully');
        return redirect('/users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return $user->toJson();
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
