<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Awards;
use App\Models\Placements;
use App\Models\Courses;
use Validator;

 
class PlacementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // fetch the award and placement details to load to a single page.
        $placements = Placements::all();
        $awards = Awards::all();
        $courses = Courses::all('course_id','course_name');

        return view('admin/placement',[
            'placements' => $placements,
            'awards' => $awards,
            'courses' => $courses,
        ]);
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
        //validating the input data.
        $validated = $request->validate([
            'placement_student_name' => 'required|max:255',
            'placement_course_id' => 'required|exists:courses,course_id',
            'placement_batch' => 'required|max:255',
            'placement_company' => 'required|max:255',
            'placement_job_role' => 'nullable|max:255',
        ]);

        //saving the data after validation.
        $placement = new Placements();
        $placement->student_name = $request->placement_student_name;
        $placement->course_id = $request->placement_course_id;
        $placement->batch = $request->placement_batch;
        $placement->company = $request->placement_company;
        $placement->job_role = $request->placement_job_role;
        $placement->save();

        return redirect()->back()->with('placement-message', $placement->student_name.' added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            //fetching the placement record from db.
            $placement = Placements::findOrFail($id);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'message' => 'Unable to find the placement'
            ],404);    
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'An error occurred'
            ],500);
        }

        return response()->json([
            "placement" => $placement
        ]);
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
        //validating the input data.
        $validated = $request->validate([
            'placement_student_name' => 'required|max:255',
            'placement_course_id' => 'required|exists:courses,course_id',
            'placement_batch' => 'required|max:255',
            'placement_company' => 'required|max:255',
            'placement_job_role' => 'nullable|max:255',
        ]);

        try{
            //fetching the record from db.
            $placement = Placements::findOrFail($id);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return Redirect::back()->withErrors([
                'message' => 'Unable to find the placement.'
            ]);
        } catch (\Exception $e) {
            return Redirect::back()->withErrors([
                'message' => 'An error occurred'
            ]);
        }

        //updating the record.
        $placement->student_name = $request->placement_student_name;
        $placement->course_id = $request->placement_course_id;
        $placement->batch = $request->placement_batch;
        $placement->company = $request->placement_company;
        $placement->job_role = $request->placement_job_role;

        //saving the record.
        $placement->save();

        return redirect()->back()->with('placement-message', $placement->student_name.' updated successfully');
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
            $placement = Placements::findOrFail($id);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'message' => 'Unable to find the placement'
            ],404);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'An error occurred'
            ],500);
        }

        //deleting the record.
        $placement->delete();
        return response()->json([
            'message' => 'Placement deleted successfully'
        ]);
    }
}
