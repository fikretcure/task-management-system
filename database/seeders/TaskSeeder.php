<?php

namespace Database\Seeders;

use App\Models\Task;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Task::create([
            'name' => 'Temizlik',
            'description' => 'Temizlik',
            'user_id' => 1
        ]);

        Task::create([
            'name' => 'Elektrik',
            'description' => 'Elektrik',
            'user_id' => 2
        ]);
    }
}
