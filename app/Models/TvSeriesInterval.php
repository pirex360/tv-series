<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TvSeriesInterval extends Model
{
    use HasFactory;

    public function tvSeries()
    {
        return $this->belongsTo(TvSeries::class);
    }
}
