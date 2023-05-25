<?php

namespace Database\Factories;

use App\Models\Province;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Farm>
 */
class FarmFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'area'=>$this->faker->unique()->sentence(),
            'name'=>$this->faker->unique()->sentence(),
            'province_id'=>$this->faker->numberBetween(1,count(Province::all()))

        ];
    }
}
