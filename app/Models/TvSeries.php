<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TvSeries extends Model
{
    use HasFactory;

    public function getNextTvSeriesByDate(string $weekDay = null)
    {
        if (!$weekDay) { $weekDay = Carbon::now()->dayOfWeek; }

        return self::query()
            ->where('show_time', '>=', $this->dateTime)
            ->where('week_day', $weekDay);
    }


    public function tvSeriesIntervals()
    {
        return $this->hasMany(TvSeriesInterval::class);
    }


}
