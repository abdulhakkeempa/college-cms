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
            'scholar_name' => 'required',
            'title' => 'required',
            'guide' => 'required',
            'awarded_date'=>'required',
        ]);

        $phd = new Phd($request->all());
        $phd->save();
        return redirect('/phd');
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
            'scholar_name' => 'required',
            'title' => 'required',
            'guide' => 'required',
            'awarded_date'=>'required',
        ]);

        $phd = Phd::find($id);
        $phd->scholar_name = $request->scholar_name;
        $phd->title = $request->title;
        $phd->guide = $request->guide;
        $phd->awarded_date = $request->awarded_date;
        $phd->save();

        return redirect('/phd');
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
        $phd->delete();
    }
}
