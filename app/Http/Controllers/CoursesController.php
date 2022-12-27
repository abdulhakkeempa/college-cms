<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Courses;


class CoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Courses::all('course_id','course_name',"cover_img_path");
        return view("admin/courses",['courses' => $courses]);
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
            'course_name' => 'required',
            'eligibility' => 'required',
            'course_description' => 'required',
            'year_started'=>'required',
            'duration' => 'required',
            'cover_image' => 'required|image|mimes:png,jpg,jpeg|max:2048',
        ]);
        $imageName = $request->course_name.'.'.$request->cover_image->extension();
        $request->cover_image->move(public_path('images\courses'), $imageName);

        $course = new Courses();
        $course->course_name = $request->course_name;
        $course->eligibility = $request->eligibility;
        $course->course_description = $request->course_description;
        $course->fees = $request->fees;
        $course->year_started = $request->year_started;
        $course->duration = $request->duration;
        $course->cover_img_path = $imageName;
        $course->save();

        return redirect("/courses");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $course = Courses::find($id);
        return $course->toJson();
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
            'course_name' => 'required',
            'eligibility' => 'required',
            'course_description' => 'required',
            'year_started'=>'required',
            'duration' => 'required',
            'cover_image' => 'image|mimes:png,jpg,jpeg|max:2048',
        ]);

        if($request->image){
            $imageName = $request->course_name.'.'.$request->cover_image->extension();
            $request->cover_image->move(public_path('images\courses'), $imageName);
        }

        $course = Courses::find($id);
        $course->course_name = $request->course_name;
        $course->eligibility = $request->eligibility;
        $course->course_description = $request->course_description;
        $course->fees = $request->fees;
        $course->year_started = $request->year_started;
        $course->duration = $request->duration;
        $course->cover_img_path = $imageName;
        $course->save();

        return redirect("/courses");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $course = Courses::find($id);
        $course->delete();

        return response()->json([
            'delete' => 'success'
        ]);
    }
}
