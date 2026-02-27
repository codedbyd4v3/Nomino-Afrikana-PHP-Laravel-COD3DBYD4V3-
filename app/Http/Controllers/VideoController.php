<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    //  Create a new video
    public function add(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'thumbnail' => 'nullable|string|max:255',
            'youtube_url' => 'nullable|string|max:255',
            'description' => 'nullable|string',
        ]);

        $video = Video::create($validated);

        return response()->json([
            'message' => 'Video added successfully',
            'video_id' => $video->id
        ]);
    }

    //  Get all videos
    public function all()
    {
        $videos = Video::all();
        return response()->json($videos);
    }

    //  Get a single video
    public function get($id)
    {
        $video = Video::find($id);

        if (!$video) {
            return response()->json(['detail' => 'Video not found'], 404);
        }

        return response()->json($video);
    }

    //  Update a video
    public function update(Request $request, $id)
    {
        $video = Video::find($id);

        if (!$video) {
            return response()->json(['detail' => 'Video not found'], 404);
        }

        $validated = $request->validate([
            'title' => 'sometimes|string|max:255',
            'thumbnail' => 'sometimes|string|max:255',
            'youtube_url' => 'sometimes|string|max:255',
            'description' => 'sometimes|string|nullable',
        ]);

        $video->update($validated);

        return response()->json([
            'message' => 'Video updated successfully',
            'video_id' => $video->id
        ]);
    }

    //  Delete a video
    public function delete($id)
    {
        $video = Video::find($id);

        if (!$video) {
            return response()->json(['detail' => 'Video not found'], 404);
        }

        $video->delete();

        return response()->json(['message' => 'Video deleted successfully']);
    }
}
