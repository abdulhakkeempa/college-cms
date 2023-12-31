<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Album;
use App\Models\AlbumCover;



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
        #validation
        $validated = $request->validate([
            'album_title' => 'required|max:100',
        ]);

        #create album object
        $album = new Album();
        $album->album_title = $request->album_title;
        $album->save();

        #creating album cover object.
        $albumCover = new AlbumCover();
        $albumCover->album_id = $album->album_id;
        $albumCover->save();

        return redirect()->back()->with('message', $album->album_title.' album created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        #useless code
        try {
            $album = Album::find($id);
        } catch (\ErrorException $e) {
            return response()->json([
                'status' => 404,
                'message' => "Album does not exist",        
            ],404);
        }
        $photos = $album->getPhotos;
        return response()->json([
            'album' => $album,
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
        try {
            $album = Album::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'status' => 404,
                'message' => "Album does not exist",        
            ],404);
        }
        return response()->json([
            'album' => $album
        ]);   
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
            'album_title' => 'required|max:100',
        ]);

        #fetch object using id
        $album = Album::find($id);
        $album->album_title = $request->album_title;

        #updating the object
        $album->save();
        return redirect()->back()->with('message', $album->album_title.' album updated successfully.');
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
            $album = Album::find($id);
            $album->delete();
        } catch(\ErrorException $e){
            return response()->json([
                "message" => "Some error has occured"
            ],404);
        }
        return response()->json([
            "message" => "Successfully deleted the album."
        ]);
    }


    /**
     * Sets cover photo for the specified album.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $album_id
     * @return \Illuminate\Http\Response
     */
    public function setCoverPhoto(Request $request,$album_id)
    {
        try{
            $albumCover = AlbumCover::find($album_id);
        } catch(\ErrorException $e){
            return response()->json([
                "message" => "Some error has occured"
            ],404);
        }

        #updating the album cover object.
        $albumCover->photo_id = $request->photo_id;
        $albumCover->save();

        return response()->json([
            "message" => "Successfully updated the album cover.",
        ]);
    }
}
