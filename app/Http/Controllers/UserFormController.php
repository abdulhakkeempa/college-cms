<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;


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
            'account_type' => 'required',
            'joined_year' => 'required',
            'profile_picture' => 'required|image|mimes:png,jpg,jpeg|max:2048'
        ]);

        //storing the profile picture of user in storage/app/public/users.
        $imageName = $request->user_name.'.'.$request->profile_picture->extension();
        $filePath = "users";
        $path = $request->profile_picture->storeAs($filePath, $imageName,'public');

        $user = new User();
        $user->name = $request->user_name;
        $user->email = $request->user_email;
        $user->designation = $request->designation;
        $user->iqac = $request->iqac;
        $user->portfolio = $request->portfolio;
        $user->phone_number = $request->phone_number;
        $user->address = $request->address;
        $user->acc_type = $request->account_type;
        $user->profile_picture = $path;
        $user->joined_year=date("Y-m-d",strtotime($request->joined_year));
        $user->save();

        if ($request->account_type == "Teacher"){
            // $faculty = DB::table('roles')->where('name', 'faculty')->first();
            $user->assignRole('faculty');
        } elseif ($request->account_type == "Office Staff"){
            // $staff = DB::table('roles')->where('name', 'office staff')->first();
            $user->assignRole("office staff");
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
        $validated = $request->validate([
            'user_name' => 'required',
            'user_email' => 'required|email',
            'phone_number' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'designation'=>'required',
            'address' => 'required',
            'joined_year' => 'required',
            'account_type' => 'required',
            'profile_picture' => 'image|mimes:png,jpg,jpeg|max:2048'
        ]);

        $user = User::find($id);
        $user->name = $request->user_name;
        $user->email = $request->user_email;
        $user->designation = $request->designation;
        $user->iqac = $request->iqac;
        $user->portfolio = $request->portfolio;
        $user->phone_number = $request->phone_number;
        $user->address = $request->address;
        $user->acc_type = $request->account_type;
        $user->joined_year=date("Y-m-d",strtotime($request->joined_year));

        if($request->profile_picture){
            Storage::disk('public')->delete($user->profile_picture);
            $imageName = $request->user_name.'.'.$request->profile_picture->extension();
            $filePath = "users";      
            $path = $request->profile_picture->storeAs($filePath, $imageName,'public'); 
            $user->cover_img_path = $path;
        }


        $user->save();        
        return redirect('/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        // redirect
        // Session::flash('message', 'Successfully deleted the shark!');
        // return redirect('/users');
        response()->json([
            'delete' => 'success'
        ]);
    }
    public function changePassword(Request $request){
        if (Hash::check($request->old_password, auth()->user()->password)){
            User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);
            return redirect('/profile');
        } else{
            return Redirect::back()->withErrors(['msg' => 'Old Password does not match']);       
        }
    }
}
