<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Drone>
 */
class DroneFactory extends Factory
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
            'name'=> $this->faker->unique()->sentence(),
            'model'=> $this->faker->unique()->sentence(),
            'serial_number'=> $this->faker->unique()->sentence(),
            'battery_capacity'=> $this->faker->numberBetween(2500,7000),
            'payload_size'=> $this->faker->numberBetween(3,50),
            'status'=> $this->faker->unique()->sentence(),
            'user_id'=>$this->faker->numberBetween(1,count(User::all()))
        ];
    }
}
