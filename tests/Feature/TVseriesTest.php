<?php

namespace Tests\Feature;

use Carbon\Carbon;
use Tests\TestCase;
use Livewire\Livewire;
use App\Models\TvSeries;
use App\Models\TvSeriesInterval;
use App\Http\Livewire\TvSeriesSchedule;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Mockery;

class TVseriesTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_if_page_is_displayed(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }


    public function test_if_page_is_not_displayed(): void
    {
        $response = $this->get('/knock-knock');

        $response->assertStatus(404);
    }


    public function test_if_database_has_series(): void
    {
        TvSeries::factory()->count(5)->create();

        $this->assertDatabaseCount('tv_series', 5);
    }


    public function test_if_database_has_tv_intervals()
    {
        $series = TvSeries::factory()->create();

        TvSeriesInterval::factory()->count(10)->create(['tv_series_id' => $series->id]);

        $this->assertDatabaseCount('tv_series_intervals', 10);
    }


    public function test_it_renders_component_in_browser(): void
    {
        $this->get('/')->assertSeeLivewire('tv-series-schedule');
    }


    public function test_tv_series_schedule_shows_correct_data()
    {
        $tvSeries = TvSeries::factory()->create(['title' => 'TV Show 1']);

        $expectedData = [
            'datetime' => now(),
            'filter' => $tvSeries->id,
        ];

        Livewire::test(TvSeriesSchedule::class)
            ->set('datetime', $expectedData['datetime']->format('H:i'))
            ->set('filter', $expectedData['filter'])
            ->call('getSchedule')
            ->assertSet('datetime', ($expectedData['datetime'])->format('H:i'))
            ->assertSet('filter', $expectedData['filter']);

    }

}
