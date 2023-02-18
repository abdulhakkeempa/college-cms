<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Awards;
use App\Models\Placments;

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
        return view('admin/placement',[
            'placements' => $placements,
            'awards' => $awards,
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
            'student_name' => 'requried',
            'course_id' => 'required|exists:courses,course_id',
            'batch' => 'required',
            'company' => 'required',
        ]);

        //saving the data after validation.
        $placement = new Placements($request->all());
        $placement->save();

        return redirect("/placements");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $placement = Placement::find($id);
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
            'student_name' => 'requried',
            'course_id' => 'required|exists:courses,course_id',
            'batch' => 'required',
            'company' => 'required',
        ]);

        try{
            //fetching the record from db.
            $placement = Placement::findOrFail($id);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return Redirect::back()->withErrors([
                'message' => 'Unable to find the event'
            ]);
        } catch (\Exception $e) {
            return Redirect::back()->withErrors([
                'message' => 'An error occurred'
            ]);
        }

        //updating the record.
        $placement->student_name = $request->student_name;
        $placement->course_id = $request->course_id;
        $placement->batch = $request->batch;
        $placement->company = $request->company;
        $placement->job_role = $request->job_role;

        //saving the record.
        $placement->save();

        return redirect("/placements");
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
            $placement = Placement::findOrFail($id);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'message' => 'Unable to find the event'
            ],404);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'An error occurred'
            ],500);
        }

        $placement->delete();
        return response()->json([
            'message' => 'Placement deleted successfully'
        ]);
    }
}
