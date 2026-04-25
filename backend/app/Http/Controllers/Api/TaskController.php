<?php

namespace App\Http\Controllers\Api;

use App\Models\Task;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Validation\ValidationException;

class TaskController
{
    public function index(): JsonResponse
    {
        $tasks = Cache::remember('tasks.index', 60, function () {
            return Task::all();
        });

        return response()->json([
            'data' => $tasks,
            'meta' => [
                'cached_key' => 'tasks.index',
            ]
        ], 200);
    }

    public function store(Request $request): JsonResponse
    {
        try {
            $validated = $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'nullable|string',
                'status' => 'nullable|string|max:50',
                'album_number' => 'required|string|max:50',
            ]);

            $task = Task::create($validated);

            Cache::forget('tasks.index');

            return response()->json([
                'data' => $task,
                'message' => 'Task created successfully',
            ], 201);
        } catch (ValidationException $e) {
            return response()->json([
                'error' => [
                    'status' => 422,
                    'message' => 'Validation failed',
                    'path' => $request->getRequestUri(),
                    'details' => $e->errors(),
                ]
            ], 422);
        }
    }

    public function show(Request $request, string $id): JsonResponse
    {
        try {
            $task = Task::findOrFail($id);

            return response()->json([
                'data' => $task,
            ], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'error' => [
                    'status' => 404,
                    'message' => 'Task not found',
                    'path' => $request->getRequestUri(),
                ]
            ], 404);
        }
    }

    public function update(Request $request, string $id): JsonResponse
    {
        try {
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
                'data' => $task->fresh(),
                'message' => 'Task updated successfully',
            ], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'error' => [
                    'status' => 404,
                    'message' => 'Task not found',
                    'path' => $request->getRequestUri(),
                ]
            ], 404);
        } catch (ValidationException $e) {
            return response()->json([
                'error' => [
                    'status' => 422,
                    'message' => 'Validation failed',
                    'path' => $request->getRequestUri(),
                    'details' => $e->errors(),
                ]
            ], 422);
        }
    }

    public function destroy(Request $request, string $id): JsonResponse
    {
        try {
            $task = Task::findOrFail($id);
            $task->delete();

            Cache::forget('tasks.index');

            return response()->json(null, 204);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'error' => [
                    'status' => 404,
                    'message' => 'Task not found',
                    'path' => $request->getRequestUri(),
                ]
            ], 404);
        }
    }
}