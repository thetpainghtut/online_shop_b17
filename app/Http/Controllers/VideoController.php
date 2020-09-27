<?php

namespace App\Http\Controllers;

use App\Video;
use Illuminate\Http\Request;
use Toolkito\Larasap\SendTo;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $videos = Video::all();
        return view('backend.videos.index',compact('videos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.videos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        

        SendTo::Facebook(
            'link',
            [
                'link' => 'http://heinminhtet.com',
                'message' => 'Hein Min Htet'
            ]
        );
        dd('Youe message send successfully!!');

        // dd(ini_get('post_max_size'));
        // Validation
        $request->validate([
            'video' => 'required|mimes:csv,txt,xlx,xls,pdf,mp4|max:20000'
        ]);

        $video = new Video;

        if($request->file()) {
            $fileName = time().'_'.$request->video->getClientOriginalName();
            $filePath = $request->file('video')->storeAs('videos', $fileName, 'public');

            $path = '/storage/'.$filePath;

            $video->name = time().'_'.$request->video->getClientOriginalName();
            $video->file_path = $path;
            $video->save();

            SendTo::Facebook(
                'video',
                [
                    'video' => public_path($path),
                    'title' => 'Let Me Be Your Lover',
                    'description' => 'Let Me Be Your Lover - Enrique Iglesias'
                ]
            );

            return back()
            ->with('success','File has been uploaded.')
            ->with('file', $fileName);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function show(Video $video)
    {
        return view('backend.videos.show',compact('video'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function edit(Video $video)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Video $video)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function destroy(Video $video)
    {
        //
    }
}
