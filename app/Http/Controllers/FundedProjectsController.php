<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FundedProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Retrieve all funded projects
        $fundedProjects = FundedProject::all();

        // Group funded projects by researcher
        $fundedProjects = $fundedProjects->groupBy('researcher');

        return view("admin/projects",[
            "fundedProjects" => $fundedProjects,
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
        // Validating the request input
        $validatedData = $request->validate([
            'researcher' => 'required',
            'role' => 'required',
            'project' => 'required',
            'funding_agency' => 'required',
            'status' => 'required',
            'amount' => 'nullable|numeric',
        ]);

        // Creating a new funded project with mass assignment
        $fundedProject = new FundedProject($request->all());
        $fundedProject->save();

        // Redirecting back with success message
        return redirect()->back()->with('success', $fundedProject->project.' project created successfully.');

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
            #fetching the mou for editing.
            $fundedProject = FundedProject::findOrFail($id);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'message' => 'Unable to find the project.'
            ],404);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'An error occurred'
            ], 500);
        }

        return response()->json([
            'fundedProject' => $fundedProject
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
        // Validating the request input
        $validatedData = $request->validate([
            'researcher' => 'required',
            'role' => 'required',
            'project' => 'required',
            'funding_agency' => 'required',
            'status' => 'required',
            'amount' => 'nullable|numeric',
        ]);

        // Finding the funded project by id
        $fundedProject = FundedProject::find($id);

        // Checking if the funded project exists
        if (!$fundedProject) {
            return redirect()->back()->with('error', 'Funded project not found.');
        }

        // Updating the funded project attributes
        $fundedProject->update($validatedData);

        // Redirecting back with success message
        return redirect()->back()->with('success', $fundedProject->project.' project updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            # Deleting the Funded Project
            $fundedProject = FundedProject::find($id);
            $fundedProject->delete();
        } catch (\ErrorException $e) {
            return response()->json([
                'status' => 'Failed',
                'message' => $e
            ]);
        }
        return response()->json([
            'message' => 'Funded Project deleted successfully'
        ]);   
    }
}
