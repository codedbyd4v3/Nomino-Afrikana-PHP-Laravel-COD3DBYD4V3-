<?php

namespace App\Http\Controllers;

use App\Models\Discography;
use Illuminate\Http\Request;

class DiscographyController extends Controller
{
    //  Get all discography items
    public function index()
    {
        return response()->json(Discography::all(), 200);
    }

    //  Get single discography item
    public function show($id)
    {
        $disc = Discography::find($id);
        if (!$disc) {
            return response()->json(['error' => 'Discography item not found'], 404);
        }
        return response()->json($disc, 200);
    }

    //  Create new discography item
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255|unique:discographies',
            'category' => 'required|in:album,ep,single',
            'cover_image' => 'nullable|string',
            'release_date' => 'nullable|date',
            'description' => 'nullable|string',
            'spotify_url' => 'nullable|string',
            'youtube_url' => 'nullable|string',
            'apple_music_url' => 'nullable|string',
        ]);

        $disc = Discography::create($validated);

        return response()->json([
            'message' => 'Discography item created successfully',
            'disc_id' => $disc->id
        ], 201);
    }

    //  Update discography item
    public function update(Request $request, $id)
    {
        $disc = Discography::find($id);
        if (!$disc) {
            return response()->json(['error' => 'Discography item not found'], 404);
        }

        $validated = $request->validate([
            'title' => 'sometimes|string|max:255|unique:discographies,title,' . $id,
            'category' => 'sometimes|in:album,ep,single',
            'cover_image' => 'nullable|string',
            'release_date' => 'nullable|date',
            'description' => 'nullable|string',
            'spotify_url' => 'nullable|string',
            'youtube_url' => 'nullable|string',
            'apple_music_url' => 'nullable|string',
        ]);

        $disc->update($validated);

        return response()->json([
            'message' => 'Discography item updated successfully',
            'disc_id' => $disc->id
        ], 200);
    }

    //  Delete discography item
    public function destroy($id)
    {
        $disc = Discography::find($id);
        if (!$disc) {
            return response()->json(['error' => 'Discography item not found'], 404);
        }

        $disc->delete();

        return response()->json(['message' => 'Discography item deleted successfully'], 200);
    }
}
