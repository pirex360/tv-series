<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\TvSeries;

class TvSeriesSchedule extends Component
{
    public $datetime;
    public $filter;
    public $nextShowTime;
    public $uniqueTvShows;

    protected $listeners = ['get-schedule' => 'getSchedule'];


    public function getSchedule()
    {

        $query = TvSeries::query()
                ->join('tv_series_intervals', 'tv_series.id', '=', 'tv_series_intervals.tv_series_id')
                ->where('tv_series_intervals.show_time', '>=',  Carbon::parse($this->datetime)->format('H:i'))
                ->where('week_day', Carbon::parse($this->datetime)->englishDayOfWeek);

        $uniqueTvShowsQuery = clone $query;
        $this->uniqueTvShows =  $uniqueTvShowsQuery->groupBy('tv_series.id', 'tv_series.title')
                                    ->orderBy('tv_series.title')
                                    ->pluck('tv_series.title', 'tv_series.id');

        if ($this->filter) {
            $query->where('tv_series.id', $this->filter);
        }
/*
        $schedule = $query->orderBy('tv_series_intervals.show_time')
                ->selectRaw('
                DATE_FORMAT(tv_series_intervals.show_time, "%H:%i") as show_time
                , tv_series_intervals.week_day
                , tv_series.title
                , tv_series.channel')->get();
*/

        $schedule = $query->orderBy('tv_series_intervals.show_time')
                ->selectRaw('
                tv_series_intervals.show_time
                , tv_series_intervals.week_day
                , tv_series.title
                , tv_series.channel')->get();

        $formattedSchedule = $schedule->map(function ($item) {
                    $item['show_time'] = Carbon::parse($item['show_time'])->format('H:i');
                    return $item;
                });

        //$this->nextShowTime = $schedule ? $schedule : null;
        $this->nextShowTime = $formattedSchedule ?: null;

    }

    public function render()
    {
        return view('livewire.tv-series-schedule');
    }

}
