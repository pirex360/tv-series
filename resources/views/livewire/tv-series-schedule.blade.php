<div>
    <div>
        <label for="dt">Select Date:</label>
        <input type="text" id="dt" name="dt">
        <input type="hidden" id="datetime" name="datetime">
        <button wire:click="getSchedule">Search</button>
    </div>
    <hr>

    @if($nextShowTime != null)
    <div id="results">

        @if (! empty($nextShowTime) && count($nextShowTime) > 0)

            <h2>Next Show(s)</h2>

            @if(count($uniqueTvShows) > 1)
                <select id="filter" name="filter" wire:model="filter" wire:change="getSchedule">
                    <option value="">:: All TV-Shows</option>
                    @foreach($uniqueTvShows as $key => $value)
                    <option value="{{ $key }}">{{ $value }}</option>
                    @endforeach
                </select>
            @endif

            @foreach($nextShowTime as $tv)
                <div class="card">

                    <h3>{{ $tv->title }} <span class="badge">{{ $tv->channel }}</span></h3>
                    <p><span class="badge badge-success">on {{ $tv->week_day }} at {{ $tv->show_time }}</span></p>

                </div>
            @endforeach


        @else

            <div class="alert">
                <p>There are no TV Shows to watch after the specified time of
                    <span class="badge badge-danger">{{ \Carbon\Carbon::parse($datetime)->format('H:i') }}</span> on
                    <span class="badge badge-danger">{{ \Carbon\Carbon::parse($datetime)->englishDayOfWeek }}</span> at
                    <span class="badge badge-danger">{{ \Carbon\Carbon::parse($datetime)->format('Y-m-d') }}</span> , please try another day!
                </p>
            </div>

        @endif

    </div>
    @endif


    <script type="module">

        flatpickr("#dt", {
            enableTime: true,
            dateFormat: "Y-m-d H:i",
            weekNumbers: true,
            minDate: "today",
            time_24hr: true,
            allowInput: false,
            timeFormat: "H:i",
            onChange: function(selectedDates, dateStr, instance) {
                if (dateStr != "")
                {
                    document.getElementById('datetime').value = dateStr;
                    @this.set('datetime', dateStr);
                    Livewire.emit('get-schedule');
                }
            },
        });

    </script>

</div>


