<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Video;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $videos = Video::query()
            ->when($request->query('genre'), function ($query, $genre) {
                $query->where('genre', $genre);
            })
            ->orderByDesc('rating')
            ->paginate(10);

        return response()->json($videos, 200);
    }

    public function show(Video $video): JsonResponse
    {
        return response()->json([
            'data' => $video,
        ], 200);
    }

    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'genre' => ['nullable', 'string', 'max:255'],
            'duration_minutes' => ['required', 'integer', 'min:1'],
            'thumbnail_url' => ['nullable', 'string', 'max:255'],
            'video_url' => ['required', 'string', 'max:255'],
            'rating' => ['nullable', 'numeric', 'min:0', 'max:5'],
            'album_number' => ['required', 'string', 'max:50'],
        ]);

        if (!isset($validated['rating'])) {
            $validated['rating'] = 0;
        }

        $video = Video::create($validated);

        return response()->json([
            'message' => 'Video created successfully',
            'data' => $video,
        ], 201);
    }
}
