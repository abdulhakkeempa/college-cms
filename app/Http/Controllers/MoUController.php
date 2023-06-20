<?php

namespace App\Http\Controllers;

use App\Models\MoU;
use Illuminate\Http\Request;

class MoUController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        #fetches all the MoU.
        $MoUs = MoU::all();

        return view("admin/mou",[
            "MoUs" => $MoUs,
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
        #validating the request input.
        $validated = $request->validate([
            'title' => 'required|string',
            'year' => 'required|integer',
            'description' => 'required|string|max:500',
            'logo_img'=> 'image|mimes:png,jpg,jpeg|max:2048',
        ]);

        #creating the event.
        $mou = new MoU($request->all());
        $mou->save();

        if ($request->logo_img){
            #storing the file associated with inside storage/app
            $fileName = $request->logo_img->getClientOriginalName();      
            $filePath = "mou/".$mou->mou_id;      
            $path = $request->logo_img->storeAs($filePath, $fileName,'public');
            $mou->logo_img_path = $path;
            $mou->save();
        }

        return redirect()->back()->with('message', $mou->title.' created successfully.');
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
            $mou = MoU::findOrFail($id);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'message' => 'Unable to find the mou.'
            ],404);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'An error occurred'
            ], 500);
        }

        return response()->json([
            'mou' => $mou
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
        #validating the request input.
        $validated = $request->validate([
            'title' => 'required|string',
            'year' => 'required|integer',
            'description' => 'required|string|max:500',
            'logo_img'=>'image|mimes:png,jpg,jpeg|max:2048',
        ]);

        $mou = MoU::find($id);
        $mou->title = $request->title;
        $mou->year = $request->year;
        $mou->description = $request->description;
        $mou->save();

        if ($request->logo_img){
            # Storing the file associated with the MoU inside storage/app
            $fileName = $request->logo_img->getClientOriginalName();      
            $filePath = "mou/".$mou->mou_id;      
            $path = $request->logo_img->storeAs($filePath, $fileName, 'public');
            $mou->logo_img_path = $path;
        }

        #saving the updates.
        $mou->save();
        return redirect()->back()->with('message', $mou->title.' updated successfully.');
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
            # Deleting the MoU
            $mou = MoU::find($id);

            if ($mou->logo_img_path) {
                Storage::disk('public')->delete($mou->logo_img_path);
            }
            $mou->delete();
        } catch (\ErrorException $e) {
            return response()->json([
                'status' => 'Failed',
                'message' => $e
            ]);
        }
        return response()->json([
            'message' => 'MoU deleted successfully'
        ]);
    }
}
