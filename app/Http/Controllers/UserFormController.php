<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Validator;


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
            'user_name' => 'required|max:255',
            'user_email' => 'required|email',
            'phone_number' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'designation' => 'required|max:255',
            'address' => 'required|max:1000',
            'account_type' => 'required|max:255',
            'iqac' => 'nullable|url|max:255',
            'portfolio' => 'nullable|url|max:255',
            'joined_year' => 'required|date',
            'profile_picture' => 'required|image|mimes:png,jpg,jpeg|max:2048',
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

        try {
            $user->save();
        } catch (\Illuminate\Database\QueryException $e) {
            return Redirect::back()->withErrors(['msg' => "The email address '{$request->user_email}' is already in use."]);       
        }

        if ($request->account_type == "Teacher"){
            // $faculty = DB::table('roles')->where('name', 'faculty')->first();
            $user->assignRole('Faculty');
        } elseif ($request->account_type == "Office Staff"){
            // $staff = DB::table('roles')->where('name', 'office staff')->first();
            $user->assignRole("Office-Staff");
        }elseif ($request->account_type == "Admin"){
            // $admin = DB::table('roles')->where('name', 'Super-Admin')->first();
            $user->assignRole("Super-Admin");
        }

        // return back()->with('success', 'User Create Successfully');
        return redirect()->back()->with('message', 'Successfully Created New User');
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
            'user_name' => 'required|max:255',
            'user_email' => 'required|email',
            'phone_number' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'designation' => 'required|max:255',
            'address' => 'required|max:1000',
            'account_type' => 'required|max:255',
            'iqac' => 'nullable|url|max:255',
            'portfolio' => 'nullable|url|max:255',
            'joined_year' => 'required|date',
            'profile_picture' => 'required|image|mimes:png,jpg,jpeg|max:2048',
        ]);

        $user = User::find($id);
        $user_acc_type = $user->acc_type; #user account type before updation.
        $user->acc_type = $request->account_type;
        $user->name = $request->user_name;
        $user->email = $request->user_email;
        $user->designation = $request->designation;
        $user->iqac = $request->iqac;
        $user->portfolio = $request->portfolio;
        $user->phone_number = $request->phone_number;
        $user->address = $request->address;
        $user->joined_year=date("Y-m-d",strtotime($request->joined_year));

        if($request->profile_picture){
            try {
                if ($user->profile_picture){
                    Storage::disk('public')->delete($user->profile_picture);
                }            
            } catch (Exception $e) {
                return Redirect::back()->withErrors(['msg' => $e]);       
            }
            $imageName = $request->user_name.'.'.$request->profile_picture->extension();
            $filePath = "users";      
            $path = $request->profile_picture->storeAs($filePath, $imageName,'public'); 
            $user->profile_picture = $path;
        }

        #removing the previous role of user.
        if ($request->account_type != $user_acc_type) {
            if ($user_acc_type == "Teacher") {
                $user->removeRole('Faculty');
            } else if ($user_acc_type == "Office Staff"){
                $user->removeRole('Office-Staff');
            } else if ($user_acc_type == "Admin"){
                $user->removeRole("Super-Admin");
            }
        }

        #assigning new role to user.
        if ($request->account_type == "Teacher"){
            $user->assignRole('Faculty');
        } elseif ($request->account_type == "Office Staff"){
            $user->assignRole("Office-Staff");
        }elseif ($request->account_type == "Admin"){
            $user->assignRole("Super-Admin");
        }

        try {
            $user->save();
        } catch (\Illuminate\Database\QueryException $e) {
            return Redirect::back()->withErrors(['msg' => "The email address '{$request->user_email}' is already in use."]);       
        }
        
        return redirect()->back()->with('message', $user->name.' updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            //fetching the record from db.
            $user = User::findOrFail($id);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'message' => 'Unable to find the user'
            ],404);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'An error occurred'
            ],500);
        }

        Storage::disk('public')->delete($user->profile_picture);

        //deleting the record.
        $user->delete();
        if (request()->expectsJson()) {
            // Return JSON response for AJAX request
            return response()->json([
                'message' => 'User deleted successfully'
            ]);
        } else {
            // Redirect back with flash message for non-AJAX request
            return redirect()->back()->with('message', 'User deleted successfully');
        }
    }

    public function changePassword(Request $request){
        #password strength validation
        $validator = Validator::make($request->all(), [
            'old_password' => 'required',
            'new_password' => 'required|string|min:8|different:old_password|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[^A-Za-z\d])[\s\S]+$/',
        ]);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

    
        if (Hash::check($request->old_password, auth()->user()->password)){
            User::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);
            return redirect()->back()->with('message', 'Password updated successfully');
        } else {
            return Redirect::back()->withErrors(['msg' => 'Old Password does not match']);       
        }
    }

    public function updateProfile(Request $request)
    {
        $validated = $request->validate([
            'user_name' => 'required|max:255',
            'user_email' => 'required|email',
            'phone_number' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'designation'=>'required|max:255',
            'address' => 'required|max:1000',
            'iqac' => 'nullable|url|max:255',
            'portfolio' => 'nullable|url|max:255',
            'joined_year' => 'required|date',
            'profile_picture' => 'image|mimes:png,jpg,jpeg|max:2048'
        ]);

        $user = Auth::user(); #fetches the current authenticated user.
        $user->name = $request->user_name;
        $user->email = $request->user_email;
        $user->designation = $request->designation;
        $user->iqac = $request->iqac;
        $user->portfolio = $request->portfolio;
        $user->phone_number = $request->phone_number;
        $user->address = $request->address;
        $user->joined_year=date("Y-m-d",strtotime($request->joined_year));

        if($request->profile_picture){
            try {
                if ($user->profile_picture){
                    Storage::disk('public')->delete($user->profile_picture);
                }
            } catch (Exception $e) {
                return Redirect::back()->withErrors(['msg' => $e]);       
            }
            $imageName = $request->user_name.'.'.$request->profile_picture->extension();
            $filePath = "users";      
            $path = $request->profile_picture->storeAs($filePath, $imageName,'public'); 
            $user->profile_picture = $path;
        }

        try {
            $user->save();
        } catch (\Illuminate\Database\QueryException $e) {
            return Redirect::back()->withErrors(['msg' => "The email address '{$request->user_email}' is already in use."]);       
        }

        return redirect()->back()->with('message', 'Profile updated successfully');
    }
}
