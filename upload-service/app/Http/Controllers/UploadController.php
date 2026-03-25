<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function upload(Request $request)
    {
        $request->validate([
            'video' => 'required|file|mimes:mp4,mkv,mov|max:512000'
        ]);

        $path = $request->file('video')->store('videos', 'public');

        $videoId = uniqid('vid_');

        return response()->json([
            'video_id' => $videoId,
            'video_url' => asset('storage/' . $path)
        ]);
    }
}
