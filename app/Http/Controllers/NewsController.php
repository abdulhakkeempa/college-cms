<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Events;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        #fetches all the news and events.
        $news = News::all();
        $events = Events::all();

        return view("admin/news",[
            "news" => $news,
            "events" => $events
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
            'news_title' => 'required',
            'file'=>'mimes:pdf|max:10000',
        ]);

        $news = new News($request->all());
        $news->save();

        if ($request->file){
            #storing the file associated with inside storage/app
            $fileName = $request->file->getClientOriginalName();      
            $filePath = "news/".$news->news_id;      
            $path = $request->file->storeAs($filePath, $fileName,'public');
        }
        return redirect('/news');
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
