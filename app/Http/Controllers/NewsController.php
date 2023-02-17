<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Events;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


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
            $news->news_file_path = $path;
            $news->save();
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
        try {
            #fetching the news.
            $news = News::findOrFail($id);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'message' => 'Unable to find the news'
            ],404);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'An error occurred'
            ], 500);
        } 
        return response()->json([
            'news' => $news
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
            'news_title' => 'required',
            'file'=>'mimes:pdf|max:10000',
        ]);

        #fetching the news.
        $news = News::find($id);
        $news->news_title = $request->news_title;
        $news->news_desc = $request->news_desc;
        $news->news_date = $request->news_date;
    
        if ($request->file){
            #storing the file associated with inside storage/app
            $fileName = $request->file->getClientOriginalName();      
            $filePath = "news/".$news->news_id;      
            $path = $request->file->storeAs($filePath, $fileName,'public');

            #deletes the news file, if it exist.
            if($news->news_file_path){
                Storage::disk('public')->delete($news->news_file_path);
            }

            $news->news_file_path = $path;
        }
        $news->save();
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
            #deleting news and its file.
            $news = News::find($id);

            #deletes the news file, if it exist.
            if($news->news_file_path){
                Storage::disk('public')->delete($news->news_file_path);
            }          
              
            $news->delete();
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
