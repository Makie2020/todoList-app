<?php

namespace Database\Seeders;

use App\Models\Task;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TasksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $start = now()->startOfYear();
        $count = $start->diffInDays(now()->endOfYear());

        for ($i = 0; $i < $count; $i++) {
            Task::factory(["date" => $start->copy()->addDays($i)])->create();
        }
        //Task::factory()->count(50)->create();
    }
}
