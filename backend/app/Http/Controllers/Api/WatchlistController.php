<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Watchlist;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class WatchlistController extends Controller
{
    public function index(): JsonResponse
    {
        $userId = 1;

        $items = Watchlist::query()
            ->with('video')
            ->where('user_id', $userId)
            ->latest()
            ->get();

        return response()->json([
            'data' => $items,
        ], 200);
    }

    public function store(Request $request): JsonResponse
    {
        $userId = 1;

        $validated = $request->validate([
            'video_id' => ['required', 'integer'],
        ]);

        $exists = Watchlist::query()
            ->where('user_id', $userId)
            ->where('video_id', $validated['video_id'])
            ->exists();

        if ($exists) {
            return response()->json([
                'message' => 'Video already exists in watchlist',
            ], 409);
        }

        $item = Watchlist::create([
            'user_id' => $userId,
            'video_id' => $validated['video_id'],
        ]);

        Cache::forget('recommendations:' . $userId);
        Cache::forget('continue_watching:' . $userId);

        return response()->json([
            'message' => 'Video added to watchlist successfully',
            'data' => $item,
        ], 201);
    }

    public function destroy(Watchlist $watchlist): JsonResponse
    {
        $userId = 1;

        if ((int) $watchlist->user_id !== $userId) {
            return response()->json([
                'message' => 'Watchlist item not found for this user',
            ], 404);
        }

        $watchlist->delete();

        Cache::forget('recommendations:' . $userId);
        Cache::forget('continue_watching:' . $userId);

        return response()->json([
            'message' => 'Video removed from watchlist successfully',
        ], 200);
    }
}
