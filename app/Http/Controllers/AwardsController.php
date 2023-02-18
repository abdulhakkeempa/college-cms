<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Awards;

class AwardsController extends Controller
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
        //validating the input data.
        $validated = $request->validate([
            'student_name' => 'requried',
            'course_id' => 'required|exists:courses,course_id',
            'batch' => 'required',
        ]);

        //saving the data after validation.
        $award = new Awards($request->all());
        $award->save();

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
        try {
            //fetching the award record from db.
            $award = Awards::findOrFail($id);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'message' => 'Unable to find the award'
            ],404);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'An error occurred'
            ],500);
        }
        return response()->json([
            "award" => $award
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
        ]);

        try{
            //fetching the record from db.
            $award = Awards::findOrFail($id);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return Redirect::back()->withErrors([
                'message' => 'Unable to find the award'
            ]);
        } catch (\Exception $e) {
            return Redirect::back()->withErrors([
                'message' => 'An error occurred'
            ]);
        }

        //updating the record.
        $award->student_name = $request->student_name;
        $award->course_id = $request->course_id;
        $award->batch = $request->batch;
        $award->award_desc = $request->award_desc;


        //saving the record.
        $award->save();

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
        //
    }
}
