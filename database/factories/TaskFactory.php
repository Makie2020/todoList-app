<?php

namespace Database\Factories;

use App\Models\Task;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * 
     */
    protected $model = Task::class;
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'description' => $this->faker->sentence(5),
            'date' => $this->faker->dateTimeBetween('-1 year', '+5 year'),
            'status' => $this->faker->boolean(),
        ];
    }
}
