<?php

namespace Database\Factories;

use App\Models\Drone;
use App\Models\Farm;
use App\Models\Instruction;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Plan>
 */
class PlanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'=> $this->faker->unique()->sentence(),
            'assigned_datetime'=> $this->faker->dateTime(),
            'instruction_id'=>$this->faker->numberBetween(1,count(Instruction::all())),
            'drone_id'=>$this->faker->numberBetween(1,count(Drone::all())),
            'farm_id'=>$this->faker->numberBetween(1,count(Farm::all())),
            'user_id'=>$this->faker->numberBetween(1,count(User::all()))
        ];
    }
}
