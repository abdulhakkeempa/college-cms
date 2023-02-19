<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProgramStructure;
use App\Models\Timetable;
use App\Models\Courses;

use Illuminate\Support\Facades\Storage;

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

        //storing the course cover image in storage/app/public/courses.
        $imageName = $request->course_name.'.'.$request->cover_image->extension();
        $filePath = "courses";
        $path = $request->cover_image->storeAs($filePath, $imageName,'public');

        //saving the course data to db.
        $course = new Courses();
        $course->course_name = $request->course_name;
        $course->eligibility = $request->eligibility;
        $course->course_description = $request->course_description;
        $course->fees = $request->fees;
        $course->year_started = $request->year_started;
        $course->duration = $request->duration;
        $course->cover_img_path = $path;
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
        return $course->toJson(JSON_PRETTY_PRINT);
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

        //fetching the course and updating the values.
        $course = Courses::find($id);
        $course->course_name = $request->course_name;
        $course->eligibility = $request->eligibility;
        $course->course_description = $request->course_description;
        $course->fees = $request->fees;
        $course->year_started = $request->year_started;
        $course->duration = $request->duration;

        //if an image is present with the request then the image will be replaced in db.
        if($request->cover_image){
            Storage::disk('public')->delete($course->cover_img_path);
            $imageName = $request->course_name.'.'.$request->cover_image->extension();
            $filePath = "courses";      
            $path = $request->cover_image->storeAs($filePath, $imageName,'public'); 
            $course->cover_img_path = $path;
        }

        //saving the updated values.
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

        /*
            check if the course has any associated placements/awards,
            in that case, soft delete the course or else it will
            affect the placement and awards table.
        */
        if(count($course->getPlacements)>0 || count($course->getAwards)>0 ){
            //this will hide the course from frontend, but remains on the database.
            $course->is_continued = 0;
            $course->save();
            return response()->json([
                'status' => 'Success',
                'type' => 'Soft Delete'
            ]);
        }

        //deleting the cover image from the public disk.
        Storage::disk('public')->delete($course->cover_img_path);

        //delete the course, if it has no placement or awards.
        $course->delete();

        return response()->json([
            'status' => 'Success',
            'type' => 'Hard Delete'
        ]);
    }

    public function getCourseDetails($id){
        $program_structure = Courses::find($id)->program_strucuture;
        $timetable = Courses::find($id)->timetable;
        return response()->json([
            'program_structure' => $program_structure,
            'timetable' => $timetable,
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

        $programStructure = new ProgramStructure(request()->all());
        $path = $request->file('program_structure_file')->storeAs('program_structures', $fileName,'public');

        $programStructure->file_name=$path;
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

        $path = $request->file('timetable_file')->storeAs('timetables', $fileName,'public');

        $timetable = new Timetable(request()->all());
        $timetable->file_name=$path;
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
