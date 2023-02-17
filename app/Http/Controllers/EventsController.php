<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Events;

class EventsController extends Controller
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
        #validating the request input.
        $validated = $request->validate([
            'event_title' => 'required',
            'cover_img'=> 'image|mimes:png,jpg,jpeg|max:2048',
        ]);

        #creating the event.
        $event = new Events($request->all());
        $event->save();

        if ($request->cover_img){
            #storing the file associated with inside storage/app
            $fileName = $request->cover_img->getClientOriginalName();      
            $filePath = "events/".$event->event_id;      
            $path = $request->cover_img->storeAs($filePath, $fileName,'public');
            $event->cover_img = $path;
            $event->save();
        }

        return redirect("/news");
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
        #validating the request input.
        $validated = $request->validate([
            'event_title' => 'required',
            'cover_img'=>'image|mimes:png,jpg,jpeg|max:2048',
        ]);

        #updating the event.
        $event = Events::find($id);
        $event->event_title = $request->event_title;
        $event->event_desc = $request->event_desc;
        $event->event_date = $request->event_date;
        $event->cover_img_id = $request->cover_img_id;

        if ($request->cover_img){
            #storing the cover image of event inside storage/app
            $fileName = $request->cover_img->getClientOriginalName();      
            $filePath = "events/".$event->event_id;      
            $path = $request->cover_img->storeAs($filePath, $fileName,'public');
            $event->cover_img = $path;
        }

        $event->save();
        return redirect("/news");
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
            #deleting the event
            $event = Events::find($id);
            Storage::disk('public')->delete($event->cover_img);
            $event->delete();
        } catch (\ErrorException $e) {
            return response()->json([
                'status' => 'Failed'
            ]);
        }
        return response()->json([
            'status' => 'Success'
        ]);            
    }
}
