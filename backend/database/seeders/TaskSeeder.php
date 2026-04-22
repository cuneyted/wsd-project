<?php

namespace Database\Seeders;

use App\Models\Task;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    public function run(): void
    {
        Task::truncate();

        Task::create([
            'title' => 'Prepare backend API',
            'description' => 'Create Laravel task CRUD endpoints',
            'status' => 'done',
            'album_number' => '78745',
        ]);

        Task::create([
            'title' => 'Test Redis cache',
            'description' => 'Verify cache population and invalidation',
            'status' => 'todo',
            'album_number' => '78745',
        ]);

        Task::create([
            'title' => 'Prepare laboratory report',
            'description' => 'Document Docker, Redis, and Nginx workflow',
            'status' => 'in_progress',
            'album_number' => '78745',
        ]);
    }
}