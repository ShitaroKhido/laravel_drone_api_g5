<?php

namespace Database\Factories;

use App\Models\Drone;
use App\Models\Farm;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class MapPictureFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'scanned_map' => $this->faker->unique()->sentence(),
            'drone_id' => $this->faker->numberBetween(1, count(Drone::all())),
            'farm_id' => $this->faker->numberBetween(1, count(Farm::all()))
        ];
    }
}
