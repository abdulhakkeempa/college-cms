<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Album;


class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        #fetches all the instances of album
        $albums = Album::all();
        return view("admin/photos",['albums' => $albums]);
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
        // dd($request->album_title);
        #validation
        $validated = $request->validate([
            'album_title' => 'required',
        ]);

        #create album object
        $album = new Album();
        $album->album_title = $request->album_title;
        $album->save();

        return redirect("/photos");
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
            $photos = Album::find($id)->getPhotos;
        } catch (\ErrorException $e) {
            return response()->json([
                'status' => 404,
                'message' => "Album does not exist",        
            ],404);
        }

        return response()->json([
            'photos' => $photos        
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
        #validation
        $validated = $request->validate([
            'album_name' => 'required',
        ]);

        #fetch object using id
        $album = Album::find($id);
        $album->album_name = $request->album_name;
        $album->album_cover_image = $request->album_cover_image;

        #updating the object
        $album->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $album = Album::find($id);
        $album->delete();
    }
}
