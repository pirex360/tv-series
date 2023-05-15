<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tv_series_intervals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tv_series_id')->constrained()->onDelete('cascade')->index();
            $table->string('week_day');
            $table->time('show_time');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tv_series_intervals');
    }
};
