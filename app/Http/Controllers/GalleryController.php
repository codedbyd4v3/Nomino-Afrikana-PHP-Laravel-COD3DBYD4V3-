<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GalleryController extends Controller
{
    private $allowedCategories = ['performance', 'behind_the_scenes', 'instruments', 'travel'];

    // Add new gallery item
    public function add(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'image_url' => 'required|string',
            'caption' => 'nullable|string',
            'category' => 'nullable|string|in:' . implode(',', $this->allowedCategories),
            'event_id' => 'nullable|exists:events,id',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()->first()], 400);
        }

        $gallery = Gallery::create($validator->validated());
        return response()->json([
            'message' => 'Gallery item created successfully',
            'gallery_id' => $gallery->id
        ], 201);
    }

    // Get all gallery items
    public function all()
    {
        return response()->json(Gallery::all());
    }

    // Get single gallery item
    public function get($id)
    {
        $gallery = Gallery::find($id);
        if (!$gallery) {
            return response()->json(['error' => 'Gallery item not found'], 404);
        }
        return response()->json($gallery);
    }

    // Update gallery item
    public function update(Request $request, $id)
    {
        $gallery = Gallery::find($id);
        if (!$gallery) {
            return response()->json(['error' => 'Gallery item not found'], 404);
        }

        $validator = Validator::make($request->all(), [
            'image_url' => 'nullable|string',
            'caption' => 'nullable|string',
            'category' => 'nullable|string|in:' . implode(',', $this->allowedCategories),
            'event_id' => 'nullable|exists:events,id',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()->first()], 400);
        }

        $gallery->update($validator->validated());
        return response()->json([
            'message' => 'Gallery item updated successfully',
            'gallery_id' => $gallery->id
        ]);
    }

    // Delete gallery item
    public function delete($id)
    {
        $gallery = Gallery::find($id);
        if (!$gallery) {
            return response()->json(['error' => 'Gallery item not found'], 404);
        }

        $gallery->delete();
        return response()->json(['message' => 'Gallery item deleted successfully']);
    }
}
