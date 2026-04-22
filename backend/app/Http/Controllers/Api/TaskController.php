<?php

namespace App\Http\Controllers\Api;

use App\Models\Task;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class TaskController
{
    public function index(): JsonResponse
    {
        $tasks = Cache::remember('tasks.index', 60, function () {
            return Task::all();
        });

        return response()->json([
            'success' => true,
            'cached_key' => 'tasks.index',
            'data' => $tasks,
        ], 200);
    }

    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'nullable|string|max:50',
            'album_number' => 'required|string|max:50',
        ]);

        $task = Task::create($validated);

        Cache::forget('tasks.index');

        return response()->json([
            'success' => true,
            'message' => 'Task created successfully',
            'data' => $task,
        ], 201);
    }

    public function show(int $id): JsonResponse
    {
        $task = Task::findOrFail($id);

        return response()->json([
            'success' => true,
            'data' => $task,
        ], 200);
    }

    public function update(Request $request, int $id): JsonResponse
    {
        $task = Task::findOrFail($id);

        $validated = $request->validate([
            'title' => 'sometimes|required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'sometimes|required|string|max:50',
            'album_number' => 'sometimes|required|string|max:50',
        ]);

        $task->update($validated);

        Cache::forget('tasks.index');

        return response()->json([
            'success' => true,
            'message' => 'Task updated successfully',
            'data' => $task,
        ], 200);
    }

    public function destroy(int $id): JsonResponse
    {
        $task = Task::findOrFail($id);
        $task->delete();

        Cache::forget('tasks.index');

        return response()->json(null, 204);
    }
}