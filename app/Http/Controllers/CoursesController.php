<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProgramStructure;
use App\Models\Timetable;
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

    public function showProgramStructure($id){
        $program_structure = ProgramStructure::find($id);
        return $program_structure->toJson();      
    }

    //to add program structure to a course
    public function addProgramStructure(Request $request)
    {
        $validated = $request->validate([
            'course_id' => 'required|exists:courses,course_id', //foreign key check
            'program_structure_year' => 'required',
            'program_structure_file' => "required|mimes:pdf|max:10000",
        ]);

        $fileName = $request->program_structure_file->getClientOriginalName();

        $request->program_structure_file->move(public_path('uploads\program_structures'), $fileName);


        $programStructure = new ProgramStructure(request()->all());
        $programStructure->file_name=$fileName;
        $programStructure->save();

        return redirect("/courses");
    }

    public function updateProgramStructure(Request $request,$id)
    {
        $validated = $request->validate([
            'course_id' => 'required|exists:courses,course_id', //foreign key check
            'program_structure_year' => 'required',
            'program_structure_file' => "mimes:pdf|max:10000",
        ]);

        $programStructure = ProgramStructure::find($id);
        $programStructure->course_id=$request->course_id;
        $programStructure->program_structure_year=$request->program_structure_year;   

        if($request('program_structure_file')->isValid())
        { 
            $fileName = $request->program_structure_file->getClientOriginalName();
            $request->program_structure_file->move(public_path('uploads\program_structures'), $fileName);
            $programStructure->file_name=$fileName;
        }

        $programStructure->save();

        return redirect("/courses");
    }

    public function deleteProgramStructure($id){
        $program_structure = ProgramStructure::find($id);
        $program_structure->delete();
    }

    //timetable
    public function showTimetable($id){
        $timetable = Timetable::find($id);
        return $timetable->toJson();      
    }

    public function addTimetable(Request $request)
    {
        $validated = $request->validate([
            'course_id' => 'required|exists:courses,course_id', //foreign key check
            'semester' => 'required',
            'timetable_file' => "required|mimes:pdf|max:10000",
        ]);

        $fileName = $request->timetable_file->getClientOriginalName();

        $request->timetable_file->move(public_path('uploads\timetable'), $fileName);

        $timetable = new Timetable(request()->all());
        $timetable->file_name=$fileName;
        $timetable->save();

        return redirect("/courses");
    }

    public function updateTimetable(Request $request)
    {
        $validated = $request->validate([
            'course_id' => 'required|exists:courses,course_id', //foreign key check
            'semester' => 'required',
            'timetable_file' => "mimes:pdf|max:10000",
        ]);

        $timetable = Timetable::find($id);
        $timetable->course_id=$request->course_id;
        $timetable->semester=$request->semester;   

        if($request('timetable_file')->isValid())
        { 
            $fileName = $request->timetable_file->getClientOriginalName();
            $request->timetable_file->move(public_path('uploads\timetable'), $fileName);
            $timetable->file_name=$fileName;
        }

        $timetable->save();
        return redirect("/courses");
    }

    public function deleteTimetable($id){
        $timetable = Timetable::find($id);
        $timetable->delete();
    }
}
