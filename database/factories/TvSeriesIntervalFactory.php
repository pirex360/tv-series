<?php

namespace Database\Factories;

use App\Models\TvSeries;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TvSeriesInterval>
 */

class TvSeriesIntervalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'tv_series_id' => TvSeries::factory(),
            'week_day' => $this->faker->dayOfWeek,
            'show_time' => $this->faker->time('H:i:s'),
        ];
    }
}
