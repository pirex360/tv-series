<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\TvSeries;
use Illuminate\Database\Seeder;
use App\Models\TvSeriesInterval;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        TvSeries::factory()
            ->count(3)
            ->has(TvSeriesInterval::factory()->count(5))
            ->create();
    }
}
