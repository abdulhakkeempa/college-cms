<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Photos;
use Illuminate\Support\Facades\Validator;



class PhotoController extends Controller
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
        #request validation
        $validated = $request->validate([
            'album_id' => 'required',
            'images' => 'required|array'
        ]);

        #image validation rules.
        $imageRules = array(
            'img' => 'image|mimes:png,jpg,jpeg|max:2048'
        );

        #looping through multiple images.
        foreach($request->images as $image)
        {
            $img = array('img' => $image);
            
            #validating the image.
            $imageValidator = Validator::make($img, $imageRules);

            #check if the validation has failed or not.
            if ($imageValidator->fails()) {
                $messages = $imageValidator->messages();
                return Redirect::to('albums')
                    ->withErrors($messages);
            }

            #storing to albums folder inside storage/app
            $fileName = $image->getClientOriginalName();      
            $filePath = "albums/".$request->album_id;      
            $path = $image->storeAs($filePath, $fileName,'public');

            #create album object
            $photos = new Photos($request->all());
            $photos->photo_file_path = $path;
            $photos->save();
        }

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
        //
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
        //
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
