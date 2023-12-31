<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Phd;

class PhdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $phds = Phd::all();
        return view('admin/phd',["phds" => $phds]);
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
            'scholar_name' => 'required|max:255',
            'title' => 'required|max:500',
            'guide' => 'required|max:255',
            'awarded_date' => 'required|date',
        ]);

        $phd = new Phd($request->all());
        $phd->save();
        return redirect()->back()->with('message', $phd->scholar_name.' added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $phd = Phd::find($id);
        return $phd->toJson();
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
            'scholar_name' => 'required|max:255',
            'title' => 'required|max:500',
            'guide' => 'required|max:255',
            'awarded_date' => 'required|date',
        ]);

        $phd = Phd::find($id);
        $phd->scholar_name = $request->scholar_name;
        $phd->title = $request->title;
        $phd->guide = $request->guide;
        $phd->awarded_date = $request->awarded_date;
        $phd->save();

        return redirect()->back()->with('message', $phd->scholar_name.' updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $phd = Phd::find($id);

        try {
            $phd->delete();
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'An error occurred',
                "error" => $e
            ],500);
        }

        return response()->json([
            'message' => 'PhD deleted successfully'
        ]);
    }
}
