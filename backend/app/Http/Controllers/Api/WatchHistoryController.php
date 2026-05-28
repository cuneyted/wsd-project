<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\WatchHistory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class WatchHistoryController extends Controller
{
    public function store(Request $request): JsonResponse
    {
        $userId = 1;

        $validated = $request->validate([
            'video_id' => ['required', 'integer'],
            'progress_seconds' => ['required', 'integer', 'min:0'],
            'completed' => ['nullable', 'boolean'],
        ]);

        $history = WatchHistory::updateOrCreate(
            [
                'user_id' => $userId,
                'video_id' => $validated['video_id'],
            ],
            [
                'progress_seconds' => $validated['progress_seconds'],
                'completed' => $validated['completed'] ?? false,
                'watched_at' => now(),
            ]
        );

        Cache::forget('continue_watching:' . $userId);
        Cache::forget('recommendations:' . $userId);

        return response()->json([
            'message' => 'Watch history updated successfully',
            'data' => $history,
        ], 200);
    }

    public function continueWatching(): JsonResponse
    {
        $userId = 1;
        $cacheKey = 'continue_watching:' . $userId;

        $history = Cache::remember($cacheKey, 60, function () use ($userId) {
            return WatchHistory::query()
                ->with('video')
                ->where('user_id', $userId)
                ->where('completed', false)
                ->orderByDesc('watched_at')
                ->limit(10)
                ->get();
        });

        return response()->json([
            'data' => $history,
        ], 200);
    }
}
