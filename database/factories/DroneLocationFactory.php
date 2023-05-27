<?php

namespace Database\Factories;

use App\Models\Drone;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DroneLocation>
 */
class DroneLocationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'latitude'=> $this->faker->unique()->sentence(),
            'longitude'=> $this->faker->unique()->sentence(),
            'drone_id'=>$this->faker->numberBetween(1,count(Drone::all()))
        ];
    }
}
