<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TvSeries>
 */
class TvSeriesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title'     => rtrim($this->faker->unique()->sentence(random_int(2,5), true),'.'),
            'channel'   => $this->faker->company . ' TV',
            'gender'    => $this->faker->randomElement(['action', 'comedy', 'drama', 'adventure', 'horror', 'fantasy', 'animation']),
        ];
    }
}
